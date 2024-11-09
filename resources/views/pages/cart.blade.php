@extends('layouts.app')

@section('title')
Store Cart Page
@endsection

@section('content')
<div class="page-content page-cart">
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Keranjang
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="store-cart">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-12 table-responsive">
                    <table class="table table-borderless table-cart">
                        <tbody>
                            @php $totalPrice = 0 @endphp
                            @foreach ($carts as $cart)
                            <tr>
                                <td style="width: 5%">
                                    @if ($cart->product->galleries)
                                    <img src="{{ Storage::url($cart->product->galleries->first()->photos) }}" alt=""
                                        class="cart-image" />
                                    @endif
                                </td>
                                <td style="width: 35%">
                                    <div class="product-title">
                                        {{ $cart->product->name }}
                                    </div>
                                    <div class="product-price">
                                        Rp {{number_format($cart->product->price)}}
                                    </div>
                                </td>
                                <td style="width: 5%">
                                    <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-remove-cart">
                                            <img src="/icons/Trash-white.svg" alt="" />
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @php $totalPrice += $cart->product->price @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                    <hr />
                </div>
                <div class="col-12">
                    <h2 class="mb-4">Detail Pengiriman</h2>
                </div>
            </div>
            <form action="{{route('checkout')}}" id="locations" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="hidden" name="total_price" value="{{$totalPrice}}">
                <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" value="Amanda Sudrajat" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Alamat Lengkap</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="Psr. Hartana no 69" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="provinces_id">Provinsi</label>
                            <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces"
                                v-model="provinces_id">
                                <option v-for="province in provinces" :value="province.id">
                                    @{{ province.name }}
                                </option>
                            </select>
                            <select v-else class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="regencies_id">Kota</label>
                            <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies"
                                v-model="regencies_id">
                                <option v-for="regency in regencies" :value="regency.id">
                                    @{{ regency.name }}
                                </option>
                            </select>
                            <select v-else class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="zip_code">Kode Pos</label>
                            <input type="text" class="form-control" id="zip_code" name="zip_code" value="44262" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country">Negara</label>
                            <input type="text" class="form-control" id="country" name="country" value="Indonesia" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">No. HP</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                value="08136418892" />
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-4">Informasi Pembayaran</h2>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-4 col-md-3">
                        <div class="product-title">Rp {{ number_format($totalPrice ?? 0) }}</div>
                        <div class="product-subtitle">Subtotal</div>
                    </div>
                    @php $shippingPrice = $shippingPrice ?? 15000; @endphp
                    <div class="col-4 col-md-3">
                        <div class="product-title">Rp {{ number_format($shippingPrice) }}</div>
                        <div class="product-subtitle">Ongkir</div>
                    </div>
                    <div class="col-4 col-md-3">
                        <div class="product-title text-custom">
                            Rp {{ number_format($totalPrice + $shippingPrice) }}
                        </div>
                        <div class="product-subtitle">Total</div>
                    </div>
                    <div class="col-12 col-md-3">
                        <button type="submit" class="btn btn-success mt-4 px-4 btn-block">
                            Checkout
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios@1.6.7/dist/axios.min.js"></script>
<script>
    var locations = new Vue({
                    el: "#locations",
                    mounted() {
                        AOS.init();
                        this.getProvincesData();
                    },
                    data: {
                        provinces: null,
                        regencies: null,
                        provinces_id: null,
                        regencies_id: null
                    },
                    methods: {
                        getProvincesData() {
                            var self = this;
                            axios.get('{{ route('api-provinces') }}')
                            .then(function (response) {
                                self.provinces = response.data;
                            })
                        },
                        getRegenciesData() {
                            var self = this;
                            axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                            .then(function (response) {
                            self.regencies = response.data;
                            })
                        },
                    },
                    watch: {
                        provinces_id: function(val, oldVal) {
                            this.regencies_id = null;
                            this.getRegenciesData();
                        }
                    }
                });
</script>
@endpush