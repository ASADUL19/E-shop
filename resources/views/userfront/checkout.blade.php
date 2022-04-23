@extends('frontend.index')
@section('title')
Welcome to Chechout Page
@endsection

@section('content')
<div class="container mt-5">
	<form action="{{url('order-place')}}" method="POST">
		@csrf
	<div class="row">
		<div class="col-md-7">
			<div class="card">
				<div class="card-body">
					Basic Details
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6 mt-3">
						<label for="">First Name</label>
						<input type="text" class="form-control" value="{{Auth::user()->name}}" name="fname" placeholder="Enter Your F-Name" required>
					</div>
					<div class="col-md-6 mt-3">
						<label for="">Last Name</label>
						<input type="text" class="form-control" value="{{Auth::user()->lname}}" name="lname" placeholder="Enter Your L-Name" required>
					</div>
					<div class="col-md-6 mt-3">
						<label for="">Email</label>
						<input type="text" class="form-control" value="{{Auth::user()->email}}" name="email" placeholder="Enter Your F-Name" required>
					</div>
					<div class="col-md-6 mt-3">
						<label for="">Phone Number</label>
						<input type="text" class="form-control" value="{{Auth::user()->phone}}" name="phone" placeholder="Enter Your L-Name" required>
					</div>
					<div class="col-md-6 mt-3">
						<label for="">Address-1</label>
						<input type="text" class="form-control" value="{{Auth::user()->address1}}" name="address1" placeholder="Enter Your Address-1" required>
					</div>
					<div class="col-md-6 mt-3">
						<label for="">Address-2</label>
						<input type="text" class="form-control" value="{{Auth::user()->address2}}" name="address2" placeholder="Enter Your Address-2" required>
					</div>
					<div class="col-md-6 mt-3">
						<label for="">State</label>
						<input type="text" class="form-control" value="{{Auth::user()->state}}" name="state" placeholder="Enter Your State" required>
					</div> 
					<div class="col-md-6 mt-3">
						<label for="">City</label>
						<input type="text" class="form-control" value="{{Auth::user()->city}}" name="city" placeholder="Enter Your City" required>
					</div>
					<div class="col-md-6 mt-3">
						<label for="">Country</label>
						<input type="text" class="form-control" value="{{Auth::user()->country}}" name="country" placeholder="Enter Your Country" required>
					</div>
					<div class="col-md-6 mt-3">
						<label for="">Postal Code</label>
						<input type="text" class="form-control" value="{{Auth::user()->pinecode}}" name="pinecode" placeholder="Enter Your Postal Code" required>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="card">
				<div class="card-body">
					<h6>order details</h6>
					<hr>
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Qty</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							@foreach($cartitems as $item)
							<tr>
								<td>{{$item->products->name}}</td>
								<td>{{$item->prod_qty}}</td>
								<td>{{$item->products->selling_price}}</td>
							</tr>
							@endforeach
						</tbody>

						
					</table>
						<hr>
						 <div id="paypal-button-container"></div>

						<button type="submit" class="btn btn-primary float-end">Place Order</button>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
@endsection