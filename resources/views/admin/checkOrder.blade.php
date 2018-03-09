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
                        @foreach ($order->orderDetails as $order_detail)
                            <tr>
                                <td>{{ $order_detail->id }}</td>
                                <td>{{ $order_detail->order->user->name }}</td>
                                <td>{{ $order_detail->product->name }}</td>
                                <td>{{ $order_detail->color->name }}</td>
                                <td>{{ $order_detail->quantity }}</td>
                                <td>{{ $order_detail->created_at->format('m/d/Y') }}</td>
                                <td>{{ $order_detail->total_money }}</td>
                                <td>
                                    @switch ($order_detail->status)
                                        @case (config('setting.waiting_for_process'))
                                            <span class="label label-primary">{{ $order_detail->status_detail }}</span>
                                            @break
                                        @case (config('setting.delivering'))
                                            <span class="label label-info">{{ $order_detail->status_detail }}</span>
                                            @break
                                        @case (config('setting.done'))
                                            <span class="label label-success">{{ $order_detail->status_detail }}</span>
                                            @break
                                        @case (config('setting.cancel'))
                                            <span class="label label-danger">{{ $order_detail->status_detail }}</span>
                                            @break
                                    @endswitch
                                </td>
                                <td>
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <a class="btn btn-success btn-sm" href="{{ route('order-detail.delivering', $order_detail->id) }}"><span class="lnr lnr-car"></span></a>
                                        </div>
                                        <div class="form-group">
                                            <a class="btn btn-warning btn-sm" href="{{ route('order-detail.cancel', $order_detail->id) }}"><i class="fa fa-times-circle"></i></a>
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
