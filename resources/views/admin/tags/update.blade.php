@extends('layouts.admin')
{{-- @section('title',"Danh sách thẻ Tag") --}}
@section('content')
<div class="col-md-4">
	<form action="{{ route('tag.update', $model->id) }}" method="post" >
		{{csrf_field()}}
		<div class="form-group">
			<label for="">Tên Tag</label>
			<input type="text" name="name" class="form-control" value="{{$model->name}}">
		</div>
		<div class="form-group">
			<label for="">Đường dẫn</label>
			<input type="text" name="slug" class="form-control" value="{{$model->slug}}">
		</div>
		<button type="submit" class="btn btn-success btn-block">Save</button>
	</form>
</div>

@endsection