@extends('layouts.admin')
@section('header')
	<h1>Update profile admin</h1>
@endsection
@section('content')
	<form action="{{ route('profile.update',['id'=>$profiles->id]) }}" enctype="multipart/form-data" method="post">
		{{csrf_field()}}
		<div class="form-group">
			<label for="">Address</label>
			<input type="text" name="address" class="form-control" value="{{$profiles->address}}">
		</div>
		@if ($profiles->avatar != "")
			<img width="90" src="{{$profiles->avatar}}" alt="">
		@endif
		<div class="form-group">
			<label for="">Avatar</label>
			<input type="file" name="avatar" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Location</label>
			<input type="text" name="location" class="form-control" value="{{$profiles->location}}">
		</div>
		<div class="form-group">
			<label for="">Description</label>
			<textarea name="description" id="" cols="174" rows="10">{{$profiles->description}}</textarea>
		</div>
		<div class="form-group">
			<button class="btn btn-success" type="submit">Save</button>
		</div>
		
	</form>
@endsection