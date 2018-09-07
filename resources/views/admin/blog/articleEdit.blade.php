@extends('admin.main')

@section('css')
@endsection

@section('content')
    <div class="container">
        <button data-toggle="collapse" data-target="#form-details" class="btn btn-info">Details</button>

        {!! Form::model($article, ['method' => 'PATCH', 'url' => "/admin/articles/$article->uri"]) !!}
            @include('admin.blog.partials.edit')
        {!! Form::close() !!}

        {!! Form::open(['method' => 'DELETE', 'url' => "/admin/articles/$article->uri", 'onSubmit' => 'return deleteArticle()']) !!}
            <div class="form-group">
                {!! Form::submit('Delete Article', ['class' => 'btn btn-danger form-control']) !!}
            </div>
        {!! Form::close() !!}
    </div> 
@endsection

@section('scripts')
    @if ( ! $article->is_markdown )
        @include('admin.blog.partials.tinymce')
    @endif
    <script>
        $('#tag_list').select2({
            tags: true,
            width: "100%"
        });

        function deleteArticle() {
            return window.confirm("Are you sure you want to delete\n{{ $article->title }}");
        }
    </script>
@endsection
