@extends('blog.main')

@section('meta_desc')
  @include('blog.partials.articleListMeta')
@endsection

@section('title')
  <title>Blog - Zero Vector</title>
@endsection

@section('content')
  @include('blog.partials.tagNav')
  <div class="article-list">
    <ul class="article-list-ul">
      @foreach ($articles as $article)
        <li class="article-list-item">
          <a class="article-list-thumbnail-anchor" href="/{{ $article->uri }}">
            <div class="article-list-thumbnail" style="background-image: url({{ $article->images->where('image_use_type', 'thumbnail')->first()->folder . '/' . $article->images->where('image_use_type', 'thumbnail')->first()->filename }});"> 
            </div>
          </a>
          <div class="article-list-details">
            <h2 class="article-list-title">
              <a href="/{{ $article->uri }}">
                {{ $article->title }}
              </a>
            </h2>
            <ul class="plain-tags-list reset">
              @foreach($article->tags as $tag)
                <li>
                  <a href="/blog/{{ $tag->name }}">
                    {{ $tag->name }}
                  </a>
                </li>
              @endforeach
            </ul>
            <p class="article-excerpt">
              {{ strip_tags(str_limit($article->body, 300)) }}
            </p>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
  <div class="pagination reset">
    @if (method_exists($articles, 'links'))
      {{ $articles->links() }}
    @endif
  </div>
  @include('home.partials.imageAttr')
@endsection
