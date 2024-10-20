@extends('layouts.success')

@section('title')
Store Success Page
@endsection

@section('content')
<div class="page-content page-success">
    <section class="success" data-aos="zoom-in">
        <div class="container">
            <div class="row align-items-center row-login justify-content-center">
                <div class="col-lg-6 text-center">
                    <img src="icons/checkbox-marked-circle-orange.svg" alt="" class="mb-4" width="50px" />
                    <h2>Transaksi Diproses!</h2>
                    <p>
                        Silahkan tunggu konfirmasi email dari kami dan kami akan
                        menginformasikan resi secepat mungkin!
                    </p>
                    <div>
                        <a href="{{route('account-orders')}}" class="btn btn-success w-50 mt-4">
                            Lihat Pesanan
                        </a>
                        <a href="{{route('home')}}" class="btn btn-signup w-50 mt-2">
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection