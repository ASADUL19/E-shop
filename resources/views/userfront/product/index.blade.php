@extends('frontend.index')
@section('title')
{{$category->name}}
@endsection

@section('content')
<div class="py-3 mb-4 shadow bg-warning border-top">
	<div class="container">
		<h6 class="mb-0">Collection / {{$category->name}}</h6>
	</div>
	
</div>
<div class="py-5">
	<div class="container">
		<div class="row">
			<h1 class="mb-5">{{$category->name}}</h1>
		
				@foreach($products as $item)
				<div class="col-md-3">
					<a href="{{url('category/'.$category->slug.'/'.$item->slug)}}">
					<div class="card">
						<img src="{{asset('uploads/product/'.$item->image)}}" alt="image-here" style="width:100%;height:250px;">
					</div>
					</a>
					<div class="card-body">
						<p>{{$item->name}}</p>
						<span class="float-start"><del>{{$item->original_price}}</del></span>
						<span class="float-end">{{$item->selling_price}}</span>
						
					</div>
				</div>
				@endforeach
	
			
		</div>
	</div>
</div>
@endsection