<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content', 'Teaser:') !!}
    {!! Form::textarea('teaser', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at', 'Publish On:') !!}
    {!! Form::input('date','published_at', Date('Y-m-d'), ['class' => 'form-control']) !!}

</div>
<div class="form-group">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
</div>
