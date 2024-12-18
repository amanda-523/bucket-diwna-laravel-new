@extends('layouts.app')

@section('title')
Store Detail Page
@endsection

@section('content')
<div class="page-content page-details">
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
                                Detail Produk
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="store-gallery mb-3" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" data-aos="zoom-in">
                    <transition name="slide-fade" mode="out-in">
                        <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-100 main-image"
                            alt="" />
                    </transition>
                </div>
                <div class="col-lg-2">
                    <div class="row">
                        <div class="col-3 col-lg-12 mt-2 mt-lg-8" v-for="(photo, index) in photos" :key="photo.id"
                            data-aos="zoom-in" data-aos-delay="100">
                            <a href="#" @click="changeActive(index)">
                                <img :src="photo.url" class="w-100 thumbnail-image"
                                    :class="{ active: index == activePhoto }" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h1>{{$products->name}}</h1>
                        <div class="price">Rp {{number_format($products->price)}}</div>
                        <div class="stock">
                            Stok: {{ $products->stock > 0 ? $products->stock : 'Habis' }}
                        </div>
                    </div>
                    <div class="col-lg-3" data-aos="zoom-in">
                        @auth
                        <form action="{{ route('detail-add', $products->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-success px-4 text-white btn-block mb-3">
                                Masuk Keranjang
                            </button>
                        </form>
                        @else
                        <a href="{{route('login')}}" class="btn btn-success px-4 text-white btn-block mb-3">
                            Login to Add
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </section>

        <section class="store-description">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <p>{!! $products->description !!}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-review">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 mt-3 mb-3">
                        <h5>Review Customer (4)</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <ul class="list-unstyled">
                            <li class="media">
                                <img src="/images/ava J.svg" alt="" class="mr-3 rounded-circle" />
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">Jeno Lee</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet
                                        consectetur. Nibh laoreet nulla
                                        eu vitae pharetra elit aliquam
                                        arcu ac.
                                    </p>
                                </div>
                            </li>
                            <li class="media">
                                <img src="/images/ava AN.svg" alt="" class="mr-3 rounded-circle" />
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">
                                        Anita Lestari
                                    </h5>
                                    Lorem ipsum dolor sit amet
                                    consectetur. Nibh laoreet nulla eu
                                    vitae pharetra elit aliquam arcu ac.
                                    Faucibus arcu at quisque enim
                                    egestas aliquet venenatis.
                                </div>
                            </li>
                            <li class="media">
                                <img src="/images/ava H.svg" alt="" class="mr-3 rounded-circle" />
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">
                                        Haechan Lee
                                    </h5>
                                    Lorem ipsum dolor sit amet
                                    consectetur. Nibh laoreet nulla eu
                                    vitae pharetra elit aliquam arcu ac.
                                    Faucibus arcu at quisque enim
                                    egestas aliquet venenatis.
                                </div>
                            </li>
                            <li class="media">
                                <img src="/images/ava-no profile.svg" alt="" class="mr-3 rounded-circle" />
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">Davina</h5>
                                    Lorem ipsum dolor sit amet
                                    consectetur. Nibh laoreet nulla eu
                                    vitae pharetra elit aliquam arcu ac.
                                    Faucibus arcu at quisque enim
                                    egestas aliquet venenatis.
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script>
    var gallery = new Vue({
                    el: "#gallery",
                    mounted() {
                        AOS.init();
                    },
                    data: {
                        activePhoto: 0,
                        photos: [
                            @foreach($products->galleries as $gallery)
                                {
                                id: {{$gallery->id}},
                                url: "{{ Storage::url($gallery->photos) }}",
                                },
                            @endforeach
                        ],
                    },
                    methods: {
                        changeActive(id) {
                            this.activePhoto = id;
                        },
                    },
                });
</script>
@endpush