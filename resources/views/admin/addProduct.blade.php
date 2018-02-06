@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">@lang('label.add_one_products')</h3>
                    <div class="right">
                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row form-group">
                        @include('layouts.notifications')
                        {{ Form::open(['route' => 'manage-product.store', 'files' => true, 'enctype' => 'multipart/form-data', 'method' => 'POST']) }}
                            {{ Form::label('category', trans('label.category'), ['class' => 'col-md-2']) }}
                            <div class="col-md-5">
                                {{ Form::select('parent_id', $categories, old('parent_id'), ['class' => 'form-control', 'id' => 'parent_id', 'data-url' => route('getCategories')]) }}
                            </div>
                            <div class="col-md-4">
                                {{ Form::select('category_id', [], old('category_id'), ['class' => 'form-control', 'id' => 'sub_category_id']) }}
                            </div>
                            </div>
                            <div class="row form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                                {{ Form::label('name', trans('label.name'), ['class' => 'col-md-2']) }}
                                <div class="col-md-9">
                                    {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('description') ? 'has-error' : '' }}">
                                {{ Form::label('description', trans('label.description'), ['class' => 'col-md-2']) }}
                                <div class="col-md-9">
                                    {{ Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => 5, ]) }}
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('price') ? 'has-error' : '' }}">
                                {{ Form::label('price', trans('label.price'), ['class' => 'col-md-2']) }}
                                <div class="col-md-9">
                                    {{ Form::text('price', old('price'), ['class' => 'form-control']) }}
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('discount') ? 'has-error' : '' }}">
                                {{ Form::label('discount', trans('label.discount'), ['class' => 'col-md-2']) }}
                                <div class="col-md-9">
                                    {{ Form::text('discount', old('discount'), ['class' => 'form-control']) }}
                                    @if ($errors->has('discount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('discount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('images', trans('label.thumbnail'), ['class' => 'col-md-2']) }}
                                <div class="col-md-6">
                                    {{ Form::file('thumbnail', ['class' => 'form-control', 'id' => 'files']) }}
                                    @if ($errors->has('thumbnail'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('thumbnail') }}</strong>
                                        </span>
                                    @endif
                                    <output id="result" />
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('brand', trans('label.brand'), ['class' => 'col-md-2']) }}
                                <div class="col-md-6">
                                    {{ Form::select('brand_id', $brands, old('brand_id'), ['class' => 'form-control', 'id' => 'brand_id']) }}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2"></div>
                                <div class="col-md-6">
                                    {{ Form::submit(trans('label.add_product'), ['class' => 'btn btn-primary'])}}
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-10">
            <div class="row panel">
                <div class="panel-heading">
                    <h3 class="panel-title">@lang('label.add_multi_products')</h3>
                    <div class="right">
                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    {{ Form::open(['route' => 'login', 'files' => true, 'enctype' => 'multipart/form-data', 'method' => 'POST', ]) }}
                        <div class="form-group">
                            {{ Form::label('products', trans('label.choose_file')) }}
                            {{ Form::file('products') }}
                        </div>
                        <div class="form-group">
                            {{ Form::submit(trans('label.import'), ['class' => 'btn btn-primary', 'id' => 'btn-import']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    {{ Html::script('js/custom/ajax-setup.js') }}
    {{ Html::script('js/custom/add-product.js') }}
@endsection
