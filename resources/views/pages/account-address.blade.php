@extends('layouts.account')

@section('title')
Store Address Page
@endsection

@section('content')
<div class="section-content section-account" data-aos="fade-up">
    <div class="container-fluid">
        <div class="account-heading">
            <h2 class="account-title">Alamat</h2>
            <h5 class="account-subtitle">
                Alamat pengiriman untuk pesanan Anda
            </h5>
            <hr />
        </div>
        <div class="account-content">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('account-address-create') }}" class="btn btn-success">Tambah Alamat Baru</a>
                </div>
            </div>
            <div class="row mt-4">
                @foreach ($addresses as $address)
                <div class="col-12 mb-3">
                    <div class="card-account">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10 col-md-11">
                                    <h2>{{ $address->name }}</h2>
                                    @if($address->is_selected)
                                    <span class="badge badge-primary" style="background-color: #f5952f">Utama</span>
                                    @endif
                                    <h5>
                                        {{ $address->phone_number }} </br>
                                        {{ $address->address }}, {{ $address->provinces->name ?? 'Provinsi tidak
                                        ditemukan' }},
                                        {{ $address->regencies->name ?? 'Kota tidak ditemukan' }}, {{ $address->zip_code
                                        }}, {{ $address->country }}
                                    </h5>
                                </div>
                                <div class="col-2 col-md-1 text-right">
                                    <a href="{{ route('account-address-edit', $address->id) }}" class="edit-button">
                                        Edit
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('account-address-delete', $address->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Hapus Alamat
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection