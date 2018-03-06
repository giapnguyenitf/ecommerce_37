@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="panel panel-primary delivery-address-box">
            <div class="panel-heading">
                <h4>@lang('label.choose_payment_method')</h4>
            </div>
            <div class="panel-body">
                {{ Form::open(['route' => 'order-payment.store', 'method' => 'POST']) }}
                    <p>
                        @foreach ($payments as $payment)
                            <label class="radio-inline">
                                {{ Form::radio('payment_method', $payment->id, $payment->id == 1 ? true : false) }}
                                {{ $payment->name }}
                            </label>
                            <br>
                        @endforeach
                    </p>
                    <div class="explain-payment">
                        <span>@lang('label.cod')</span>
                        <br>
                        <span>@lang('label.e-banking')</span>
                    </div>
                    <br>
                    {{ Form::submit(trans('label.order', ['class' => 'btn btn-primary'])) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
