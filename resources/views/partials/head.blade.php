<!DOCTYPE HTML>
<html>
<head>
    <title>Dance-Club | @yield("title")</title>
    <link rel="icon" href="{{asset("/images/icon.ico")}}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="Askovic Damnjan 174.17"/>
    <meta name="language" content="English"/>
    <link rel="stylesheet" href="{{ asset("/css/style.css") }}" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='//fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
    @section("javascript")
    <script src=" {{ asset("/js/modernizr.min.js") }}"></script>
    <script src="{{ asset("/js/jquery-1.7.2.min.js") }} "></script>
        @show
</head>
