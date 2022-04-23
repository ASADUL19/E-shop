@extends('layouts.app')
@section('content')
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All User</h4>
                 
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead class=" text-primary">
                       <th>SL</th>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Phone</th>
                       <th>Action</th>
                       
                      </thead>
                      <tbody>
                        @foreach($users as $key=>$user)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$user->name.' '.$user->lname}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->phone}}</td>
                          <td>
                            <a class="btn btn-primary" href="{{url('users-all-details/'.$user->id)}}">User Details</a>
                          </td>
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