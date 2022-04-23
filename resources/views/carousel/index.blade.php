@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">
               <a href="{{url('carousel-add')}}" class="btn btn-primary">Add Carousel</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Carousel Item Here</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr>
                          <th>Sl</th>
                          <th>Name</th>
                          <th>Image</th>
                          <th>Delete</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($carousels as $key=>$item)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$item->name}}</td>
                          <td><img src="{{asset('uploads/carousel/'.$item->image)}}" alt="" width="150" height="70"></td>
                          <form id="delete-carousel-{{$item->id}}" action="{{url('delete/'.$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                          </form>
                         <td><a href="{{url('delete/'.$item->id)}}" onclick="if(confirm('are you sure delete this carousel'))
                          {
                            event.preventDefault();document.getElementById('delete-carousel-{{$item->id}}').submit();
                          }
                          else 
                            {
                              event.preventDefault();
                            }"><i class="material-icons">delete</i></a></td>
                          <td><a href="{{url('edit/'.$item->id)}}"><i class="material-icons">edit</i></a></td>
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