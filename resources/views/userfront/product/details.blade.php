@extends('frontend.index')
@section('title')
{{$products->name}}
@endsection

@section('content')
<div class="py-3 mb-4 shadow bg-warning border-top">
	<div class="container">
		<a class="text-decoration-none" href="{{url('category')}}">
			Collection
		</a>/
		<a href="" class="text-decoration-none">
			{{$products->category->name}}
		</a>/
		<a href="" class="text-decoration-none">
			{{$products->name}}
		</a>
	</div>
	
</div>
<div class="container">
	<div class="card shadow prod_data">
		<div class="card-body">
			<div class="row">
				<div class="col-lg-4 border-right">
					<img src="{{asset('uploads/product/'.$products->image)}}" alt="" class="w-100">
				</div>
				<div class="col-md-8 mt-3">
					<h2 class="mb-0">
						{{$products->name}}
						@if($products->trending == '1')
						<label for="" style="font-size:16px;" class="float-end badge bg-danger">trending</label>
						@endif
					</h2>
					<hr>
					<label for="" class="me-3">Original Price: <del>{{$products->original_price}}</del></label>
					<label for="" class="me-3 fw-bold">Selling Price: {{$products->selling_price}}</label>
					@php $rate=number_format($rating_value) @endphp
					<div class="rating">
						@for($a=1;$a<=$rate;$a++)
						
							<i class="fa fa-star checked"></i>
						
						@endfor
						@for($b=$rate+1;$b<=5;$b++)
						<i class="fa fa-star"></i>
						@endfor
						<span>
							@if($ratings->count()>0)
								Rating: {{$ratings->count()}}
							@else
							<span>No Rating</span>
							@endif
						</span>
					</div>

					<p class="mt-3">
						{!! $products->small_description !!}
					</p>
					<hr>
					@if($products->qty >0)
					<label for="" class="badge bg-success">In Stock</label>
					@else
					<label for="" class="badge bg-danger">Out Stock</label>
					@endif

					<div class="row mt-2">
						<div class="col-md-2">
							<input type="hidden" class="prod_id" value="{{$products->id}}">
							<label for="Quantity">Quantity</label>
							<div class="input-group text-center mb-3">
								<button class="input-group-text decrement_btn">-</button>
								<input type="text" name="Quantity" value="1" class="form-control qty_input">
								<button class="input-group-text increment_btn">+</button>
							</div>
						</div>
						<div class="col-md-10 mt-4">
						<button type="buttton" class="btn btn-success addtowishlist float-start me-3">Add To Wishlist</button>
						@if($products->qty>0)
						<button type="buttton" class="btn btn-success addtocartbtn float-start me-3">Add To Cart</button>
						@endif
					</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="card-footer">
			<h6>{{$products->description}}</h6>
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
			  Rate This Product
			</button>
			
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			    <form action="{{url('/add-rate')}}" method="POST">
			    	@csrf
			    	<input type="hidden" name="product_id" value="{{$products->id}}">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Rate {{$products->name}}</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			     		<div class="rating-css">
				        <div class="star-icon">
				        	@if($user_rating)
				        		@for($a=1;$a<=$user_rating->stars_rated+1;$a++)
								<input type="radio" value="{{$a}}" name="product_rating"  id="rating{{$a}}">
								  <label for="rating{{$a}}" class="fa fa-star"></label>
									
								
								 @endfor
								
					        	 <input type="radio" value="1" name="product_rating" checked id="rating1">
								  <label for="rating1" class="fa fa-star"></label>
				        	@else
							    <input type="radio" value="1" name="product_rating" checked id="rating1">
							    <label for="rating1" class="fa fa-star"></label>
							    <input type="radio" value="2" name="product_rating" id="rating2">
							    <label for="rating2" class="fa fa-star"></label>
							    <input type="radio" value="3" name="product_rating" id="rating3">
							    <label for="rating3" class="fa fa-star"></label>
							    <input type="radio" value="4" name="product_rating" id="rating4">
							    <label for="rating4" class="fa fa-star"></label>
							    <input type="radio" value="5" name="product_rating" id="rating5">
							    <label for="rating5" class="fa fa-star"></label>
							    @endif
				    </div>
				</div>   
			    </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Submit</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>
		
		</div>
	</div>
</div>
@endsection

