@extends('layouts.account')

@section('title')
Store Account Orders Page
@endsection

@section('content')
<div class="section-content section-account" data-aos="fade-up">
    <div class="container-fluid">
        <div class="account-heading">
            <h2 class="account-title">Pesanan Saya</h2>
            <h5 class="account-subtitle">Detail Pesanan</h5>
            <hr />
        </div>
        <div class="account-content">
            <a href="{{route('account-orders')}}" class="nav-back">
                <img src="/icons/chevron-left-sc50.svg" alt="" />
                Kembali
            </a>
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="card-account card-list d-block">
                        <div class="card-body card-status-orders">
                            <div class="row">
                                <div class="col-md-12">Pesanan Selesai</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-account card-list d-block">
                        <div class="card-body card-information-orders">
                            <div class="row">
                                <div class="col-1">
                                    <img src="/icons/clipboard-text-outline.svg" alt="" />
                                </div>
                                <div class="col-11">
                                    <h2>Resi Pengiriman</h2>
                                    <p>JNT0291283123</p>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-1">
                                    <img src="/icons/map-marker-radius-outline.svg" alt="" />
                                </div>
                                <div class="col-11">
                                    <h2>Alamat Pengiriman</h2>
                                    <p>
                                        Amanda Saphira Sudrajat <br />
                                        081387900589 <br />
                                        Psr. Hartana no 69, Cikampek 44262
                                    </p>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-1">
                                    <img src="/images/bucket bunga.svg" alt="" />
                                </div>
                                <div class="col-9">
                                    <h2 class="account-card-title ml-3">Bucket Bunga</h2>
                                    <h5 class="account-card-subtitle ml-3">Rp 30.000</h5>
                                </div>
                                <div class="col-2 text-right">
                                    <h5 class="account-card-subtitle">1x</h5>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <p>Subtotal</p>
                                </div>
                                <div class="col-4 text-right">
                                    <p>Rp. 30.000</p>
                                </div>
                                <div class="col-8">
                                    <p>Pengiriman</p>
                                </div>
                                <div class="col-4 text-right">
                                    <p>Rp. 15.000</p>
                                </div>
                                <div class="col-8">
                                    <h3>Total</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <h3>Rp. 11.000</h3>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-8">
                                    <h2>No Pesanan</h2>
                                </div>
                                <div class="col-4 text-right">
                                    <h2>2183189192BD</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <p>Status Pembayaran</p>
                                </div>
                                <div class="col-4 text-right">
                                    <h3 class="text-success">Berhasil</h3>
                                </div>
                                <div class="col-8">
                                    <p>Waktu Pemesanan</p>
                                </div>
                                <div class="col-4 text-right">
                                    <p>4/08/2024</p>
                                </div>
                                <div class="col-8">
                                    <p>Waktu Pembayaran</p>
                                </div>
                                <div class="col-4 text-right">
                                    <p>4/08/2024</p>
                                </div>
                                <div class="col-8">
                                    <p>Waktu Pengiriman</p>
                                </div>
                                <div class="col-4 text-right">
                                    <p>5/08/2024</p>
                                </div>
                            </div>
                            <div class="row text-center mt-3">
                                <div class="col-6">
                                    <a href="/details.html" class="btn btn-outline-secondary btn-block">Beli Lagi</a>
                                </div>
                                <div class="col-6">
                                    <a href="{{route('review-details')}}" class="btn btn-success btn-block">Lihat
                                        Review</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection