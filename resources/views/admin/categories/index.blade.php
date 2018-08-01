@extends('layouts.admin')
@section('header')
	<h1>List categories</h1>
@endsection
@section('content')
@if (Session::has('status'))
	<p class="alert alert-info">{{Session::get('status')}}</p>
@endif
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>Slug</th>
				<th>
					<a href="{{ route('category.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($categories as $category)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{$category->name}}</td>
					<td>{{$category->slug}}</td>
					<td>
						<a href="{{ route('category.edit',['id'=>$category->id]) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
						<a href="javascript:;" onclick="confirmRemove('{{ route('category.destroy',['id'=>$category->id]) }}')" class="btn btn-danger"><i class="fa fa-times"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
@section('javascript')
<script>
	function confirmRemove(url){
		bootbox.confirm({
			message: "Are you sure to remove this category?",
			buttons: {
				cancel:{
					label: 'No',
					className: 'btn-danger'
				},
				confirm:{
					label: 'Yes',
					className: 'btn-success' 
				}
			},
			callback: function (result) {
				if (result) {
					window.location.href = url;
				}
			}
		});
	}
</script>
@endsection
