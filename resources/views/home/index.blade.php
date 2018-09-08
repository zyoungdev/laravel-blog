@extends('home.main')

@section('content')
  <div class="home-content">
    <a class="content-card" href="/blog">
      <?php $image_file = $images[0]->folder . '/' . $images[0]->filename ?>
      <div class="card-img" style="background-image: url({{ $image_file }})"></div>
      <p class="card-text">Read All</p>
    </a>


    @foreach($tags as $i => $tag)
    <?php $image_file = $images[($i + 1) % count($images)]->folder . '/' . $images[($i + 1) % count($images)]->filename ?>
      <a class="content-card" href="/blog/{{ $tag }}">
        <div class="card-img" style="background-image: url({{ $image_file  }})"></div>
        <p class="card-text">{{ $tag }}</p>
      </a>
    @endforeach
    @include('home.partials.imageAttr')
  </div>
@endsection
