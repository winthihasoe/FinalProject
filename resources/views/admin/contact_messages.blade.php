<x-adminlayout>
@section('title','Contact Messages')
    <h2>Contact Messages</h2>
        <table class="table table-hover">
    <thead class="grey">
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Messages</th>       
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($messages as $message)
            <tr>
            <th>{{$message->id}}</th>
            <td>{{$message->username}}</td>
            <td>{{$message->email}}</td>
            <td>{{$message->message}}</td>
            <td><a href=""><button class="btn btn-sm mt-0 green">Update</button></a></td>
            <td><a href=""><button class="btn btn-sm mt-0 red">Delete</button></a></td>
            </tr>   
        @endforeach
  </tbody>
</table>
</x-adminlayout>