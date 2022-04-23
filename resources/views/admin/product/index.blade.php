@extends('layouts.app')
@section('content')
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Product Show</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead class=" text-primary">
                       <th>SL</th>
                       <th>ID</th>
                       <th>Category</th>
                       <th>Name</th>
                       <th>Description</th>
                       <th>Original Price</th>
                       <th>Selling Price</th>
                       <th>Image</th>
                       <th>Edit</th>
                       <th>Delete</th>
                      </thead>
                      <tbody>
                        @foreach($products as $key=>$item)
                        <tr>
                        	<td>{{$key+1}}</td>
                        	<td>{{$item->id}}</td>
                          <td>{{$item->category->name}}</td>
                        	<td>{{$item->name}}</td>
                        	<td>{{$item->description}}</td>
                          <td>{{$item->original_price}}</td>
                          <td>{{$item->selling_price}}</td>
                        	<td><img src="{{asset('uploads/product/'.$item->image)}}" alt="Image here" width="200" height="70"></td>
                        	<td><a href="{{'edit.product/'.$item->id}}"><i class="material-icons">edit</i></a></td>
                        	<form id="delete-id-{{$item->id}}" action="{{url('delete.product/'.$item->id)}}" method="POST">
                           @csrf
                           @method('DELETE') 
                          </form>
                        	<td><a href="{{url('delete.product/'.$item->id)}}" onclick="if(confirm('are you sure delete this category'))
                          {
                            event.preventDefault();document.getElementById('delete-id-{{$item->id}}').submit();
                          }
                          else 
                            {
                              event.preventDefault();
                            }"><i class="material-icons">delete</i></a></td>
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