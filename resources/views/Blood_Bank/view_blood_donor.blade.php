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

                    <h4 class="card-title text-center">Blood Donor
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            New Blood Donor
                        </button>
                    </h4>

                    <!-- AddModal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Blood Donor</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form action="{{ route('blooddonor.add') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your name" name="name">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
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
                                                    <label>Gender</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="inlineRadio1" value="male">
                                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="inlineRadio2" value="female">
                                                        <label class="form-check-label"
                                                            for="inlineRadio2">Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Blood Group</label>
                                                    {{-- <input type="text" class="form-control"
                                                        placeholder="Enter your blood group" name="bloodgrp"> --}}
                                                    <select name="blood_group" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Select Blood Group
                                                        </option>

                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Last Donation Date</label>
                                                    <input type="date" class="form-control"
                                                        placeholder="Enter your birth date" name="last_donation_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add Blood Donor">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- check start --}}

                    {{-- check end --}}
                    {{-- modal end --}}
                    <!-- Edit Modal -->
                    {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Accountant</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form action="{{ route('account.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" id="accountant_id" name="accountant_id">
                                    <input type="hidden" id="old_image" name="old_image">

                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your name" name="name" id="name">
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
                                                    {{-- <input type="text" class="form-control"
                                                         placeholder="Enter your blood group" name="bloodgrp"
                                                         id="bloodgrp"> --}}
                                                    {{-- <select name="bloodgrp" class="form-control" required=""
                                                        id="bloodgrp">
                                                        <option value="" selected="" disabled="">Select Blood group
                                                        </option>

                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                    </select>
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
                                         <button type="submit" class="btn btn-rounded btn-info">update</button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div> --}} 
                     {{-- Edit  modal end --}}

                    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline text-center align-middle"
                                    style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                    aria-describedby="datatable-buttons_info">
                                    <thead>
                                        <tr role="row">
                                      
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">Name</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 89px;"
                                                aria-label="Salary: activate to sort column ascending">Age</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 89px;"
                                                aria-label="Salary: activate to sort column ascending">Gender</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 50px;"
                                                aria-label="Salary: activate to sort column ascending">Blood Group</th>
                                          
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 141px;"
                                                aria-label="Position: activate to sort column ascending">Last Donation Date
                                            </th>

                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 89px;"
                                                aria-label="Salary: activate to sort column ascending">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($blooddonors as $blooddonor)
                                            <tr>
                                              
                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    {{ $blooddonor->name }}
                                                </td>
                                                <td>{{ $blooddonor->age }}</td>
                                              
                                                <td>{{ $blooddonor->gender}}</td>
                                               
                                                <td>{{ $blooddonor->blood_group }}</td>
                                                <td>{{ $blooddonor->last_donation_date }}</td>
                                                
                                                <td>

                                                    {{-- <button type="button" value="{{ $blooddonor->id }}"
                                                        class="btn btn-primary editBtn btn-sm"><i
                                                            class="fa fa-pencil-alt"></i></button>

                                                    <a href="{{ route('accountant.delete', $accountant->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fa fa-trash"></i></a> --}}

                                                 

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

@section('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.editBtn', function() {
            var accountant_id = $(this).val();

            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/edit-accountant/" + accountant_id,
                success: function(response) {

                    $('#accountant_id').val(response.accountant.id);
                    $('#name').val(response.accountant.name);
                    $('#email').val(response.accountant.email);
                    $('#password').val(response.accountant.password);
                    // $('#address').val(response.accountant.address);
                    // $('#phone').val(response.accountant.phone);
                    $('#dob').val(response.accountant.dob);
                    $('#age').val(response.accountant.age);
                    $('#bloodgrp').val(response.accountant.bloodgrp);
                    $('#old_image').val(response.accountant.image);
                    if (response.accountant.sex == 'male') {
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