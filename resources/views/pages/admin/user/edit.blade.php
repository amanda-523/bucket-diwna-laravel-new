@extends('layouts.admin')

@section('title')
Admin User Page
@endsection

@section('content')
<div class="section-content section-dashboard" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Pengguna</h2>
            <p class="dashboard-subtitle">
                Edit pengguna
            </p>
            <hr />
        </div>
        <div class="dashboard-content">
            <a href="{{route('user.index')}}" class="nav-back">
                <img src="/icons/chevron-left-sc50.svg" alt="" />
                Kembali
            </a>
            <div class="row mt-4">
                <div class="col-md-12">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card-dashboard">
                        <div class="card-body">
                            <form action="{{route('user.update', $item->id)}}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Pengguna</label>
                                            <input type="text" name="name" class="form-control" value="{{$item->name}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email Pengguna</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{$item->email}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password Pengguna</label>
                                            <input type="password" name="password" class="form-control">
                                            <small>Kosongkan jika tidak ingin mengganti password</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Roles</label>
                                            <select name="roles" class="form-control" required>
                                                <option value="{{$item->roles}}" selected>Tidak diganti</option>
                                                <option value="ADMIN">Admin</option>
                                                <option value="USER">Pengguna</option>
                                            </select>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection