@extends('layouts.auth')

@section('title')
Store Register Page
@endsection

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
                    <form method="POST" action="{{ route('register') }}" class="mt-2">
                        @csrf
                        <div class="form-group mb-1">
                            <label>Nama Pengguna</label>
                            <input type="text" class="form-control w-75 @error('name') is-invalid @enderror"
                                v-model="name" id="name" name="name" value="{{ old('name') }}" required autofocus
                                autocomplete="name" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label>Email</label>
                            <input type="email" class="form-control w-75 @error('email') is-invalid @enderror"
                                :class="{'is-invalid' : this.email_unavailable}" @change="checkForEmailAvailability()"
                                v-model="email" id="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label>Password</label>
                            <input type="password" class="form-control w-75 @error('password') is-invalid @enderror"
                                id="password" name="password" required autocomplete="new-password" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-1">
                            <label>Konfirmasi Password</label>
                            <input type="password"
                                class="form-control w-75 @error('password_confirmation') is-invalid @enderror"
                                id="password-confirm" name="password_confirmation" required
                                autocomplete="new-password" />
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success btn-block w-75 mt-4"
                            :disabled="this.email_unavailable" style="color: #fff">
                            Register
                        </button>
                        <p class="pt-2">
                            Sudah memiliki akun?
                            <a href="{{ route('login') }}">Login</a>
                        </p>
                    </form>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <img src="/images/bucket bunga.svg" alt="" class="w-100 mb-4 mb-lg-none"
                        style="border-radius: 20px 0px 20px 0px;" />
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios@1.6.7/dist/axios.min.js"></script>
<script>
    Vue.use(Toasted);
    
          var register = new Vue({
            el: "#register",
            mounted() {
              AOS.init();
            },
            methods: {
                checkForEmailAvailability: function() {
                    var self = this;
                    axios.get('{{route('api-register-check')}}', {
                        params: {
                            email: this.email
                        }
                    })
                    .then(function (response) {

                        if(response.data == 'Available') {
                            self.$toasted.show("Email belum terdaftar pada sistem kami", {
                            position: "top-center",
                            className: "rounded",
                            duration: 2000,
                            });
                            self.email_unavailable = false;

                        } else {
                            self.$toasted.error("Email sudah terdaftar pada sistem kami", {
                            position: "top-center",
                            className: "rounded",
                            duration: 2000,
                            });
                            self.email_unavailable = true;
                        }

                    // handle success
                    console.log(response);
                    })
                }
            },
            data() {
              return {
                name: "",
                email: "",
                email_unavailable: false
              }
            },
          });
</script>
@endpush
