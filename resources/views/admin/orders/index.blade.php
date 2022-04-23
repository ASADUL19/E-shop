@extends('layouts.app')
@section('content')
 <div class="content mt-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Uncompleted Order
                    <a href="{{url('orders-complete/')}}" class="btn btn-success float-right">Complete Order</a>
                  </h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                       <th>Order Date</th>
                       <th>Tracking Number</th>
                       <th>Total Price</th>
                       <th>Status</th>
                       <th>View</th>
                      </thead>
                      <tbody>
                        @foreach($orders as $item)
                        <tr>
                        	<td>{{date('d-m-y',strtotime($item->created_at))}}</td>
                        	<td>{{$item->tracking_no}}</td>
                        	<td>{{$item->total_price}}</td>
                        	<td>
                        		@if($item->status==0)
                        		<span>pending</span>
                        		@else
                        		<span>completed</span>
                        		@endif
                        	</td>
                        	<td><a class="btn btn-primary" href="{{url('orders-view/'.$item->id)}}">View</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
@endsection