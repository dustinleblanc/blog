@extends('app')

@section('content')
    <article>
        <h1>{{ $title }}</h1>
        {{ $content }}
    </article>
@endsection
