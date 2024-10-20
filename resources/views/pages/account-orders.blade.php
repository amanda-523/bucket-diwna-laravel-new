@extends('layouts.account')

@section('title')
Store Account Orders Page
@endsection

@section('content')
<div class="section-content section-account" data-aos="fade-up">
    <div class="container-fluid">
        <div class="account-heading">
            <h2 class="account-title">Pesanan Saya</h2>
            <h5 class="account-subtitle">Daftar Pesanan</h5>
            <hr />
        </div>
        <div class="account-content">
            <div class="row">
                <div class="col-12">
                    <div class="card-account card-list d-block">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-1">
                                    <img src="/images/bucket bunga.svg" alt="" />
                                </div>
                                <div class="col-md-4">
                                    Bucket Bunga
                                </div>
                                <div class="col-md-3">
                                    Rp 30.000
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="{{route('account-orders-details')}}" class="btn btn-success">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-account card-list d-block">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-1">
                                    <img src="/images/bucket bunga.svg" alt="" />
                                </div>
                                <div class="col-md-4">
                                    Bucket Bunga
                                </div>
                                <div class="col-md-3">
                                    Rp 30.000
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="{{route('account-orders-details')}}" class="btn btn-success">
                                        Lihat Detail
                                    </a>
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