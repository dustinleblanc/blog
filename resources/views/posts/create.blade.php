@extends('app')

@section('content')
    <h1>Create a New Post</h1>

    <hr/>

    @include('errors.list')

    {!! Form::open(['url' => 'posts']) !!}
        @include('partials._postForm')
    {!! Form::close() !!}


@endsection
