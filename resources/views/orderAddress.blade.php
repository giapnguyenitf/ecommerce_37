@extends('layouts.master')
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
        <div class="panel panel-primary delivery-address-box">
            <div class="panel-heading">
                <h4>@lang('label.delivery_address')</h4>
            </div>
            <div class="panel-body">
                <div class="account-info">
                    {{ Form::open(['route' => ['order-address.update', 'id' => Auth::user()->id], 'method' => 'PUT', ]) }}
                        <div class=" row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            @include('layouts.notifications')
                            {{ Form::label('name', trans('label.full_name'), ['class' => 'col-md-2']) }}
                            <div class="col-md-6">
                                {{ Form::text('name', Auth::user()->name, ['class' => 'form-control']) }}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                            {{ Form::label('email', trans('label.email'), ['class' => 'col-md-2']) }}
                            <div class="col-md-6">
                                {{ Form::email('email', Auth::user()->email, ['class' => 'form-control']) }}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group{{ $errors->has('address') ? 'has-error' : '' }}">
                            {{ Form::label('address', trans('label.address'), ['class' => 'col-md-2']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('address', Auth::user()->address, ['class' => 'form-control', 'rows' => 5,]) }}
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                            {{ Form::label('phone', trans('label.phone'), ['class' => 'col-md-2']) }}
                            <div class="col-md-6">
                                {{ Form::text('phone', Auth::user()->phone, ['class' => 'form-control']) }}
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            {{ Form::label('gender', trans('label.gender'), ['class' => 'col-md-2']) }}
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label class="radio-inline"><input @if(Auth::user()->gender) checked="" @endif class="radio-inline"  type="radio" name="gender" value="male">@lang('label.male')</label>
                                    <label class="radio-inline"><input @if(!Auth::user()->gender) checked="" @endif class="radio-inline"  type="radio" name="gender" value="female">@lang('label.female')</label>
                                </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                {{ Form::submit(trans('label.delivery_to_address'), ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
