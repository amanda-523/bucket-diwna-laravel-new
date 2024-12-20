@extends('layouts.admin')

@section('title')
Admin Dashboard Page
@endsection

@section('content')
<div class="section-content section-dashboard" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Dashboard Admin</h2>
            <p class="dashboard-subtitle">
                Ini adalah panel administrator Bucket Diwna
            </p>
            <hr />
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-dashboard mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Customer</div>
                            <div class="dashboard-card-subtitle">{{ $customer }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-dashboard mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Pendapatan</div>
                            <div class="dashboard-card-subtitle">Rp {{ number_format($revenue) }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-dashboard mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Transaksi</div>
                            <div class="dashboard-card-subtitle">{{ $transaction }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection