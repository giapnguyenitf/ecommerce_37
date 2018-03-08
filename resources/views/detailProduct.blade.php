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
                        <h2>@lang('label.shop')</h2>
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
                    <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                    <h2 class="product-name" >{{ $product->name }}</h2>
                    <div class="product-inner-price">
                        <ins>{{ $product->last_price }}</ins>
                        @if ($product->discount)
                            <del>{{ $product->price }}</del>
                        @endif
                    </div>
                    {{ Form::open(['route' => 'login', 'class' => 'cart']) }}
                        <div class="quantity">
                            {{ Form::number('quantity', 1, ['id' => 'quantity', 'class' => 'input-text qty text', 'min' => 1, 'step' => 1]) }}
                            {{ Form::button(trans('label.add_to_cart'), ['type' => 'button', 'class' => 'add_to_cart_button', 'id' => 'add_to_cart_button', 'data-url' => route('cart.add')]) }}
                        </div>
                    {{ Form::close() }}
                    <br>
                    <br>
                    <br>
                    <div class="product-inner-category">
                        <p>@lang('label.category'): <a href="">{{ $product->category->name }}</a></p>
                        <p>@lang('label.color'):
                            @foreach ($product->colorProducts as $colorProduct)
                                <label class="radio-inline"><input data-url="{{ route('getDetailColorProduct', $colorProduct->id) }}" data-color="{{ $colorProduct->color_id }}" class="color-option" type="radio" name="color" value="{{ $colorProduct->id }}">{{ $colorProduct->color->name }}</label>
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
                                    {{ Form::open(['route' => 'home', 'method' => 'POST']) }}
                                        <div class="rating-chooser">
                                            <p>@lang('label.your_rating')</p>
                                            <div class='rating-stars'>
                                                <ul id='stars'>
                                                <li class='star' title='Poor' data-value='1'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Fair' data-value='2'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Good' data-value='3'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Excellent' data-value='4'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='WOW!!!' data-value='5'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                </ul>
                                            </div>

                                            <div class='success-box'>
                                                <div class='clearfix'></div>
                                                <div class='text-message'></div>
                                                <div class='clearfix'></div>
                                            </div>
                                        </div>
                                        <p>
                                            {{ Form::label(trans('label.your_review')) }}
                                            {{ Form::textarea('review', null, ['id' => 'review', 'cols' => 30, 'rows' => 10]) }}
                                        </p>
                                        <p>
                                            {{ Form::button(trans('label.submit'), ['class' => 'btn btn-primary btn-review', 'id' => 'btn-review', 'data-url' => route('product.addReview')]) }}
                                        </p>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="latest-product">
                <h2 class="section-title">@lang('label.recently_viewed')</h2>
                <div class="product-carousel">
                    @foreach ($recently_viewed_products as $recently_viewed_product)
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="{{ $recently_viewed_product->thumbnail_path }}" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link">
                                        <i class="fa fa-shopping-cart"></i> @lang('label.add_to_cart')</a>
                                    <a href="{{ route('detailProduct', $recently_viewed_product->id) }}" class="view-details-link">
                                        <i class="fa fa-link"></i> @lang('label.see_detail')</a>
                                </div>
                            </div>
                            <h2>
                                <a href="{{ route('detailProduct', $recently_viewed_product->id) }}">{{ $recently_viewed_product->name }}</a>
                            </h2>
                            <div class="product-carousel-price">
                                <ins>{{ $recently_viewed_product->last_price }}</ins>
                                @if ($recently_viewed_product->discount)
                                    <del>{{ $recently_viewed_product->price }}</del>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="review-box" id="review-box">
                <div class="title-box">
                    <h3>@lang('label.user_review')</h3>
                </div>
                <div class="review-box-content">
                    @foreach ($ratings as $rating )
                        <div class="review-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="user-info-box">
                                        <div class="avatar-user-review"></div>
                                        <div class="name-user-review">{{ $rating->user->name }}</div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="star-rating">
                                        <div class='rating-star'>
                                                <ul id='stars-rated'>
                                                    <li class='star selected' title='@lang('label.poor')' data-value='1'>
                                                       <span class="stars-number">{{ $rating->stars }}</span>&nbsp;<i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                </ul>
                                            </div>
                                    </div>
                                    <div class="date-rating"><span>{{ $rating->created_at->format('d/m/Y') }}</span></div>
                                    <div class="review-messages">{{ $rating->messages }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="paginate">{{ $ratings->links() }}</div>
                </div>
            </div>
        </div>
    </div>

    <div id="modalSuccess" class="modal fade" role="dialog">
      <div class="modal-dialog ">
        <div class="modal-content alert alert-success">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('label.notification')</h4>
            </div>
            <div class="modal-body">
                <p>@lang('label.add_cart_success')</p>
            </div>
        </div>
      </div>
    </div>

    <div id="modalError" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content  alert alert-danger">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('label.notification')</h4>
            </div>
            <div class="modal-body">
                <p class="message_err">@lang('label.add_cart_fail')</p>
            </div>
        </div>
      </div>
    </div>

@endsection
@section('javascript')
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js') }}
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js') }}
    {{ Html::script('http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}
    {{ Html::script('js/custom/ajax-setup.js') }}
    {{ Html::script('js/custom/detail-product.js') }}
@endsection
