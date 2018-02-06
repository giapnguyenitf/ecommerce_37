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
@endsection
