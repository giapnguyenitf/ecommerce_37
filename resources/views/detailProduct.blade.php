@extends('layouts.master')
@section('css')
    {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css') }}
@endsection
@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="product-breadcroumb">
            <a href="{{ route('home') }}">@lang('label.home')</a>
            <a href="">{{ $product->category->name }}</a>
            <a href="">{{ $product->name }}</a>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="product-images">
                    <div class="product-main-img">
                        <a href="{{ $product->thumbnail_path }}" data-fancybox="images-preview">
                            <img src="{{ $product->thumbnail_path }}" />
                        </a>
                    </div>

                    <div class="product-gallery">
                        <div class="imglist">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="product-inner">
                    <h2 class="product-name">{{ $product->name }}</h2>
                    <div class="product-inner-price">
                        @if ($product->discount)
                            <ins>{{ $product->last_price}}</ins>
                            <del>{{ $product->price }}</del>
                        @else
                            <ins>{{ $product->price }}</ins>
                        @endif
                    </div>
                    {{ Form::open(['route' => 'login', 'class' => 'cart']) }}
                        <div class="quantity">
                            {{ Form::number('quantity', 1, ['class' => 'input-text qty text', 'min' => 1, 'step' => 1]) }}
                            {{ Form::button(trans('label.add_to_cart'), ['type' => 'submit', 'class' => 'add_to_cart_button']) }}
                        </div>
                    {{ Form::close() }}
                    <br>
                    <br>
                    <br>
                    <div class="product-inner-category">
                        <p>@lang('label.category'): <a href="">{{ $product->category->name }}</a></p>
                        <p>@lang('label.color'):
                            @foreach ($product->colorProducts as $colorProduct)
                                <label class="radio-inline"><input data-url="{{ route('getDetailColorProduct', $colorProduct->id) }}" class="color-option" type="radio" name="color" value="{{ $colorProduct->id }}">{{ $colorProduct->color->name }}</label>
                            @endforeach
                        </p>
                    </div>

                    <div role="tabpanel">
                        <ul class="product-tab" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">@lang('label.description')</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">@lang('label.reviews')</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <h2>@lang('label.product_description')</h2>
                                <p>{{ $product->description }}</p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                <h2>@lang('label.reviews')</h2>
                                <div class="submit-review">
                                    <p><label for="name">@lang('label.name')</label> <input name="name" type="text"></p>
                                    <p><label for="email">@lang('label.email')</label> <input name="email" type="email"></p>
                                    <div class="rating-chooser">
                                        <p>@lang('label.your_rating')</p>

                                        <div class="rating-wrap-post">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <p><label for="review">@lang('label.your_review')</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                    <p><input type="submit" value="@lang('label.submit')"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
@section('javascript')
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js') }}
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js') }}
    {{ Html::script('js/custom/detail-product.js') }}
@endsection
