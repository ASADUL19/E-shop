@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header">
		<h4>Add Product</h4>
	</div>
	<div class="card-body">
		<form action="{{url('insert-product')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-12 mb-2">
					<select class="form-select form-control" name="cate_id">
					  <option selected>Select Category</option>
					  @foreach($category as $item)
					  <option value="{{$item->id}}">{{$item->name}}</option>
					  @endforeach
					</select>
				</div>
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
				<div class="col-lg-12 mb-2">
					<label for="">Small_Description</label>
					<textarea name="small_description" rows="3" class="form-control"></textarea>
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Original_Price</label>
					<input type="number" name="original_price" class="form-control">
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Selling_Price</label>
					<input type="number" name="selling_price" class="form-control">
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Quantity</label>
					<input type="number" name="qty" class="form-control">
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Tax</label>
					<input type="number" name="tax" class="form-control">
				</div>
				<div class="col-lg-6 mb-2 ">
					<label for="">status</label>
					<input type="checkbox" name="status">
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Trending</label>
					<input type="checkbox" name="trending">
				</div>
				<div class="col-lg-12 mb-2">
					<label for="">Meta_Title</label>
					<input type="text" class="form-control" name="meta_title">
				</div>
				<div class="col-lg-12 mb-2">
					<label for="">Meta_keyword</label>
					<textarea name="meta_keywords" rows="3" class="form-control"></textarea>
				</div>
				<div class="col-lg-12 mb-2">
					<label for="">Meta_description</label>
					<textarea name="meta_description" rows="3" class="form-control"></textarea>
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