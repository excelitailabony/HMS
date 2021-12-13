@extends('layouts.admin_master')

@section('css')
    <style>
        .topBar {
            margin-top: 4rem;
        }

        .topBar {
            padding: 2rem;
        }

        .card {
            border: none;
            box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px !important;
            border: none !important;
        }

        .card .row .col-md-6,
        .card .row .col-md-12 {
            margin-bottom: 1rem;
        }

        .errorColor {
            color: red;
        }

        body {
            overflow-x: hidden;
        }

    </style>
@endsection

@section('super-admin-content')

    <div class="container-full topBar">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="Enter first name"
                                            name="fname">
                                        <span id="error_fname" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Enter last name"
                                            name="lname">
                                        <span id="error_lname" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Enter your email"
                                            name="email">
                                        <span id="error_email" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Enter your password"
                                            name="password">
                                        <span id="error_password" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" class="form-control" placeholder="Enter your designation"
                                            name="profile">
                                        <span id="error_profile" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doc Dept</label>
                                        <select name="doc_dept" class="form-control">
                                            <option value="" selected="" disabled="">Doctor department
                                            </option>
                                            @foreach ($doctorDepts as $doctorDept)
                                                <option value="A+">{{ $doctorDept->name }}</option>
                                            @endforeach
                                        </select>
                                        <span id="error_doc_dept" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" placeholder="Enter phone number"
                                            name="phone">
                                        <span id="error_phone" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" placeholder="Enter mobile number"
                                            name="mobile">
                                        <span id="error_mobile" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label><br>
                                        <input class="form-check-input gender1" type="radio" name="gender" value="male">Male
                                        <input class="form-check-input gender1" type="radio" name="gender"
                                            value="female">Female<br>
                                        <span id="error_gender" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" placeholder="Enter your address"
                                            name="address">
                                        <span id="error_address" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>DOB</label>
                                        <input type="date" class="form-control" placeholder="Enter your birth date"
                                            name="dob">
                                        <span id="error_dob" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="text" class="form-control" placeholder="Enter your age" name="age">
                                        <span id="error_age" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Speciality</label>
                                        <input type="text" class="form-control" placeholder="Enter your speciality"
                                            name="speciality">
                                        <span id="error_speciality" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Social Link</label>
                                        <input type="text" class="form-control" placeholder="Enter doctor social link"
                                            name="social_link">
                                        <span id="error_sociallink" class="errorColor"></span>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Blood Group</label>
                                        <select name="blood_group" class="form-control">
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
                                        <span id="error_blood_group" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" onchange="loadFile(event)"
                                            placeholder="Enter your image" name="image">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Career Title</label>
                                        <input type="text" class="form-control" placeholder="Enter career title"
                                            name="career">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short Biography</label>
                                        <textarea id="elm1" name="area"></textarea>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Long Biography</label>
                                        <textarea id="elm1" name="area"></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
    </div>

@endsection
@section('scripts')
  
@endsection
