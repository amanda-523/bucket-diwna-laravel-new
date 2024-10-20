@extends('layouts.account')

@section('title')
Store Account Address Page
@endsection

@section('content')
<div class="section-content section-account" data-aos="fade-up">
    <div class="container-fluid">
        <div class="account-heading">
            <h2 class="account-title">Alamat</h2>
            <h5 class="account-subtitle">
                Alamat pengiriman untuk pesanan Anda
            </h5>
            <hr />
        </div>
        <div class="account-content">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('account-address-new')}}" class="btn btn-success">Tambah Alamat Baru</a>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card-account">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-11">
                                    <h2>Amanda Sudrajat</h2>
                                    <h5>08136418892</h5>
                                    <h5>
                                        Psr. Hartana no 69,
                                        Cikampek 44262
                                    </h5>
                                </div>
                                <div class="col-1">
                                    <a href="{{route('account-address-edit')}}" class="edit-button">
                                        Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card-account">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-11">
                                    <h2>Anita Lestari</h2>
                                    <h5>0299 6418 892</h5>
                                    <h5>
                                        Dk. Pagac no 7,
                                        Kefamenanu 39758
                                    </h5>
                                </div>
                                <div class="col-1">
                                    <a href="{{route('account-address-edit')}}" class="edit-button">
                                        Edit
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