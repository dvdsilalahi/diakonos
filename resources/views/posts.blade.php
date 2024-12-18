@extends('layouts.main')

@section('container')
<h3 class="mb-3 text-center">{{ $title }}</h3>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/posts">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search"
                value="{{ request('search') }}"/>
                <input type="hidden" name="category" value="{{ request('category') }}"/>
                <input type="hidden" name="author" value="{{ request('author') }}"/>
                <div class="input-group-append">
                  <button class="btn btn-success" type="submit">Search</button>
                </div>
              </div>
        </form>
    </div>
</div>

@if($posts->count())
    <div class="card mb-3">
        @if($posts[0]->image)
        <div style="max-height: 350px; overflow:hidden;">
            <img src="{{ asset('/storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
        </div>
        @else
            <img src="https://source.unsplash.com/random/1200x400/?{{ $posts[0]->category->name }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
        @endif

        <div class="card-body text-center">
        <h5 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h5>
        <small>By: in <a href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}</small>
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
        <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
            <div class="col-md-4 mb-3 d-flex align-items-strecth">
                <div class="card">
                    <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.6)"><a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
                    @if($post->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('/storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                    </div>
                    @else
                        <img src="https://source.unsplash.com/random/1200x400/?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                    @endif

                    <div class="card-body text-center">
                    <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h5>
                    <small>By. <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}</small>
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <a href="/posts/{{ $post->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@else
    <p class="text-center fs-4">No post found.</p>
@endif

<div class="d-flex justify-content-end">
    {{ $posts->links() }}
</div>

@endsection
