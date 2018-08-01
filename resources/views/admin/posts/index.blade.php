@extends('layouts.admin')
@section('header')
	<h1>List post</h1>
@endsection
@section('content')
@if (Session::has('status'))
	<p class="alert alert-info">{{Session::get('status')}}</p>
@endif
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th></th>
				<th>Title</th>
				<th>Featured</th>
				<th>Category</th>
				<th>
					<a href="{{ route('post.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($posts as $post)
				<tr>
					<td>{{$post->id}}</td>
					<td>{{str_limit($post->title,60)}}</td>
					<td><img width="120" src="{{ asset($post->featured) }}" alt=""></td>
					<td>{{$post->category->name}}</td>
					<td>
						<a href="{{ route('post.edit',['id'=>$post->id]) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
						<a href="javascript:;" onclick="confirmRemove('{{ route('post.destroy',['id'=>$post->id]) }}')" class="btn btn-danger"><i class="fa fa-times"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="col-md-5">{{$posts->links()}}</div>
@endsection
@section('javascript')
<script>
	function confirmRemove(url){
		bootbox.confirm({
			message: "Are you sure to remove this post?",
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
