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
    {{-- for sweet alert --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script> --}}
    {{-- for sweetalert --}}

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

                        <!-- AddModal -->
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
                                                        <input type="text" class="form-control"
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
                                                        <label>Sex</label><br>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sex"
                                                                id="inlineRadio1" value="male">
                                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sex"
                                                                id="inlineRadio2" value="female">
                                                            <label class="form-check-label"
                                                                for="inlineRadio2">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>DOB</label>
                                                        <input type="date" class="form-control"
                                                            placeholder="Enter your birth date" name="dob">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Age</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your age" name="age">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Blood Group</label>
                                                        <input type="text" class="form-control"
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
                             <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">Edit Patient</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal"
                                             aria-label="Close"></button>
                                     </div>
 
                                     <form action="{{ route('account.update') }}" method="POST"
                                         enctype="multipart/form-data">
                                         @csrf
 
                                         <input type="hidden" id="patient_id" name="patient_id">
                                         <input type="text" id="old_image" name="old_image">

                                         <div class="modal-body">
 
                                             <div class="row">
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Name</label>
                                                         <input type="text" class="form-control"
                                                             placeholder="Enter first name" name="name" id="name">
                                                         @error('name')
                                                             <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Email</label>
                                                         <input type="email" class="form-control"
                                                             placeholder="Enter your email" name="email" id="email">
                                                         @error('email')
                                                             <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Enter your password" name="password" id="password">
                                                        @error('password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Address</label>
                                                         <input type="text" class="form-control"
                                                             placeholder="Enter your address" name="address" id="address">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Phone</label>
                                                         <input type="text" class="form-control"
                                                             placeholder="Enter phone number" name="phone" id="phone">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Sex</label><br>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sex"
                                                                id="inlineRadio1" value="male">
                                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sex"
                                                                id="inlineRadio2" value="female">
                                                            <label class="form-check-label"
                                                                for="inlineRadio2">Female</label>
                                                        </div>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>DOB</label>
                                                         <input type="date" class="form-control"
                                                             placeholder="Enter your birth date" name="dob" id="dob">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Age</label>
                                                         <input type="text" class="form-control"
                                                             placeholder="Enter your age" name="age" id="age">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Blood Group</label>
                                                         <input type="text" class="form-control"
                                                             placeholder="Enter your blood group" name="bloodgrp"
                                                             id="bloodgrp">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Image</label>
                                                         <input type="file" class="form-control"
                                                             placeholder="Enter your image" name="image" id="image">
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
 
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary"
                                                 data-bs-dismiss="modal">Close</button>
                                             {{-- <input type="submit" class="btn btn-rounded btn-info" value="Update Patient"> --}}
                                             <button type="submit">update</button>
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
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $accountant->name }}
                                                    </td>

                                                    <td>{{ $accountant->email }}</td>
                                                    <td>{{ $accountant->phone }}</td>
                                                    <td>{{ $accountant->sex }}</td>
                                                    <td>{{ $accountant->dob }}</td>
                                                    <td>{{ $accountant->age }}</td>
                                                    <td>{{ $accountant->bloodgrp }}</td>
                                                    <td><img src="{{ asset($accountant->image) }}" height="80px;"
                                                            width="80px;"></td>
                                                    @if ($accountant->status == 0)
                                                        <td> <a class="btn btn-danger btn-sm">Deactive</a> </td>
                                                    @else
                                                        <td> <a class="btn btn-success btn-sm">Active</a> </td>
                                                    @endif
                                                    <td>
                                                        {{-- <a href="" value=" {{$accountant->id}}" class="btn btn-info btn-sm editbtn" ><i class="fa fa-pencil-alt"></i> </a> --}}
                                                        <button type="button" value="{{ $accountant->id }}"
                                                            class="btn btn-primary editBtn btn-sm"><i
                                                                class="fa fa-pencil-alt"></i></button>

                                        {{-- <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $accountant->id }}" data-action="{{ route('accountant.delete',$accountant->id) }}" onclick="deleteConfirmation({{$accountant->id}})"> Delete</button>								 --}}
                                        {{-- <button class="btn btn-danger" >Delete</button> --}}
                                        <a href="{{route('accountant.delete',$accountant->id)}}" class="btn btn-danger btn-sm" id="delete"><i class ="fa fa-trash"></i></a>

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
                    url: "/edit-patient/" + patient_id,
                    success: function(response) {
                        // console.log(response.patient.image);
                        $('#patient_id').val(response.patient.id);
                        $('#name').val(response.patient.name);
                        $('#email').val(response.patient.email);
                        $('#password').val(response.patient.password);
                        $('#address').val(response.patient.address);
                        $('#phone').val(response.patient.phone);
                        // $('#sex').val(response.patient.sex);
                        $('#dob').val(response.patient.dob);
                        $('#age').val(response.patient.age);
                        $('#bloodgrp').val(response.patient.bloodgrp);
                        $('#old_image').val(response.patient.image);
                        if (response.patient.sex == 'male') {
                            $('#editModal').find(':radio[name=sex][value="male"]').prop(
                                'checked', true);
                        } else {
                            $('#editModal').find(':radio[name=sex][value="female"]').prop(
                                'checked', true);
                        }
                       
                    }
                })
            });
        });
    </script>
@endsection

