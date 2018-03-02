<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@lang('label.u_stora')</title>
        {{ Html::style('css/app.css') }}
        {{ Html::style('css/style.css') }}
        {{ Html::style('css/responsive.css') }}
        {{ Html::style('css/owl.carousel.css') }}
        @yield('css')
    </head>
    <body>
        <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="user-menu">
                            <ul>
                                <li>
                                    <a href="">
                                    <i class="fa fa-user"></i> @lang('label.my_cart')</a>
                                </li>
                                <li>
                                    <a href="">
                                    <i class="fa fa-user"></i> @lang('label.checkout')</a>
                                </li>
                                @guest
                                    <li>
                                        <a href="{{ route('login') }}">
                                        <i class="fa fa-user"></i> @lang('label.login')</a>
                                    </li>
                                @else
                                    <li>
                                        <div class="dropdown">
                                            <a class="dropdown dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> @lang('label.my_account')&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                            <ul class="dropdown-menu">
                                                @if (Auth::user()->is_admin)
                                                    <li class="dropdown-item"><a href="{{ route('manage-product.index') }}"><i class="fa fa-university"></i> @lang('label.dashboard')</a></li>
                                                @endif
                                                <li class="dropdown-item">
                                                    <a href="{{ route('profile.index') }}"><i class="fa fa-user"></i> @lang('label.manage_account')</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href=""><i class="fa fa-shopping-bag"></i> @lang('label.my_orders')</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href=""><i class="fa fa-star"></i> @lang('label.my_ratings')</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> @lang('label.logout')</a>
                                                    {{ Form::open(['route' => 'logout', 'method' => 'POST', 'id' => 'logout-form']) }}
                                                    {{ Form::close() }}
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="header-right">
                            <ul class="list-unstyled list-inline">
                                <li class="dropdown dropdown-small">
                                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
                                    <span class="key">@lang('label.currency') :</span>
                                    <span class="value">@lang('label.VND') </span>
                                    <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">@lang('label.USD')</a>
                                        </li>
                                        <li>
                                            <a href="#">@lang('label.GBP')</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-small">
                                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
                                    <span class="key">@lang('label.language') :</span>
                                    <span class="value">@lang('label.english') </span>
                                    <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">@lang('label.english')</a>
                                        </li>
                                        <li>
                                            <a href="#">@lang('label.vietnamese')</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-branding-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="logo">
                                    <h1>
                                        <a href="{{ route('home') }}">
                                            <img src="{{ URL::asset('images/logo.png') }}">
                                        </a>
                                    </h1>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="search-form">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="" id="">
                                        <div class="input-group-addon">
                                            <i class="fa fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="shopping-item">
                            <a href="">@lang('label.cart') -
                                <span class="cart-amunt">#</span><i class="fa fa-shopping-cart"></i>
                                <span class="product-count">#</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End site branding area -->
        <div class="mainmenu-area">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="{{ route('home') }}">@lang('label.home')</a>
                            </li>
                            <li>
                                <a href="#">@lang('label.categories')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        <div class="footer-top-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-about-us">
                            <h2>@lang('label.u')
                                <span>@lang('label.stora')</span>
                            </h2>
                            <div class="footer-social">
                                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-menu">
                            <h2 class="footer-wid-title">@lang('label.user_navigation') </h2>
                            <ul>
                                <li>
                                    <a href="#">@lang('label.my_account')</a>
                                </li>
                                <li>
                                    <a href="#">@lang('label.order_history')</a>
                                </li>
                                <li>
                                    <a href="#">@lang('label.wishlist')</a>
                                </li>
                                <li>
                                    <a href="#">@lang('label.vendor_contact')</a>
                                </li>
                                <li>
                                    <a href="#">@lang('label.front_page')</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-menu">
                            <h2 class="footer-wid-title">@lang('label.categories')</h2>
                            <ul>
                                <li>
                                    <a href="#">@lang('label.mobile_phone')</a>
                                </li>
                                <li>
                                    <a href="#">@lang('label.home_accesseries')</a>
                                </li>
                                <li>
                                    <a href="#">@lang('label.led_tv')</a>
                                </li>
                                <li>
                                    <a href="#">@lang('label.computer')</a>
                                </li>
                                <li>
                                    <a href="#">@lang('label.gadets')</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-newsletter">
                            <h2 class="footer-wid-title">@lang('label.newsletter')</h2>
                            <p>@lang('label.news_letter_description')</p>
                            <div class="newsletter-form">
                                {{ Form::open(['url' => '/', 'method' => 'POST']) }}
                                    {{ Form::text('email', null, ['placeholder' => trans('label.type_your_email')]) }}
                                    {{ Form::submit(trans('label.subcribe')) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright">
                            <p>&copy; @lang('label.copy_right')
                                <a href="#" target="_blank"></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-card-icon">
                            <i class="fa fa-cc-discover"></i>
                            <i class="fa fa-cc-mastercard"></i>
                            <i class="fa fa-cc-paypal"></i>
                            <i class="fa fa-cc-visa"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('javascript')
        {{ Html::script('https://code.jquery.com/jquery.min.js') }}
        {{ Html::script('http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}
        {{ Html::script('js/custom/owl.carousel.min.js') }}
        {{ Html::script('js/custom/jquery.sticky.js') }}
        {{ Html::script('js/custom/jquery.easing.1.3.min.js') }}
        {{ Html::script('js/custom/main.js') }}
        {{ Html::script('js/custom/bxslider.min.js') }}
        {{ Html::script('js/custom/script.slider.js') }}
    </body>
</html>
