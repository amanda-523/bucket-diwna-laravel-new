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
            </ul>

            <!-- Desktop Menu -->
            <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <img src="/images/ava AM.svg" alt="Profile" class="rounded-circle mr-2 profile-picture" />
                        Hi, Amanda
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{route('account')}}" class="dropdown-item">
                            Akun Saya
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{route('login')}}" class="dropdown-item text-danger">
                            Logout
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{route('cart')}}" class="nav-link d-inline-block mt-2">
                        <img src="/icons/shopping-outline-blue.svg" alt="Cart" />
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                    <a href="#" class="nav-link">Hi, Amanda</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('cart')}}" class="nav-link d-inline-block">Keranjang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>