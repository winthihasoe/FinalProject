@extends("layouts.pagelayout")
@Section('title','Post')
@section('content')
    <div class="container">
        <div class="row justify-content-center py-4">
            <h1>Show post for {{$post->title}}</h1>
            <img src="{{asset('images/posts/'.$post->image)}}" width="600px" height="300px">
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>{{$post->content}}</p>
             </div>
        </div>
    </div>


@endsection 