@extends('admin.main')

@section('css')
@endsection

@section('content')
  <div class="container">
    {!! Form::open(['url' => '/admin/articles']) !!}
      @include('admin.blog.partials.create')
    {!! Form::close() !!}
  </div>
@endsection

@section('scripts')
  <script>
    $('#tag_list').select2({
      tags: true
    });
  </script>
@endsection
