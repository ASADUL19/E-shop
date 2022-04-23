@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Carousel</h4>
                
                </div>
                <div class="card-body">
                  <form action="{{url('carousel-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                      </div>
                     </div>
                     <div class="row mt-5">
                       <div class="col-md-12">
                         <input type="file" name="image">
                       </div>
                     </div>
                      
                    <button type="submit" class="btn btn-primary pull-right">Create Carousel</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
      @endsection