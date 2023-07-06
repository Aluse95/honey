<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Login | Authentication</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="/img/star.png">

  {{-- Include style for app --}}
  @include('frontend.panels.styles')

</head>

<body class="stretched">
  <div id="wrapper" class="clearfix">
    @yield('content')
  </div>
  {{-- Include scripts --}}
  @include('frontend.panels.scripts')
  @if (!Auth::guard('web')->check())
    @include('frontend.components.popup.login')
    @include('frontend.components.popup.signup')
  @endif
</body>

</html>
