@extends('admin.main')

@section('css')
@endsection

@section('content')
    <div class="container">
        {!! Form::model($image, ['url' => '/admin/images', 'files' => true]) !!}
            @include('admin.images.partials.createEdit')
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
@endsection