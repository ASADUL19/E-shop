@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header">
		<h4>Add Category</h4>
	</div>
	<div class="card-body">
		<form action="{{url('insert-category')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-lg-6 mb-2">
					<label for="">Name</label>
					<input type="text" class="form-control" name="name">
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Slug</label>
					<input type="text" class="form-control" name="slug">
				</div>
				<div class="col-lg-12 mb-2">
					<label for="">Description</label>
					<textarea name="description" rows="3" class="form-control"></textarea>
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Status</label>
					<input type="checkbox"  name="status">
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Popular</label>
					<input type="checkbox"  name="popular">
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Meta_Title</label>
					<input type="text" class="form-control" name="meta_title">
				</div>
				<div class="col-lg-12 mb-2">
					<label for="">Meta_description</label>
					<textarea name="meta_discrip" rows="3" class="form-control"></textarea>
				</div>
				<div class="col-lg-12 mb-2">
					<label for="">Meta_keyword</label>
					<textarea name="meta_keywords" rows="3" class="form-control"></textarea>
				</div>
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