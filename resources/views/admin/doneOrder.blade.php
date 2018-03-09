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
                        @foreach ($doneOrders as $doneOrder)
                            <tr>
                                <td>{{ $doneOrder->id }}</td>
                                <td>{{ $doneOrder->order->user->name }}</td>
                                <td>{{ $doneOrder->product->name }}</td>
                                <td>{{ $doneOrder->color->name }}</td>
                                <td>{{ $doneOrder->quantity }}</td>
                                <td>{{ $doneOrder->created_at->format('m/d/Y') }}</td>
                                <td>{{ $doneOrder->total_money }}</td>
                                <td>
                                    <span class="label label-success">{{ $doneOrder->status_detail }}</span>
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
