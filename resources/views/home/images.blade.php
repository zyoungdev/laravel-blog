@extends('home.main')

@section('content')
    <div class="content">
        <div class="attr-title">
            <h1>Image Attribution</h1>
        </div>
        <div class="attr-list">
            @foreach ($images as $image)
                <div class="attr-list-image">
                    <div class="attr-image-container">
                        <img src="{{ $image->folder . '/' . $image->filename }}" alt="{{ $image->alt }}">
                    </div>
                    <div class="attr-list-image-details">
                        <h2>{{ $image->title }}</h2>
                        <h3>
                            <a href="{{ $image->attr_link }}">
                                {{ $image->attr }}
                            </a>
                        </h3>
                        <h3>
                            <a href="{{ $image->license_link }}">
                                {{ $image->license }}
                            </a>
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection