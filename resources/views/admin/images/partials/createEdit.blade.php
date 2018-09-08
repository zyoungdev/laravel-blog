{!! Form::hidden('id', null, ['readonly']) !!}

<div class="form-group">
  {!! Form::label('title', 'Title') !!}
  {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('alt', 'Alt') !!}
  {!! Form::text('alt', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('attr', 'Attribute Text') !!}
  {!! Form::text('attr', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('attr_link', 'Attribute Link') !!}
  {!! Form::text('attr_link', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('license', 'License') !!}
  {!! Form::text('license', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('license_link', 'License Link') !!}
  {!! Form::text('license_link', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('image_use_type', 'Image Type') !!}
  {!! Form::select('image_use_type', ['header' => 'Header', 'thumbnail' => 'Thumbnail', 'general' => 'General Purpose'], null, ['class' => 'form-control']) !!}
</div>

@if ($creating)
  <div class="form-group">
    {!! Form::label('file', 'File') !!}
    {!! Form::file('file') !!}
  </div>
@endif

<hr>

<div class="form-group">
  {!! Form::submit('Submit', ['class' => 'btn btn-default form-control']) !!}
</div>
