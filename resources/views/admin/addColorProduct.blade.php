@extends('admin.master')
@section('content')
    <div class="row panel">
        <div class="panel-heading">
            <h3 class="panel-title">@lang('label.add_color_products')</h3>
            <div class="right">
                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
            </div>
        </div>
        <div class="panel-body">
            @include('layouts.notifications')
            {{ Form::open(['route' => 'update-detail.store', 'files' => true, 'enctype' => 'multipart/form-data', 'method' => 'POST', ]) }}
                {{ Form::hidden('product_id', $product->id) }}
                <div class="form-group">
                    <div class="row">
                        {{ Form::label('name', trans('label.name'), ['class' => 'col-md-3']) }}
                        <div class="col-md-6">
                            {{ Form::text('name', $product->name, ['class' => 'form-control', 'disabled']) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        {{ Form::label('colors', trans('label.colors'), ['class' => 'col-md-3']) }}
                        <div class="col-md-4">
                            {{ Form::select('color_id', $colors, old('color_id'), ['class' => 'form-control', 'id' => 'color_id']) }}
                            @if ($errors->has('color_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('color_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        {{ Form::label('number', trans('label.number'), ['class' => 'col-md-3']) }}
                        <div class="col-md-4">
                            {{ Form::text('number', null, ['class' => 'form-control', ]) }}
                            @if ($errors->has('number'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('number') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        {{ Form::label('images', trans('label.images'), ['class' => 'col-md-3']) }}
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::file('images[]', ['class' => 'form-control', 'id' => 'files', 'multiple' => true]) }}
                            </div>
                            @if ($errors->has('images'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('images') }}</strong>
                                </span>
                            @endif
                            <output id="result" />
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary" type="button" id="clear">@lang('label.clear')</button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            {{ Form::submit(trans('label.save'), ['class' => 'btn btn-primary']) }}
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
@section('javascript')
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.js') }}
    {{ Html::script('js/custom/add-color-product.js') }}
@endsection
