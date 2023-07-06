@extends('admin.layouts.app')
@section('title')
  {{ $module_name }}
@endsection
@section('content-header')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ $module_name }}
      <a class="btn btn-sm btn-warning pull-right" href="{{ route(Request::segment(2) . '.create') }}">
        <i class="fa fa-plus"></i>
        @lang('Add')
      </a>
    </h1>
  </section>
@endsection
@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">@lang('Page list')</h3>
      </div>
      <div class="box-body table-responsive">
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
        @if (count($rows) == 0)
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @lang('No record found')
          </div>
        @else
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>@lang('Name')</th>
                <th>@lang('Route Name')</th>
                <th>
                  @lang('Url customize')
                  <small><i class="fa fa-coffee text-red" aria-hidden="true"></i></small>
                </th>
                <th>@lang('Order')</th>
                <th>@lang('Updated at')</th>
                <th>@lang('Status')</th>
                <th>@lang('Action')</th>
              </tr>
            </thead>
            <tbody>
              @php
                $routes = [];
                foreach (App\Consts::ROUTE_NAME as $item) {
                    $routes[$item['name']] = $item['title'];
                
                    $routes['show_route'][$item['name']] = isset($item['show_route']) && $item['show_route'] ? $item['show_route'] : false;
                    $routes['has_alias'][$item['name']] = isset($item['has_alias']) && $item['has_alias'] ? $item['has_alias'] : false;
                }
              @endphp
              @foreach ($rows as $row)
                <form action="{{ route(Request::segment(2) . '.destroy', $row->id) }}" method="POST"
                  onsubmit="return confirm('@lang('confirm_action')')">
                  <tr class="valign-middle">
                    <td>
                      {{ $row->name }}
                    </td>
                    <td>
                      {{ __($routes[$row->route_name] ?? '') }}
                    </td>
                    <td>
                      @if (isset($routes['show_route'][$row->route_name]) && $routes['show_route'][$row->route_name])
                        @if ($routes['has_alias'][$row->route_name])
                          <a href="{{ route($row->route_name, ['alias' => $row->alias]) }}" target="_blank"
                            rel="noopener noreferrer">
                            <span class="btn btn-flat btn-sm btn-info">
                              <i class="fa fa-external-link"></i>
                            </span>
                            {{ route($row->route_name, ['alias' => $row->alias]) }}
                          </a>
                        @else
                          <a href="{{ route($row->route_name) }}" target="_blank" rel="noopener noreferrer">
                            <span class="btn btn-flat btn-sm btn-info">
                              <i class="fa fa-external-link"></i>
                            </span>
                            {{ route($row->route_name) ?? '' }}
                          </a>
                        @endif
                      @endif
                    </td>
                    <td>
                      {{ $row->iorder }}
                    </td>
                    <td>
                      {{ $row->updated_at }}
                    </td>
                    <td>
                      @lang($row->status)
                    </td>

                    <td>
                      <a class="btn btn-sm btn-warning" data-toggle="tooltip" title="@lang('Edit')"
                        data-original-title="@lang('Edit')"
                        href="{{ route(Request::segment(2) . '.edit', $row->id) }}">
                        <i class="fa fa-pencil-square-o"></i>
                      </a>
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip"
                        title="@lang('Delete')" data-original-title="@lang('Delete')">
                        <i class="fa fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                </form>
              @endforeach
            </tbody>
          </table>
        @endif
      </div>
    </div>
  </section>
@endsection
