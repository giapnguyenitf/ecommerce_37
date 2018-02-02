@extends('auth.master')
@section('content')
<div class="container">
    <div class="row">
        <h2 style="text-align:center;"><a href="{{ route('home') }}">@lang('label.u_stora')</a></h2>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="form-body">
                <ul class="nav nav-tabs final-login">
                    <li class="active">
                        <a  href="{{ route('login') }}">@lang('label.sign_in')</a>
                    </li>
                    <li>
                        <a  href="{{ route('register') }}">@lang('label.register')</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="sectionA" class="tab-pane fade in active">
                        <div class="innter-form">
                            {{ Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'sa-innate-form']) }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {{ Form::label('email', trans('label.email_address')) }}
                                    {{ Form::email('email', null, ['class' => 'input']) }}
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                   
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    {{ Form::label('password', trans('label.password')) }}
                                    {{ Form::password('password', null, ['class' => 'input']) }}
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                        <div class="row">
                                        <div class="col-md-6">
                                            {{ Form::submit(trans('label.sign_in')) }}
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('password.request') }}">@lang('label.forgot_password')</a>
                                        </div>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                        <div class="social-login">
                            <p>- - - - - - - - - - - - - @lang('label.sign_in_with') - - - - - - - - - - - - - </p>
                            <ul>
                                <li><a href="{{ url('auth/facebook') }}"><i class="fa fa-facebook"></i> @lang('label.facebook')</a></li>
                                <li><a href="{{ url('auth/google') }}"><i class="fa fa-google-plus"></i> @lang('label.google')</a></li>
                                <li><a href="{{ url('auth/twitter') }}"><i class="fa fa-twitter"></i> @lang('label.twitter')</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="sectionB" class="tab-pane fade">
                        <div class="innter-form">
                            {{ Form::open(['route' => 'register', 'method' => 'POST', 'class' => 'sa-innate-form']) }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {{ Form::label('name', trans('label.name')) }}
                                    {{ Form::text('name', old('name')) }}
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {{ Form::label('email', trans('label.email_address')) }}
                                    {{ Form::email('email', old('email'), ['class' => 'input']) }}
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    {{ Form::label('password', trans('label.password')) }}
                                    {{ Form::password('password', null, ['class' => 'input']) }}
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('password_confirmation', trans('label.confirm_password')) }}
                                    {{ Form::password('password_confirmation', null, ['class' => 'input']) }}
                                    {{ Form::submit(trans('label.register'), ['class' => 'input']) }}
                                </div>
                            {{ Form::close() }}
                        </div>
                        <div class="social-login">
                            <p>- - - - - - - - - - - - - @lang('label.sign_in_with') - - - - - - - - - - - - - </p>
                            <ul>
                                <li><a href=""><i class="fa fa-facebook"></i> @lang('label.facebook')</a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i> @lang('label.google')</a></li>
                                <li><a href=""><i class="fa fa-twitter"></i> @lang('label.twitter')</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
