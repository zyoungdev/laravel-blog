@extends('blog.main')

@section('css')
  <link rel="stylesheet" href="/res/css/vendor/highlightjs.css">
@endsection

@section('title')
  <title>{{ $article->title }} - Zero Vector</title>
@endsection

@section('meta_desc')
  @include('blog.partials.articleMeta')
@endsection

@section('keywords')
  <meta name="keywords" content="{{ $article->keywords }}" />
@endsection

@section('content')
  @include('blog.partials.tagNav')
    <div class="splash reset" style="background-image: url({{ $header->folder . '/' . $header->filename }});">
      <div class="splash-shade"></div>
      <div class="article-title">
        <h1>
          {{ $article->title }}
        </h1>
      </div>
      <div class="article-dates">
        <h4 class="article-date">
          Published 
          {{ $article->published_at->diffForHumans() }}
        </h4>
        <h4 class="article-date">
          Updated 
          {{ $article->updated_at->diffForHumans() }}
        </h4>
      </div>
    </div>
    <div class="article-tags reset">
      <ul class="article-tags-list">
        @foreach($article->tags as $tag)
          <li>
            <a href="/blog/{{ $tag->name }}">
              {{ $tag->name }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>
    <div class="article-body">
      {!! $article->body !!}
    </div>
  @include('home.partials.imageAttr')
@endsection

@section('scripts')
  <script src="/res/js/vendor/highlight.pack.min.js"></script>
  <script>
    hljs.initHighlightingOnLoad();
  </script>
@endsection
