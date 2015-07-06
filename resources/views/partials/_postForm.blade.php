<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<ul class="nav nav-pills" role="tablist">
    <li class="active">
        <a href="#content" aria-controls="content" data-toggle="tab">
            Content
        </a>
    </li>
    <li role="presentation">
        <a href="#teaser" aria-controls="teaser" data-toggle="tab">
            Teaser
        </a>
    </li>
</ul>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane form-group active" id="content">
        {!! Form::label('content', 'Content') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
    <div role="tabpanel" class="tab-pane form-group" id="teaser">
        {!! Form::label('content', 'Teaser') !!}
        {!! Form::textarea('teaser', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('published_at', 'Publish On') !!}
    {!! Form::input('date','published_at', Date('Y-m-d'), ['class' => 'form-control']) !!}

</div>
<div class="form-group">
    {!! Form::label('tag_list', 'Tags') !!}
    {!! Form::select('tag_list[]', $tags, null, ['class' => 'form-control', 'multiple']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
</div>
