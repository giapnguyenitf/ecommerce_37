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
                        {{ Form::open(['route' => 'login', 'method' => 'POST']) }}
                            {{ Form::label('category', trans('label.category'), ['class' => 'col-md-2']) }}
                            <div class="col-md-5">
                                <select class="form-control" name="parent_id" id="">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                {{ Form::select('subcategory', [], old('category'), ['class' => 'form-control']) }}
                            </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('name', trans('label.name'), ['class' => 'col-md-2']) }}
                                <div class="col-md-9">
                                    {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('description', trans('label.description'), ['class' => 'col-md-2']) }}
                                <div class="col-md-9">
                                    {{ Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => 5, ]) }}
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('price', trans('label.price'), ['class' => 'col-md-2']) }}
                                <div class="col-md-9">
                                    {{ Form::text('price', old('price'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('discount', trans('label.discount'), ['class' => 'col-md-2']) }}
                                <div class="col-md-9">
                                    {{ Form::text('discount', old('discount'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('brand', trans('label.brand'), ['class' => 'col-md-2']) }}
                                <div class="col-md-6">
                                    <select name="brand_id" id="" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
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
