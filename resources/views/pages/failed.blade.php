@extends('layouts.success')

@section('title')
Store Failed Page
@endsection

@section('content')
<div class="page-content page-success">
    <section class="success" data-aos="zoom-in">
        <div class="container">
            <div class="row align-items-center row-login justify-content-center">
                <div class="col-lg-6 text-center">
                    <img src="icons/close-circle-sc50.svg" alt="" class="mb-4" width="50px" />
                    <h2 class="mb-2">Transaksi Gagal!</h2>
                    <p class="mb-4">ID Pesanan : #{{$transaction->code}}</p>
                    <p class="mb-1">
                        Maaf <strong>{{ $transaction->user->name }}</strong>, transaksi Anda di Bucket Diwna tidak dapat
                        diproses.
                    </p>
                    <p>Silakan coba lagi atau hubungi layanan pelanggan kami untuk bantuan lebih lanjut.</p>
                    <div>
                        <a href="{{ route('account-transactions', ['id' => $transaction->transactionDetail->first()->id]) }}"
                            class="btn btn-success btn-block mt-4">
                            Lihat Transaksi
                        </a>
                        <a href="{{route('home')}}" class="btn btn-signup btn-block mt-2">
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection