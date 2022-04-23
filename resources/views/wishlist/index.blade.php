@extends('frontend.index')
@section('title')

@endsection

@section('content')
<div class="py-3 mb-4 shadow bg-warning border-top">
	<div class="container">
		<a class="text-decoration-none" href="{{url('/')}}">
			Home
		</a>/
		<a class="text-decoration-none" href="{{url('cart')}}">
			My Wishlist
		</a>
		
	</div>
	
</div>
<div class="container mt-3">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4>All My Favorite Shoping Item </h4>
				</div>
				<div class="card-body">
					@if($wishlists->count()>0)
					@foreach($wishlists as $item)
					<div class="row product_data">
						<div class="col-md-2 ">
						<img src="{{asset('uploads/product/'.$item->products->image)}}" width="150" height="70" alt="img here">
					    </div>
					    <div class="col-md-2 text-center mt-3">
							<span>{{$item->products->name}}</span>
					    </div>
					    <div class="col-md-2 text-center mt-3">
							<span>TK: {{$item->products->selling_price}}</span>
					    </div>
					    <div class="col-md-2 text-center mt-3">
							<input type="hidden" class="prod_id" value="{{$item->prod_id}}">
							@if($item->products->qty > 0)
							<span>Stock In</span>
							@else
							<span>Stock Out</span>
							@endif
					    </div>
					  	<div class="col-md-2 text-center mt-3">
							<button type="buttton" class="btn btn-success addtocartbtn float-start me-3">Add To Cart</button>
					    </div>
					    <div class="col-md-2 text-center mt-3">
					    <form id="delete-id-{{$item->id}}" action="{{url('wishlist-item-delete',$item->id)}}" method="POST">
					    	@csrf
					    	@method('DELETE')
					    </form>
							<a href="{{url('wishlist-item-delete',$item->id)}}" onclick="if(confirm('are you sure delete this wishlist item')){
								event.preventDefault();document.getElementById('delete-id-{{$item->id}}').submit();
							}
							else {
								event.preventDefault();
							}" class="btn btn-danger"><i class="material-icons">Remove</i></a>
					    </div>
					 </div>
					 @endforeach
					@else
					<p class="text-center">No Wishlist Here</p>
					<p class="text-center"><a href="{{url('category')}}">Continue Shoping</a></p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

