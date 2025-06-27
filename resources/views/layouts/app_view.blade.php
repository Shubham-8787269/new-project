<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'My App')</title>

  <!-- Bootstrap 5.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 60px;
      background-color: #343a40;
      color: white;
      padding-top: 20px;
      z-index: 1030;
    }

    .sidebar ul {
      list-style: none;
      padding-left: 0;
    }

    .sidebar ul li a {
      display: block;
      padding: 12px 20px;
      color: #adb5bd;
      text-decoration: none;
    }

    .sidebar ul li a:hover {
      background-color: #495057;
      color: white;
      border-radius: 5px;
    }

    .content {
      margin-left: 250px;
      padding: 80px 30px 30px;
    }

    .menu-btn {
      display: none;
      padding: 12px 20px;
      font-size: 18px;
      background-color: #343a40;
      color: white;
      border: none;
      width: 100%;
      text-align: left;
    }

    @media (max-width: 768px) {
      .sidebar {
        display: none !important;
      }

      .menu-btn {
        display: block;
        margin-top: 60px;
      }

      .content {
        margin-left: 0;
      }
    }

    .offcanvas-body ul {
      list-style: none;
      padding-left: 0;
    }

    .offcanvas-body ul li a {
      padding-left: 10px;
      text-decoration: none;
      color: #343a40;
      display: block;
      padding: 10px;
    }

    .offcanvas-body ul li a:hover {
      background-color: #e9ecef;
      border-radius: 5px;
    }

    .top-navbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 60px;
      background-color: white;
      border-bottom: 1px solid #ddd;
      z-index: 1040;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      padding-right: 20px;
    }
  </style>
</head>
<body>
@if(Auth::user()->type == 1)

<!-- ✅ Top Navbar with Logout -->
<div class="top-navbar">
  @auth
    <ul class="navbar-nav flex-row align-items-center">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
          Hi, {{ auth()->user()->name }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <form method="get" action="{{url('/logout')}}">
                            @csrf
                            <a class="dropdown-item" href="route('logout')"
                                                   onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                <i class="ti-power-off">
                                {{ __('Log Out') }}</i>
                            </a>
                        </form>
          </li>
        </ul>
      </li>
    </ul>
  @endauth
</div>

<!-- ✅ Mobile Sidebar Toggle Button -->
<button class="menu-btn d-md-none" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
  ☰ Menu
</button>

<!-- ✅ Desktop Sidebar -->
<div class="sidebar d-none d-md-block">
  <ul>
    <li><a href="{{ url('/dashboard') }}">🏠 Home</a></li>

    <li>
        <a href="#mobileManagementSubmenu" data-bs-toggle="collapse">📄 Post</a>
        <ul class="collapse ps-3" id="mobileManagementSubmenu">
          <li><a href="{{ url('/add/post') }}">Add Post</a></li>
        </ul>
      </li>


   
  </ul>
</div>

<!-- ✅ Mobile Offcanvas Sidebar -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu</h5>
    <button class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <ul>
      <li><a href="{{ url('/dashboard') }}">🏠 Home</a></li>

      <li>
        <a href="#mobileManagementSubmenu" data-bs-toggle="collapse">📄 Post</a>
        <ul class="collapse ps-3" id="mobileManagementSubmenu">
          <li><a href="{{ url('/add/post') }}">Add Post</a></li>
        </ul>
      </li>

      <!-- <li>
        <a href="#mobileUsersSubmenu" data-bs-toggle="collapse">⚙️ Users Management</a>
        <ul class="collapse ps-3" id="mobileUsersSubmenu">
          <li><a href="{{ url('/post/show') }}">Add Post</a></li>
          
        </ul>
      </li> -->
    </ul>
  </div>
</div>
<div class="content">
  @yield('content')
</div>
<!-- ✅ Main Content Area -->
@else <!-- ✅ Top Navbar with Logout -->
<div class="top-navbar">
  @auth
    <ul class="navbar-nav flex-row align-items-center">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
          Hi, {{ auth()->user()->name }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <form method="get" action="{{url('/logout')}}">
                            @csrf
                            <a class="dropdown-item" href="route('logout')"
                                                   onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                <i class="ti-power-off">
                                {{ __('Log Out') }}</i>
                            </a>
                        </form>
          </li>
        </ul>
      </li>
    </ul>
  @endauth
</div>

<!-- ✅ Mobile Sidebar Toggle Button -->
<button class="menu-btn d-md-none" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
  ☰ Menu
</button>

<!-- ✅ Desktop Sidebar -->
<div class="sidebar d-none d-md-block">
  <ul>
    <li><a href="{{ url('/dashboard') }}">🏠 Home</a></li>

    <li>
      <a href="#managementSubmenu" data-bs-toggle="collapse">📄 Lawyers Management</a>
      <ul class="collapse ps-3" id="managementSubmenu">
        <li><a href="{{ url('/add/lawyers') }}">Lawyers</a></li>
      </ul>
    </li>

    <!-- <li>
      <a href="#usersSubmenu" data-bs-toggle="collapse">⚙️ Users Management</a>
      <ul class="collapse ps-3" id="usersSubmenu">
        <li><a href="{{ url('/home/show') }}">Add Seniors</a></li>
        <li><a href="{{ url('/images/show') }}">Images</a></li>
        <li><a href="{{ url('/notify/show') }}">Notification</a></li>
        <li><a href="{{ url('/about/show') }}">About</a></li>
        <li><a href="{{ url('/notice/add') }}">Notices</a></li>
        <li><a href="{{ url('/contact/add') }}">Contact</a></li>
        <li><a href="{{ url('/faqs/view') }}">Faqs</a></li>
      </ul>
    </li> -->
  </ul>
</div>

<!-- ✅ Mobile Offcanvas Sidebar -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu</h5>
    <button class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <ul>
      <li><a href="{{ url('/dashboard') }}">🏠 Home</a></li>

      <li>
        <a href="#mobileManagementSubmenu" data-bs-toggle="collapse">📄 Lawyers Management</a>
        <ul class="collapse ps-3" id="mobileManagementSubmenu">
          <li><a href="{{ url('/add/lawyers') }}">Lawyers</a></li>
        </ul>
      </li>

      <!-- <li>
        <a href="#mobileUsersSubmenu" data-bs-toggle="collapse">⚙️ Users Management</a>
        <ul class="collapse ps-3" id="mobileUsersSubmenu">
          <li><a href="{{ url('/home/show') }}">Add Seniors</a></li>
          <li><a href="{{ url('/images/show') }}">Images</a></li>
          <li><a href="{{ url('/notify/show') }}">Notification</a></li>
          <li><a href="{{ url('/about/show') }}">About</a></li>
          <li><a href="{{ url('/notice/add') }}">Notices</a></li>
          <li><a href="{{ url('/contact/add') }}">Contact</a></li>
          <li><a href="{{ url('/faqs/view') }}">Faqs</a></li>
        </ul>
      </li> -->
    </ul>
  </div>
</div>
<div class="content">
  @yield('content')
</div>
@endif
<!-- ✅ Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
