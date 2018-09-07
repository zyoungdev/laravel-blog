<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('uri', 'URI') !!}
    {!! Form::text('uri', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('meta_desc', 'Meta Description') !!}
    {!! Form::text('meta_desc', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('keywords', 'Keywords') !!}
    {!! Form::text('keywords', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at', 'Published At') !!}
    {!! Form::date('published_at', $date, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('thumbnail_image', 'Article Thumbnail Image') !!}
    {!! Form::select('thumbnail_image', $images['thumbnail'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('header_image', 'Article Header Image') !!}
    {!! Form::select('header_image', $images['header'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tag_list', 'Tags') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>
