@extends('layout.app')

@section('content')

    <div class="row">
        <div class="col-12">

            <h1>Home Page</h1>
            
        </div>
    </div>

    <div class="row mt-5">
        @foreach($posts as $post)
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $post->image_background }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->subtitle }}</p>
                    <a href="{{ route('post', ['slug' => $post->slug]) }}" class="btn btn-primary">Read</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection