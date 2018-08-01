@extends('layouts.admin')
@section('header')
	<h1>Create admin</h1>
@endsection
@section('content')
	<form action="{{ route('admin.store') }}" method="post" accept-charset="utf-8" id="adform">
		{{csrf_field()}}
		<div class="form-group">
			<label for="">Name</label>
			<input type="text" class="form-control" name="name" placeholder="Input name of admin..." value="{{old('name')}}">
		</div>
		<div class="form-group">
			<label for="">email</label>
			<input type="email" class="form-control" name="email" placeholder="Input email of admin..." value="{{old('email')}}">
		</div>
		<div class="form-group">
			<label for="">Role</label>
			<select name="role" class="form-control">
				{{-- <option value="10">Author</option> --}}
				<option value="20">Author</option>
				<option value="30">Super Admin</option>
			</select>
		</div>
		<div class="form-group">
			<label for="">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Input password of admin...">
		</div>
		<div class="form-group">
			<label for="">Confirm password</label>
			<input type="password" class="form-control" name="confirmpassword">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</form>
@endsection

@section('javascript')
<script>
	$(document).ready(function(){
		$("#adform").validate({
			rules:{
				name:{
					required: true,
				},
				email:{
					required: true,
					email: true
				},
				password:{
					required: true,
					minlength: 10
				},
				confirmpassword:{
					required: true,
					equalTo: "#password"
				}
			},
			messages:{
				name:{
					required: "Insert name of admin, please!"
				},
				email:{
					required: "Insert email of admin, please!",
					email: "Insert the correct email format, please!"
				},
				password:{
					required: "Insert password of admin, please!",
					minlength: "The minimum length of password is 10 characters"
				},
				confirmpassword:{
					required: "Insert confirm password, please!",
					equalTo: "Insert the correct password, please!"
				} 
			}
		});
	});
</script>

@endsection