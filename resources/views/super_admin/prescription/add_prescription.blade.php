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

        .cardcheck {
            margin-top: 50px;
        }

        .wrapper {
            text-align: center;
        }

        .cardcenter {
            margin: 0 18%;
            margin-bottom: 5rem;
        }

        .rowmargin .row {
            margin: 1rem 1rem 0 0;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection

@section('super-admin-content')
    <form id="AddEmployeeFORM">
        <div class="container-full topBar">

            <div class="row">

                <div class="col-12">
                    <div class="card cardcheck">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 rowmargin">
                                    <div class="row ">
                                        <input type="text" class="form-control" name="patient_id" id="patient_id"
                                            placeholder="Patient Id">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control" name="food_allergies"
                                            placeholder="Patient Name" id="patient_name">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control" name="sex" id="sex" placeholder="Sex">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control" name="dob" id="dob"
                                            placeholder="Date Of Birth">
                                    </div>

                                </div>
                                <div class="col-md-4 rowmargin">

                                    <div class="row ">
                                        <input type="text" class="form-control" name="weight" id="weightt"
                                            placeholder="Weight">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control" name="blood_pressure" id="blood_pressuree"
                                            placeholder="Blood Pressure">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control" name="reference" id="referencee"
                                            placeholder="Reference">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Type</label><br>
                                            <input class="form-check-input gender1" type="radio" name="type" value="New"
                                                checked>New
                                            &nbsp;
                                            <input class="form-check-input gender1" type="radio" name="type" value="Old">Old
                                            <span id="error_gender" class="errorColor"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4 rowmargin">
                                    <div class="row ">
                                        <input type="text" class="form-control" name="food_allergies" value="ABC1234"
                                            name="appointment_id" placeholder="Appointment Id">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control" name="date" placeholder="Date"
                                            value="2/7/2021">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control" name="hospital_name"
                                            value="Demo Hospital Limited" placeholder="Hospital Name">
                                    </div>

                                    <div class="row">
                                        <input type="text" class="form-control" name="address" placeholder="Address"
                                            value="House#25, 4th Floor, Mannan Plaza, Khilkhet, Dhaka-1229, Bangladesh.">
                                    </div>

                                </div>

                            </div>
                            {{-- <hr> --}}
                            <div class="row">
                                <div class="col-md-8">
                                    <label></label>
                                    <textarea class="ckeditor form-control" name="education_degree"
                                        placeholder="Cheif Complain"></textarea>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label>Insurance</label>
                                        <select name="blood_group" class="form-control">
                                            <option value="" selected="" disabled="">Select Insurance
                                            </option>
                                            <option value="IFIC Insurance">IFIC Insurance</option>
                                            <option value="BUPA">BUPA</option>
                                            <option value="HEALTH">HEALTH</option>
                                            <option value="TEST12121">TEST12121</option>
                                            <option value="TABARAK">TABARAK</option>
                                        </select>
                                        <span id="error_blood_group" class="errorColor"></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            {{-- <div class="row"> --}}
            <div class="  card cardcenter">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">

                                @csrf
                                {{-- <span id="result"></span> --}}
                                <table class="table " id="user_table">
                                    <thead>
                                        <tr>
                                            <th>Medicine Name </th>
                                            <th>Medicine Type </th>
                                            <th>Instruction</th>
                                            <th>Days</th>
                                            <th>Add/Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>

                                            <td colspan="2" align="right">&nbsp;</td>
                                            <td>
                                                @csrf
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="wrapper">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
        </div>

    </form>
@endsection
@section('scripts')
    <script>
        // doctor name on department select
        $('#patient_id').on('keyup', function() {
            var patient_id = $(this).val();
            if (patient_id) {
                $.ajax({
                    url: "/Prescription/patient/" + patient_id,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#patient_name').html('');
                        $('#patient_name').val(response.patients[0].name);
                        $('#sex').val(response.patients[0].sex);
                        $('#dob').val(response.patients[0].dob);
                        $('#weightt').val(response.casestudy[0].weight);
                        $('#blood_pressuree').val(response.casestudy[0].high_blood_pressure);
                        $('#referencee').val(response.casestudy[0].reference);
                        // $.each(response, function(key, value) {
                        //     $('select[name="doctor_name"]').append(
                        //         '<option value="' + value.id + '">' + value
                        //         .first_name1 + '</option>');
                        // });
                    },
                });
            } else {
                alert('danger');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            var count = 1;
            dynamic_field(count);

            function dynamic_field(number) {
                html = '<tr>';
                html +=
                    '<td><input type="text" name="medicine_name[]" id="medicine_name" class="form-control" placeholder="medicine name"/></td>';
                html +=
                    '<td><input type="text" name="medicine_type[]" id="medicine_type" class="form-control placeholder="medicine type"/></td>';
                // html +=
                //     '<td><input type="text" name="instruction[]" id="instruction" class="form-control" placeholder="instruction" /></td>';
                html +=
                    '<td width="60%"><textarea class="ckeditor form-control" name="instruction" placeholder="instruction"></textarea></td>';
                html +=
                    '<td><input type="number" name="days[]" id="days" class="form-control" placeholder="days"/></td>';
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
        });
    </script>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {

                blah.src = URL.createObjectURL(file)
            }
        }
    </script>

@endsection
