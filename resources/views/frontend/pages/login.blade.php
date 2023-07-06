@extends('frontend.layouts.auth')

@section('content')
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 my-5">
          <div class="alert style-msg infomsg" role="alert">
            <h2 class="title">Chào mừng bạn trở lại,</h2>
            <p>Để tiếp tục sử dụng các chức năng nổi bật của chúng tôi, bạn cần <a class="btn btn-sm btn-primary"
                href="#" data-bs-toggle="modal" data-bs-target="#login">
                <i class="icon-line2-login"></i> @lang('Login')
              </a> vào hệ thống
            </p>
            <p>Nếu bạn chưa có tài khoản vui lòng <a class="btn btn-sm btn-primary" href="#" data-bs-toggle="modal"
                data-bs-target="#signup">
                <i class="icon-line-user-plus"></i> @lang('Signup')
              </a>
            </p>
            <p>
              Trở về <a class="btn btn-sm btn-primary" href="{{ route('frontend.home') }}">
                <i class="icon-home2"></i>
                @lang('Home')
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
