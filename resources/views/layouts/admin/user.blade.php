@extends('layouts.admin.layout')
@section('Maincontent')
@include('layouts.admin.errors')
<h1>Users</h1>
<a href="/myadmin/adduser"><button class="btn btn-success">Add Admin User</button></a>
<hr>
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Privillage</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
 @foreach($user as $eachUser)
      <tr>
        <td>{{$eachUser->name}}</td>
        <td>{{$eachUser->email}}</td>
        <td>{{$eachUser->privilege}}</td>
        <td>
  <button type="button" onClick="location.href ='/myadmin/editUser/{{$eachUser->email}}/{{$eachUser->privilege}}';" class="btn btn-danger">Edit</button></td>
      </tr>
@endforeach
</tbody>
  </table>
@endsection