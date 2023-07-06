<!doctype html>
<html lang="en">
  <head>
    <title>Quên mật khẩu</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('themes/frontend/office/custom.css') }}" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container" style="max-width: 50%; margin-top:100px">
      <h2 class="text-center">Cập nhật mật khẩu</h2>
      <form action="{{ route('reset.password.post') }}" method="post">
        @csrf
        <div class="row user-profile">
          <input type="hidden" name="token" value="{{ $token }}">
          <div class="col-lg-4 mt-3">
            <p class="mt-4">Địa chỉ email:</p>
            {{-- <p>Nhập mật khẩu hiện tại:</p> --}}
            <p class="mt-4">Nhập mật khẩu mới:</p>
            <p class="mt-4">Xác nhận mật khẩu mới:</p>
          </div>
          <div class="col-lg-8">
            <div class="mb-3">
              <input type="email" class="input mt-4" name="email" value="{{ Auth::user()->email ?? '' }}">
              @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
            </div>
            <div class="mb-3">
              <input type="text" class="input input-password" name="password" value="">
              @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
              @endif
            </div>
            <div class="mb-3">
              <input type="text" class="input input-password" name="password_confirmation" value="">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-success">Lưu lại</button>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>