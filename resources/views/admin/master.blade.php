<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>@lang('label.dashboard')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{ Html::style('css/app.css') }}
        {{ Html::style('css/admin/demo.css') }}
        {{ Html::style('css/admin/main.css') }}
        {{ Html::style('https://cdn.linearicons.com/free/1.0.0/icon-font.min.css') }}
        @yield('css')
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="brand admin-logo">
                    <a href="">
                        <img src="{{ asset('images/logo.png') }}" alt="@lang('label.logo')" class="img-responsive logo">
                    </a>
                </div>
                <div class="container-fluid">
                    <div class="navbar-btn">
                        <button type="button" class="btn-toggle-fullwidth">
                            <i class="lnr lnr-arrow-left-circle"></i>
                        </button>
                    </div>
                    {{ Form::open(['route' => 'login', 'method' => 'GET', 'role' => 'search', 'class' => 'navbar-form navbar-left']) }}
                        <div class="input-group">
                            {{ Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' => trans('label.search_dashboard'), ]) }}
                            <span class="input-group-btn">
                                {{ Form::button(trans('label.go'), ['class' => 'btn btn-primary', 'type' => 'submit']) }}
                            </span>
                        </div>
                    {{ Form::close() }}
                    <div class="navbar-btn navbar-btn-right">
                    </div>
                    <div id="navbar-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown"><i class="lnr lnr-alarm"></i><span class="badge bg-danger">5</span></a>
                                <ul class="dropdown-menu notifications">
                                    <li>
                                        <a href="#" class="notification-item"><span class="dot bg-warning"></span></a>
                                    </li>
                                    <li>
                                        <a href="#" class="notification-item"><span class="dot bg-danger"></span></a>
                                    </li>
                                    <li>
                                        <a href="#" class="notification-item"><span class="dot bg-success"></span></a>
                                    </li>
                                    <li>
                                        <a href="#" class="notification-item"><span class="dot bg-warning"></span></a>
                                    </li>
                                    <li>
                                        <a href="#" class="notification-item"><span class="dot bg-success"></span></a>
                                    </li>
                                    <li><a href="#" class="more">@lang('label.see_all')</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i><span>@lang('label.help')</span><i class="icon-submenu lnr lnr-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">@lang('label.basic_use')</a>
                                    </li>
                                    <li>
                                        <a href="#">@lang('label.working_with_data')</a>
                                    </li>
                                    <li>
                                        <a href="#">@lang('label.security')</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="" class="img-circle" alt="@lang('label.avatar')">
                                    <span>{{ Auth::user()->name }}</span>
                                    <i class="icon-submenu lnr lnr-chevron-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#"><i class="lnr lnr-user"></i><span>@lang('label.my_profile')</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="lnr lnr-envelope"></i><span>@lang('label.messages')</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="lnr lnr-cog"></i><span>@lang('label.settings')</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="lnr lnr-exit"></i><span>@lang('label.logout')</span></a>
                                    </li>
                                    {{ Form::open(['route' => 'logout', 'method' => 'POST', 'id' => 'logout-form']) }}
                                    {{ Form::close() }}
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="sidebar-nav" class="sidebar">
                <div class="sidebar-scroll">
                    <nav>
                        <ul class="nav">
                            <li>
                                <a href="" class=""><i class="lnr lnr-home"></i><span>@lang('label.dashboard')</span></a>
                            </li>
                            <li>
                                <a href="" class=""><i class="lnr lnr-alarm"></i><span>@lang('label.notifications')</span></a>
                            </li>
                            <li>
                                <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i><span>@lang('label.products')</span>&nbsp;<i class="fa fa-chevron-right"></i></a>
                                <div id="subPages" class="collapse ">
                                    <ul class="nav">
                                        <li><a href="{{ route('manage-product.index') }}" class="">@lang('label.list_products')</a></li>
                                        <li>
                                            <a href="" class="">@lang('label.add_products')</a>
                                        </li>
                                        <li>
                                            <a href="" class=""></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="main">
                <div class="main-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <footer>
                <div class="container-fluid">
                    <p class="copyright">&copy; @lang('label.copyright')</p>
                </div>
            </footer>
        </div>
        {{ Html::script('js/app.js') }}
        {{ Html::script('js/custom/klorofil-common.js') }}
        {{ Html::script('js/custom/jquery.slimscroll.js') }}
        {{ Html::script('https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js') }}
        @yield('javascript')
    </body>
</html>
