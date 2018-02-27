@extends('layouts.master')
@section('content')
    <div class="slider-area">
        <!-- Slider -->
        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">
                @foreach ($hotProducts as $hotProduct)
                    <li>
                        <img src="{{ asset('images/h4-slide.png') }}" alt="@lang('label.slide')">
                        <div class="caption-group">
                            <h2 class="caption title">
                                <span class="primary">
                                    <strong>{{ $hotProduct->name  }}</strong>
                                </span>
                            </h2>
                            <h4 class="caption subtitle">{{ $hotProduct->descriptions }}</h4>
                            <a class="caption button-radius" href="#">
                                <span class="icon"></span>@lang('label.shop_now')
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- ./Slider -->
    </div>
    <!-- End slider area -->
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>@lang('label.30_days_return')</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>@lang('label.free_shipping')</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>@lang('label.secure_payments')</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>@lang('label.new_products')</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End promo area -->
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">@lang('label.lastest_product')</h2>
                        <div class="product-carousel">
                            @foreach ($hotProducts as $hotProduct)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="{{ $hotProduct->thumbnail_path }}" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link">
                                                <i class="fa fa-shopping-cart"></i>@lang('label.add_to_cart')</a>
                                            <a href="{{ route('detailProduct', $hotProduct->id) }}" class="view-details-link">
                                                <i class="fa fa-link"></i>@lang('label.see_detail')</a>
                                        </div>
                                    </div>
                                    <h2>
                                        <a href="{{ route('detailProduct', $hotProduct->id) }}">{{ $hotProduct->name }}</a>
                                    </h2>
                                    <div class="product-carousel-price">
                                        @if ($hotProduct->discount)
                                            <ins>{{ $hotProduct->last_price }}</ins>
                                            <del>{{ $hotProduct->price }}</del>
                                        @else
                                            <ins>{{ $hotProduct->price }}</ins>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="{{ asset('images/brand1.png') }}" alt="">
                            <img src="{{ asset('images/brand2.png') }}" alt="">
                            <img src="{{ asset('images/brand3.png') }}" alt="">
                            <img src="{{ asset('images/brand4.png') }}" alt="">
                            <img src="{{ asset('images/brand5.png') }}" alt="">
                            <img src="{{ asset('images/brand6.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">@lang('label.top_seller')</h2>
                        <a href="" class="wid-view-more">@lang('label.view_all')</a>
                        @foreach ($topSellerProducts as $topSellerProduct)
                            <div class="single-wid-product">
                                <a href="{{ route('detailProduct', $topSellerProduct->id) }}">
                                    <img src="{{ $topSellerProduct->thumbnail_path }}" alt="" class="product-thumb">
                                </a>
                                <h2>
                                    <a href="{{ route('detailProduct', $topSellerProduct->id) }}">{{ $topSellerProduct->name }}</a>
                                </h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    @if ($topSellerProduct->discount)
                                        <ins>{{ $topSellerProduct->last_price}}</ins>
                                        <del>{{ $topSellerProduct->price }}</del>
                                    @else
                                        <ins>{{ $topSellerProduct->price }}</ins>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">@lang('label.recently_viewed')</h2>
                        <a href="#" class="wid-view-more">@lang('label.view_all')</a>
                        @foreach ($recently_viewed_products as $recently_viewed_product)
                            <div class="single-wid-product">
                                <a href="{{ route('detailProduct', $recently_viewed_product->id) }}">
                                    <img src="{{ $recently_viewed_product->thumbnail_path }}" alt="" class="product-thumb">
                                </a>
                                <h2>
                                    <a href="{{ route('detailProduct', $recently_viewed_product->id) }}">{{ $recently_viewed_product->name }}</a>
                                </h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    @if ($recently_viewed_product->discount)
                                        <ins>{{ $recently_viewed_product->last_price }}</ins>
                                        <del>{{ $recently_viewed_product->price }}</del>
                                    @else
                                        <ins>{{ $recently_viewed_product->price }}</ins>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">@lang('label.top_new')</h2>
                        <a href="#" class="wid-view-more">@lang('label.view_all')</a>
                        @foreach ($topNewProducts as $topNewProduct)
                            <div class="single-wid-product">
                                <a href="{{ route('detailProduct', $topNewProduct->id) }}">
                                    <img src="{{ $topNewProduct->thumbnail_path }}" alt="" class="product-thumb">
                                </a>
                                <h2>
                                    <a href="{{ route('detailProduct', $topNewProduct->id) }}">{{ $topNewProduct->name }}</a>
                                </h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    @if ($topNewProduct->discount)
                                        <ins>{{ $topNewProduct->last_price }}</ins>
                                        <del>{{ $topNewProduct->price }}</del>
                                    @else
                                        <ins>{{ $topNewProduct->price }}</ins>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End product widget area -->
@endsection
@section('javascript')
@endsection
