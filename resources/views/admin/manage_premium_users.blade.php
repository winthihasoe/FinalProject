@extends('layouts.adminlayout')
@section('title','Premium User')
@section('content')
    <h2>Manage Premium Users</h2>
    <table class="table table-hover">
    <thead class="grey">
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">isAdmin</th>
        <th scope="col">isPremium</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th>1</th>
        <td>Mark</td>
        <td>god@gmail.com</td>
        <td>true</td>
        <td>true</td>
        <td><a href=""><button class="btn btn-sm mt-0 green">Update</button></a></td>
        <td><a href=""><button class="btn btn-sm mt-0 red">Delete</button></a></td>
        </tr>
  </tbody>
</table>
@endsection