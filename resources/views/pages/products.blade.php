@extends('layouts.app')

@section('title')
Store Product Page
@endsection

@section('content')
<div class="page-content page-home">
    <section class="store-best-products">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>
                        <a href="{{route('best-seller')}}">
                            Best Seller
                            <img src="/icons/chevron-right.svg" alt="" class="icon-right" />
                        </a>
                    </h5>
                </div>
            </div>
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
            </div>
        </div>
    </section>

    <section class="store-products">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>
                        <a href="{{route('all-product')}}">
                            Semua Produk
                            <img src="/icons/chevron-right.svg" alt="" class="icon-right" />
                        </a>
                    </h5>
                </div>
            </div>
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
            </div>
        </div>
    </section>
</div>
@endsection