@extends('layouts.app')
@section('title')
My Order View
@endsection

@section('content')
<div class="container mt-3">
	<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h6>Order view</h6>
			</div>
			<div class="card-body">
				<div class="row">
				<div class="col-md-6">
					<label for="">First Name</label>
					<div class="border p-2">{{$orders->fname}}</div>
					<label for="">Last Name</label>
					<div class="border p-2">{{$orders->lname}}</div>
					<label for="">Email</label>
					<div class="border p-2">{{$orders->email}}</div>
					<label for="">Phone</label>
					<div class="border p-2">{{$orders->phone}}</div>
					<label for="">Shoping Address</label>
					<div class="border p-2">
						{{$orders->address1}},
						{{$orders->address2}},
						{{$orders->state}},
						{{$orders->city}},
						{{$orders->country}}
					</div>
					<label for="">Zip Code</label>
					<div class="border p-2">{{$orders->pinecode}}</div>

				</div>
				<div class="col-md-6">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Name</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Image</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders->orderitem as $item)
							<tr>
								<td>{{$item->products->name}}</td>
								<td>{{$item->qty}}</td>
								<td>{{$item->price}}</td>
								<td>
									<img src="{{asset('uploads/product/'.$item->products->image)}}" width="50" height="50" alt="">
								</td>
							</tr>
							@endforeach
						</tbody>
						
					</table>
					<h6>Grand Price: {{$orders->total_price}}</h6>
					<label for="">Order Status</label>
					<form action="{{url('update-order/'.$orders->id)}}" method="POST">
						@csrf
						@method('PUT')
					<select class="form-select form-control" name="order_status">
					  <option {{$orders->status==0 ? 'selected':''}} value="0">pending</option>
					  <option {{$orders->status==1 ? 'selected':''}} value="1">complete</option>
					</select>
					<button type="submit" class="btn btn-primary mt-2">Update</button>
					</form>
				</div>
				</div>
				
			</div>
		</div>
		</div>
	</div>
</div>
@endsection