<h1>@lang('label.mail.hi')&nbsp;{{ $user_name }}</h1>
<div class="notifications">
    <p>@lang('label.mail.order_success')</p>
</div>
<div>
    <p>@lang('label.mail.order_info')</p>
</div>
<div class="table">
    <table class="table table-bordered">
        <thead>
            <th>@lang('label.product')</th>
            <th>@lang('label.price')</th>
            <th>@lang('label.quantity')</th>
            <th>@lang('label.discount')</th>
            <th>@lang('label.total')</th>
        </thead>
        <tbody>
        @foreach ($order_details as $order_detail)
            <tr>
                <td>{{ $order_detail->product->name }}</td>
                <td>{{ $order_detail->product->price }}</td>
                <td>{{ $order_detail->quantity }}</td>
                <td>{{ $order_detail->product->discount*100 }}&nbsp;&#37;</td>
                <td>{{ $order_detail->total_money }}</td>
            </tr>
        @endforeach
        <tr>
            <td>@lang('label.mail.total_money_in_order'){{ $order->total_money }}&nbsp;@lang('label.vnd')</td>
        </tr>
        </tbody>
    </table>
</div>
<div>
    <p>@lang('label.mail.more_info')</p>
    <p><a href="{{ route('home') }}">@lang('label.mail.u-stora')</a></p>
</div>
