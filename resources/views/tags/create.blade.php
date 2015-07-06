@extends('app)

@section('content')
    <h1 class="page-title">Create Tag</h1>
    <hr/>
    @include('errors.list')
    {!! Form::open([ url(['url' => 'tags']) !!}
        @include('partials._tagForm')
    {!! Form::close() !!}

@endsection
