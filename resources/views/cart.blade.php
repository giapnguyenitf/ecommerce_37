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
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="images/cart/one.png" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">Colorblock Scuba</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>$59</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href=""> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href=""> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">$59</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <div class="box-cart">
                    <label for="">@lang('label.total'): <span>100</span></label>
                    <button class="btn btn-primary btn-block btn-sm" type="submit">@lang('label.order')</button>
                </div>
            </div>
        </div>
    </section>

@endsection
