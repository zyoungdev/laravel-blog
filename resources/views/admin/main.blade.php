<!DOCTYPE html>
<html>
<head>
<title>Admin - zerovector</title>
<meta charset="utf-8">
<meta name="description" content="place your description here" />
<meta name="author" content="Zachary Young">
<meta name="keywords" content="Your keywords" />

<!-- Optimized mobile viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes"/>
<meta name="apple-mobile-web-app-capable" content="yes" />

@include('home.partials.favicon')

<link href="/res/css/vendor/all.css" rel="stylesheet">
<style>
    #body { font-family: monospace; }
</style>
@yield('css')

</head>
<body>
@include('admin.partials.errors')

@include ('admin.partials.navbar')

@yield("header")

@yield("content")

@yield("footer")

<script src="/res/js/vendor/all.js"></script>
@yield('scripts')


</body>
</html>
