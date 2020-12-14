@extends("layouts.pagelayout")
@Section('title','Post')
@section('content')
    <div class="container">
        <div class="row justify-content-center py-4">
            <h1>{{$post->title}}</h1>
        </div>
        <div class="row justify-content-center">
            <img src="{{asset('images/posts/'.$post->image)}}" width="600px" height="300px">
        </div>

        <div class="row justify-content-center py-4">
            <div class="col-md-8">
                <p>{{$post->content}}</p>
             </div>
        </div>

        <div class="row pb-5">
            <div class="col-md-6 text-right">
                <a href="{{route('editPost',$post->id)}}" class="btn btn-success">Edit Post</a>
            </div>
            <div class="col-md-6">
                <a href="{{route('deletePost',$post->id)}}" class="btn btn-danger">Delete Post</a>
            </div>
        </div>
    </div>


@endsection 