@extends("layouts.main")

@section("container")
<div class="container">
    <div class="row">
        @foreach ($categories as $category )
            <div class="col-md-4">
                <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.6)">
                    <img src="https://source.unsplash.com/random/360x120/?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                    <div class="card-img-overlay">
                        <h5 class="card-title"><a href="/posts?category={{ $category->slug }}" class="text-decoration-none text-white">{{ $category->name }}</a></h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
