@extends('layouts.app')

@section('title')
Store Best Seller Page
@endsection

@section('content')
<div class="page-content page-home">
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('home')}}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('products')}}">Produk</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Best Seller
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="store-best-products">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <a href="/details.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                                            background-image: url('/images/bucket\ kosongan.svg');
                                        "></div>
                        </div>
                        <div class="products-text">Bucket Kosongan</div>
                        <div class="products-price">Rp 20.000</div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <a href="/details.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                                            background-image: url('/images/bucket\ bunga.svg');
                                        "></div>
                        </div>
                        <div class="products-text">Bucket Bunga</div>
                        <div class="products-price">Rp 30.000</div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <a href="/details.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                                            background-image: url('/images/bucket\ snack\ coklat.svg');
                                        "></div>
                        </div>
                        <div class="products-text">Bucket Snack</div>
                        <div class="products-price">Rp 60.000</div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <a href="/details.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                                            background-image: url('/images/bucket\ wisuda.svg');
                                        "></div>
                        </div>
                        <div class="products-text">Bucket Wisuda</div>
                        <div class="products-price">Rp 80.000</div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <a href="/details.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                                            background-image: url('/images/bucket\ uang.svg');
                                        "></div>
                        </div>
                        <div class="products-text">Bucket Uang</div>
                        <div class="products-price">Rp 100.000</div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection