@extends('admin.main')

@section('content')
    <div class="container">
        <img src="/res/fileUploads/images/{{ $image->filename }}" alt="{{ $image->alt }}" class="img-responsive center-block">
    </div>
@endsection