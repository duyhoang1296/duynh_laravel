@extends('layouts.admin')
@section('header')
	<h1>Update category</h1>
@endsection
@section('content')
<div class="col-md-8 col-md-offset-2">
	<form action="{{ route('category.update',['id'=>$model->id]) }}" method="post" accept-charset="utf-8" id="cate-form">
		{{csrf_field()}}
		<div class="form-group">
			<label for="">Name category</label>
			<input type="text" name="name" class="form-control" placeholder="Input name of categorys..." value="{{$model->name}}">
		</div>
		<div class="form-group">
			<label for="">Name slug</label>
			<input type="text" name="slug" class="form-control" placeholder="Input name of slug..." value="{{$model->slug}}" >
		</div>
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