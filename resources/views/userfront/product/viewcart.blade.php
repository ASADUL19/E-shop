@extends('frontend.index')
@section('title')
Home
@endsection

@section('content')
<div class="py-3 mb-4 shadow bg-warning border-top">
	<div class="container">
		<a class="text-decoration-none" href="{{url('/')}}">
			Home
		</a>/
		<a class="text-decoration-none" href="{{url('cart')}}">
			My Cart
		</a>
		
	</div>
	
</div>
<div class="container my-5">
	<div class="card shadow cartitem">
		<div class="card-header">
			<h4>My All Cart Item</h4>
		</div>
		@if($cartitems->count()>0)
		<div class="card-body">
			<?php $total=0; ?>
			@foreach($cartitems as $item)
			<div class="row product_data">
				<div class="col-md-2 ">
				<img src="{{asset('uploads/product/'.$item->products->image)}}" width="150" height="70" alt="img here">
			    </div>
			    <div class="col-md-2 text-center">
			    	<h6 class="mx-5 mt-2">{{$item->products->name}}</h6>
			    </div>
			    <div class="col-md-2 text-center">
			    	<h6 class="mx-5 mt-2">Tk {{$item->products->selling_price}}</h6>
			    </div>
			    <div class="col-md-2 prod_data text-center">
			    	<input type="hidden" class="prod_id" value="{{$item->prod_id}}">
			    	@if($item->products->qty > 0)
					
					<div class="input-group text-center mb-3">
					<button class="input-group-text changequantity decrement_btn">-</button>
					<input type="text" name="Quantity" value="{{$item->prod_qty}}" class="form-control qty_input">
				    <button class="input-group-text changequantity increment_btn">+</button>
					</div>
					<?php $total+=$item->products->selling_price * $item->prod_qty ?>
					@else
					<h6 class="btn btn-danger mt-3 text-center">Out Of Stock</h6>
					@endif
				</div>
				<div class="col-md-2 float-end text-center">
				<button  class=" btn btn-danger delete-cart-item">Remove</button>
				</div>
				
			</div>
			@endforeach
		</div>
		<div class="card-footer">
			<h6>Total Taka: {{$total}}</h6>
			<a href="{{url('checkout')}}" class="btn btn-primary float-end">Proceed to Checkout</a>
			
		</div>
		
		@else
		<div class="card-body text-center">
			<h6>Your Cart Is Empty</h6>
			<a href="{{url('category')}}">Continue Shoping</a>
		</div>
	</div>
	@endif
</div>
@endsection