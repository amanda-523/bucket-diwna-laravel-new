@extends('layouts.account')

@section('title')
Store Account Page
@endsection

@section('content')
<div class="section-content section-account" data-aos="fade-up">
    <div class="container-fluid">
        <div class="account-heading">
            <h2 class="account-title">Akun Saya</h2>
            <h5 class="account-subtitle">Informasi Pribadi</h5>
            <hr />
        </div>
        <div class="account-content">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('account-redirect','account') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-account">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="profile_picture">Foto Profil</label>
                                            <input type="file" class="form-control" id="profile_picture"
                                                name="profile_picture" />
                                            @error('profile_picture')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{$user->name}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{$user->email}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_number">No. HP</label>
                                            <input type="text" class="form-control" id="phone_number"
                                                name="phone_number" value="{{$user->phone_number}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection