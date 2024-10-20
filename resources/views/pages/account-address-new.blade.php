@extends('layouts.account')

@section('title')
Store Account Address New Page
@endsection

@section('content')
<div class="section-content section-account" data-aos="fade-up">
    <div class="container-fluid">
        <div class="account-heading">
            <h2 class="account-title">Alamat</h2>
            <h5 class="account-subtitle">
                Tambahkan alamat pengiriman untuk pesanan
                Anda
            </h5>
            <hr />
        </div>
        <div class="account-content">
            <a href="{{route('account-address')}}" class="nav-back">
                <img src="/icons/chevron-left-sc50.svg" alt="" />
                Kembali
            </a>
            <div class="row mt-4">
                <div class="col-12">
                    <form action="" class="">
                        <div class="card-account">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fullName">Nama
                                                Lengkap</label>
                                            <input type="text" class="form-control" id="fullName" name="fullName"
                                                placeholder="Amanda S. Sudrajat" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="amandasdrjt523@gmail.com" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Alamat
                                                Lengkap</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="Psr. Hartana no 69" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="province">Provinsi</label>
                                            <select name="province" id="province" class="form-control">
                                                <option value="Jawa Barat">
                                                    Jawa
                                                    Barat
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">Kota</label>
                                            <select name="city" id="city" class="form-control">
                                                <option value="Cikampek">
                                                    Cikampek
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="postalCode">Kode
                                                Pos</label>
                                            <input type="text" class="form-control" id="postalCode" name="postalCode"
                                                placeholder="44262" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Negara</label>
                                            <input type="text" class="form-control" id="country" name="country"
                                                placeholder="Indonesia" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phoneNumber">No.
                                                HP</label>
                                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                                placeholder="08136418892" />
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