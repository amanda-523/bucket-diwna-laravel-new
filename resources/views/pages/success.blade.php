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
                    <h2 class="mb-2">Transaksi Berhasil!</h2>
                    <p class="mb-4">ID Pesanan : #{{$transaction->code}}</p>
                    <p class="mb-1">
                        Terima kasih <strong>{{ $transaction->user->name }}</strong> sudah melakukan transaksi di Bucket
                        Diwna!
                    </p>
                    <p>Kami akan menginformasikan resi secepat mungkin!</p>
                    <div>
                        @if ($transaction->transactionDetail->isNotEmpty())
                        <a href="{{ route('account-transaction-details', ['id' => $transaction->transactionDetail->first()->id]) }}"
                            class="btn btn-success btn-block mt-4">
                            Lihat Transaksi
                        </a>
                        @else
                        <p class="text-danger mt-4">Detail transaksi tidak tersedia.</p>
                        @endif
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