@extends('layouts.auth')

@section('content')
<div class="page-content page-auth">
    <section class="store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center row-login justify-content-center">
                <div class="col-lg-6">
                    <h1>Lupa Password?</h1>
                    <h2 style="font-size: 18px">
                        Masukkan alamat email Anda dan kami akan mengirimkan tautan
                        untuk mengatur ulang kata sandi Anda.
                    </h2>
                    <form action="" class="mt-2">
                        <div class="form-group mb-0">
                            <label> Email </label>
                            <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda" />
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-4">
                            Kirim
                        </button>
                        <p class="pt-2">
                            <a href="{{route('login')}}">Kembali ke Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="container" style="display: none">
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password
        reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</div>
@endsection