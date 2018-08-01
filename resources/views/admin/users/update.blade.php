@extends('layouts.admin')
@section('header')
	<h1>Update admin</h1>
@endsection
@section('content')
	<form action="{{ route('admin.update',['id'=>$model->id]) }}" method="post" accept-charset="utf-8" id="adForm">
		{{csrf_field()}}
		<div class="form-group">
			<label for="">Name</label>
			<input type="text" name="name" class="form-control" value="{{$model->name}}">
		</div>
		<div class="form-group">
			<label for="">Email</label>
			<input type="email" name="email" class="form-control" value="{{$model->email}}">
		</div>
		<div class="form-group">
			<label for="">Role</label>
			<select name="role" class="form-control" >
				{{-- <option value="10" {{$model->role == 10 ? 'selected' : ''}}>Author</option> --}}
				<option value="20" {{$model->role == 20 ? 'selected' : ''}}>Author</option>
				@if (Auth::user()->role == 30)
					<option value="30" {{$model->role == 30 ? 'selected' : ''}}>Super admin</option>
				@endif
			</select>
		</div>
		<div class="form-group">
			<label for="">Password</label>
			@if ($model->role == Auth::user()->role)
				<input type="password" name="password" class="form-control" value="{{$model->password}}">
			@endif
			@if ($model->role != Auth::user()->role)
				<input type="password" readonly name="password" class="form-control" value="{{$model->password}}">
			@endif
			
			
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</form>
@endsection
@section('javascript')
<script>
	$(document).ready(function(){
		$('#adForm').validate({
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
				}
			}
		});
	});
</script>
@endsection