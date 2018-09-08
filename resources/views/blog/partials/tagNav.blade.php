<div class="article-tags reset">
  <ul class="article-tags-list">
    <li>
      @if($activeTag == "All")
        <a href="/blog" class="active">
          All
        </a>
      @else
        <a href="/blog">
          All
        </a>
      @endif
    </li>
    @foreach($tags as $tag)
      <li>
        @if($activeTag == $tag)
          <a href="/blog/{{ $tag }}" class="active">
            {{ $tag }}
          </a>
        @else
          <a href="/blog/{{ $tag }}">
            {{ $tag }}
          </a>
        @endif
      </li>
    @endforeach
  </ul>
</div>
