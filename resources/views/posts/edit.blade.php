@extends('app')

@section('content')
    <h1>Edit: {!! $post->title !!}</h1>
    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['PostController@update', $post->id]]) !!}
        @include('partials._postForm')
    {!! Form::close() !!}
@endsection
