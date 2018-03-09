@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">@lang('label.edit_user')</h3>
                    <div class="right">
                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row form-group">
                        {{ Form::open(['route' => ['manage-user.update', 'id' => $user->id], 'method' => 'PUT', ]) }}
                            <div class=" row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                @include('layouts.notifications')
                                {{ Form::label('name', trans('label.full_name'), ['class' => 'col-md-2']) }}
                                <div class="col-md-6">
                                    {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
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
                                    {{ Form::email('email', $user->email, ['class' => 'form-control']) }}
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
                                    {{ Form::textarea('address', $user->address, ['class' => 'form-control', 'rows' => 5,]) }}
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
                                    {{ Form::text('phone', $user->phone, ['class' => 'form-control']) }}
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
                            <div class="form-group">
                                    {{ Form::checkbox('is_admin', 1, true) }}<span>&nbsp;@lang('label.is_admin')</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    {{ Form::submit(trans('label.update'), ['class' => 'btn btn-primary']) }}
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

