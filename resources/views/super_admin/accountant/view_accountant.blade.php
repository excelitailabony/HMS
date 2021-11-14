@extends('layouts.admin_master')
@section('super-admin-content')
    <style>
        .topBar {
            margin-top: 4rem;
        }
        .topBar {
            padding: 2rem;
        }
        .card-title
        {
            display: flex;
            justify-content: space-between;
        }
    </style>
    <div class="container-full topBar">
       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">All Patient
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float:right">
        Launch demo modal
      </button> 
      
      <!-- Modal -->
       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('accountant.add')}}" method="POST">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input type="text" class="form-control" name="name "id="name" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email</label>
                      <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Password</label>
                      <input type="text" class="form-control" name="password" id="password" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Address</label>
                      <input type="text" class="form-control" name="address" id="address" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Phone</label>
                      <input type="text" class="form-control" name="phone" id="phone" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Sex</label>
                      <input type="text" class="form-control" name="sex" id="sex" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Date Of Birth</label>
                      <input type="text" class="form-control" name="dob" id="dob" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Age</label>
                      <input type="text" class="form-control" name="age" id="age" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Blood Group</label>
                      <input type="text" class="form-control" name="bloodgrp" id="bloodgrp" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Image</label>
                      <input type="file" class="form-control" nmae="image" id="image" aria-describedby="emailHelp">
                    </div>
                </div>
                </div>
                 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close </button>
              <button type="submit" class="btn btn-primary">Save Data</button>
            </div>
        </form>
          </div>
        </div>
      </div>
                        </h4>
                    
                        
                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                               
                               
                                <div class="col-sm-12">
                                    
                                  
                                    <table id="datatable-buttons"
                                        class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                        aria-describedby="datatable-buttons_info">
                                        <thead>

                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 141px;"
                                                    aria-label="Position: activate to sort column ascending">Email</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 117px;"
                                                    aria-label="Office: activate to sort column ascending">Password</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 53px;"
                                                    aria-label="Age: activate to sort column ascending">Address</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 105px;"
                                                    aria-label="Start date: activate to sort column ascending">Phone
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Sex</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 50px;"
                                                    aria-label="Salary: activate to sort column ascending">Date Of Birth</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Age</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Blood Group</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($accountants as $item)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">{{$item->name}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->password}}</td>
                                                <td>{{$item->address}}</td>
                                                <td>{{$item->phone}}</td>
                                                <td>{{$item->sex}}</td>
                                                <td>{{$item->dob}}</td>
                                                <td>2{{$item->age}}</td>
                                                <td>{{$item->bloodgrp}}</td>
                                                <td><img src="{{ asset($item->image) }}" height="80px;" width="80px;"></td>
                                                <td>{{$item->status}}</td>
                                            </tr>
                                            @endforeach
                                   
                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
@endsection