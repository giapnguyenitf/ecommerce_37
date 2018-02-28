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
                        @if ($product->discount)
                            <ins>{{ $product->last_price}}</ins>
                            <del>{{ $product->price }}</del>
                        @else
                            <ins>{{ $product->price }}</ins>
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
