@extends('layouts.app')

@section('title')
Store Category Page
@endsection

@section('content')
<div class="page-content page-home">
    <section class="store-categories">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>Semua Kategori</h5>
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
                    <a href="/categories-details.html" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="/images/categories-bucket-bunga.svg" alt="" class="w-100" />
                        </div>
                        <p class="categories-text">Bunga</p>
                    </a>
                </div>

                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                    <a href="/categories-details.html" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="/images/categories-bucket-snack.svg" alt="" class="w-100" />
                        </div>
                        <p class="categories-text">Snack</p>
                    </a>
                </div>

                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="400">
                    <a href="/categories-details.html" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="/images/categories-bucket-uang.svg" alt="" class="w-100" />
                        </div>
                        <p class="categories-text">Uang</p>
                    </a>
                </div>

                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="500">
                    <a href="/categories-details.html" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="/images/categories-bucket-custom.svg" alt="" class="w-100" />
                        </div>
                        <p class="categories-text">Custom</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection