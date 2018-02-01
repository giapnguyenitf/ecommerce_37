<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@lang('label.u_stora')</title>
    {{ Html::style('css/app.css') }}
    {{ Html::style('css/login.css') }}
    @yield('css')
</head>
<body>
    @yield('content')
    @yield('javascript')
    {{ Html::script('js/app.js') }}
</body>
</html>
