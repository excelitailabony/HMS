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

        .modal-body .row .col-md-4 {
            margin-bottom: 1rem;
        }

    </style>

    <div class="container-full topBar">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">All Diagnosis Test
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#AddDiagnosisTest">
                                Add Diagnosis Test
                            </button>
                        </h4>

                        <!-- Modal for add doctor -->
                        <div class="modal fade bd-example-modal-lg" id="AddDiagnosisTest" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Diagnosis Test</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('store.diagnosis_test') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Patient</label>
                                                        <select name="patient_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select Patient Name
                                                            </option>
                                                            @foreach ($patients as $patient)
                                                                <option value="{{ $patient->id }}">{{ $patient->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Doctor</label>
                                                        <select name="doctor_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select Doctor Name
                                                            </option>
                                                            @foreach ($doctors as $doctor)
                                                                <option value="{{ $doctor->id }}">{{ $doctor->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Diagnosis Category</label>
                                                        <select name="diagnosis_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select Diagnosis
                                                                Category
                                                            </option>
                                                            <option value="34">hellow</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Report Number</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your report number" name="report_number"
                                                            id="report_number">
                                                        @error('report_number')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Age</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your age" name="age">
                                                        @error('age')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Height</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your height" name="height">
                                                        @error('height')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Weight</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your weight" name="weight">
                                                        @error('weight')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Average Glucose</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your glucose" name="glucose">
                                                        @error('glucose')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Fasting Blood Sugar</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your blood_sugar" name="blood_sugar">
                                                        @error('blood_sugar')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Urine</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your urine" name="urine">
                                                        @error('urine')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Blood Pressure</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your blood_pressure" name="blood_pressure">
                                                        @error('blood_pressure')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Diabetis</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your diabetis" name="diabetis">
                                                        @error('diabetis')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Cholestrol</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your cholestrol" name="cholestrol">
                                                        @error('cholestrol')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info" value="Add Test">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for add Edit doctor -->
                        {{-- <div class="modal fade" id="EditDoctor" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Doctor</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('update.doctor') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" id="doctor_id" name="doctor_id">
                                            <input type="hidden" id="old_image" name="old_image">
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
                                                        <label>Profile</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your profile" name="profile" id="profile">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Doc Dept</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter doctor department" name="doc_dept"
                                                            id="doc_dept">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Sex</label><br>
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
                                                        <select name="blood_group" id="blood_group" class="form-control"
                                                            required="">
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
                                                        <label>Social Link</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter doctor social link" name="social_link"
                                                            id="social_link">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Image</label>
                                                        <input type="file" class="form-control"
                                                            placeholder="Enter your image" name="image" id="image"
                                                            onChange="mainThamUrl(this)">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <img src="" id="mainThmb">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info" value="Update Doctor">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}


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
                                                    aria-label="Name: activate to sort column descending">REPORT NUMBER</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 141px;"
                                                    aria-label="Position: activate to sort column ascending">PATIENT</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 117px;"
                                                    aria-label="Office: activate to sort column ascending">DOCTOR</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 53px;"
                                                    aria-label="Age: activate to sort column ascending">DIAGNOSIS CATEGORY
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 105px;"
                                                    aria-label="Start date: activate to sort column ascending">CREATED AT
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Actions</th>
                                            </tr>
                                        </thead>


                                        <tbody class="text-center">
                                            @foreach ($diagnosisTests as $diagnosisTest)
                                                <tr>
                                                    <td>{{ $diagnosisTest->report_number }}</td>
                                                    <td>{{ $diagnosisTest['patient']['name'] }}</td>
                                                    <td>{{ $diagnosisTest['doctor']['name'] }}</td>
                                                    <td>{{ $diagnosisTest['doctor']['name'] }}</td>
                                                    <td>{{ $diagnosisTest->created_at }}</td>
                                                    <td>
                                                        <button type="button" value=""
                                                            class="btn btn-success editBtn btn-sm"><i
                                                                class="fa fa-pencil-alt"></i></button>
                                                        <a href="{{ route('delete.diagnosisTest', $diagnosisTest->id) }}"
                                                            class="btn btn-sm btn-danger" id="delete" title="delete data">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
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
