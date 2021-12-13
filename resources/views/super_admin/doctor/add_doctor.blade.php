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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection

@section('super-admin-content')

    <div class="container-full topBar">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('store.doctor') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="Enter first name"
                                            name="first_name1">
                                        <span id="error_fname" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Enter last name"
                                            name="last_name1">
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
                                            name="designation">
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
                                <hr>
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
                                <hr>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label><br>
                                        <input class="form-check-input gender1" type="radio" name="sex" value="male">Male
                                        <input class="form-check-input gender1" type="radio" name="sex"
                                            value="female">Female<br>
                                        <span id="error_gender" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address1</label>
                                            <input type="text" class="form-control" placeholder="Enter your address"
                                                name="address1">
                                            <span id="error_address" class="errorColor"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address2</label>
                                            <input type="text" class="form-control" placeholder="Enter your address"
                                                name="address12">
                                            <span id="error_address" class="errorColor"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control" placeholder="Enter your address"
                                                name="city">
                                            <span id="error_address" class="errorColor"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Zip</label>
                                            <input type="text" class="form-control" placeholder="Enter your address"
                                                name="zip">
                                            <span id="error_address" class="errorColor"></span>
                                        </div>
                                    </div>
                                    <hr>
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
                                        <label>Profile</label>
                                        <input type="text" class="form-control" placeholder="Enter your speciality"
                                            name="profile">
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
                                            name="career_title">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short Biography</label>
                                        <textarea class="ckeditor form-control" name="short_biography"></textarea>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Specialist</label>
                                        <input type="text" class="form-control" placeholder="Enter career title"
                                            name="specialist">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Long Biography</label>

                                        <textarea class="ckeditor form-control" name="long_biography"></textarea>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <label>Education Degree</label>
                                        <div class="col-md-12">
                                            <div class="jq">
                                                <textarea class="ckeditor form-control" name="education_degree"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input status1" type="radio" name="status"
                                                id="inlineRadio1" value="Active">
                                            <label class="form-check-label" for="inlineRadio1">Active</label>

                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input status1" type="radio" name="status"
                                                id="inlineRadio2" value="InActive">
                                            <label class="form-check-label" for="inlineRadio2">InActive</label>

                                        </div>
                                        <span id="error_statusedit" class="errorColor"></span>

                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="table-responsive">
                                    <form method="post" id="dynamic_form">
                                        @csrf
                                        <span id="result"></span>
                                        <table class="table table-bordered table-striped" id="user_table">
                                            <thead>
                                                <tr>

                                                    <th width="35%">First Name</th>
                                                    <th width="35%">Last Name</th>
                                                    <th width="30%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>

                                                    <td colspan="2" align="right">&nbsp;</td>
                                                    <td>
                                                        @csrf
                                                        <input type="submit" name="save" id="save" class="btn btn-primary"
                                                            value="Save" />
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-1"></div> --}}
        </div>
    </div>


@endsection
@section('scripts')


    {{-- for ckeditor --}}
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();

        });
    </script> --}}
    <script>
        $(document).ready(function() {

            var count = 1;

            dynamic_field(count);

            function dynamic_field(number) {
                html = '<tr>';
                html += '<td><input type="text" name="first_name[]" class="form-control" /></td>';
                html += '<td><input type="text" name="last_name[]" class="form-control" /></td>';
                if (number > 1) {
                    html +=
                        '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                    $('tbody').append(html);
                } else {
                    html +=
                        '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                    $('tbody').html(html);
                }
            }

            $(document).on('click', '#add', function() {
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function() {
                count--;
                $(this).closest("tr").remove();
            });

            $('#dynamic_form').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: '{{ route('dynamic-field.insert') }}',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        $('#save').attr('disabled', 'disabled');
                    },
                    success: function(data) {
                        if (data.error) {
                            var error_html = '';
                            for (var count = 0; count < data.error.length; count++) {
                                error_html += '<p>' + data.error[count] + '</p>';
                            }
                            $('#result').html('<div class="alert alert-danger">' + error_html +
                                '</div>');
                        } else {
                            dynamic_field(1);
                            $('#result').html('<div class="alert alert-success">' + data
                                .success + '</div>');
                        }
                        $('#save').attr('disabled', false);
                    }
                })
            });

        });
    </script>

@endsection
