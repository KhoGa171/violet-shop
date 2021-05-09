<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('user')}}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Violet</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Quản lý
        </div>
        
    <li class="nav-item">
        <a class="nav-link" href="{{route('user-profile')}}">
        <i class="fas fa-user"></i>
            <span>Thông tin cá nhân</span>
        </a>
    </li>
    <!--Orders -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.order.index')}}">
        <i class="fas fa-clipboard"></i>
            <span>Lịch sử mua hàng</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('user.change.password.form')}}">
        <i class="fas fa-key"></i>
            <span>Thay đổi mật khẩu</span>
        </a>
    </li>
    <!-- Reviews -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.productreview.index')}}">
            <i class="fas fa-comments"></i>
            <span>Đánh giá</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>