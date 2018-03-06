@extends('layouts.master')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">@lang('label.home')</a></li>
                    <li class="active">@lang('label.shopping-cart')</li>
                </ol>
            </div>
            @if (isset($carts))
                <div class="col-md-9 table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">@lang('label.item')</td>
                                <td class="name">@lang('label.name')</td>
                                <td class="price">@lang('label.price')</td>
                                <td class="quantity">@lang('label.quantity')</td>
                                <td class="total">@lang('label.total')</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $key => $cart)
                                <tr class="{{ $cart['session_id'] }}">
                                    <td class="cart_product">
                                        <a href=""><img class="img-product img-responsive" src="{{ $cart[0]->thumbnail_path }}" alt=""></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{ $cart[0]->name }}</a></h4>
                                        <span>@lang('label.color'):&nbsp;</span>
                                        @foreach ($cart[0]->colorProducts as $colorProduct)
                                            <label class="radio-inline"><input data-url="{{ route('cart.changeColor') }}" data-color="{{ $colorProduct->color_id }}" data-key="{{ $cart['session_id'] }}" class="color-option" type="radio" name="{{ $cart['session_id'] }}" value="{{ $colorProduct->id }}" @if($colorProduct->color_id == $cart['color_id']) checked @endif>{{ $colorProduct->color->name }}</label>
                                        @endforeach
                                    </td>
                                    <td class="cart_price">
                                        <p class="product-price">{{ $cart[0]->last_price }}<span>&nbsp;@lang('label.vnd')</span></p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <input data-lp="{{ $cart[0]->last_price }}" data-url="{{ route('cart.changeQuantity') }}" data-key="{{ $cart['session_id'] }}" class="cart_quantity_input" type="number" min="1" step="1" name="quantity" value="{{ $cart['quantity'] }}">
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">{{ $cart['total'] }}</p>
                                    </td>
                                    <td class="cart_delete">
                                        <a data-url="{{ route('cart.remove') }}" class="cart_quantity_delete" id="{{ $cart['session_id'] }}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <div class="box-cart">
                        <label for="">@lang('label.total'): <span></span></label>
                        <a href="{{ route('order-address.index') }}" class="btn btn-primary btn-block btn-sm">@lang('label.order')</a>
                    </div>
                </div>
            @else
                <div class="no-product-in-cart">
                    <h4>@lang('label.no_product_in_cart')</h4>
                </div>
            @endif
        </div>
    </section>

@endsection
@section('javascript')
    {{ Html::script('js/custom/ajax-setup.js') }}
    {{ Html::script('js/custom/shopping-cart.js') }}
@endsection
