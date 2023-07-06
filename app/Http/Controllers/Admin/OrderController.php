<?php

namespace App\Http\Controllers\Admin;

use App\Consts;
use App\Http\Services\ContentService;
use App\Http\Services\UserService;
use App\Models\AffiliateHistory;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->routeDefault  = 'orders';
        $this->viewPart = 'admin.pages.orders';
        $this->responseData['module_name'] = __('Order Management');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // Try catch và xử lý kiểm tra trạng thái đơn hàng để + hoặc - điểm (tiền) cho AFL
        DB::beginTransaction();
        try {
            $request->validate([
                'status' => 'required|max:255'
            ]);
            $params = $request->only([
                'status', 'admin_note', 'json_params'
            ]);
            $params['admin_updated_id'] = Auth::guard('admin')->user()->id;
            // $payment_method = $params['json_params']['payment_method'] ?? null;
            // // Nếu đơn hàng đã được xử lý, không thực hiện update gì thêm
            // // 14/07/2022
            // if ($order->status == Consts::ORDER_STATUS['processed']) {
            //     return redirect()->back()->with('errorMessage', __('You cannot update the processed order information!'));
            // }

            // switch (true) {
            //     case $order->status == $params['status'] || $order->customer_id == null:
            //         // break this case
            //         break;
            //     case $order->status == Consts::ORDER_STATUS['processed']:
            //         // take back score and money from AFL users
            //         $user = User::find($order->customer_id);
            //         // Update status level 0
            //         $afl_level_0 = AffiliateHistory::where([
            //             ['is_type', '=', $order->is_type],
            //             ['user_id', '=', $user->id],
            //             ['order_id', '=', $order->id],
            //         ])->first();
            //         $afl_level_0->status = $params['status'];
            //         $afl_level_0->save();
            //         // take back for level 0
            //         User::find($user->id)
            //             ->update([
            //                 'total_score' => DB::raw('total_score - ' . $afl_level_0->affiliate_point),
            //                 'total_money' => DB::raw('total_money - ' . $afl_level_0->affiliate_money),
            //             ]);

            //         if ($user->affiliate_id > 0) {
            //             // Update status level 1
            //             $afl_level_1 = AffiliateHistory::where([
            //                 ['is_type', '=', $order->is_type],
            //                 ['user_id', '=', $user->affiliate_id],
            //                 ['order_id', '=', $order->id],
            //             ])->first();
            //             $afl_level_1->status = $params['status'];
            //             $afl_level_1->save();
            //             // take back for level 1
            //             User::find($user->affiliate_id)
            //                 ->update([
            //                     'total_score' => DB::raw('total_score - ' . $afl_level_1->affiliate_point),
            //                     'total_money' => DB::raw('total_money - ' . $afl_level_1->affiliate_money),
            //                 ]);
            //         }
            //         break;
            //     case $params['status'] == Consts::ORDER_STATUS['processed']:
            //         // add score and money to AFL users
            //         $order_info = ContentService::getOrderProduct(['id' => $order->id])->first();
            //         // Level 0
            //         $afl_level_0 = AffiliateHistory::updateOrCreate(
            //             [
            //                 'is_type' => $order_info->is_type,
            //                 'user_id' => $order_info->customer_id,
            //                 'order_id' => $order_info->id,
            //             ],
            //             [
            //                 'order_total_money' => $order_info->total_money ?? 0,
            //                 'affiliate_percent' => Consts::AFL_0_PERCENT[$order_info->is_type] ?? 0,
            //                 'affiliate_point' => $order_info->total_money * (Consts::AFL_0_PERCENT[$order_info->is_type] ?? 0) / 100,
            //                 'affiliate_money' => $order_info->total_money * (Consts::AFL_0_PERCENT[$order_info->is_type] ?? 0) / 100,
            //                 'description' => '',
            //                 'status' => $params['status'],
            //             ]
            //         );
            //         $user = User::find($order_info->customer_id);
            //         $user->total_score += $afl_level_0->affiliate_point;
            //         $user->total_money += $afl_level_0->affiliate_money;
            //         $user->save();

            //         // Check user AFL level 1
            //         if ($user->affiliate_id > 0) {
            //             $afl_level_1 = AffiliateHistory::updateOrCreate(
            //                 [
            //                     'is_type' => $order_info->is_type,
            //                     'user_id' => $user->affiliate_id,
            //                     'order_id' => $order_info->id,
            //                 ],
            //                 [
            //                     'order_total_money' => $order_info->total_money ?? 0,
            //                     'affiliate_percent' => Consts::AFL_1_PERCENT[$order_info->is_type] ?? 0,
            //                     'affiliate_point' => $order_info->total_money * (Consts::AFL_1_PERCENT[$order_info->is_type] ?? 0) / 100,
            //                     'affiliate_money' => $order_info->total_money * (Consts::AFL_1_PERCENT[$order_info->is_type] ?? 0) / 100,
            //                     'description' => '',
            //                     'status' => $params['status'],
            //                 ]
            //             );
            //             // update point and money to level 1
            //             User::find($user->affiliate_id)
            //                 ->update([
            //                     'total_score' => DB::raw('total_score + ' . $afl_level_1->affiliate_point),
            //                     'total_money' => DB::raw('total_money + ' . $afl_level_1->affiliate_money),
            //                 ]);
            //         }

            //         // Nếu là payment affiliate thì tạo affiliate_payment tương ứng
            //         if ($payment_method == Consts::PAYMENT_METHOD['affiliate']) {
            //             $params_payment['status'] = Consts::WITHDRAW_STATUS['processed'];
            //             $params_payment['user_id'] = $order_info->customer_id;
            //             $params_payment['money'] = $order_info->total_money;
            //             $params_payment['json_params']['admin_note'] = __('Payment for orders by affiliate wallet');
            //             $params_payment['json_params']['order_id'] = $order_info->id;
            //             $params_payment['json_params']['is_type'] = $order_info->is_type;
            //             $payment = UserService::createPayment($params_payment);
            //         }

            //         break;
            // }
            // Update order
            $order->fill($params);
            $order->save();

            DB::commit();

            return redirect()->back()->with('successMessage', __('Successfully updated!'));
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if ($order->status == Consts::ORDER_STATUS['processed']) {
            return redirect()->back()->with('errorMessage', __('Processed orders cannot be deleted!'));
        }

        $order->delete();

        return redirect()->back()->with('successMessage', __('Delete record successfully!'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listOrderService(Request $request)
    {
        $this->responseData['module_name'] = __('Service booking Management');

        $params = $request->all();
        $this->responseData['params'] = $params;
        $params['is_type'] = Consts::ORDER_TYPE['service'];
        if (isset($params['created_at_from'])) {
            $params['created_at_from'] = Carbon::createFromFormat('d/m/Y', $params['created_at_from'])->format('Y-m-d');
        }
        if (isset($params['created_at_to'])) {
            $params['created_at_to'] = Carbon::createFromFormat('d/m/Y', $params['created_at_to'])->addDays(1)->format('Y-m-d');
        }
        $rows = ContentService::getOrderService($params)->paginate(Consts::DEFAULT_PAGINATE_LIMIT);
        $this->responseData['rows'] =  $rows;

        return $this->responseView($this->viewPart . '.order_service_list');
    }

    public function showOrderService(Order $order)
    {
        $this->responseData['module_name'] = __('Service booking Management');

        $params['id'] = $order->id;
        $this->responseData['detail'] = ContentService::getOrderService($params)->first();

        // Check if customer_id is existed, get infor of account customer
        if ($order->customer_id > 0) {
            $this->responseData['customer'] = User::find($order->customer_id);
        }

        return $this->responseView($this->viewPart . '.order_service_show');
    }

    public function listOrderProduct(Request $request)
    {
        $this->responseData['module_name'] = __('Order Product Management');

        $params = $request->all();
        $this->responseData['params'] = $params;
        $params['is_type'] = Consts::ORDER_TYPE['product'];
        if (isset($params['created_at_from'])) {
            $params['created_at_from'] = Carbon::createFromFormat('d/m/Y', $params['created_at_from'])->format('Y-m-d');
        }
        if (isset($params['created_at_to'])) {
            $params['created_at_to'] = Carbon::createFromFormat('d/m/Y', $params['created_at_to'])->addDays(1)->format('Y-m-d');
        }
        $rows = ContentService::getOrderProduct($params)->paginate(Consts::DEFAULT_PAGINATE_LIMIT);
        $this->responseData['rows'] =  $rows;

        return $this->responseView($this->viewPart . '.order_product_list');
    }

    public function showOrderProduct(Order $order)
    {
        $this->responseData['module_name'] = __('Order Product Management');
        $this->responseData['detail'] = ContentService::getOrderProduct(['id' => $order->id])->first();

        $params['order_id'] = $order->id;
        $this->responseData['rows'] = ContentService::getOrderDetail($params)->get();

        // Check if customer_id is existed, get infor of account customer
        if ($order->customer_id > 0) {
            $this->responseData['customer'] = User::find($order->customer_id);
        }

        return $this->responseView($this->viewPart . '.order_product_show');
    }
}
