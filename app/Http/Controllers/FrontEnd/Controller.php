<?php

namespace App\Http\Controllers\FrontEnd;

use App\Consts;
use App\Http\Services\ContentService;
use App\Http\Services\PageBuilderService;
use App\Models\Popup;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use stdClass;
use Jenssegers\Agent\Agent;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Part to views for Controller
    protected $viewPart;
    // Data response to view
    protected $responseData = [];


    public function __construct()
    {
        // Get all global system params
        $options = ContentService::getOption();
        if ($options) {
            $this->web_information = new stdClass();
            foreach ($options as $option) {
                $this->web_information->{$option->option_name} = json_decode($option->option_value);
            }
            $this->responseData['web_information'] = $this->web_information;
        }
    }

    /**
     * Xử lý các thông tin hệ thống trước khi đổ ra view
     * @author: ThangNH
     * @created_at: 2021/10/01
     */

    protected function responseView($view)
    {
        $this->responseData['user_auth'] = Auth::guard('web')->user();
        $this->responseData['menu'] = ContentService::getMenu(['status' => 'active', 'order_by' => ['iorder' => 'ASC']])->get();
        // Set locale to use mutiple languages 
        if (session('locale') !== null) {
            App::setLocale(session('locale'));
        }
        $this->responseData['locale'] = App::getLocale();

        // Get page info and block default
        if (isset($this->responseData['page'])) {
            $page = $this->responseData['page'];
        } else {
            $params_page['route_name'] = Route::getCurrentRoute()->getName();
            if ($params_page['route_name'] == Consts::ROUTE_CUSTOM_PAGE) {
                $params_page['alias'] = Request::segment(1);
            }
            $params_page['id'] = $this->responseData['web_information']->page->{$params_page['route_name']} ?? null;

            $page = ContentService::getPage($params_page)->first();
            $this->responseData['page'] = $page;
        }

        // Get Block content by page
        if (isset($page->json_params->block_content)) {
            $params_block['template'] = $page->json_params->template;
            $params_block['status'] = Consts::STATUS['active'];
            $params_block['order_by'] = [
                'iorder' => 'ASC',
                'id' => 'DESC'
            ];
            $blocks = PageBuilderService::getBlockContent($params_block)->get();
            // Reorder blockContents setting of this widget
            $block_setting = $page->json_params->block_content ?? [];
            // Filter selected blockContents
            $blocks_selected = $blocks->filter(function ($item) use ($block_setting) {
                return in_array($item->id, $block_setting);
            });
            // Reorder selected blockContents
            $blocks_selected = $blocks_selected->sortBy(function ($item) use ($block_setting) {
                return array_search($item->id, $block_setting);
            });

            $this->responseData['blocks'] = $blocks;
            $this->responseData['blocks_selected'] = $blocks_selected;
        }

        // Instance for check size of screen
        $this->responseData['agent'] = new Agent();
        // dd($this->responseData);
        return view($view, $this->responseData);
    }

    protected function sendResponse($data, $message = '')
    {
        $response = [
            'data' => $data,
            'message' => $message
        ];

        return response()->json($response);
    }
}
