@extends('layouts.admin')
@section('header')
	<h1>Create new category</h1>
@endsection
@section('content')
<div class="col-md-8 col-md-offset-2">
	<form action="{{ route('category.store') }}" method="post" accept-charset="utf-8" id="cate-form">
		{{csrf_field()}}
		<div class="form-group">
			<label for="">Name category</label>
			<input type="text" name="name" class="form-control" placeholder="Input name of categorys..." value="{{old('name')}}">
			@if (count($errors) > 0)
				<span style="color: red">{{$errors->first('name')}}</span>
			@endif
		</div>
		{{-- <div class="form-group">
			<label for="">Name slug</label>
			<input type="text" name="slug" class="form-control" placeholder="Input name of slug..." value="{{old('slug')}}">
			@if (count($errors) > 0)
				<span>{{$errors->first('slug')}}</span>
			@endif
		</div> --}}
		<div class="form-group">
			<button class="btn btn-success" type="submit">Save</button>
		</div>
	</form>
</div>
@endsection
@section('javascript')
	<script>
		$(document).ready(function(){
			$("#cate-form").validate({
				rules:{
					name:{
						required: true
					}
				},
				messages:{
					name:{
						required: "Insert name of category, please!"
					}
				}
			});
		});
	</script>
@endsection