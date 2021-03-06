<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('/theme/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="{{ asset('/js/jquery/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('/js/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('/js/jquery/ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('/js/jquery/jquery.nicescroll.min.js') }}"></script>
    <link href="{{ asset('/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('/js/bootstrap/moment-with-locales.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap/bootstrap-datetimepicker.js')}}"></script>
    <title>{{get_setting('site_title')}}</title>
    <meta name="description" content="{{get_setting('site_description')}}" />
    <meta name="keywords" content="{{get_setting('site_tags')}}" />
</head>
<body>
<div class="fb-like" data-share="true" data-width="450" data-show-faces="true"></div>
<div id="load_screen">
    <div></div>
</div>
<div id="token" style="display:none;">{{csrf_token()}}</div>
@include('theme.pages.main.radioPlayer')
<div class="wrapper">
    @include('theme.pages.main.header')
    @include('theme.modules.menu')
    <!-- CONTAINER -->
    <div class="container">