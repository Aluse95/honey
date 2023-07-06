@extends('admin.layouts.app')

@section('title')
  {{ $module_name }}
@endsection

@section('content')
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

  <!-- Main content -->
  <section class="content">
    @if (session('successMessage'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('successMessage') }}
      </div>
    @endif
    @if (session('errorMessage'))
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('errorMessage') }}
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
      <!-- form start -->
      <form role="form" action="{{ route(Request::segment(2) . '.update', $detail->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="box-body">
          <div class="col-md-4">
            <div class="form-group">
              <label>@lang('Affiliate agent')</label>
              <select name="affiliate_id" id="affiliate_id" class="form-control select2">
                <option value="">@lang('Please select')</option>
                @foreach ($users as $item)
                  <option value="{{ $item->id }}" {{ $detail->affiliate_id == $item->id ? 'selected' : '' }}>
                    {{ $item->name . ' (' . $item->affiliate_code . ')' }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>@lang('Fullname') <small class="text-red">*</small></label>
              <input type="text" class="form-control" name="name" value="{{ $detail->name }}" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>@lang('Phone') <small class="text-red">*</small></label>
              <input type="text" class="form-control" name="phone" placeholder="@lang('Phone')"
                value="{{ $detail->phone }}" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>@lang('Username') <small class="text-red">*</small></label>
              <input type="text" class="form-control" name="email" value="{{ $detail->email }}" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>@lang('Password')
                <small class="text-muted">
                  <i>
                    (Để trống nếu không muốn đổi mật khẩu mới)
                  </i>
                </small>
              </label>
              <input type="password" class="form-control" name="password_new" placeholder="Mật khẩu ít nhất 8 ký tự"
                value="" autocomplete="new-password">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>@lang('Sex')</label>
              <div class="form-control">
                <label>
                  <input type="radio" name="sex" value="male" {{ $detail->sex == 'male' ? 'checked' : '' }}>
                  <small>@lang('male')</small>
                </label>
                <label>
                  <input type="radio" name="sex" value="female" class="ml-15"
                    {{ $detail->sex == 'female' ? 'checked' : '' }}>
                  <small>@lang('female')</small>
                </label>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>@lang('Status')</label>
              <div class="form-control">
                <label>
                  <input type="radio" name="status" value="active"
                    {{ $detail->status == 'active' ? 'checked' : '' }}>
                  <small>@lang('active')</small>
                </label>
                <label>
                  <input type="radio" name="status" value="deactive" class="ml-15"
                    {{ $detail->status == 'deactive' ? 'checked' : '' }}>
                  <small>@lang('deactive')</small>
                </label>
              </div>
            </div>
          </div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a class="btn btn-sm btn-success" href="{{ route(Request::segment(2) . '.index') }}">
            <i class="fa fa-bars"></i> @lang('List')
          </a>
          <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-floppy-o"></i>
            @lang('Save')</button>
        </div>
      </form>
    </div>
  </section>
@endsection
