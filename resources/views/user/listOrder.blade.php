@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row profile-section">
            @include('user.sidebar')
            <div class="col-md-9">
                @include('layouts.notifications')
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">@lang('label.order_id')</td>
                            <td class="name">@lang('label.order_date')</td>
                            <td class="price">@lang('label.product')</td>
                            <td class="quantity">@lang('label.quantity')</td>
                            <td class="total">@lang('label.total')</td>
                            <td class="status">@lang('label.status')</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order )
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at->format('m/d/Y') }}</td>
                                <td>{{ $order->product->name  }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->product->last_price * $order->quantity }}</td>
                                <td>{{ $order->order->status_detail }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="paginate">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
