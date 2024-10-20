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
                    <form action="" class="">
                        <div class="card-account">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="firstName">Nama Depan</label>
                                            <input type="text" class="form-control" id="firstName" name="firstName"
                                                value="Amanda" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="lastName">Nama Belakang</label>
                                            <input type="text" class="form-control" id="lastName" name="lastName"
                                                value="Sudrajat" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="amandasdrjt523@gmail.com" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phoneNumber">No. HP</label>
                                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                                value="08136418892" />
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