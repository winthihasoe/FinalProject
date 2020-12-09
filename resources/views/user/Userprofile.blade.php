@extends ('layouts.pagelayout')
@section('title',"User Profile")
@section('content')
<div class="container">
<h1 class="mt-4 mb-4">User Profile</h1>

<form class="border border-light p-5" action="{{route('post_userProfile')}}" method="post" enctype="multipart/form-data">
@csrf

    @if(Session('success'))
        <div class="alert alert-success">
            {{Session('success')}}
        </div>
    @endif
    <label for="">name</label>
    <input type="text" name="name"id="defaultLoginFormEmail" class="form-control mb-4" value="{{auth()->user()->name}}">
    
    <label for="">Email</label>
    <input type="text" name="email" id="defaultLoginFormEmail" class="form-control mb-4" value="{{auth()->user()->email}}">

    <label for="">Photo</label>
    <input type="file" name="image" id="defaultLoginFormPassword" class="form-control mb-4">
    <img src="{{asset('images/profiles/'.auth()->user()->image)}}" width="300px" alt="">
    <br><br>
    <label for="">Old Password</label>
    <input type="password" name="old_password" id="defaultLoginFormEmail" class="form-control mb-4">
    <label for="">New Password</label>
    <input type="password" name="new_password" id="defaultLoginFormEmail" class="form-control mb-4">

    
    <!-- Add post button -->
    <button class="btn btn-info btn-block my-4" type="submit">Update Profile</button>

</form>

</div>
@endsection