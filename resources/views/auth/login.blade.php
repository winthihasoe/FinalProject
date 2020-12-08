@extends('layouts.authlayout')
@Section('content')
<div class="container">
    <div class="col-md-4 offset-4 mt-5">

        <!-- authentication failed -->
        @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
        @endif

        <form class="text-center border border-light p-5" action="{{route('post_login')}}" method="post">
        @csrf
            <p class="h4 mb-4 red-text">Sign in</p>
        
            <!-- Email -->
            <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">
            @error("email")
                <div class="alert-danger mb-4">{{$message}}</div>
            @enderror
            <!-- Password -->
            <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name="password">
            @error("password")
                <div class="alert-danger" mb-4>{{$message}}</div>
            @enderror
            <div class="d-flex justify-content-around">

                <div>
                    <!-- Forgot password -->
                    <a href="">Forgot password?</a>
                </div>
            </div>
        
            <!-- Sign in button -->
            <button class="btn btn-red white-text  btn-block my-4" type="submit">Sign in</button>
        
            <!-- Register -->
            <p>Not a member?
                <a href="{{route('register')}}">Register</a>
            </p>
        
           
        
        </form>
        
    </div>
</div>
<!-- Default form login -->
<!-- Default form login -->@endsection