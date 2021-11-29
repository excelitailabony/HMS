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

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* display: none; <- Crashes Chrome on hover */
            -webkit-appearance: none;
            margin: 0;
            /* <-- Apparently some margin are still there even though it's hidden */
        }

        input[type=number] {
            -moz-appearance: textfield;
            /* Firefox */
        }

    </style>

    <div class="container-full topBar">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">All Nurse
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddDoctor">
                                Add Nurse
                            </button>
                        </h4>

                        <!-- Modal for add nurse -->
                        <div class="modal fade" id="AddDoctor" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add nurse info</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('add.nurse') }}" method="POST" enctype="multipart/form-data">
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
                                                        <label>Phone</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Enter your phone number" name="phone">
                                                        @error('phone')
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

                                                        <select name="blood_group">
                                                            <option selected="">Select blood group</option>
                                                            <option>O+</option>
                                                            <option>O-</option>
                                                            <option>B+</option>
                                                            <option>AB+</option>

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
                                            <input type="submit" class="btn btn-rounded btn-info" value="Add Nurse">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- end modal for add nurse --}}


                        {{-- modal for edit nurse --}}
                        {{-- Modal for edit nurse --}}
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Nurse</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('update.nurse') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" id="nurse_id" name="nurse_id">
                                        <input type="hidden" id="old_image" name="old_image">
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
                                                        <label>Password</label>
                                                        <input type="password" name="password" id="password"
                                                            class="form-control" placeholder="Enter your password">
                                                        @error('password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Sex</label><br>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sex" id="sex"
                                                                value="male">
                                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sex" id="sex"
                                                                value="female">
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
                                                        <label>Blood group</label>
                                                        <input type="text" name="blood_group" id="blood_group">
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
                                            <button type="submit" class="btn btn-primary btn-rounded">update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- end modal for edit  nurse --}}


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
                                                    aria-label="Name: activate to sort column descending">Id</th>

                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Name</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 141px;"
                                                    aria-label="Position: activate to sort column ascending">Image</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 117px;"
                                                    aria-label="Office: activate to sort column ascending">Email</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 53px;"
                                                    aria-label="Age: activate to sort column ascending">Phone</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 53px;"
                                                    aria-label="Age: activate to sort column ascending">Password</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 53px;"
                                                    aria-label="Age: activate to sort column ascending">Address</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 105px;"
                                                    aria-label="Start date: activate to sort column ascending">Sex
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Date Of Birth
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 50px;"
                                                    aria-label="Salary: activate to sort column ascending">Age</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Blood Group</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Actions</th>
                                        </thead>


                                        <tbody>
                                            @foreach ($nurses as $nurse)
                                                <tr class="odd">
                                                    <td class="id">{{ $nurse->id }}</td>
                                                    <td class="name">{{ $nurse->name }}</td>
                                                    <td class="image"><img src="{{ asset($nurse->image) }}"
                                                            class="rounded avatar-lg" alt="" style="width: 80px;">
                                                    </td>
                                                    <td class="email">{{ $nurse->email }}</td>
                                                    <td class="phone">{{ $nurse->phone }}</td>
                                                    <td class="password">{{ $nurse->password }}</td>
                                                    <td class="address">{{ $nurse->address }}</td>
                                                    <td class="sex">{{ $nurse->sex }}</td>
                                                    <td class="dob">{{ $nurse->dob }}</td>
                                                    <td class="age">{{ $nurse->age }}</td>
                                                    <td class="blood_group">{{ $nurse->blood_group }}</td>
                                                    <td>
                                                        <button id="" value="{{ $nurse->id }}" data-bs-toggle="modal"
                                                            data-bs-target="#editModal"
                                                            class="btn btn-success btn-sm editBtn" title="Edit"
                                                            data-bs-target="#exampleModal2">
                                                            <i class="fa fa-pencil-alt"></i>
                                                        </button>
                                                        <a href="{{ route('delete.nurse', $nurse->id) }}"
                                                            class="btn btn-danger btn-sm" title="Delete" id="delete"><i
                                                                class="fa fa-trash"></i></a>
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
                var nurse_id = $(this).val();
                // alert(nurse_id);
                $('#editModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "/edit-nurse/" + nurse_id,
                    success: function(response) {
                        console.log(response.nurse.blood_group);
                        $('#nurse_id').val(response.nurse.id);
                        $('#name').val(response.nurse.name);
                        $('#email').val(response.nurse.email);
                        $('#old_image').val(response.nurse.image);
                        $('#address').val(response.nurse.address);
                        $('#phone').val(response.nurse.phone);
                        $('#password').val(response.nurse.password);
                        $('#sex').val(response.nurse.sex);
                        $('#dob').val(response.nurse.dob);
                        $('#age').val(response.nurse.age);
                        $('#blood_group').val(response.nurse.blood_group);

                        if (response.nurse.sex == 'male') {
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
