@extends ('layouts.pagelayout')
@section('content')
<div class="container">
<h1 class="mt-4 mb-4">User Profile</h1>

<form class="border border-light p-5" action="#!">

    <label for="">Username</label>
    <input type="text" id="defaultLoginFormEmail" class="form-control mb-4">

    <label for="">Photo</label>
    <input type="file" id="defaultLoginFormPassword" class="form-control mb-4">
    
    <label for="">Old Password</label>
    <input type="password" id="defaultLoginFormEmail" class="form-control mb-4">
    <label for="">New Password</label>
    <input type="password" id="defaultLoginFormEmail" class="form-control mb-4">

    
    <!-- Add post button -->
    <button class="btn btn-info btn-block my-4" type="submit">Update Profile</button>

</form>

</div>
@endsection