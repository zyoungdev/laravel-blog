{!! Form::hidden('id', null, ['readonly']) !!}

<div id="form-details" class="">
  <hr>

  @include('admin.blog.partials.details')
</div>

<hr>

<div class="form-group">
  {!! Form::label('body', 'Body') !!}
  {!! Form::textarea('body', null, ['class' => 'form-control hljs']) !!}
</div>

<div class="form-group">
  <div class="checkbox text-center">
    {!! Form::checkbox('is_public', 0, false, ['id' => 'is_public']) !!}
    {!! Form::label('is_public', 'Make it public') !!}
  </div>
  <div class="checkbox text-center">
    {!! Form::checkbox('is_markdown', 1, true, ['id' => 'is_markdown']) !!}
    {!! Form::label('is_markdown', 'Use Markdown') !!}
  </div>
</div>

<div class="form-group">
  {!! Form::submit('Submit', ['class' => 'btn btn-default form-control']) !!}
</div>
