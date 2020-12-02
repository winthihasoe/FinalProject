@extends('layouts.pagelayout')
@section('content')

<div class="container">
<h1 class="mt-4 mb-4">Create post</h1>

<form class="border border-light p-5" action="{{route('post')}}" method="post">
@csrf
   <label for="">Title</label>
    <input type="text" id="defaultLoginFormEmail" class="form-control mb-4">

    <label for="">Photo</label>
    <input type="file" id="defaultLoginFormPassword" class="form-control mb-4">
    
    <label for="">Content</label>
    <textarea name="" id="" cols="30" rows="10" class="form-control mb-4"></textarea>
    <!-- Add post button -->
    <button class="btn btn-info btn-block my-4" type="submit">Add Post</button>

</form>

</div>
@endsection