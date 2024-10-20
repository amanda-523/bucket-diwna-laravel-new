@extends('layouts.app')

@section('title')
Store Home Page
@endsection

@section('content')
<div class="page-content page-home">
    <section class="store-carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="zoom-in">
                    <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#storeCarousel" data-slide-to="0"></li>
                            <li data-target="#storeCarousel" data-slide-to="1"></li>
                            <li data-target="#storeCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/images/carousel-1.svg" alt="Carousel 1" class="d-block w-100" />
                            </div>
                            <div class="carousel-item">
                                <img src="/images/carousel-2.svg" alt="Carousel 2" class="d-block w-100" />
                            </div>
                            <div class="carousel-item">
                                <img src="/images/carousel-3.svg" alt="Carousel 3" class="d-block w-100" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="store-categories">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>
                        <a href="{{route('categories')}}">
                            Kategori
                            <img src="/icons/chevron-right.svg" alt="" class="icon-right" />
                        </a>
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <a href="{{route('categories-details')}}" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="/images/categories-bucket-kosongan.svg" alt="" class="w-100" />
                        </div>
                        <p class="categories-text">Kosongan</p>
                    </a>
                </div>

                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{route('categories-details')}}" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="/images/categories-bucket-bunga.svg" alt="" class="w-100" />
                        </div>
                        <p class="categories-text">Bunga</p>
                    </a>
                </div>

                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                    <a href="{{route('categories')}}" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="/icons/view-grid-outline-ne00.svg" alt="" class="w-100" />
                        </div>
                        <p class="categories-text">Lainnya</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

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