@extends('admin.main')

@section('css')
@endsection

@section('content')
    <div class="container">
        {!! Form::model($image, ['method' => 'PATCH', 'action' => ['AdminImagesController@update', $image->filename], 'files' => true]) !!}
            @include('admin.images.partials.createEdit')
        {!! Form::close() !!}

        {!! Form::open(['method' => 'DELETE', 'url' => "/admin/images/$image->filename", 'onSubmit' => 'return deleteImage()']) !!}
            <div class="form-group">
                {!! Form::submit('Delete Image', ['class' => 'btn btn-danger form-control']) !!}
            </div>
        {!! Form::close() !!}
        <img src="{{ $image->folder . '/' . $image->filename }}" alt="{{ $image->alt }}" class="center-block img-rounded img-responsive">
    </div> 
@endsection

@section('scripts')
    <script>
        function deleteImage() {
            return window.confirm("Are you sure you want to delete\n{{ $image->title }}");
        }
    </script>
@endsection