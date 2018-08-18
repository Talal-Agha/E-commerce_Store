@extends('layouts.admin.layout')
@section('Maincontent')
@include('layouts.admin.errors')
<h1>Update User</h1>
<form method="POST" action="/myadmin/deleteuser">
{{ csrf_field()}}
<input name="email" id="email" value="{{$user->email}}" type="hidden" required>
<input name="privilege" id="privilege" value="{{$user->privilege}}" type="hidden" required>
<button class="btn btn-danger" type="submit">Delete User</button>
</form>
<form method="POST" action="/myadmin/updateuser/generalInfo">
{{ csrf_field()}}
<input name="privilege" id="privilege" value="{{$user->privilege}}" type="hidden" required>
<div class="form-group">
<label for="email">E-Mail</label>
<input name="email" id="email" type="email" value="{{$user->email}}" class="form-control" readonly required>
</div>
<div class="form-group">
<label for="name">Name</label>
<input   name="name" type="text" id="name" value="{{$user->name}}" placeholder="Name" class="form-control" required>
</div>
<button class="btn btn-success" type="submit">Update User General Info</button>
</form>
<hr>
<form method="POST" action="/myadmin/updateuser/password">
{{ csrf_field()}}
<input name="email" id="email" value="{{$user->email}}" type="hidden" required>
<input name="privilege" id="privilege" value="{{$user->privilege}}" type="hidden" required>
<div class="form-group">
 <label for="password">Password</label>
<input   name="password" type="password" id="password" placeholder="Password" class="form-control" required>
</div>
<div class="form-group">
<label for="password_confirmation">Password Confirmation</label>
<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
</div>
<button class="btn btn-success" type="submit">Update Password</span></button>
</form>

@endsection
