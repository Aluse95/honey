@extends('admin.layouts.app')

@section('title')
  {{ $module_name }}
@endsection

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ $module_name }}
      <a class="btn btn-sm btn-warning pull-right" href="{{ route(Request::segment(2) . '.create') }}"><i
          class="fa fa-plus"></i> @lang('Add')</a>
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
      <!-- form start -->
      <form role="form" action="{{ route(Request::segment(2) . '.update', $detail->id) }}" method="POST">
        @csrf
        @method('PUT')
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
              <button type="submit" class="btn btn-primary btn-sm pull-right">
                <i class="fa fa-floppy-o"></i>
                @lang('Save')
              </button>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>@lang('Name')</label>
                      <small class="text-red">*</small>
                      <input type="text" class="form-control" name="name" placeholder="@lang('Name')"
                        value="{{ $detail->name ?? old('name') }}" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>@lang('Address')</label>
                      <input type="text" class="form-control" name="address" placeholder="@lang('Address')"
                        value="{{ $detail->address ?? old('address') }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>@lang('Phone')</label>
                      <input type="text" class="form-control" name="phone" placeholder="@lang('Phone')"
                        value="{{ $detail->phone ?? old('phone') }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>@lang('Fax')</label>
                      <input type="text" class="form-control" name="fax" placeholder="@lang('Fax')"
                        value="{{ $detail->fax ?? old('fax') }}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>@lang('City/Province')</label>
                      <select name="city" id="city" class="form-control select2" style="width:100%"
                        autocomplete="off">
                        <option value="">@lang('Please select')</option>
                        @foreach (App\Region::DATA as $key => $item)
                          <option value="{{ $item['id'] }}" {{ $detail->city == $item['id'] ? 'selected' : '' }}>
                            {{ __($item['name']) }} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    @php
                      $city = $detail->city;
                      $districts = collect(App\Region::DATA);
                      $district = $districts->first(function ($item, $key) use ($city) {
                          return $item['id'] == $city;
                      });
                    @endphp

                    <div class="form-group">
                      <label>@lang('District')</label>
                      <select name="district" id="district" class="form-control select2" style="width:100%">
                        <option value="">@lang('Please select')</option>
                        @isset($district)
                          @foreach ($district['district'] as $key => $item)
                            <option value="{{ $item['id'] }}" {{ $detail->district == $item['id'] ? 'selected' : '' }}>
                              {{ __($item['name']) }}
                            </option>
                          @endforeach
                        @endisset
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>@lang('Mã nhúng bản đồ')</label>
                      <textarea type="text" class="form-control" rows="10" name="map" placeholder="@lang('Mã nhúng bản đồ thẻ <iframe>')">{{ $detail->map ?? old('map') }}</textarea>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="box-footer">
          <a class="btn btn-sm btn-success" href="{{ route(Request::segment(2) . '.index') }}">
            <i class="fa fa-bars"></i>
            @lang('List')
          </a>
          <button type="submit" class="btn btn-primary btn-sm pull-right">
            <i class="fa fa-floppy-o"></i>
            @lang('Save')
          </button>
        </div>
      </form>
    </div>
  </section>
@endsection

@section('script')
  <script>
    // Change to filter
    $(document).ready(function() {

      // Routes get all
      var regions = @json(App\Region::DATA ?? []);
      $(document).on('change', '#city', function() {
        let _value = parseInt($(this).val());
        let _targetHTML = $('#district');
        let _list = filterArray(regions, 'id', _value);
        let _optionList = '<option value="">@lang('Please select')</option>';
        if (_list) {
          _list.forEach(element => {
            element.district.forEach(item => {
              _optionList += '<option value="' + item.id + '"> ' + item.name + ' </option>';
            });
          });
          _targetHTML.html(_optionList);
        }
        $(".select2").select2();
      });

    });
  </script>
@endsection
