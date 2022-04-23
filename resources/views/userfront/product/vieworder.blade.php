@extends('frontend.index')
@section('title')
My Order View
@endsection

@section('content')
<div class="container">
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
					<h1>Grand Price: {{$orders->total_price}}</h1>
				</div>
				</div>
				
			</div>
		</div>
		</div>
	</div>
</div>
@endsection