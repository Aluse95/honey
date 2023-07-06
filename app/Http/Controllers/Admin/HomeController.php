<?php

namespace App\Http\Controllers\Admin;

use App\Consts;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->viewPart = 'admin.pages.home';
        $this->responseData['module_name'] = __('Welcome to Admin System!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return $this->responseView($this->viewPart . '.index');
    }
}
