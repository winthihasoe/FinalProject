@extends('layouts.pagelayout')
@Section('title','Home')
@Section('content')
    {{-- header img --}}
    <header></header>

    {{-- card --}}
    <div class="container">
        <h1 class="mt-4">All Posts</h1>
        <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4 mt-3">
                <!-- Card -->
                <div class="card">

                    <!-- Card image -->
                    <div class="view overlay">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg"
                        alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                    </div>
                
                    <!-- Card content -->
                    <div class="card-body">
                
                    <!-- Title -->
                    <h4 class="card-title">{{$post->title}}</h4>
                    <!-- Text -->
                    <p class="card-text">{{$post->content}}}}</p>
                    <!-- Button -->
                    <a href="#" class="btn btn-primary">See More</a>
                
                    </div>
                
                </div>
                <!-- Card -->
                

            </div>
        @endforeach
        </div>
    </div>
@endsection 