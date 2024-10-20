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
                            <tr>
                                <td style="width: 5%">
                                    <img src="/images/bucket bunga.svg" alt="" class="cart-image" />
                                </td>
                                <td style="width: 35%">
                                    <div class="product-title">
                                        Bucket Bunga
                                    </div>
                                    <div class="product-price">
                                        Rp 30.000
                                    </div>
                                </td>
                                <td style="width: 5%">
                                    <a href="#" class="btn btn-remove-cart">
                                        <img src="/icons/Trash-white.svg" alt="" />
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 5%">
                                    <img src="/images/bucket snack coklat.svg" alt="" class="cart-image" />
                                </td>
                                <td style="width: 35%">
                                    <div class="product-title">
                                        Bucket Snack
                                    </div>
                                    <div class="product-price">
                                        Rp 60.000
                                    </div>
                                </td>
                                <td style="width: 5%">
                                    <a href="#" class="btn btn-remove-cart">
                                        <img src="/icons/Trash-white.svg" alt="" />
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 5%">
                                    <img src="/images/bucket wisuda.svg" alt="" class="cart-image" />
                                </td>
                                <td style="width: 35%">
                                    <div class="product-title">
                                        Bucket Wisuda
                                    </div>
                                    <div class="product-price">
                                        Rp 80.000
                                    </div>
                                </td>
                                <td style="width: 5%">
                                    <a href="#" class="btn btn-remove-cart">
                                        <img src="/icons/Trash-white.svg" alt="" />
                                    </a>
                                </td>
                            </tr>
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
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fullName">Nama Penerima</label>
                        <input type="text" class="form-control" id="fullName" name="fullName"
                            placeholder="Amanda S. Sudrajat" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Alamat Lengkap</label>
                        <input type="text" class="form-control" id="address" name="address"
                            placeholder="Psr. Hartana no 69" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="province">Provinsi</label>
                        <select name="province" id="province" class="form-control">
                            <option value="Jawa Barat">
                                Jawa Barat
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city">Kota</label>
                        <select name="city" id="city" class="form-control">
                            <option value="Cikampek">Cikampek</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="postalCode">Kode Pos</label>
                        <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="44262" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="country">Negara</label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Indonesia" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phoneNumber">No. HP</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                            placeholder="08136418892" />
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
                    <div class="product-title">Rp 140.000</div>
                    <div class="product-subtitle">Subtotal</div>
                </div>
                <div class="col-4 col-md-3">
                    <div class="product-title">Rp 15.000</div>
                    <div class="product-subtitle">Pengiriman</div>
                </div>
                <div class="col-4 col-md-3">
                    <div class="product-title text-custom">
                        Rp 155.000
                    </div>
                    <div class="product-subtitle">Total</div>
                </div>
                <div class="col-12 col-md-3">
                    <a href="{{route('success')}}" class="btn btn-success mt-4 px-4 btn-block">
                        Checkout
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection