@extends('layouts.app')

@section('title')
Store Address Page
@endsection

@section('content')
<div class="page-content page-cart">
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Alamat Pengiriman
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="store-cart">
        <div class="container">
            <form action="{{ route('cart-address-selected') }}" method="POST">
                @csrf
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    @if($addresses->isNotEmpty())
                    @foreach($addresses as $address)
                    <div class="col-md-12 mb-3">
                        <div class="card-account">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2 col-md-1">
                                        <input type="radio" class="w-100" name="selected_address"
                                            value="{{ $address->id }}" required>
                                    </div>
                                    <div class="col-8 col-md-10">
                                        <p>{{ $address->name }} <br />
                                            @if($address->is_selected)
                                            <span class="badge badge-primary"
                                                style="background-color: #f5952f">Utama</span>
                                            @endif
                                            {{ $address->phone_number }} <br />
                                            {{ $address->address }}, {{ $address->provinces->name }}, {{
                                            $address->regencies->name }}, {{
                                            $address->zip_code }}<br />
                                            {{ $address->country }}
                                        </p>
                                    </div>
                                    <div class="col-2 col-md-1">
                                        <a href="{{ route('account-address-edit', $address->id) }}" class="edit-button"
                                            style="color: #f5952f">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-12">Alamat belum ditambahkan. Silakan tambahkan alamat pengiriman.</div>
                    @endif
                </div>
                @if($addresses->isNotEmpty())
                <div class="row">
                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-block"
                            style="background-color: #f5952f; border-color: #f5952f">Pilih Alamat</button>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-12 text-center mt-4">
                        <a href="{{route('account-address')}}" class="btn btn-primary btn-block"
                            style="background-color: #f5952f; border-color: #f5952f">Tambahkan Alamat</a>
                    </div>
                </div>
                @endif
            </form>
        </div>
    </section>
</div>
@endsection