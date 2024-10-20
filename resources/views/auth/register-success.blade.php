@extends('layouts.success')

@section('title')
Store Register Success Page
@endsection

@section('content')
<div class="page-content page-success">
    <section class="success" data-aos="zoom-in">
        <div class="container">
            <div class="row align-items-center row-login justify-content-center">
                <div class="col-lg-6 text-center">
                    <img src="images/logo-new.svg" alt="" class="mb-4" />
                    <h2>Selamat Datang di Toko Kami</h2>
                    <p>
                        Kamu sudah berhasil terdaftar bersama kami.
                        <br />
                        Let's grow up now.
                    </p>
                    <div>
                        <a href="/account-orders.html" class="btn btn-success w-50 mt-4">
                            Lihat Pesanan
                        </a>
                        <a href="/index.html" class="btn btn-signup w-50 mt-2">
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection