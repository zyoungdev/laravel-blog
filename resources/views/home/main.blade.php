<!DOCTYPE html>
<html class="home-page">
<head>
<title>Zero Vector - Code, Music, Linux</title>
<meta charset="utf-8">
<meta name="description" content="Zachary Young writes code, plays guitar, and enjoys Linux" />
<meta name="author" content="Zachary Young">
<meta name="keywords" content="Your keywords" />

<!-- Optimized mobile viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes"/>
<meta name="apple-mobile-web-app-capable" content="yes" />

@include('home.partials.favicon')

<link href="/res/css/main.css" rel="stylesheet">
</head>
<body>

@yield("header")

@yield("content")

@yield("footer")

@yield("scripts")

</body>
</html>
