<header class="main-header">
  <!-- Logo -->
  <a href="{{ route('admin.home') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>FHM</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>ADMINISTRATOR</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->

    <a href="javascipt:void(0);" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>


    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="hidden-xs">
              {{ $admin_auth->name }}
            </span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <p>
                {{ $admin_auth->name }}
                <small>{{ $admin_auth->email }}</small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{ route('admin.account.change.get') }}" class="btn btn-default btn-flat">@lang('Profile')</a>
              </div>
              <div class="pull-right">
                <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">@lang('Logout')</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
