@extends('frontend.layouts.default')

@section('content')
  <div class="container" style="max-width: 70%">
    <h2 class="text-center mb-0">Thông tin tài khoản</h2>
    <p class="text-center mb-3">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
    <hr>
    <form action="{{ route('frontend.user.update') }}" method="post">
      @csrf
      <div class="row">
        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
        <div class="col-lg-8">
          <div class="row user-profile mt-5">
            <div class="col-lg-3">
              <p>Tên đăng nhập:</p>
              <p>Email:</p>
              <p>Số điện thoại:</p>
              <p>Giới tính:</p>
            </div>
            <div class="col-lg-9">
              <div class="mb-3">
                <input type="text" class="input" name="name" value="{{ Auth::user()->name ?? '' }}">
              </div>
              <div class="mb-3">
                <input type="email" class="input" name="email" value="{{ Auth::user()->email ?? '' }}">
              </div>
              <div class="mb-3">
                <input type="text" class="input" name="phone" value="{{ Auth::user()->phone ?? '' }}">
              </div>
              <div class="mt-4 gene">
                <input type="radio" name="sex" value="male" checked>
                <span>Nam</span>
                <input type="radio" name="sex" value="female">
                <span class="pr-3">Nữ</span>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="col-lg-4 text-center">
          <div class="user-avatar">
            <img src="{{ asset('images/avatar.jpg') }}" alt="Avatar">
          </div>
          <h4 class="mt-4">Ảnh đại diện</h4>
          <div class="form-group">
            <label>@lang('Image')</label>
            <div class="input-group">
              <span class="input-group-btn">
                <a data-input="image" data-preview="image-holder" class="btn btn-primary lfm"
                  data-type="cms-image">
                  <i class="fa fa-picture-o"></i> @lang('choose')
                </a>
              </span>
              <input id="image" class="form-control" type="text" name="image"
                placeholder="@lang('image_link')...">
            </div>
            <div id="image-holder" style="margin-top:15px;max-height:100px;">
              @if (old('image') != '')
                <img style="height: 5rem;" src="{{ old('image') }}">
              @endif
            </div>
          </div>
        </div> --}}
      </div>
      <button type="submit" class="btn btn-success">Lưu lại</button>
    </form>
  </div>
@endsection

