@extends('layouts.admin')
@section('content')
<div class="col-md-4">
	<form action="{{ route('tag.store') }}" id="tagForm" method="post" accept-charset="utf-8">
		{{csrf_field()}}
		<div class="form-group">
			<label for="">Tên Tag</label>
			<input type="text" name="name" class="form-control" placeholder="Tên tag...">
		</div>
		<button type="submit" class="btn btn-success btn-block">Save</button>
	</form>
</div>
<div class="col-md-8">
	<table class="table table-bordered table-hover">
		<h1>List tag</h1>
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tags as $tag)
				<tr>
					<td>{{$tag->id}}</td>
					<td>{{$tag->name}}</td>
					<td>
						<a href="{{ route('tag.edit',['id'=>$tag->id]) }}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
						<a href="javascript:;" onclick="confirmRemove('{{ route('tag.destroy',['id'=>$tag->id]) }}')" class="btn btn-danger"><i class="fa fa-times"></i></a>
					</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>
</div>
@endsection
@section('javascript')
<script>
	function confirmRemove(url){
		bootbox.confirm({
			message: "Are you sure to remove this tag?",
		    buttons: {
		        confirm: {
		            label: 'Yes',
		            className: 'btn-success'
		        },
		        cancel: {
		            label: 'No',
		            className: 'btn-danger'
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
<script>
	$(document).ready(function(){
		$('#tagForm').validate({
			rules:{
				name:{
					required: true
				}
			},
			messages:{
				name:{
					required: "Insert name of tag, please!"
				}
			}
		});
	});
</script>
@endsection