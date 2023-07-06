<?php

namespace App\Http\Controllers\Admin;

use App\Consts;
use App\Http\Services\UserService;
use App\Models\AffiliatePayment;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Break_;

class AffiliatePaymentController extends Controller
{
    public function __construct()
    {
        $this->routeDefault  = 'affiliate_payments';
        $this->viewPart = 'admin.pages.affiliate_payments';
        $this->responseData['module_name'] = __('Affiliate payments');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $this->responseData['params'] = $params;

        if (isset($params['created_at_from'])) {
            $params['created_at_from'] = Carbon::createFromFormat('d/m/Y', $params['created_at_from'])->format('Y-m-d');
        }
        if (isset($params['created_at_to'])) {
            $params['created_at_to'] = Carbon::createFromFormat('d/m/Y', $params['created_at_to'])->addDays(1)->format('Y-m-d');
        }
        $rows = UserService::getAffiliatePayment($params)->paginate(Consts::DEFAULT_PAGINATE_LIMIT);
        $this->responseData['rows'] =  $rows;

        return $this->responseView($this->viewPart . '.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AffiliatePayment  $affiliatePayment
     * @return \Illuminate\Http\Response
     */
    public function show(AffiliatePayment $affiliatePayment)
    {
        $this->responseData['detail'] = UserService::getAffiliatePayment(['id' => $affiliatePayment->id])->first();

        return $this->responseView($this->viewPart . '.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AffiliatePayment  $affiliatePayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AffiliatePayment $affiliatePayment)
    {
        DB::beginTransaction();
        try {

            $request->validate([
                'status' => 'required|string|max:255'
            ]);
            $params = $request->only([
                'status', 'json_params'
            ]);
            $params['admin_updated_id'] = Auth::guard('admin')->user()->id;
            // Nếu đơn hàng đã được xử lý, không thực hiện update gì thêm
            // 14/07/2022
            if ($affiliatePayment->status == Consts::WITHDRAW_STATUS['processed']) {
                return redirect()->back()->with('errorMessage', __('You cannot update the processed payment information!'));
            }
            // Kiem tra thong tin trang thai nếu chuyển sang hủy thì hoàn và ngc lại
            switch (true) {
                case $affiliatePayment->status == $params['status']:
                    // break this case
                    break;
                case $affiliatePayment->status == Consts::WITHDRAW_STATUS['cancel']:
                    $user = User::find($affiliatePayment->user_id);
                    $user->total_score -= $affiliatePayment->money;
                    $user->total_money -= $affiliatePayment->money;
                    $user->total_payment += $affiliatePayment->money;
                    $user->save();
                    break;
                case $params['status'] == Consts::WITHDRAW_STATUS['cancel']:
                    $user = User::find($affiliatePayment->user_id);
                    $user->total_score += $affiliatePayment->money;
                    $user->total_money += $affiliatePayment->money;
                    $user->total_payment -= $affiliatePayment->money;
                    $user->save();
                    break;
            }

            $affiliatePayment->fill($params);
            $affiliatePayment->save();

            DB::commit();

            return redirect()->back()->with('successMessage', __('Successfully updated!'));
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }
}
