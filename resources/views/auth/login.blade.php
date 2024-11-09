@extends('layouts.auth')

@section('content')
<div class="page-content page-auth">
    <section class="store-auth" data-aos="fade-right">
        <div class="container">
            <div class="row align-items-center row-login">
                <div class="col-lg-7">
                    <h1>Login</h1>
                    <h2>
                        Beli bucket untuk moment spesial, <br />
                        menjadi lebih mudah
                    </h2>
                    <form method="POST" action="{{route('login')}}" class="mt-2">
                        @csrf
                        <div class="form-group mb-1">
                            <label> Email </label>
                            <input id="email" type="email"
                                class="form-control w-75 @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autofocus autocomplete="email" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label> Password </label>
                            <input type="password" class="form-control w-75 @error('password') is-invalid @enderror"
                                id="password" name="password" required autocomplete="current-password" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success btn-block w-75 mt-4">
                            Login
                        </button>
                        <p class="pt-2">
                            Belum memiliki akun?
                            <a href="{{route('register')}}">Register</a>
                        </p>
                    </form>
                </div>

                <div class="col-lg-5 text-center">
                    <img src="/images/bucket bunga.svg" alt="" class="w-100 mb-4 mb-lg-none"
                        style="border-radius: 20px 0px 20px 0px;" />
                </div>
            </div>
        </div>
    </section>
</div>
@endsection