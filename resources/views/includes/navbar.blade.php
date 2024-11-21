<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="/images/logo-new.svg" alt="Logo" class="img-logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">Beranda</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories') }}" class="nav-link">Kategori</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products') }}" class="nav-link">Produk</a>
                </li>
                @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link btn btn-success px-4 text-white">Login</a>
                </li>
                @endguest
            </ul>

            @auth
            <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                        @if (Auth::user()->profile_picture)
                        <img src="{{ Storage::url(Auth::user()->profile_picture) }}" alt="Profile"
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

                        <form action="{{route('logout')}}" id="logout-form" method="POST" style="display: none">
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
                    <a href="{{route('cart')}}" class="nav-link d-inline-block">Keranjang</a>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</nav>