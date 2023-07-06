@extends('frontend.layouts.default')

@section('content')
  <div class="container" style="max-width: 50%">
    <h2 class="text-center">Cập nhật mật khẩu</h2>
    <form action="{{ route('frontend.user.resetPass') }}" method="post">
      @csrf
      <div class="row user-profile">
        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
        <div class="col-lg-4">
          <p>Địa chỉ email:</p>
          {{-- <p>Nhập mật khẩu hiện tại:</p> --}}
          <p>Nhập mật khẩu mới:</p>
          <p>Xác nhận mật khẩu mới:</p>
        </div>
        <div class="col-lg-8">
          <div class="mb-3">
            <input type="email" class="input" name="email" value="{{ Auth::user()->email ?? '' }}">
          </div>
          <div class="mb-3">
            <input type="text" class="input input-password" name="password" value="">
          </div>
          <div class="mb-3">
            <input type="text" class="input input-password" name="password_confirmed" value="">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-success">Lưu lại</button>
    </form>
  </div>
@endsection