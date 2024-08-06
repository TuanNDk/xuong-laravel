@extends('client.layouts.master')

@section('title')
    Trang chủ
@endsection

@section('content')
    <!-- Hero Section Begin -->
    @include('client.layouts.hero')
    <!-- Hero Section End -->
    {{-- <!-- Banner Section Begin -->
    @include('client.layouts.banner')
    <!-- Banner Section End --> --}}

    <section class="product spad mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        @foreach ($catelogues as $item)
                            <li class="active" data-filter="*">{{ $item->name }}</li>
                        @endforeach
                        {{-- <li data-filter=".new-arrivals">New Arrivals</li>
            <li data-filter=".hot-sales">Hot Sales</li> --}}
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                @foreach ($products as $item)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ Storage::url($item->img_thumbnail) }}">
                                <span class="badge bg-danger">{{ $item->catelogue->name }}</span>
                                <ul class="product__hover">
                                    <li><a href="#"><img src="{{ asset('theme/client/img/icon/heart.png') }}"
                                                alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('theme/client/img/icon/compare.png') }}"
                                                alt="">
                                            <span>Compare</span></a></li>
                                    <li><a href="{{ route('product.detail', $item->slug) }}"><img
                                                src="{{ asset('theme/client/img/icon/search.png') }}" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h5>{{ $item->name }}</h5>
                                {{-- <a href="#" class="add-cart">+ Add To Cart</a> --}}
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>{{ number_format($item->price_sale, 0, ',', '.') }} VNĐ</h5>
                                <span
                                    class="text-danger text-decoration-line-through">{{ number_format($item->price_regular, 0, ',', '.') }}
                                    VNĐ</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Categories Section Begin -->
    @include('client.layouts.hot_product')
    <!-- Categories Section End -->


    <!-- Latest Blog Section Begin -->
    @include('client.layouts.trending')
    <!-- Latest Blog Section End -->
@endsection
