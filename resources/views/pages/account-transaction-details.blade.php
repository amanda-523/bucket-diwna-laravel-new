@extends('layouts.account')

@section('title')
Store Transaction Details Page
@endsection

@section('content')
<div class="section-content section-account" data-aos="fade-up">
    <div class="container-fluid">
        <div class="account-heading">
            <h2 class="account-title">
                #{{ $transaction->transaction->code ?? '' }}
            </h2>
            <h5 class="account-subtitle">Detail Transaksi</h5>
            <hr />
        </div>
        <div class="account-content">
            <a href="{{route('account-transactions')}}" class="nav-back">
                <img src="/icons/chevron-left-sc50.svg" alt="" />
                Kembali
            </a>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card-account">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <img src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                        alt="" class="image-transaction w-100 mb-3" />
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="row">
                                        <div class="col-12 mt-2 mb-2">
                                            <h5 style="font-weight: 700; font-size: large">Informasi Transaksi</h5>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="product-title" style="font-weight: 600; font-size: medium">
                                                Nama Pengguna
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $transaction->transaction->user->name ?? '' }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="product-title" style="font-weight: 600; font-size: medium">
                                                Nama Produk
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $transaction->product->name ?? '' }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="product-title" style="font-weight: 600; font-size: medium">
                                                Tanggal Transaksi
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $transaction->transaction->created_at ?? '' }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="product-title" style="font-weight: 600; font-size: medium">
                                                Status Pembayaran
                                            </div>
                                            <div class="product-subtitle text-danger">
                                                {{ $transaction->transaction->transaction_status ?? '' }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="product-title" style="font-weight: 600; font-size: medium">
                                                Jumlah Total
                                            </div>
                                            <div class="product-subtitle">
                                                Rp {{ number_format($transaction->transaction->total_price ?? '') }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="product-title" style="font-weight: 600; font-size: medium">
                                                No HP
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $transaction->transaction->user->phone_number ?? '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-2 mb-2">
                                    <h5 style="font-weight: 700; font-size: large">Informasi Pengiriman</h5>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="product-title" style="font-weight: 600; font-size: medium">
                                                Nama Lengkap
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $transaction->transaction->user->address->name ?? '' }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="product-title" style="font-weight: 600; font-size: medium">
                                                Alamat Lengkap
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $transaction->transaction->user->address->address ?? '' }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="product-title" style="font-weight: 600; font-size: medium">
                                                Provinsi
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $transaction->transaction->user->address->provinces->name ?? '' }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="product-title" style="font-weight: 600; font-size: medium">
                                                Kota
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $transaction->transaction->user->address->regencies->name ?? '' }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="product-title" style="font-weight: 600; font-size: medium">
                                                Kode Pos
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $transaction->transaction->user->address->zip_code ?? '' }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="product-title" style="font-weight: 600; font-size: medium">
                                                Negara
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $transaction->transaction->user->address->country ?? '' }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="product-title" style="font-weight: 600; font-size: medium">
                                                No HP
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $transaction->transaction->user->address->phone_number ?? '' }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="product-title" style="font-weight: 600; font-size: medium">
                                                Status Pengiriman
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $transaction->shipping_status ?? '' }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="product-title" style="font-weight: 600; font-size: medium">
                                                Resi Pengiriman
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $transaction->resi ?? '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center mt-4">
                                @switch($transaction->shipping_status)
                                @case('PROCESS')
                                <div class="col-12 col-lg-6 mb-3">
                                    <a href="{{ route('detail', $product->slug) }}"
                                        class="btn btn-outline-secondary btn-block">Lihat Produk</a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <button class="btn btn-success btn-block" disabled>
                                        Pesanan Selesai
                                    </button>
                                </div>
                                @break

                                @case('SHIPPING')
                                <div class="col-12 col-lg-6 mb-3">
                                    <a href="{{ route('detail', $product->slug) }}"
                                        class="btn btn-outline-secondary btn-block">Lihat Produk</a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <button class="btn btn-success btn-block">
                                        Pesanan Selesai
                                    </button>
                                </div>
                                @break

                                @case('SUCCESS')
                                <div class="col-12 col-lg-6 mb-3">
                                    <a href="{{ route('detail', $product->slug) }}"
                                        class="btn btn-outline-secondary btn-block">Beli Lagi</a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <a href="{{ route('review') }}" class="btn btn-success btn-block">Beri Review</a>
                                </div>
                                @break

                                @case('DONE')
                                @if($hasReview)
                                <div class="col-12 col-lg-6 mb-3">
                                    <a href="{{ route('detail', $product->slug) }}"
                                        class="btn btn-outline-secondary btn-block">Beli Lagi</a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <a href="{{ route('review') }}" class="btn btn-success btn-block">Lihat Review</a>
                                </div>
                                @endif
                                @break
                                @endswitch
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection