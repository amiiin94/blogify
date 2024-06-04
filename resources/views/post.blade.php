@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <article class="mb-3">
                    <h1>{{ $post->title }}</h1>
                    <p>
                        By <a href="/authors/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a>
                        in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
                    </p>
                    @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3" alt="{{ $post->title }}">
                    </div>
                    @else
                    <img src="/images/test.png" class="card-img-top mt-3" alt="{{ $post->title }}">
                    @endif
                    <div class="my-3 fs-5">
                        {!! $post->body !!}
                    </div>
                </article>
                <a href="/posts" class="d-block mt-3">Back to Posts</a>
            </div>
        </div>
    </div>
@endsection
