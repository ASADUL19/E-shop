@extends('frontend.index')
@section('title')
Welcome Our E-Shop
@endsection

@section('content')
@include('admin.slider')
<div class="py-5">
	<div class="container">
		<div class="row">
			<h1 class="mb-5">All Product:</h1>
			<div class="owl-carousel feature-carousel owl-theme">
				@foreach($Feature_Product as $item)
				<div class="item">
					<a href="{{'category'}}">
					<div class="card">
						<img src="{{asset('uploads/product/'.$item->image)}}" alt="image-here" style="width:100%;height:250px;">
					</div>
					</a>
					<div class="card-body">
						<p>{{$item->name}}</p>
						<span><del>{{$item->original_price}}</del></span>
						<span class="float-end">{{$item->selling_price}}</span>
						
					</div>
				</div>
				@endforeach
		</div>
			
		</div>
	</div>
</div>


<div class="py-5">
	<div class="container">
		<div class="row">
			<h1 class="mb-5">All Trending Category:</h1>
			<div class="owl-carousel feature-carousel owl-theme">
				@foreach($Trending_Product as $item)
				<div class="item">
					<a href="{{'view-category/'.$item->slug}}">
					<div class="card">
						<img src="{{asset('uploads/category/'.$item->image)}}" alt="image-here" style="width:100%;height:250px;">
					</div>
					</a>
					<div class="card-body">
						<p>{{$item->name}}</p>
						<span>{{ Str::limit($item->description,50)}}</span>
						
						
					</div>
				</div>
				@endforeach
		</div>
			
		</div>
	</div>
</div>
<div class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Just Sold Item:</h1>
			</div>
			<div class="row">
				@foreach($complete_order as $item)
				<div class="col-md-4">
					<div class="card">
						<div class="card-body">
							<img class="img-thumbnail rounded" src="{{asset('uploads/product/'.$item->soldes->image)}}" alt="image-here" style="width:100%;height:250px;">
								<span>{{$item->soldes->name}}</span>
								<span class="float-end">{{$item->soldes->selling_price}}</span>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	$('.feature-carousel').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection