<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row topbar-list">
                <div class="col-lg-6 col-md-6 col-6">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            @php
                            $settings=DB::table('settings')->get();

                            @endphp
                            <li><i class="ti-headphone-alt"></i>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
                            <li><i class="ti-email"></i> @foreach($settings as $data) {{$data->email}} @endforeach</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-6 col-md-6 col-6">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <!-- <li><i class="ti-location-pin"></i> <a href="{{route('order.track')}}">Theo dõi đơn hàng</a></li> -->
                            @auth
                            @if(Auth::user()->role=='admin')
                            <!-- <li><i class="ti-user"></i> <a href="{{route('admin')}}"  target="_blank">Tài khoản</a></li> -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle nav-link-user" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(Auth()->user()->photo)
                                    <img class="img-profile rounded-circle" src="{{Auth()->user()->photo}}">
                                    @else
                                    <img class="img-profile rounded-circle" src="{{asset('backend/img/avatar.png')}}">
                                    @endif
                                    <span class="mr-2 d-none d-lg-inline">{{Auth()->user()->name}}</span>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in dropdown-menu-list" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{route('admin-profile')}}">
                                        <i class="ti-user"></i>
                                        Tài khoản
                                    </a>
                                    <a class="dropdown-item" href="{{route('admin')}}" target="_blank">
                                        <i class="ti-briefcase"></i>
                                        Quản lý
                                    </a>
                                    <a class="dropdown-item" href="{{route('change.password.form')}}">
                                        <i class="ti-key"></i>
                                        Thay đổi mật khẩu
                                    </a>
                                    <a class="dropdown-item" href="{{route('settings')}}">
                                        <i class="ti-settings"></i>
                                        Cài đặt
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                        <i class="ti-power-off"></i> {{ __('Đăng xuất') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @else
                            <!-- <li><i class="ti-user"></i> <a href="{{route('user')}}"  target="_blank">Tài khoản</a></li> -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle nav-link-user" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(Auth()->user()->photo)
                                    <img class="img-profile rounded-circle" src="{{Auth()->user()->photo}}">
                                    @else
                                    <img class="img-profile rounded-circle" src="{{asset('backend/img/avatar.png')}}">
                                    @endif
                                    <span class="mr-2 d-none d-lg-inline">{{Auth()->user()->name}}</span>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in dropdown-menu-list" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{route('user-profile')}}">
                                        <i class="ti-user"></i>
                                        Tài khoản
                                    </a>
                                    <a class="dropdown-item" href="{{route('user.order.index')}}">
                                        <i class="ti-notepad"></i>
                                        Lịch sử mua hàng
                                    </a>
                                    <a class="dropdown-item" href="{{route('user.change.password.form')}}">
                                        <i class="ti-key"></i>
                                        Thay đổi mật khẩu
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                        <i class="ti-power-off"></i> {{ __('Đăng xuất') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endif
                            <!-- <li><i class="ti-power-off"></i> <a href="{{route('user.logout')}}">Đăng xuất</a></li> -->

                            @else
                            <li><i class="ti-power-off"></i><a href="{{route('login.form')}}">Đăng nhập /</a> <a href="{{route('register.form')}}">Đăng ký</a></li>
                            @endauth
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
        <div class="top-leftmb">
                <ul class="list-mainmb">
                    @php
                    $settings=DB::table('settings')->get();

                    @endphp
                    <li><i class="ti-headphone-alt"></i>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
                </ul>
            </div>
        <div class="right-contentmb">
            <div class="list-mainmb">
                <!-- <li><i class="ti-location-pin"></i> <a href="{{route('order.track')}}">Theo dõi đơn hàng</a></li> -->
                @auth
                @if(Auth::user()->role=='admin')
                <!-- <li><i class="ti-user"></i> <a href="{{route('admin')}}"  target="_blank">Tài khoản</a></li> -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle nav-link-user" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(Auth()->user()->photo)
                        <img class="img-profile rounded-circle" src="{{Auth()->user()->photo}}">
                        @else
                        <img class="img-profile rounded-circle" src="{{asset('backend/img/avatar.png')}}">
                        @endif
                        <span class="mr-2 d-none d-lg-inline">{{Auth()->user()->name}}</span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in dropdown-menu-list" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('admin-profile')}}">
                            <i class="ti-user"></i>
                            Tài khoản
                        </a>
                        <a class="dropdown-item" href="{{route('admin')}}" target="_blank">
                            <i class="ti-briefcase"></i>
                            Quản lý
                        </a>
                        <a class="dropdown-item" href="{{route('change.password.form')}}">
                            <i class="ti-key"></i>
                            Thay đổi mật khẩu
                        </a>
                        <a class="dropdown-item" href="{{route('settings')}}">
                            <i class="ti-settings"></i>
                            Cài đặt
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="ti-power-off"></i> {{ __('Đăng xuất') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @else
                <!-- <li><i class="ti-user"></i> <a href="{{route('user')}}"  target="_blank">Tài khoản</a></li> -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle nav-link-user" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(Auth()->user()->photo)
                        <img class="img-profile rounded-circle" src="{{Auth()->user()->photo}}">
                        @else
                        <img class="img-profile rounded-circle" src="{{asset('backend/img/avatar.png')}}">
                        @endif
                        <span class="mr-2 d-none d-lg-inline">{{Auth()->user()->name}}</span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in dropdown-menu-list" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('user-profile')}}">
                            <i class="ti-user"></i>
                            Tài khoản
                        </a>
                        <a class="dropdown-item" href="{{route('user.order.index')}}">
                            <i class="ti-notepad"></i>
                            Lịch sử mua hàng
                        </a>
                        <a class="dropdown-item" href="{{route('user.change.password.form')}}">
                            <i class="ti-key"></i>
                            Thay đổi mật khẩu
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="ti-power-off"></i> {{ __('Đăng xuất') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endif
                <!-- <li><i class="ti-power-off"></i> <a href="{{route('user.logout')}}">Đăng xuất</a></li> -->

                @else
                <li><i class="ti-power-off"></i><a href="{{route('login.form')}}">Đăng nhập /</a> <a href="{{route('register.form')}}">Đăng ký</a></li>
                @endauth
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        @php
                        $settings=DB::table('settings')->get();
                        @endphp
                        <a href="{{route('home')}}"><img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <div class="list-wishcart">
                        <div class="right-bar1">
                            <div class="sinlge-bar shopping">
                                @php
                                $total_prod=0;
                                $total_amount=0;
                                @endphp
                                @if(session('wishlist'))
                                @foreach(session('wishlist') as $wishlist_items)
                                @php
                                $total_prod+=$wishlist_items['quantity'];
                                $total_amount+=$wishlist_items['amount'];
                                @endphp
                                @endforeach
                                @endif
                                <a href="{{route('wishlist')}}" class="single-icon"><i class="fa fa-heart-o"></i> <span class="total-count">{{Helper::wishlistCount()}}</span></a>

                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{count(Helper::getAllProductFromWishlist())}} Sản phẩm</span>
                                        <a href="{{route('wishlist')}}">Chi tiết</a>
                                    </div>
                                    <ul class="shopping-list">
                                        {{-- {{Helper::getAllProductFromCart()}} --}}
                                        @foreach(Helper::getAllProductFromWishlist() as $data)
                                        @php
                                        $photo=explode(',',$data->product['photo']);
                                        @endphp
                                        <li>
                                            <a href="{{route('wishlist-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                            <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                            <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                            <p class="quantity">{{$data->quantity}} x - <span class="amount">{{number_format($data->price)}}đ</span></p>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Tổng tiền</span>
                                            <span class="total-amount">{{number_format(Helper::totalWishlistPrice())}}đ</span>
                                        </div>
                                        <a href="{{route('cart')}}" class="btn animate">Giỏ hàng</a>
                                    </div>
                                </div>

                            </div>
                            <div class="sinlge-bar shopping">
                                <a href="{{route('cart')}}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{Helper::cartCount()}}</span></a>

                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{count(Helper::getAllProductFromCart())}} Sản phẩm</span>
                                        <a href="{{route('cart')}}">Xem giỏ hàng</a>
                                    </div>
                                    <ul class="shopping-list">
                                        {{-- {{Helper::getAllProductFromCart()}} --}}
                                        @foreach(Helper::getAllProductFromCart() as $data)
                                        @php
                                        $photo=explode(',',$data->product['photo']);
                                        @endphp
                                        <li>
                                            <a href="{{route('cart-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                            <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                            <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                            <p>Size: {{$data['size']}}</P>
                                            <p class="quantity">{{$data->quantity}} x - <span class="amount">{{number_format($data->price)}}đ</span></p>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Tổng tiền</span>
                                            <span class="total-amount">{{number_format(Helper::totalCartPrice())}}đ</span>
                                        </div>
                                        <a href="{{route('checkout')}}" class="btn animate">Đặt hàng</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Tìm kiếm sản phẩm ..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav">
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <select>
                                <option>Tất cả</option>
                                @foreach(Helper::getAllCategory() as $cat)
                                <option>{{$cat->title}}</option>
                                @endforeach
                            </select>
                            <form method="POST" action="{{route('product.search')}}">
                                @csrf
                                <input name="search" placeholder="Tìm kiếm sản phẩm ..." type="search">
                                <button class="btnn" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        <div class="sinlge-bar shopping">
                            @php
                            $total_prod=0;
                            $total_amount=0;
                            @endphp
                            @if(session('wishlist'))
                            @foreach(session('wishlist') as $wishlist_items)
                            @php
                            $total_prod+=$wishlist_items['quantity'];
                            $total_amount+=$wishlist_items['amount'];
                            @endphp
                            @endforeach
                            @endif
                            <a href="{{route('wishlist')}}" class="single-icon"><i class="fa fa-heart-o"></i> <span class="total-count">{{Helper::wishlistCount()}}</span></a>
                            <!-- Shopping Item -->

                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>{{count(Helper::getAllProductFromWishlist())}} Sản phẩm</span>
                                    <a href="{{route('wishlist')}}">Chi tiết</a>
                                </div>
                                <ul class="shopping-list">
                                    {{-- {{Helper::getAllProductFromCart()}} --}}
                                    @foreach(Helper::getAllProductFromWishlist() as $data)
                                    @php
                                    $photo=explode(',',$data->product['photo']);
                                    @endphp
                                    <li>
                                        <a href="{{route('wishlist-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                        <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                        <p class="quantity">{{$data->quantity}} x - <span class="amount">{{number_format($data->price)}}đ</span></p>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Tổng tiền</span>
                                        <span class="total-amount">{{number_format(Helper::totalWishlistPrice())}}đ</span>
                                    </div>
                                    <a href="{{route('cart')}}" class="btn animate">Giỏ hàng</a>
                                </div>
                            </div>

                            <!--/ End Shopping Item -->
                        </div>
                        <div class="sinlge-bar shopping">
                            <a href="{{route('cart')}}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{Helper::cartCount()}}</span></a>
                            <!-- Shopping Item -->

                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>{{count(Helper::getAllProductFromCart())}} Sản phẩm</span>
                                    <a href="{{route('cart')}}">Xem giỏ hàng</a>
                                </div>
                                <ul class="shopping-list">
                                    {{-- {{Helper::getAllProductFromCart()}} --}}
                                    @foreach(Helper::getAllProductFromCart() as $data)
                                    @php
                                    $photo=explode(',',$data->product['photo']);
                                    @endphp
                                    <li>
                                        <a href="{{route('cart-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                        <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                        <p>Size: {{$data['size']}}</P>
                                        <p class="quantity">{{$data->quantity}} x - <span class="amount">{{number_format($data->price)}}đ</span></p>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Tổng tiền</span>
                                        <span class="total-amount">{{number_format(Helper::totalCartPrice())}}đ</span>
                                    </div>
                                    <a href="{{route('checkout')}}" class="btn animate">Đặt hàng</a>
                                </div>
                            </div>
                            <!--/ End Shopping Item -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{Request::path()=='home' ? 'active' : ''}}"><a href="{{route('home')}}">Trang chủ</a></li>
                                            <li class="{{Request::path()=='about-us' ? 'active' : ''}}"><a href="{{route('about-us')}}">Giới thiệu</a></li>
                                            <li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif"><a href="{{route('product-grids')}}">Sản phẩm</a><span class="new">New</span></li>
                                            {{Helper::getHeaderCategory()}}
                                            <!-- <li class="{{Request::path()=='blog' ? 'active' : ''}}"><a href="{{route('blog')}}">Blog</a></li>									 -->

                                            <li class="{{Request::path()=='contact' ? 'active' : ''}}"><a href="{{route('contact')}}">Liên hệ</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 col-12 list-wishcart">
                        <div class="right-bar">
                            <div class="sinlge-bar shopping">
                                <ul class="list-main">
                                   @auth
                                    @if(Auth::user()->role=='admin')
                                    <li class="nav-item dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle nav-link-user1" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if(Auth()->user()->photo)
                                            <img class="img-profile rounded-circle" src="{{Auth()->user()->photo}}">
                                            @else
                                            <img class="img-profile rounded-circle" src="{{asset('backend/img/avatar.png')}}">
                                            @endif
                                            <span class="ml-2 d-none d-lg-inline">{{Auth()->user()->name}}</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in dropdown-menu-list" aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="{{route('admin-profile')}}">
                                                <i class="ti-user"></i>
                                                Tài khoản
                                            </a>
                                            <a class="dropdown-item" href="{{route('admin')}}" target="_blank">
                                                <i class="ti-briefcase"></i>
                                                Quản lý
                                            </a>
                                            <a class="dropdown-item" href="{{route('change.password.form')}}">
                                                <i class="ti-key"></i>
                                                Thay đổi mật khẩu
                                            </a>
                                            <a class="dropdown-item" href="{{route('settings')}}">
                                                <i class="ti-settings"></i>
                                                Cài đặt
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                                <i class="ti-power-off"></i> {{ __('Đăng xuất') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    @else
                                    <li class="nav-item dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle nav-link-user1" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if(Auth()->user()->photo)
                                            <img class="img-profile rounded-circle" src="{{Auth()->user()->photo}}">
                                            @else
                                            <img class="img-profile rounded-circle" src="{{asset('backend/img/avatar.png')}}">
                                            @endif
                                            <span class="mr-2 d-none d-lg-inline">{{Auth()->user()->name}}</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in dropdown-menu-list" aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="{{route('user-profile')}}">
                                                <i class="ti-user"></i>
                                                Tài khoản
                                            </a>
                                            <a class="dropdown-item" href="{{route('user.order.index')}}">
                                                <i class="ti-notepad"></i>
                                                Lịch sử mua hàng
                                            </a>
                                            <a class="dropdown-item" href="{{route('user.change.password.form')}}">
                                                <i class="ti-key"></i>
                                                Thay đổi mật khẩu
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                <i class="ti-power-off"></i> {{ __('Đăng xuất') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    @endif

                                    @else
                                    <li class="login-register"><i class="ti-power-off"></i><a href="{{route('login.form')}}">Đăng nhập /</a> <a href="{{route('register.form')}}">Đăng ký</a></li>
                                   @endauth
                                </ul>
                            </div>
                            <div class="sinlge-bar shopping">
                                @php
                                $total_prod=0;
                                $total_amount=0;
                                @endphp
                                @if(session('wishlist'))
                                @foreach(session('wishlist') as $wishlist_items)
                                @php
                                $total_prod+=$wishlist_items['quantity'];
                                $total_amount+=$wishlist_items['amount'];
                                @endphp
                                @endforeach
                                @endif
                                <a href="{{route('wishlist')}}" class="single-icon"><i class="fa fa-heart-o"></i> <span class="total-count">{{Helper::wishlistCount()}}</span></a>
                               
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{count(Helper::getAllProductFromWishlist())}} Sản phẩm</span>
                                        <a href="{{route('wishlist')}}">Chi tiết</a>
                                    </div>
                                    <ul class="shopping-list">
                                        {{-- {{Helper::getAllProductFromCart()}} --}}
                                        @foreach(Helper::getAllProductFromWishlist() as $data)
                                        @php
                                        $photo=explode(',',$data->product['photo']);
                                        @endphp
                                        <li>
                                            <a href="{{route('wishlist-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                            <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                            <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                            <p class="quantity">{{$data->quantity}} x - <span class="amount">{{number_format($data->price)}}đ</span></p>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Tổng tiền</span>
                                            <span class="total-amount">{{number_format(Helper::totalWishlistPrice())}}đ</span>
                                        </div>
                                        <a href="{{route('cart')}}" class="btn animate">Giỏ hàng</a>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="sinlge-bar shopping">
                                <a href="{{route('cart')}}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{Helper::cartCount()}}</span></a>
                                
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{count(Helper::getAllProductFromCart())}} Sản phẩm</span>
                                        <a href="{{route('cart')}}">Xem giỏ hàng</a>
                                    </div>
                                    <ul class="shopping-list">
                                        {{-- {{Helper::getAllProductFromCart()}} --}}
                                        @foreach(Helper::getAllProductFromCart() as $data)
                                        @php
                                        $photo=explode(',',$data->product['photo']);
                                        @endphp
                                        <li>
                                            <a href="{{route('cart-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                            <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                            <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                            <p>Size: {{$data['size']}}</P>
                                            <p class="quantity">{{$data->quantity}} x - <span class="amount">{{number_format($data->price)}}đ</span></p>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Tổng tiền</span>
                                            <span class="total-amount">{{number_format(Helper::totalCartPrice())}}đ</span>
                                        </div>
                                        <a href="{{route('checkout')}}" class="btn animate">Đặt hàng</a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        </ul>
                    </div> -->
                </div>
                </nav>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!--/ End Header Inner -->
</header>