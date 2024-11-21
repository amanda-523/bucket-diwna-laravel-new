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
                    <a href="{{route('account')}}"
                        class="list-group-item list-group-item-action {{(request()->is('account')) ? 'active' : ''}}">
                        Akun Saya
                    </a>
                    <a href="{{route('account-address')}}"
                        class="list-group-item list-group-item-action {{(request()->is('account-address*')) ? 'active' : ''}}">
                        Alamat
                    </a>
                    <a href="{{route('account-transactions')}}"
                        class="list-group-item list-group-item-action {{(request()->is('account-transactions*')) ? 'active' : ''}}">
                        Transaksi
                    </a>
                    <a href="{{route('logout')}}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="list-group-item list-group-item-action text-danger">
                        Logout
                    </a>

                    <form action="{{route('logout')}}" id="logout-form" method="POST" style="display: none">
                        @csrf
                    </form>
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
                                        @if (Auth::user()->profile_picture)
                                        <img src="{{ Storage::url($user->profile_picture) }}" alt="Profile"
                                            class="rounded-circle mr-2 profile-picture" />
                                        @else
                                        <img src="/images/ava-no profile.svg" alt="Profile"
                                            class="rounded-circle mr-2 profile-picture" />
                                        @endif
                                        Hi, {{Auth::user()->name}}
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="{{route('account')}}" class="dropdown-item">
                                            Akun Saya
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="{{route('logout')}}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="dropdown-item text-danger">
                                            Logout
                                        </a>

                                        <form action="{{route('logout')}}" id="logout-form" method="POST"
                                            style="display: none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('cart')}}" class="nav-link d-inline-block mt-2">
                                        @php
                                        $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                                        @endphp
                                        @if ($carts > 0)
                                        <img src="/icons/shopping-outline-blue.svg" alt="Cart" />
                                        <div class="card-badge">{{ $carts }}</div>
                                        @else
                                        <img src="/icons/shopping-outline-blue.svg" alt="Cart" />
                                        @endif
                                    </a>
                                </li>
                            </ul>

                            <ul class="navbar-nav d-block d-lg-none">
                                <li class="nav-item">
                                    <a href="{{route('account')}}" class="nav-link">
                                        Hi, {{Auth::user()->name}}
                                    </a>
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