@extends('app')

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>
        <p>Written by {{ $post->user->name }} on {{ $post->published_at }}</p>
        <div class="post--content">
            {{ $post->content }}
        </div>
        @unless($post->tags->isEmpty())
        <ul>
            @foreach($post->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
        @endunless
    </article>
@endsection
