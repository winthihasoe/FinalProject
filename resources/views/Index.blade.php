@extends('layouts.pagelayout')
@Section('content')
<h1>{{auth()->user()->name}}</h1>
    {{-- header img --}}
    <header></header>

    {{-- card --}}
    <div class="container">
        <h1 class="mt-4">All Posts</h1>
        <div class="row">
        @foreach (range(1, 8) as $index)
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
                    <h4 class="card-title">Laravel 8 is not working</h4>
                    <!-- Text -->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                        content.</p>
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