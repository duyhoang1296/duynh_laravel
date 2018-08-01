@extends('layouts.admin')
@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
@endsection
@section('header')
	<h1>Update  post</h1>
@endsection
@section('content')
<div class="col-md-8 col-md-offset-2">
	<form action="{{ route('post.update',['id'=>$model->id]) }}" id="postForm" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="form-group">
			<label for="">Title</label>
			<input type="text" onkeyup="generateSlug();" id="title" class="form-control" name="title" value="{{$model->title}}">
		</div>
		<div class="form-group">
			<label for="">Slug</label>
			<input type="text" id="slug" class="form-control" name="slug" value="{{$model->slug}}">
		</div>
		@if ($model->featured != "")
			<img width="120" src="{{ asset($model->featured) }}" alt="">
		@endif
		<div class="form-group">
			<label for="">Featured</label>
			<input type="file" class="form-control" name="featured" >
		</div>
		<div class="form-group">
			<label for="">Content</label>
			<textarea name="content" id="" cols="110" rows="10">{{$model->content}}</textarea>
		</div>
		<div class="form-group">
			<label for="">Category name</label>
			<select name="category_id" class="form-control">
				@foreach ($categories as $category)
						<option value="{{$category->id}}"
						@if ($model->category_id == $category->id)
							selected
						@endif>{{$category->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="tag">Thẻ Tags</label>
			<select name="tags[]" id="select2-multi" class="form-control" multiple>
				@foreach($tags as $tag)	
						<option value="{{$tag->id}}" >{{$tag->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</form>
</div>
	
@endsection

@section('javascript')
<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
<script>
	$(document).ready(function(){
		$('#select2-multi').select2();
		$('#select2-multi').select2().val({{json_encode($model->tags()->pluck('id'))}}).trigger('change');
	});
</script>	
<script>
	$(document).ready(function(){
		$('#postForm').validate({
			rules:{
				title:{
					required: true
				},
				slug:{
					required: true
				},
				content:{
					required: true
				}
			},
			messages:{
				title:{
					required: "Insert title of post, please!"
				},
				slug:{
					required: "Insert slug of post, please!"
				},
				content:{
					required: "Insert content of post, please!"
				}
			}
		});
	});
</script>
<script>
	function generateSlug(){
		var title;
	    var slug;
	 
	    //Lấy text từ thẻ input title 
	    title = document.getElementById("title").value;
	 
	    //Đổi chữ hoa thành chữ thường
	    slug = title.toLowerCase();
	 
	    //Đổi ký tự có dấu thành không dấu
	    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
	    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
	    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
	    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
	    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
	    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
	    slug = slug.replace(/đ/gi, 'd');
	    //Xóa các ký tự đặt biệt
	    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*||∣|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
	    //Đổi khoảng trắng thành ký tự gạch ngang
	    slug = slug.replace(/ /gi, "-");
	    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
	    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
	    slug = slug.replace(/\-\-\-\-\-/gi, '-');
	    slug = slug.replace(/\-\-\-\-/gi, '-');
	    slug = slug.replace(/\-\-\-/gi, '-');
	    slug = slug.replace(/\-\-/gi, '-');
	    //Xóa các ký tự gạch ngang ở đầu và cuối
	    slug = '@' + slug + '@';
	    slug = slug.replace(/\@\-|\-\@|\@/gi, '')+'.html';
	    //In slug ra textbox có id “slug”
	    document.getElementById('slug').value = slug;
	}
</script>
<script>
	jQuery(document).ready(function ($) {
    // CKEDITOR.replace('featured');
    CKEDITOR.replace('content', {
        filebrowserBrowseUrl: '{!! asset('plugins/ckfinder/ckfinder.html') !!}',
        filebrowserImageBrowseUrl: '{!! asset('plugins/ckfinder/ckfinder.html?type=Images') !!}',
        filebrowserFlashBrowseUrl: '{!! asset('plugins/ckfinder/ckfinder.html?type=Flash') !!}',
        filebrowserUploadUrl: '{!! asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') !!}',
        filebrowserImageUploadUrl: '{!! asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') !!}',
        filebrowserFlashUploadUrl: '{!! asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') !!}'
    });
});
</script>	

@endsection
