@extends('layouts.main')

@section('container')
    @foreach ($posts as $post)
        <article class="mb-3">
            <h2>
                <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
            </h2>
            <p>By <a href="/author/{{ $post->user->username }}">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
            <p>{{ $post->excerpt }}</p>
        </article>
    @endforeache
@endsection
