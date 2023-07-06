<?php

namespace App\Http\Controllers\Admin;

use App\Consts;
use App\Http\Services\UserService;
use App\Models\AffiliateHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AffiliateHistoryController extends Controller
{
    public function __construct()
    {
        $this->routeDefault  = 'affiliate_historys';
        $this->viewPart = 'admin.pages.affiliate_historys';
        $this->responseData['module_name'] = __('Affiliate history');
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
        $rows = UserService::getAffiliateHistory($params)->paginate(Consts::DEFAULT_PAGINATE_LIMIT);
        $this->responseData['rows'] =  $rows;

        return $this->responseView($this->viewPart . '.index');
    }
}
