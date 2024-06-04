@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
        
    @endif

    <div class="table-responsive small">
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-info btn-sm d-flex align-items-center justify-content-center me-1" style="width: 36px; height: 36px;">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning btn-sm d-flex align-items-center justify-content-center me-1" style="width: 36px; height: 36px;">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>                                
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
