@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <a class="text-decoration-none text-white"href="/posts?category={{ $category->slug }}">
                        <div class="card text-bg-dark">
                            <img src="images/500x300.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay d-flex align-items-center">
                                <h5 class="card-title text-center flex-fill p-4 fs-3" style="background: rgba(0,0,0,0.7)">
                                    {{ $category->name }}

                                </h5>

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>





    <ul>
        <li></li>
        <h2>
            <a href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
        </h2>
        </li>
    </ul>
@endsection
