@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header">
		<h4>Edit/Update Category</h4>
	</div>
	<div class="card-body">
		<form action="{{url('update-category/'.$store->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row">
				<div class="col-lg-6 mb-2">
					<label for="">Name</label>
					<input type="text" class="form-control" name="name" value="{{$store->name}}">
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Slug</label>
					<input type="text" class="form-control" name="slug" value="{{$store->slug}}">
				</div>
				<div class="col-lg-12 mb-2">
					<label for="">Description</label>
					<textarea name="description" rows="3" class="form-control">{{$store->description}}</textarea>
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Status</label>
					<input type="checkbox" {{$store->status == '1' ? 'checked':''}}  name="status">
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Popular</label>
					<input type="checkbox" {{$store->popular == '1' ? 'checked':''}}  name="popular">
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Meta_Title</label>
					<input type="text" class="form-control" name="meta_title" value="{{$store->meta_title}}">
				</div>
				<div class="col-lg-12 mb-2">
					<label for="">Meta_description</label>
					<textarea name="meta_discrip" rows="3" class="form-control">{{$store->meta_discrip}}</textarea>
				</div>
				<div class="col-lg-12 mb-2">
					<label for="">Meta_keyword</label>
					<textarea name="meta_keywords" rows="3" class="form-control">{{$store->meta_keywords}}</textarea>
				</div>
				@if($store->image)
				<img src="{{asset('uploads/category/'.$store->image)}}" alt="image here" width="200" height="70">
				@endif
				<div class="col-lg-12 mb-2">
					<label for="">Image</label>
					<input type="file"  name="image" class="form-control">
				</div>
				<div class="col-lg-12 mb-2">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection