@extends('layouts.auth')

@section('content')
<div class="page-content page-auth" id="register">
    <section class="store-auth" data-aos="fade-left">
        <div class="container">
            <div class="row align-items-center row-login">
                <div class="col-lg-7">
                    <h1>Register</h1>
                    <h2>
                        Beli bucket untuk moment spesial, <br />
                        menjadi lebih mudah
                    </h2>
                    <form class="mt-2">
                        <div class="form-group">
                            <label> Nama Lengkap </label>
                            <input type="text" class="form-control w-75 is-valid" v-model="fullName" autofocus />
                            <label> Email </label>
                            <input type="email" class="form-control w-75 is-invalid" v-model="email" />
                            <label> Password </label>
                            <input type="password" class="form-control w-75" />
                        </div>
                        <a href="{{route('home')}}" class="btn btn-success btn-block w-75 mt-4">
                            Register
                        </a>
                        <p class="pt-2">
                            Sudah memiliki akun?
                            <a href="{{route('login')}}">Login</a>
                        </p>
                    </form>
                </div>
                <div class="col-lg-5 text-center">
                    <img src="/images/logo-new.svg" alt="" class="w-50 mb-4 mb-lg-none" />
                </div>
            </div>
        </div>
    </section>
</div>

<div class="container" style="display: none">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script>
    Vue.use(Toasted);
    
          var register = new Vue({
            el: "#register",
            mounted() {
              AOS.init();
              this.$toasted.error("Email sudah terdaftar pada sistem kami", {
                position: "top-center",
                className: "rounded",
                duration: 2000,
              });
            },
            data: {
              fullName: "",
              email: "",
              password: "",
            },
          });
</script>
@endpush