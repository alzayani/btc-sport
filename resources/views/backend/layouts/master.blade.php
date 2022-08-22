<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Bahrain Tennis Club" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="MSZ Solutions" name="author">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('backend.layouts.head')
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="wrapper">
    @include('backend.layouts.header')
    <div class="page-wrap">
        @include('backend.layouts.sidebar')
        @yield('content')
        @include('backend.layouts.footer')
    </div>
</div>
@include('backend.layouts.footer-scripts')
</body>
</html>
