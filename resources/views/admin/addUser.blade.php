@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">@lang('label.create_user')</h3>
                    <div class="right">
                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row form-group">
                        {{ Form::open(['route' => 'manage-user.store', 'method' => 'POST', 'class' => 'sa-innate-form']) }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {{ Form::label('name', trans('label.name')) }}
                                    {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {{ Form::label('email', trans('label.email_address')) }}
                                    {{ Form::email('email', old('email'), ['class' => 'form-control']) }}
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    {{ Form::label('password', trans('label.password')) }}
                                    {{ Form::password('password', ['class' => 'form-control']) }}
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('password_confirmation', trans('label.confirm_password')) }}
                                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                                </div>
                                <div class="form-group">
                                    {{ Form::checkbox('is_admin', 1, null) }}<span>&nbsp;@lang('label.is_admin')</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::submit(trans('label.register'), ['class' => 'btn btn-primary']) }}
                                </div>
                            {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
