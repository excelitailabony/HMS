@extends('layouts.admin_master')

@section('super-admin-content')

    <style>
        .topBar {
            margin-top: 4rem;
        }

        .topBar {
            padding: 2rem;
        }

        .card-title {
            display: flex;
            justify-content: space-between;
        }

        .modal-body .row .col-md-6 {
            margin-bottom: 1rem;
        }

    </style>

    <div class="container-full topBar">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">All Accountant
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Add Accountant
                            </button>
                        </h4>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('accountant.add') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter first name" name="name">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control"
                                                            placeholder="Enter your email" name="email">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Enter your password" name="password">
                                                        @error('password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="email" class="form-control"
                                                            placeholder="Enter your address" name="address">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter phone number" name="phone">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Sex</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your gender" name="sex">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>DOB</label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Enter your birth date" name="dob">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Age</label>
                                                        <input type="email" class="form-control"
                                                            placeholder="Enter your age" name="age">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Blood Group</label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Enter your blood group" name="bloodgrp">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Image</label>
                                                        <input type="file" class="form-control"
                                                            placeholder="Enter your image" name="image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info" value="Add Accountant">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> 
                        {{-- check start --}}
                       
                        {{-- check end --}}
                        {{-- modal end --}}
                             <!-- Edit Modal -->
                             <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal1"
                                             aria-label="Close"></button>
                                     </div>
                                     
 
                                     <form action="{{url('accountant.update')}}" method="POST" enctype="multipart/form-data" >

                                        @csrf
                      
                                        <input type="hidden"  id="id" >
                      
                                         <div class="modal-body">
                                            
                                            {{-- <input type="hidden" name="old_image" value="{{ $accountedit->image }}"> --}}
 
                                             <div class="row">
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Name</label>
                                                         <input type="text" class="form-control"
                                                             placeholder="Enter first name" name="name"  id="name">
                                                         @error('name')
                                                             <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Email</label>
                                                         <input type="email" class="form-control"
                                                             placeholder="Enter your email" name="email" id="email">                                                         @error('email')
                                                             <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Password</label>
                                                         <input type="password" class="form-control"
                                                             placeholder="Enter your password" name="password"  id="password"> 
                                                         @error('password')
                                                             <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Address</label>
                                                         <input type="email" class="form-control"
                                                             placeholder="Enter your address" name="address"  id="address"> 
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Phone</label>
                                                         <input type="text" class="form-control"
                                                             placeholder="Enter phone number" name="phone"  id="phone"> 
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Sex</label>
                                                         <input type="text" class="form-control"
                                                             placeholder="Enter your gender" name="sex"  id="sex"> 
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>DOB</label>
                                                         <input type="password" class="form-control"
                                                             placeholder="Enter your birth date" name="dob"  id="dob"> 
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Age</label>
                                                         <input type="email" class="form-control"
                                                             placeholder="Enter your age" name="age"  id="age"> 
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Blood Group</label>
                                                         <input type="password" class="form-control"
                                                             placeholder="Enter your blood group" name="bloodgrp" id="bloodgrp"> 
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Image</label>
                                                         <input type="file" class="form-control"
                                                             placeholder="Enter your image" name="image"  id="image"> 
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
 
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary"
                                                 data-bs-dismiss="modal">Close</button>
                                             <input type="submit" class="btn btn-rounded btn-info" value="Edit Accountant">
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>  
                         {{-- Edit  modal end --}}

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
                                                    rowspan="1" colspan="1" style="width: 117px;"
                                                    aria-label="Office: activate to sort column ascending">Email</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 53px;"
                                                    aria-label="Age: activate to sort column ascending">Phone</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 105px;"
                                                    aria-label="Start date: activate to sort column ascending">Sex
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Dob</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 50px;"
                                                    aria-label="Salary: activate to sort column ascending">Age</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Blood Group</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 141px;"
                                                    aria-label="Position: activate to sort column ascending">Image</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Actions</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($accountants as $accountant)
                                                <tr>
                                                    <td class="dtr-control sorting_1" tabindex="0">{{ $accountant->name }}
                                                    </td>
                                                    
                                                    <td>{{ $accountant->email }}</td>
                                                    <td>{{ $accountant->phone }}</td>
                                                    <td>{{ $accountant->sex }}</td>
                                                    <td>{{ $accountant->dob }}</td>
                                                    <td>{{ $accountant->age }}</td>
                                                    <td>{{ $accountant->bloodgrp}}</td>
                                                    <td><img src="{{ asset($accountant->image) }}" height="80px;" width="80px;"></td>
                                                    @if($accountant->status==0)
								<td>  <a class="btn btn-danger btn-sm">Deactive</a> </td>
								@else
								<td>  <a class="btn btn-success btn-sm">Active</a> </td>
								@endif
                                                    <td>
                                {{-- <a href="" value=" {{$accountant->id}}" class="btn btn-info btn-sm editbtn" ><i class="fa fa-pencil-alt"></i> </a> --}}
                                <button type="button" value="{{ $accountant->id }}"
                                    class="btn btn-primary editBtn btn-sm"><i
                                        class="fa fa-pencil-alt"></i></button>

									<a href="{{ route('accountant.delete',$accountant->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
								@if($accountant->status==1)
									<a href="{{ route('accountant.deactive',$accountant->id) }}" class="btn btn-danger btn-sm" title="Product deactive now"><i class ="fa fa-arrow-down"></i></a>
								@else
									<a href="{{ route('accountant.active',$accountant->id) }}" class="btn btn-success btn-sm" title="Product active now"><i class ="fa fa-arrow-up"></i></a>
								@endif
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
            </div> <!-- end col -->
        </div>
    </div>
@endsection
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
data-bs-target="#exampleModal">
Add Accountant
</button> --}}
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.editBtn', function() {
                var patient_id = $(this).val();
                // alert(patient_id);
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-accountant/" + patient_id,
                    success: function(response) {
                        // 
                        $('#name').val(response.accountant.name);
                    }
                })
            });
        });
    </script>
@endsection
