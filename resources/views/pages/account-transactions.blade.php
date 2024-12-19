@extends('layouts.account')

@section('title')
Store Account Transactions Page
@endsection

@section('content')
<div class="section-content section-account" data-aos="fade-up">
    <div class="container-fluid">
        <div class="account-heading">
            <h2 class="account-title">Transaksi Saya</h2>
            <h5 class="account-subtitle">Lihat transaksi yang Anda lakukan hari ini!</h5>
            <hr />
        </div>
        <div class="account-content">
            <div class="row">
                @foreach ($transaction as $transaction)
                <div class="col-12 mb-2">
                    <a href="{{ route('account-transaction-details', $transaction->id) }}"
                        class="card-dashboard card-list d-block">
                        <div class="card-body">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-1">
                                    <img src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                        alt=""/>
                                </div>
                                <div class="col-6 text-left">
                                    {{ $transaction->product->name }} </br>
                                    Rp {{ number_format($transaction->transaction->total_price) }}
                                </div>
                                <div class="col-4">{{ $transaction->created_at }}</div>
                                <div class="col-1 d-none d-md-block">
                                    <img src="/icons/chevron-right-ne20.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection