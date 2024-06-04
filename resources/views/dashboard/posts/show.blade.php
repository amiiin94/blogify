@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <article class="mb-3">
                <h1>{{ $post->title }}</h1>
                <div class="d-flex align-items-center mb-3">
                    <a href="/dashboard/posts" class="btn btn-success me-2"><i class="bi bi-arrow-left"></i> Back to all my posts</a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning me-2"><i class="bi bi-pencil-square"></i> Edit</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        
                    </form>
                </div>

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
