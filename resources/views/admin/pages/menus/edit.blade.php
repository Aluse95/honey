@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('themes/admin/plugins/nestable/jquery.nestable.min.css') }}">
    <style>
        .dd-empty,
        .dd-item,
        .dd-placeholder {
            margin: 10px 0;
        }

        .dd-item>button {
            height: 30px;
        }

        .form-group .select2-container {
            width: 100% !important;
        }

        .form-control {
            height: auto;
        }

        .box-body {
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .box-body .form-horizontal .form-group {
            margin: 0px
        }

        .dd-item .item-details {
            border-bottom: 1px solid #ccc;
            border-left: 1px solid #ccc;
            border-right: 1px solid #ccc;
            margin-bottom: 5px;
            margin-top: 0px;
            max-width: 363px;
            padding: 10px 15px;
        }

        .dd3-content {
            background-color: #fff;
            border: 0;
            height: 40px;
            padding: 10px;
            width: 100%;
        }

        .dd3-handle {
            background: transparent;
            border: 1px solid #aaa;
            border-radius: 0;
            cursor: move;
            height: 40px;
            left: 0;
            margin: 0;
            overflow: hidden;
            position: absolute;
            text-indent: 100%;
            top: 0;
            white-space: nowrap;
            width: 100%;
        }

        .dd3-handle:hover {
            background-color: transparent;
        }

        .dd3-content>span.text.float-end,
        .dd3-content>span.text.float-start {
            display: inline-block;
            overflow: hidden;
            text-overflow: ellipsis;
            -ms-text-overflow: ellipsis;
            white-space: nowrap;
        }

        .dd3-content>span.text.float-start {
            max-width: 200px;
        }

        .float-start {
            float: left !important;
        }

        .dd3-content .show-item-details {
            background-color: #ccc;
            border-left: 1px solid #aaa;
            color: #000;
            right: 0px;
            ;
            line-height: 38px;
            position: absolute;
            text-align: center;
            top: 1px;
            width: 43px;
        }

        .widget-menu .widget.meta-boxes>a {
            text-decoration: none !important;
        }

        .widget {
            background: #ffffff;
            clear: both;
            margin-bottom: 10px;
        }

        .meta-boxes {
            margin-top: 10px;
        }

        .widget.meta-boxes:first-child {
            margin-top: 0;
        }

        .widget-title {
            cursor: move;
            overflow: hidden;
            background: #ebeae8;
            height: 44px;
            line-height: 34px;
            border-bottom: 1px solid #ffffff;
            color: #1f64a0 !important;
        }

        .widget-menu .meta-boxes .narrow-icon {
            float: right;
            margin-right: 0;
            margin-top: 12px;
        }

        .widget-menu .widget.meta-boxes .collapsed h4.widget-title .narrow-icon:before {
            content: "\f107";
        }

        .meta-boxes .widget-title {
            cursor: pointer;
            overflow: hidden;
            height: 40px;
            border: 1px solid #aaa;
            padding: 0 10px;
            background: none;
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .widget-menu .widget.meta-boxes .widget-title {
            cursor: pointer;
            font-size: 14px;
            font-weight: 400;
            height: 40px;
            line-height: 40px;
            padding: 0 15px;
        }

        .widget-body {
            padding: 15px 15px;
            border-radius: 0 0 3px 3px;
            min-height: 200px;
        }

        .widget-menu .widget.meta-boxes .widget-body {
            min-height: 130px;
        }

        .box-links-for-menu .list-item {
            border: 1px solid #ddd;
            max-height: 200px;
            overflow: auto;
            padding: 15px;
        }

        .mCSB_container {
            padding: 10px;
        }

        .box-links-for-menu .list-item li {
            list-style: none;
            margin-bottom: 5px;
            position: relative;
        }

        .box-links-for-menu .list-item li label {
            max-width: 80%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .dd-list input[type=checkbox] {
            cursor: pointer;
            margin: 0 0.5rem 0 0;
            position: relative;
            top: 0;
        }

        .box-links-for-menu .list-item li label input {
            margin-left: 5px;
        }

        .dd-list input[type=checkbox]:before {
            border-color: #58b3f0;
            border-style: none none solid solid;
            border-width: 2px;
            content: "";
            height: 5px;
            left: 2px;
            margin: auto;
            position: absolute;
            right: 0;
            top: 0.2em;
            transform: rotate(-45deg) scale(0);
            transition: transform .4s cubic-bezier(.45, 1.8, .5, .75);
            width: 10px;
            z-index: 1;
        }

        .dd-list input[type=checkbox]:after {
            background: #fff;
            border: 1px solid #c4cdd5;
            border-radius: 3px;
            bottom: 0;
            content: "";
            cursor: pointer;
            height: 16px;
            left: -1px;
            margin: auto;
            position: absolute;
            right: 0;
            top: 0;
            width: 16px;
        }

        .dd-list input[type=checkbox]:checked:before {
            transform: rotate(-45deg) scale(1);
        }

        .dd-list input[type=checkbox]:checked:after {
            border-color: #58b3f0;
        }

        .float-end {
            float: right !important;
        }

        .dd3-content>span.text.float-end,
        .dd3-content>span.text.float-start {
            display: inline-block;
            overflow: hidden;
            text-overflow: ellipsis;
            -ms-text-overflow: ellipsis;
            white-space: nowrap;
        }

        .dd3-content>span.text.float-end {
            margin-right: 40px;
            max-width: 100px;
        }
    </style>
@endsection
@section('title')
    {{ $module_name }}
@endsection
{{-- @dd($taxonomy); --}}
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $module_name }}
            <a class="btn btn-sm btn-warning pull-right" href="{{ route(Request::segment(2) . '.create') }}">
                <i class="fa fa-plus"></i> @lang('Add')
            </a>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        @if (session('errorMessage'))
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session('errorMessage') }}
            </div>
        @endif
        @if (session('successMessage'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session('successMessage') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('Update form')</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1" data-toggle="tab">
                                <h5>
                                    @lang('General information')
                                    <span class="text-danger">*</span>
                                </h5>
                            </a>
                        </li>
                        <a class="btn btn-success btn-sm pull-right" href="{{ route(Request::segment(2) . '.index') }}">
                            <i class="fa fa-bars"></i>
                            @lang('List')
                        </a>
                    </ul>


                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <!-- form start -->
                            <form role="form" action="{{ route(Request::segment(2) . '.update', $detail->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>@lang('Title') <small class="text-red">*</small></label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="@lang('Title')" value="{{ $detail->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>@lang('Menu type') <small class="text-red">*</small></label>
                                            <select name="menu_type" id="menu_type" class="form-control select2">
                                                <option value="">@lang('please_chosen')</option>
                                                @foreach (App\Consts::MENU_TYPE as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ $detail->menu_type == $value ? 'selected' : '' }}>
                                                        @lang($value)
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>@lang('Status')</label>
                                            <div class="form-control">
                                                @foreach (App\Consts::STATUS as $key => $value)
                                                    <label>
                                                        <input type="radio" name="status" value="{{ $value }}"
                                                            {{ $detail->status == $value ? 'checked' : '' }}>
                                                        <small class="mr-15">{{ __($value) }}</small>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>@lang('Order')</label>
                                            <input type="number" class="form-control" name="iorder"
                                                placeholder="@lang('Order')" value="{{ $detail->iorder }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>@lang('Description')</label>
                                            <textarea name="description" id="description" class="form-control" rows="3">{{ $detail->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-floppy-o"></i>
                                            @lang('Save')
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="row">

                                <div class="col-md-12">
                                    <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                                </div>
                                <div class="col-md-6">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">
                                                Danh sách trang
                                            </h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="panel-group" id="accordion">
                                                <div class="widget meta-boxes">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#taxonomy"
                                                        aria-expanded="false" class="collapsed">
                                                        <h4 class="widget-title">
                                                            <span>Pages - Trang</span>
                                                            <i class="fa fa-angle-down narrow-icon"></i>
                                                        </h4>
                                                    </a>
                                                    <div id="taxonomy" class="panel-collapse collapse">
                                                        <div class="widget-body">
                                                            <div class="box-links-for-menu">
                                                                <div class="the-box">
                                                                    <form
                                                                        action="{{ route(Request::segment(2) . '.store') }}"
                                                                        method="POST" class="form-horizontal"
                                                                        id="form-main" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <input type="hidden" name="name"
                                                                            value="name_menu">
                                                                        <input type="hidden" name="parent_id"
                                                                            value="{{ $detail->id }}">
                                                                        <ul class="list-item mCustomScrollbar _mCS_1 mCS_no_scrollbar"
                                                                            style="padding: 0px;">
                                                                            <div id="mCSB_1"
                                                                                class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside"
                                                                                style="max-height: none;" tabindex="0">
                                                                                <div id="mCSB_1_container"
                                                                                    class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                                                                    style="position:relative; top:0; left:0;"
                                                                                    dir="ltr">
                                                                                    @foreach ($pages as $item)
                                                                                        <li>
                                                                                            <label
                                                                                                for="page-{{ $item->id }}">
                                                                                                <input
                                                                                                    id="page-{{ $item->id }}"
                                                                                                    name="menu_page[]"
                                                                                                    type="checkbox"
                                                                                                    value="{{ $item->id }}">
                                                                                                {{ $item->name }}
                                                                                        </li>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </ul>
                                                                        <div class="text-end">
                                                                            <div class="btn-group btn-group-devided">
                                                                                <button type="submit"
                                                                                    class="btn-add-to-menu btn btn-primary">
                                                                                    <span class="text"><i
                                                                                            class="fa fa-plus"></i>
                                                                                        Add to menu</span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="widget meta-boxes">
                                                    <a data-toggle="collapse" data-parent="#accordion"
                                                        href="#categories-1677117492" class="collapsed"
                                                        aria-expanded="false">
                                                        <h4 class="widget-title">
                                                            <span>Danh mục</span>
                                                            <i class="fa fa-angle-down narrow-icon"></i>
                                                        </h4>
                                                    </a>
                                                    <div id="categories-1677117492" class="panel-collapse collapse">
                                                        <div class="widget-body">
                                                            <div class="box-links-for-menu">
                                                                <div class="the-box">
                                                                    <form
                                                                        action="{{ route(Request::segment(2) . '.store') }}"
                                                                        method="POST" class="form-horizontal"
                                                                        id="form-main" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <input type="hidden" name="name"
                                                                            value="name_menu">
                                                                        <input type="hidden" name="parent_id"
                                                                            value="{{ $detail->id }}">
                                                                        <ul class="list-item mCustomScrollbar _mCS_2 mCS_no_scrollbar"
                                                                            style="padding: 0px;">
                                                                            <div id="mCSB_2"
                                                                                class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside"
                                                                                tabindex="0" style="max-height: none;">
                                                                                <div id="mCSB_2_container"
                                                                                    class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                                                                    style="position:relative; top:0; left:0;"
                                                                                    dir="ltr">
                                                                                    @foreach ($taxonomy as $row)
                                                                                        @if ($row->parent_id == 0 || $row->parent_id == null)
                                                                                            <li>
                                                                                                <label
                                                                                                    for="menu_{{ $row->id }}">
                                                                                                    <input
                                                                                                        id="menu_{{ $row->id }}"
                                                                                                        name="menu_taxonomy[]"
                                                                                                        type="checkbox"
                                                                                                        value="{{ $row->id }}">
                                                                                                    {{ $row->title }}
                                                                                                </label>
                                                                                                <ul>
                                                                                                    @foreach ($taxonomy as $item)
                                                                                                        @if ($item->parent_id == $row->id)
                                                                                                            <li>
                                                                                                                <label
                                                                                                                    for="menu_chil_{{ $item->id }}">
                                                                                                                    <input
                                                                                                                        id="menu_chil_{{ $item->id }}"
                                                                                                                        name="menu_taxonomy[]"
                                                                                                                        type="checkbox"
                                                                                                                        value="{{ $item->id }}">
                                                                                                                    {{ $item->title }}
                                                                                                                </label>
                                                                                                                <ul>
                                                                                                                </ul>
                                                                                                            </li>
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                        @endif
                                                                                        </li>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </ul>
                                                                        <div class="text-end">
                                                                            <div class="btn-group btn-group-devided">
                                                                                <button type="submit"
                                                                                    class="btn-add-to-menu btn btn-primary">
                                                                                    <span class="text"><i
                                                                                            class="fa fa-plus"></i>
                                                                                        Add to menu</span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="widget meta-boxes">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#add-link"
                                                        class="collapsed" aria-expanded="false">
                                                        <h4 class="widget-title">
                                                            <span>Thêm link</span>
                                                            <i class="fa fa-angle-down narrow-icon"></i>
                                                        </h4>
                                                    </a>
                                                    <div id="add-link" class="panel-collapse collapse">
                                                        <div class="widget-body">
                                                            <div class="box-links-for-menu box box-primary">
                                                                <div class="the-box ">
                                                                    <form
                                                                        action="{{ route(Request::segment(2) . '.store') }}"
                                                                        method="POST" class="form-horizontal"
                                                                        id="form-main" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <div class="box-body">
                                                                            <input type="hidden" name="parent_id"
                                                                                value="{{ $detail->id }}">
                                                                            <div class="form-group">
                                                                                <label for="link-name"
                                                                                    class="control-label">
                                                                                    @lang('Title')
                                                                                    <small class="text-red">*</small>
                                                                                </label>

                                                                                <input type="text" class="form-control"
                                                                                    id="link-name"
                                                                                    placeholder="@lang('Title')"
                                                                                    name="name" required
                                                                                    autocomplete="off">

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="link-url_link"
                                                                                    class="control-label">
                                                                                    @lang('Url')
                                                                                    <small class="text-red">*</small>
                                                                                </label>

                                                                                <input type="text" class="form-control"
                                                                                    id="link-url_link"
                                                                                    placeholder="@lang('Url')"
                                                                                    value="/" name="url_link"
                                                                                    required autocomplete="off">

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="link-target"
                                                                                    class="control-label">
                                                                                    @lang('Select target')
                                                                                </label>
                                                                                <select name="json_params[target]"
                                                                                    id="link-target"
                                                                                    class="form-control select2"
                                                                                    autocomplete="off">
                                                                                    <option value="_self" selected>
                                                                                        @lang('_self')</option>
                                                                                    <option value="_blank">
                                                                                        @lang('_blank')</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="link-status"
                                                                                    class="control-label">
                                                                                    @lang('Status')
                                                                                </label>

                                                                                <div class="form-control">
                                                                                    @foreach (App\Consts::STATUS as $key => $value)
                                                                                        <label>
                                                                                            <input type="radio"
                                                                                                name="status"
                                                                                                value="{{ $value }}"
                                                                                                {{ $loop->index == 0 ? 'checked' : '' }}>
                                                                                            <small
                                                                                                class="mr-15">{{ __($value) }}</small>
                                                                                        </label>
                                                                                    @endforeach
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        <div class="text-end">
                                                                            <div class="btn-group btn-group-devided">
                                                                                <button type="submit"
                                                                                    class="btn-add-to-menu btn btn-primary">
                                                                                    <span class="text"><i
                                                                                            class="fa fa-plus"></i>
                                                                                        Add to menu</span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">
                                                @lang('Menu structure')
                                            </h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="table-responsive">
                                                <div class="dd" id="menu-sort">
                                                    <ol class="dd-list">
                                                        @foreach ($menus as $item)
                                                            @if ($item->parent_id == $detail->id)
                                                                <li class="dd-item dd3-item "
                                                                    data-id="{{ $item->id }}">
                                                                    <div class="dd-handle dd3-handle"></div>
                                                                    <div class="dd3-content">
                                                                        <span class="text float-start"
                                                                            data-update="title">{{ $item->name }}</span>
                                                                        <span
                                                                            class="text float-end">@lang($status[$item->status])</span>
                                                                        <a data-toggle="collapse"
                                                                            href="#item-details-{{ $item->id }}"
                                                                            role="button" aria-expanded="false"
                                                                            aria-controls="item-details-{{ $item->id }}"
                                                                            class="show-item-details">
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </a>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <div class="item-details collapse multi-collapse"
                                                                        id="item-details-{{ $item->id }}">
                                                                        <form role="form"
                                                                            action="{{ route(Request::segment(2) . '.update', $item->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="form-body">
                                                                                <div class="form-group mb-3">
                                                                                    <label for="menu-node-title-1"
                                                                                        class="control-label">@lang('Title')</label>
                                                                                    <input class="form-control"
                                                                                        placeholder="Title"
                                                                                        id="menu-node-title-1"
                                                                                        name="name" type="text"
                                                                                        value="{{ $item->name }}">
                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <label for="menu-node-url-1"
                                                                                        class="control-label"
                                                                                        data-update="custom-url">@lang('Url')</label>
                                                                                    <input class="form-control"
                                                                                        placeholder="URL" data-old="/"
                                                                                        id="menu-node-url-1"
                                                                                        name="url_link" type="text"
                                                                                        value="{{ $item->url_link }}">

                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <label for="link-target"
                                                                                        class="control-label">
                                                                                        @lang('Select target')
                                                                                    </label>

                                                                                    <select name="json_params[target]"
                                                                                        id="link-target"
                                                                                        class="form-control select2"
                                                                                        autocomplete="off">
                                                                                        <option value="_self" selected>
                                                                                            @lang('_self')</option>
                                                                                        <option value="_blank">
                                                                                            @lang('_blank')</option>
                                                                                    </select>

                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <label for="link-status"
                                                                                        class="control-label">
                                                                                        @lang('Status')
                                                                                    </label>

                                                                                    <div class="form-control">
                                                                                        @foreach (App\Consts::STATUS as $key => $value)
                                                                                            <label
                                                                                                class=" col-12 col-xl-6">
                                                                                                <input type="radio"
                                                                                                    name="status"
                                                                                                    value="{{ $value }}"
                                                                                                    {{ $item->status == $value ? 'checked' : '' }}>
                                                                                                <small
                                                                                                    class="mr-15">{{ __($value) }}</small>
                                                                                            </label>
                                                                                        @endforeach
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                            <div class="text-end mt-2">
                                                                                <p class="btn btn-danger remove_menu btn-sm"
                                                                                    data-id="{{ $item->id }}">
                                                                                    Remove</p>
                                                                                <button
                                                                                    class="btn btn-primary btn-sm">@lang('Save')</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                    @if ($item->sub > 0)
                                                                        <ol class="dd-list">
                                                                            @foreach ($menus as $item_sub_1)
                                                                                @if ($item_sub_1->parent_id == $item->id)
                                                                                    <li class="dd-item dd3-item"
                                                                                        data-id="{{ $item_sub_1->id }}">
                                                                                        <div class="dd-handle dd3-handle">
                                                                                        </div>
                                                                                        <div class="dd3-content">
                                                                                            <span class="text float-start"
                                                                                                data-update="title">{{ $item_sub_1->name }}</span>
                                                                                            <span
                                                                                                class="text float-end">@lang($status[$item_sub_1->status])</span>
                                                                                            <a data-toggle="collapse"
                                                                                                href="#item-details-{{ $item_sub_1->id }}"
                                                                                                role="button"
                                                                                                aria-expanded="false"
                                                                                                aria-controls="item-details-{{ $item_sub_1->id }}"
                                                                                                class="show-item-details">
                                                                                                <i
                                                                                                    class="fa fa-angle-down"></i>
                                                                                            </a>
                                                                                            <div class="clearfix">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-details collapse multi-collapse"
                                                                                            id="item-details-{{ $item_sub_1->id }}">
                                                                                            <form role="form"
                                                                                                action="{{ route(Request::segment(2) . '.update', $item_sub_1->id) }}"
                                                                                                method="POST">
                                                                                                @csrf
                                                                                                @method('PUT')
                                                                                                <div class="form-body">

                                                                                                    <div
                                                                                                        class="form-group mb-3">
                                                                                                        <label
                                                                                                            for="menu-node-title-1"
                                                                                                            class="control-label">@lang('Title')</label>
                                                                                                        <input
                                                                                                            class="form-control"
                                                                                                            placeholder="Title"
                                                                                                            id="menu-node-title-1"
                                                                                                            name="name"
                                                                                                            type="text"
                                                                                                            value="{{ $item_sub_1->name }}">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="form-group mb-3">
                                                                                                        <label
                                                                                                            for="menu-node-url-1"
                                                                                                            class="control-label">@lang('Url')</label>
                                                                                                        <input
                                                                                                            class="form-control"
                                                                                                            placeholder="URL"
                                                                                                            id="menu-node-url-1"
                                                                                                            name="url_link"
                                                                                                            type="text"
                                                                                                            value="{{ $item_sub_1->url_link }}">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="form-group mb-3">
                                                                                                        <label
                                                                                                            for="link-target"
                                                                                                            class="control-label">
                                                                                                            @lang('Select target')
                                                                                                        </label>

                                                                                                        <select
                                                                                                            name="json_params[target]"
                                                                                                            id="link-target"
                                                                                                            class="form-control select2"
                                                                                                            autocomplete="off">
                                                                                                            <option
                                                                                                                value="_self"
                                                                                                                selected>
                                                                                                                @lang('_self')
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="_blank">
                                                                                                                @lang('_blank')
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="form-group mb-3">
                                                                                                        <label
                                                                                                            for="link-status"
                                                                                                            class="control-label">
                                                                                                            @lang('Status')
                                                                                                        </label>

                                                                                                        <div
                                                                                                            class="form-control">
                                                                                                            @foreach (App\Consts::STATUS as $key => $value)
                                                                                                                <label
                                                                                                                    class="col-12 col-xl-6">
                                                                                                                    <input
                                                                                                                        type="radio"
                                                                                                                        name="status"
                                                                                                                        value="{{ $value }}"
                                                                                                                        {{ $item_sub_1->status == $value ? 'checked' : '' }}>
                                                                                                                    <small
                                                                                                                        class="mr-15">{{ __($value) }}</small>
                                                                                                                </label>
                                                                                                            @endforeach
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="clearfix">
                                                                                                </div>
                                                                                                <div class="text-end mt-2">
                                                                                                    <p class="btn btn-danger remove_menu btn-sm"
                                                                                                        data-id="{{ $item_sub_1->id }}">
                                                                                                        Remove</p>
                                                                                                    <button type="submit"
                                                                                                        class="btn btn-primary btn-sm">@lang('Save')</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                        <div class="clearfix"></div>
                                                                                        @if ($item_sub_1->sub > 0)
                                                                                            <ol class="dd-list d-none">
                                                                                                @foreach ($menus as $item_sub_2)
                                                                                                    @if ($item_sub_2->parent_id == $item_sub_1->id)
                                                                                                        <li class="dd-item"
                                                                                                            data-id="{{ $item_sub_2->id }}">
                                                                                                            <div
                                                                                                                class="dd-handle dd3-handle">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="dd3-content">
                                                                                                                <span
                                                                                                                    class="text float-start"
                                                                                                                    data-update="title">{{ $item_sub_2->name }}</span>
                                                                                                                <span
                                                                                                                    class="text float-end">@lang($status[$item_sub_2->status])</span>
                                                                                                                <a data-toggle="collapse"
                                                                                                                    href="#item-details-{{ $item_sub_2->id }}"
                                                                                                                    role="button"
                                                                                                                    aria-expanded="false"
                                                                                                                    aria-controls="item-details-{{ $item_sub_2->id }}"
                                                                                                                    class="show-item-details">
                                                                                                                    <i
                                                                                                                        class="fa fa-angle-down"></i>
                                                                                                                </a>
                                                                                                                <div
                                                                                                                    class="clearfix">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="item-details collapse multi-collapse"
                                                                                                                id="item-details-{{ $item_sub_2->id }}">
                                                                                                                <form
                                                                                                                    role="form"
                                                                                                                    action="{{ route(Request::segment(2) . '.update', $item_sub_2->id) }}"
                                                                                                                    method="POST">
                                                                                                                    @csrf
                                                                                                                    @method('PUT')
                                                                                                                    <div
                                                                                                                        class="form-body">
                                                                                                                        <div
                                                                                                                            class="form-group mb-3">
                                                                                                                            <label
                                                                                                                                for="menu-node-title-1"
                                                                                                                                class="control-label">@lang('Title')</label>
                                                                                                                            <input
                                                                                                                                class="form-control"
                                                                                                                                placeholder="Title"
                                                                                                                                id="menu-node-title-1"
                                                                                                                                name="name"
                                                                                                                                type="text"
                                                                                                                                value="{{ $item_sub_2->name }}">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="form-group mb-3">
                                                                                                                            <label
                                                                                                                                for="menu-node-url-1"
                                                                                                                                class="control-label">@lang('Url')</label>
                                                                                                                            <input
                                                                                                                                class="form-control"
                                                                                                                                placeholder="URL"
                                                                                                                                id="menu-node-url-1"
                                                                                                                                name="url_link"
                                                                                                                                type="text"
                                                                                                                                value="{{ $item_sub_2->url_link }}">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="form-group mb-3">
                                                                                                                            <label
                                                                                                                                for="link-target"
                                                                                                                                class="control-label">
                                                                                                                                @lang('Select target')
                                                                                                                            </label>

                                                                                                                            <select
                                                                                                                                name="json_params[target]"
                                                                                                                                id="link-target"
                                                                                                                                class="form-control select2"
                                                                                                                                autocomplete="off">
                                                                                                                                <option
                                                                                                                                    value="_self"
                                                                                                                                    selected>
                                                                                                                                    @lang('_self')
                                                                                                                                </option>
                                                                                                                                <option
                                                                                                                                    value="_blank">
                                                                                                                                    @lang('_blank')
                                                                                                                                </option>
                                                                                                                            </select>

                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="form-group mb-3">
                                                                                                                            <label
                                                                                                                                for="link-status"
                                                                                                                                class="control-label">
                                                                                                                                @lang('Status')
                                                                                                                            </label>

                                                                                                                            <div
                                                                                                                                class="form-control">
                                                                                                                                @foreach (App\Consts::STATUS as $key => $value)
                                                                                                                                    <label
                                                                                                                                        class="col-12 col-xl-6">
                                                                                                                                        <input
                                                                                                                                            type="radio"
                                                                                                                                            name="status"
                                                                                                                                            value="{{ $value }}"
                                                                                                                                            {{ $item_sub_2->status == $value ? 'checked' : '' }}>
                                                                                                                                        <small
                                                                                                                                            class="mr-15">{{ __($value) }}</small>
                                                                                                                                    </label>
                                                                                                                                @endforeach
                                                                                                                            </div>

                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="clearfix">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text-end mt-2">
                                                                                                                        <p class="btn btn-danger remove_menu btn-sm"
                                                                                                                            data-id="{{ $item_sub_2->id }}">
                                                                                                                            Remove
                                                                                                                        </p>
                                                                                                                        <button
                                                                                                                            type="submit"
                                                                                                                            class="btn btn-primary btn-cancel btn-sm">@lang('Save')</button>
                                                                                                                    </div>
                                                                                                                </form>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="clearfix">
                                                                                                            </div>
                                                                                                        </li>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </ol>
                                                                                        @endif
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach
                                                                        </ol>
                                                                    @endif
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <a class="btn btn-warning btn-flat menu-sort-save btn-sm"
                                                title="@lang('Save')">
                                                <i class="fa fa-floppy-o"></i>
                                                @lang('Save sort')
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer">

                </div>

            </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('themes/admin/plugins/nestable/jquery.nestable.min.js') }}"></script>
    <script type="text/javascript">
        $('#menu-sort').nestable({
            group: 0,
            maxDepth: 3,
        });


        $('.menu-sort-save').click(function() {
            $('#loading').show();
            let serialize = $('#menu-sort').nestable('serialize');
            let menu = JSON.stringify(serialize);
            $.ajax({
                    url: '{{ route('menus.update_sort') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}',
                        menu: menu,
                        root_id: {{ $detail->id }}
                    },
                })
                .done(function(data) {
                    $('#loading').hide();
                    if (data.error == 0) {
                        location.reload();
                    } else {
                        alert(data.msg);
                        location.reload();
                    }
                });
        });

        $('.remove_menu').click(function() {
            if (confirm("@lang('confirm_action')")) {
                let _root = $(this).closest('.dd-item');
                let id = $(this).data('id');
                $.ajax({
                    method: 'post',
                    url: '{{ route('menus.delete') }}',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        if (data.error == 1) {
                            alert(data.msg);
                        } else {
                            _root.remove();
                        }
                    }
                });
            }
        });

        var menus = @json($menus ?? []);
        $('.edit_menu').click(function() {
            $('.dd-handle').removeClass('active-item');
            let _root = $(this).closest('.dd-handle');
            let _form = $('#form-main');
            let id = $(this).data('id');
            let item = menus.find(menu => menu.id === id);
            if (!$.isEmptyObject(item)) {
                _form.find('#link-title').text("{{ __('Edit link for menu') }}");
                _form.find('.submit_form').text("{!! __('Save & update') !!}");
                _form.find('#link-parent_id').val(item.parent_id)
                _form.find('#link-name').val(item.name);
                _form.find('#link-url_link').val(item.url_link);
                if (item.json_params) {
                    _form.find('#link-target').val(item.json_params.target || '_self');
                }
                _form.find('input[name=status][value=' + item.status + ']').prop('checked', true);
                _form.attr('action', '{{ route(Request::segment(2) . '.index') }}/' + item.id);
                _form.find('input[name=_method]').val('PUT');
                _form.find('input[name=_token]').val('{{ csrf_token() }}');
            }
            $(".select2").select2();
            _root.addClass('active-item');
        });

        $('.reset_form').click(function() {
            $('.dd-handle').removeClass('active-item');
            let _form = $('#form-main');
            _form.find('#link-title').text("{{ __('Add new link to menu') }}");
            _form.find('.submit_form').text("{!! __('Add new') !!}");
            _form.find('#link-parent_id').val({{ $detail->id }})
            _form.find('#link-name').val('');
            _form.find('#link-url_link').val('');
            _form.find('#link-target').val('_self');
            _form.find('input[name=status][value=active]').prop('checked', true);
            _form.attr('action', '{{ route(Request::segment(2) . '.store') }}');
            _form.find('input[name=_method]').val('POST');
            _form.find('input[name=_token]').val('{{ csrf_token() }}');
            $(".select2").select2();
        });
    </script>
@endsection
