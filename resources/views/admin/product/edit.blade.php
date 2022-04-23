@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header">
		<h4>Add Product</h4>
	</div>
	<div class="card-body">
		<form action="{{url('update.product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row">
				<div class="col-md-12 mb-2">
					<select class="form-select form-control" name="cate_id">
					 <option selected>{{$products->category->name}}</option>
					  </select>
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Name</label>
					<input type="text" class="form-control" name="name" value="{{$products->name}}">
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Slug</label>
					<input type="text" class="form-control" name="slug" value="{{$products->slug}}">
				</div>
				<div class="col-lg-12 mb-2">
					<label for="">Description</label>
					<textarea name="description" rows="3" class="form-control">{{$products->description}}</textarea>
				</div>
				<div class="col-lg-12 mb-2">
					<label for="">Small_Description</label>
					<textarea name="small_description" rows="3" class="form-control">{{$products->small_description}}</textarea>
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Original_Price</label>
					<input type="number" name="original_price" class="form-control" value="{{$products->original_price}}">
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Selling_Price</label>
					<input type="number" name="selling_price" class="form-control" value="{{$products->selling_price}}">
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Quantity</label>
					<input type="number" name="qty" class="form-control" value="{{$products->qty}}">
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Tax</label>
					<input type="number" name="tax" class="form-control"  value="{{$products->tax}}">
				</div>
				<div class="col-lg-6 mb-2 ">
					<label for="">status</label>
					<input type="checkbox" {{$products->status == '1' ? 'checked':''}} name="status">
				</div>
				<div class="col-lg-6 mb-2">
					<label for="">Trending</label>
					<input type="checkbox" {{$products->trending == '1' ? 'checked':''}} name="trending">
				</div>
				<div class="col-lg-12 mb-2">
					<label for="">Meta_Title</label>
					<input type="text" class="form-control" name="meta_title" value="{{$products->meta_title}}">
				</div>
				<div class="col-lg-12 mb-2">
					<label for="">Meta_keyword</label>
					<textarea name="meta_keywords" rows="3" class="form-control">{{$products->meta_keywords}}</textarea>
				</div>
				<div class="col-lg-12 mb-2">
					<label for="">Meta_description</label>
					<textarea name="meta_description" rows="3" class="form-control">{{$products->meta_description}}</textarea>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<img src="{{asset('uploads/product/'.$products->image)}}" alt="image-here" width="150" height="70">
					</div>
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