<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
@yield('title')
@yield('meta_desc')
@yield('keywords')
<meta name="author" content="Zachary Young">

<!-- Optimized mobile viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes"/>
<meta name="apple-mobile-web-app-capable" content="yes" />

@include('home.partials.favicon')

<link href="/res/css/main.css" rel="stylesheet">
@yield('css')

</head>
<body>

@yield("header")

@yield("content")

@yield("footer")

@yield('scripts')

</body>
</html>
