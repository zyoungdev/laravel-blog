{!! Form::hidden('id', null, ['readonly']) !!}

<div id="form-details" class="collapse">
  <hr>

  @include('admin.blog.partials.details')
</div>

<hr>

<div class="form-group">
  {!! Form::label('body', 'Body') !!}
  @if ( ! $article->is_markdown )
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
  @else
    {!! Form::textarea('body', null, ['class' => 'form-control hljs']) !!}
  @endif
</div>

<div class="form-group">
  <div class="checkbox text-center">
    {!! Form::checkbox('is_public', true, null, ['id' => 'is_public']) !!}
    {!! Form::label('is_public', 'Make it public') !!}
  </div>
  <div class="checkbox text-center">
    {!! Form::checkbox('is_markdown', true, null, ['id' => 'is_markdown']) !!}
    {!! Form::label('is_markdown', 'Use Markdown') !!}
  </div>
</div>

<div class="form-group">
  {!! Form::submit('Submit', ['class' => 'btn btn-default form-control']) !!}
</div>

<div class="form-group">
  <a href="/admin/articles/{{ $article->uri }}" class="btn btn-default form-control" target="zerovector_admin_preview">
    Preview
  </a>
</div>

