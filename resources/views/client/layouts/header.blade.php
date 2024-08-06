<header class="header">

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="header__logo">
                    <a href="\"><img src="{{ asset('theme/admin/assets/images/logo-dark.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="./shop.html">Shop</a></li>
                        <li><a href="#">Sản phẩm</a>
                            <ul class="dropdown">
                                <li><a href="./about.html">iPhone</a></li>
                                <li><a href="./shop-details.html">Samsung</a></li>
                                <li><a href="./shopping-cart.html">Oppo</a></li>
                                <li><a href="./checkout.html">Xiaomi</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contacts</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-md-3">

                <div class="dropdown ms-sm-3 header__menu topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <i class="bi bi-person-circle"></i>
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Tài khoản</span>
                            </span>
                        </span>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end">
                        {{-- <h6 class="dropdown-header">Welcome Anna!</h6> --}}
                        {{-- <a class="dropdown-item" href="pages-profile.html"><i
                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Profile</span></a> --}}
                        <a class="dropdown-item" href="{{ route('login') }}"><i
                                class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i>
                            <span class="align-middle">Login</span></a>
                        <a class="dropdown-item" href="{{ route('register') }}"><i
                                class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i>
                            <span class="align-middle">Register</span></a>
                        <a class="dropdown-item" href="pages-faqs.html"><i
                                class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Help</span></a>
                        {{-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pages-profile.html"><i
                                class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Balance : <b>$5971.67</b></span></a>
                        <a class="dropdown-item" href="pages-profile-settings.html"><span
                                class="badge bg-success-subtle text-success mt-1 float-end">New</span><i
                                class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Settings</span></a>
                        <a class="dropdown-item" href="auth-lockscreen-basic.html">
                            <i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i>
                            <span class="align-middle">Lock screen</span></a>

                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="border-0 dropdown-item">
                                <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                <span class="align-middle" data-key="t-logout">Logout</span>
                            </button>
                        </form> --}}

                    </div>

                    <button type="button" class="btn" id="page-header-user-dropdown-1" data-bs-toggle="dropdown-1"
                        aria-haspopup="true" aria-expanded="false">
                        <a href="{{route('cart.list')}}" class="d-flex align-items-center  text-black">
                            <i class="bi bi-cart"></i>
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Giỏ hàng</span>
                            </span>
                        </a>
                    </button>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
