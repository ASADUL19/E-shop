@extends('frontend.index')
@section('title')

@endsection

@section('content')

<div class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="mb-5">All Categories</h1>
				<div class="row">
					@foreach($category as $item)
					
					<div class="col-md-4">
						<a href="{{'view-category/'.$item->slug}}">
						<div class="card">
						<img src="{{asset('uploads/category/'.$item->image)}}" alt="image-here" style="width:100%;height:250px;">
					    </div>
					    </a>
					<div class="card-body">
						<p>{{$item->name}}</p>
						<p>
							{{$item->description}}
						</p>
						
					</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>


@endsection