@extends('layouts.main')

@section('container')
    {{-- <h1 class="mb-5">{{ $title }}</h1> --}}

    @if ($posts->count())
        <!-- Highlighted Post -->
        <div class="card mb-3">
            @if ($posts[0]->image)
                <div style="max-height: 400px; overflow:hidden">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top mt-3"
                        alt="{{ $posts[0]->title }}">
                </div>
            @else
                <img src="/images/test.png" class="card-img-top" alt="{{ $posts[0]->title }}">
            @endif
            <div class="card-body text-center">
                <h3 class="card-title">
                    <a class="text-decoration-none text-dark" href="/blog/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a>
                </h3>
                <p>
                    <small class="text-body-secondary">
                        <a href="/authors/{{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a> in
                        <a class="text-decoration-none"
                            href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a class="text-decoration-none btn btn-primary" href="/posts/{{ $posts[0]->slug }}">Read more</a>
            </div>
        </div>

        <!-- Grid of Other Posts -->
        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="div position-absolute px-3 py-2 bg-dark text-white"><a
                                    class="text-decoration-none text-white"
                                    href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></div>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3"
                                    alt="{{ $post->title }}">
                            @else
                                <img src="/images/500x300.jpg" class="card-img-top" alt="{{ $post->title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a class="text-decoration-none"
                                        href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                                </h5>
                                <p>
                                    <small class="text-body-secondary">
                                        <a href="/authors/{{ $post->user->username }}">{{ $post->user->name }}</a>
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No post found.</p>
    @endif


@endsection
