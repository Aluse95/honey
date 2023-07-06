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
      <form action="{{ route(Request::segment(2) . '.index') }}" method="GET">
        <div class="box-header">
          <h3 class="box-title">@lang('User list')</h3>
        </div>
      </form>

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
        @if (!$rows->total())
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @lang('not_found')
          </div>
        @else
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>@lang('Username')</th>
                <th>@lang('Fullname')</th>
                <th>@lang('Phone')</th>
                <th>@lang('Affiliate agent')</th>
                <th>@lang('Affiliate code')</th>
                <th>@lang('Total Point')</th>
                <th>@lang('Total money')</th>
                <th>@lang('Total payment')</th>
                <th>@lang('Updated at')</th>
                <th>@lang('Status')</th>
                <th>@lang('Action')</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($rows as $item)
                <form action="{{ route(Request::segment(2) . '.destroy', $item->id) }}" method="POST"
                  onsubmit="return confirm('@lang('confirm_action')')">
                  <tr class="valign-middle">
                    <td>
                      {{ $item->id }}
                    </td>
                    <td>
                      {{ $item->email }}
                    </td>
                    <td>
                      {{ $item->name }}
                    </td>
                    <td>
                      {{ $item->phone }}
                    </td>
                    <td>
                      {{ $item->affiliate_agent }}
                    </td>
                    <td>
                      <a href="{{ route('frontend.affiliate', ['affiliate_code' => $item->affiliate_code]) }}" target="_blank"
                        rel="noopener noreferrer">
                        {{ $item->affiliate_code }}
                      </a>
                    </td>
                    <td>
                      {{ number_format($item->total_score) }}
                    </td>
                    <td>
                      {{ number_format($item->total_money) }}
                    </td>
                    <td>
                      {{ number_format($item->total_payment) }}
                    </td>
                    <td>
                      {{ $item->updated_at }}
                    </td>
                    <td>
                      @lang($item->status)
                    </td>
                    <td>
                      <a class="btn btn-sm btn-warning" data-toggle="tooltip" title="@lang('Update')"
                        data-original-title="@lang('Update')"
                        href="{{ route(Request::segment(2) . '.edit', $item->id) }}">
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

      <div class="box-footer clearfix">
        <div class="row">
          <div class="col-sm-5">
            Tìm thấy {{ $rows->total() }} kết quả
          </div>
          <div class="col-sm-7">
            {{ $rows->withQueryString()->links('admin.pagination.default') }}
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection
