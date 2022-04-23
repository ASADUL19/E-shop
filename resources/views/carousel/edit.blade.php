@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Carousel</h4>
                
                </div>
                <div class="card-body">
                  <form action="{{url('update/'.$editcarosls->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="name" value="{{$editcarosls->name}}">
                        </div>
                      </div>
                     </div>
                     <div class="row mt-2">
                       <div class="col-md-12">
                         <td><img src="{{asset('uploads/carousel/'.$editcarosls->image)}}" alt="" width="150" height="70"></td>
                       </div>
                     </div>
                     <div class="row mt-5">
                       <div class="col-md-12">
                         <input type="file" name="image">
                       </div>
                     </div>
                      
                    <button type="submit" class="btn btn-primary pull-right">Create Carousel</button>
                    <a class="btn btn-pimary pull-right mx-3" href="{{url('carousel')}}">Back</a>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
      @endsection