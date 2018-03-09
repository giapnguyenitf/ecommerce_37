@extends('admin.master')
@section('css')
@endsection
@section('content')
    <h3 class="page-title">@lang('label.list_products')</h3>
    <div class="row">
    <div class="">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>
                @include('layouts.notifications')
            </div>
            <div class="panel-body">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">@lang('label.order_id')</td>
                            <td class="user">@lang('label.user_name')</td>
                            <td class="product">@lang('label.product')</td>
                            <td class="color">@lang('label.color')</td>
                            <td class="quantity">@lang('label.quantity')</td>
                            <td class="name">@lang('label.order_date')</td>
                            <td class="total">@lang('label.total')</td>
                            <td class="status">@lang('label.status')</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cancelledOrders as $cancelledOrder)
                            <tr>
                                <td>{{ $cancelledOrder->id }}</td>
                                <td>{{ $cancelledOrder->order->user->name }}</td>
                                <td>{{ $cancelledOrder->product->name }}</td>
                                <td>{{ $cancelledOrder->color->name }}</td>
                                <td>{{ $cancelledOrder->quantity }}</td>
                                <td>{{ $cancelledOrder->created_at->format('m/d/Y') }}</td>
                                <td>{{ $cancelledOrder->total_money }}</td>
                                <td>
                                    <span class="label label-danger">{{ $cancelledOrder->status_detail }}</span>
                                </td>
                                 <td>
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <a class="btn btn-success btn-sm" href="{{ route('order-detail.delivering', $cancelledOrder->id) }}"><span class="lnr lnr-car"></span></a>
                                        </div>
                                        <div class="form-group">
                                            <a class="btn btn-warning btn-sm" href="{{ route('order-detail.cancel', $cancelledOrder->id) }}"><i class="fa fa-times-circle"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END BASIC TABLE -->
    </div>
@endsection
@section('javascript')
@endsection
