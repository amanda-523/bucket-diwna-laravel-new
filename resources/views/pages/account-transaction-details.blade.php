@extends('layouts.account')

@section('title')
Store Account TRansactions Page
@endsection

@section('content')
<div class="section-content section-account" data-aos="fade-up">
    <div class="container-fluid">
        <div class="account-heading">
            <h2 class="account-title">#{{ $transaction->code }}</h2>
            <h5 class="account-subtitle">Detail Transaksi</h5>
            <hr />
        </div>
        <div class="account-content">
            <a href="{{route('account-transactions')}}" class="nav-back">
                <img src="/icons/chevron-left-sc50.svg" alt="" />
                Kembali
            </a>
            <div class="row">
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
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Nama Customer</div>
                                            <div class="product-subtitle">
                                                {{ $transaction->transaction->user->name }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Nama Produk</div>
                                            <div class="product-subtitle">{{ $transaction->transaction->product->name }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">
                                                Tanggal Transaksi
                                            </div>
                                            <div class="product-subtitle">
                                                {{ $transaction->created_at }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">
                                                Status Pembayaran
                                            </div>
                                            <div class="product-subtitle text-danger">
                                                {{ $transaction->transaction->transaction_status }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Jumlah Total</div>
                                            <div class="product-subtitle">Rp {{
                                                number_format($transaction->transaction->total_price) }}</div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">No HP</div>
                                            <div class="product-subtitle">{{
                                                $transaction->transaction->user->phone_number }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <h5>Informasi Pengiriman</h5>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Nama Lengkap</div>
                                            <div class="product-subtitle">
                                                {{ $transaction->transaction->address->name }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Alamat Lengkap</div>
                                            <div class="product-subtitle">
                                                {{ $transaction->transaction->address->address }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Provinsi</div>
                                            <div class="product-subtitle">
                                                {{ App\Models\Province::find($transaction->transaction->address->provinces_id->name) }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Kota</div>
                                            <div class="product-subtitle">
                                                {{ App\Models\Regency::find($transaction->transaction->address->regencies_id->name) }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Kode Pos</div>
                                            <div class="product-subtitle">{{ $transaction->transaction->address->zip_code }}</div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Negara</div>
                                            <div class="product-subtitle">{{ $transaction->transaction->address->country }}</div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="product-title">No HP</div>
                                            <div class="product-subtitle">{{ $transaction->transaction->address->number_phone }}</div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Status Pengiriman</div>
                                            <div class="product-subtitle">{{ $transaction->transaction_detail->shipping_status }}</div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Resi Pengiriman</div>
                                            <div class="product-subtitle">{{ $transaction->transaction_detail->resi }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center mt-4">
                                <div class="col-6">
                                    <a href="/details.html" class="btn btn-outline-secondary btn-block">Beli Lagi</a>
                                </div>
                                <div class="col-6">
                                    <a href="{{route('review')}}" class="btn btn-success btn-block">Lihat Review</a>
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