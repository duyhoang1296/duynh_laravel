@extends('layouts.admin')
@section('header')
	<h1>List admin</h1>
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
				<th>Email</th>
				<th>Role</th>
				<th>
					<a href="{{ route('admin.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td><a href="{{ route('admin.getProfile',['id'=>$user->id]) }}">{{$user->name}}</a></td>
					<td>{{$user->email}}</td>
					<td>{{$user->getRoleName()}}</td>
					<td>
						<a href="{{ route('admin.edit',['id'=>$user->id]) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
						<a href="javascript:;" class="btn btn-danger"><i class="fa fa-times" onclick="confirmRemove('{{ route('admin.destroy',['id'=>$user->id]) }}')"></i></a>
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
			message: "Are you sure to remove this user?",
			buttons:{
				cancel:{
					label: 'No',
					className: 'btn-danger'
				},
				confirm:{
					label: 'yes',
					className: 'btn-success'
				}
			},
			callback: function(result){
				if (result) {
					window.location.href = url;
				}
			}
		});
	};
</script>
@endsection