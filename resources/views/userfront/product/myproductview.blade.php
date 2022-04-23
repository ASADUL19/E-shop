@extends('frontend.index')
@section('title')
My Product
@endsection

@section('content')
<div class="container mt-5">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4>My Orders</h4>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Order Date</th>
						<th>Tracking Number</th>
						<th>Total Price</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($orders as $order)
					<tr>
						<td>{{date('d-m-y',strtotime($order->created_at))}}</td>
						<td>{{$order->tracking_no}}</td>
						<td>{{$order->total_price}}</td>
						<td>
							@if($order->status== 0 )
							<span class="btn btn-danger">pending</span>
							@endif
							@if($order->status== 1)
							<span class="btn btn-success">completed</span>
							@endif
							
						</td>
						<td><a href="{{url('vieworder/'.$order->id)}}" class="btn btn-primary">View</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection