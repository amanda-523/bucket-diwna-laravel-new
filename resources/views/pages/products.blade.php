@extends('layouts.app')

@section('title')
Store Product Page
@endsection

@section('content')
<div class="page-content page-home">
    {{-- <section class="store-best-products">
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
                @php
                $incrementBestSeller = 0
                @endphp
                @forelse ($bestSellers as $bestSeller)
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{$incrementBestSeller+= 100}}">
                    <a href="{{route('detail', $bestSeller->slug)}}" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                                                            @if($bestSeller->galleries->count())
                                                            background-image: url('{{Storage::url($product->galleries->first()->photos)}}')
                                                            @else
                                                            background-color: #5ca4df
                                                            @endif
                                                        ">
                            </div>
                        </div>
                        <div class="products-text">{{$bestSeller->name}}</div>
                        <div class="products-price">Rp {{number_format($bestSeller->price)}}</div>
                    </a>
                </div>
                @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                    Tidak Ditemukan Produk
                </div>
                @endforelse
            </div>
        </div>
    </section> --}}

    <section class="store-products">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>Semua Produk</h5>
                </div>
            </div>
            <div class="row">
                @php
                $incrementProduct = 0
                @endphp
                @forelse ($products as $product)
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{$incrementProduct+= 100}}">
                    <a href="{{route('detail', $product->slug)}}" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                                    @if($product->galleries->count())
                                    background-image: url('{{Storage::url($product->galleries->first()->photos)}}')
                                    @else
                                    background-color: #5ca4df
                                    @endif
                                ">
                            </div>
                        </div>
                        <div class="products-text">{{$product->name}}</div>
                        <div class="products-price">Rp {{number_format($product->price)}}</div>
                    </a>
                </div>
                @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                    Tidak Ditemukan Produk
                </div>
                @endforelse
            </div>
        </div>
    </section>
</div>
@endsection