<x-pagelayout>
@Section('title','Home')
@Section('content')
    {{-- header img --}}
    <header></header>

    {{-- card --}}
    <div class="container">
        <h1 class="mt-4">All Posts</h1>
        <div class="row d-flex">
        @foreach ($posts as $post)
            <div class="col-md-4 mt-3 d-flex">
                <!-- Card -->
               

                    <div class="card">

                        <!-- Card image -->
                        <div class="view overlay">
                            <img class="card-img-top" src="{{asset('images/posts/'.$post->image)}}" alt="cap-image">
                            <a href="{{route('postById',$post->id)}}">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                    
                        <!-- Card content -->
                        <div class="card-body">
                    
                            <!-- Title -->
                            <h4 class="card-title">{{$post->title}}</h4>
                            <p>(posted by {{$post->user->name}})</p>
                        
                            <!-- Button -->
                            <a href="{{route('postById',$post->id)}}" class="btn btn-primary">See More</a>
                    
                        </div>
                    
                    </div>
             
                <!-- Card -->
                

            </div>
        @endforeach
        {{$posts->links()}}
        </div>
    </div>
</x-pagelayout>