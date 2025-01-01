@extends('layouts.success')

@section('title')
Store Pending Page
@endsection

@section('content')
<div class="page-content page-success">
    <section class="success" data-aos="zoom-in">
        <div class="container">
            <div class="row align-items-center row-login justify-content-center">
                <div class="col-lg-6 text-center">
                    <img src="icons/mdi_clock_sc50.svg" alt="" class="mb-4" width="50px" />
                    <h2 class="mb-2">Transaksi Anda sedang dalam proses!</h2>
                    <p class="mb-4">ID Pesanan : #{{$transaction->code}}</p>
                    <p class="mb-1">
                        Terima kasih <strong>{{ $transaction->user->name }}</strong> telah melakukan transaksi di Bucket
                        Diwna. Kami sedang memproses pesanan Anda.
                    </p>
                    <p>Segera setelah transaksi diproses, kami akan mengirimkan informasi resi kepada Anda!</p>
                    <div>
                        <a href="{{route('account-transactions', ['id' => $transaction->transactionDetail->first()->id])}}"
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