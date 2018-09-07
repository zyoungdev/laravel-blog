<!-- Search engines -->
<meta name="description" content="{{ $article->meta_desc }}" />
<!-- Google Plus -->
<meta itemprop="name" content="{{ $article->title }}">
<meta itemprop="description" content="{{ $article->meta_desc }}">
<meta itemprop="image" content="{{ 'https://' . $_SERVER['SERVER_NAME'] . $thumbnail->folder . '/' . $thumbnail->filename }}">
<!-- Twitter -->
<meta name="twitter:card" content="{{ $article->meta_desc }}">
<meta name="twitter:site" content="{{ url()->current() }}">
<meta name="twitter:title" content="{{ $article->title }}">
<meta name="twitter:description" content="{{ $article->meta_desc }}">
<meta name="twitter:creator" content="">
<meta name="twitter:image:src" content="{{ 'https://' . $_SERVER['SERVER_NAME'] . $thumbnail->folder . '/' . $thumbnail->filename }}">
<meta name="twitter:player" content="">
<!-- Open Graph General (Facebook & Pinterest) -->
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $article->title }}">
<meta property="og:description" content="{{ $article->meta_desc }}">
<meta property="og:site_name" content="zerovector">
<meta property="og:image" content="{{ 'https://' . $_SERVER['SERVER_NAME'] . $thumbnail->folder . '/' . $thumbnail->filename }}">
<meta property="fb:admins" content="">
<meta property="fb:app_id" content="">
<meta property="og:type" content="Article">
<meta property="og:locale" content="en_US">
<meta property="og:audio" content="">
<meta property="og:video" content="">
