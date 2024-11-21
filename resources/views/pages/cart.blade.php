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
                <div class="col-8">
                    <h2 class="mb-4">Alamat Pengiriman</h2>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{route('cart-address')}}" class="btn btn-success">
                        Pilih
                    </a>
                </div>
            </div>
            <div class="row align-items-center mb-2" data-aos="fade-up" data-aos-delay="200">
                @if($address)
                <div class="col-12">
                    <p>{{ $address->name }} <br />
                        {{ $address->phone_number }} <br />
                        {{ $address->address }}, {{ $address->provinces->name }}, {{ $address->regencies->name }}, {{
                        $address->zip_code }}<br />
                        {{ $address->country }}
                    </p>
                </div>
                @else
                <div class="col-12 text-danger">Tidak ada alamat yang tersedia.</div>
                @endif
            </div>
            <form action="{{route('checkout')}}" id="locations" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="hidden" name="total_price" value="{{$totalPrice}}">
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
                        <button type="submit" class="btn btn-success mt-4 px-4 btn-block"
                            style="background: #f5952f; border-color: #f5952f">
                            Checkout
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection