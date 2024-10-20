<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    @stack('prepend-script')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    @stack('addon-script')
</head>

<body>
    <div class="page-account">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
            <!-- Sidebar -->
            <div class="border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                    <img src="/images/logo-new.svg" alt="" class="my-4" />
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{route('home')}}" class="list-group-item list-group-item-action" style="color: #5ca4df">
                        <img src="/icons/chevron-left-pr50.svg" alt="" />
                        Kembali ke Beranda
                    </a>
                    <a href="{{route('account')}}" class="list-group-item list-group-item-action">
                        Akun Saya
                    </a>
                    <a href="{{route('account-address')}}" class="list-group-item list-group-item-action">
                        Alamat
                    </a>
                    <a href="{{route('account-orders')}}" class="list-group-item list-group-item-action">
                        Pesanan
                    </a>
                    <a href="{{route('login')}}" class="list-group-item list-group-item-action">
                        Logout
                        <img src="/icons/logout.svg" alt="" class="ml-2 icon-logout" />
                    </a>
                </div>
            </div>

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
                    <div class="container-fluid">
                        <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                            &laquo; Menu
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Desktop Menu -->
                            <ul class="navbar-nav d-none d-lg-flex ml-auto">
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link" id="navbarDropdown" role="button"
                                        data-toggle="dropdown">
                                        <img src="/images/ava AM.svg" alt="Profile"
                                            class="rounded-circle mr-2 profile-picture" />
                                        Hi, Amanda
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="{{route('account')}}" class="dropdown-item">
                                            Akun Saya
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="{{route('login')}}" class="dropdown-item">
                                            Logout
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('cart')}}" class="nav-link d-inline-block mt-2">
                                        <img src="/icons/shopping-outline-blue.svg" alt="Cart" />
                                        <div class="card-badge">3</div>
                                    </a>
                                </li>
                            </ul>

                            <ul class="navbar-nav d-block d-lg-none">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Hi, Amanda</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('cart')}}" class="nav-link d-inline-block">
                                        Keranjang
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                {{-- Content --}}
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    <script src="/vendor/jquery/jquery.slim.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    @stack('addon-script')
</body>

</html>