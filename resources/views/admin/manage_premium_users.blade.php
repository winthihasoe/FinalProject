<x-adminlayout>
@section('title','Premium User')
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
        @foreach ($users as $user)
        <tr>
            <th>{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><b>{{$user->isAdmin=='0'? 'No':'Yes'}}</b></td>
            <td><b>{{$user->isPremium=='0'? 'No':'Yes'}}</b></td>
            <td><a href="{{route('admin.editUser',$user->id)}}" class="btn btn-sm mt-0 green">Update</a></td>
            <td><a href="{{route('admin.deleteUser',$user->id)}}" class="btn btn-sm mt-0 red">DELETE</a></td>
        </tr>
        @endforeach
  </tbody>
</table>
</x-adminlayout>