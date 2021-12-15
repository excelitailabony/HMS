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

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection

@section('super-admin-content')
    <form id="AddEmployeeFORM">
        <input type="hidden" id="case_study_id" name="case_study_id">
        <div class="container-full topBar">

            <div class="row">
                <div class="col-6">
                    <div class="card cardcheck">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient id</label>
                                        <input type="text" class="form-control" id="patient_id"
                                            placeholder="Enter first name" class="patient_id" id="patient_id"
                                            placeholder="Enter Patient id">
                                        <span id="error_patient_id" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Food Allergies</label>
                                        <input type="text" class="form-control" id="food_allergies" placeholder="Enter Food Allergiid
                                                                        </div>
                                                                    </div>
                                                                    <div class="         col-md-6">
                                        <div class="form-group">
                                            <label>Tendency Bleed</label>
                                            <input type="text" class="form-control" id="tendency_bleed"
                                                placeholder="Enter Tendency Bleed">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Heart Disease</label>
                                            <input type="text" class="form-control" id="heart_disease"
                                                placeholder="Enter Heart Disease">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>High Blood Pressure</label>
                                            <input type="text" class="form-control" id="high_blood_pressure"
                                                placeholder="Enter High Blood Pressure">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Diabetic</label>
                                            <input type="text" class="form-control" id="diabetic"
                                                placeholder="Enter Diabetic">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Surgery</label>
                                            <input type="text" class="form-control" id="surgery"
                                                placeholder="Enter Surgery">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Accident</label>
                                            <input type="text" class="form-control" id="accident"
                                                placeholder="Enter Accident">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-6">
                        <div class="card cardcheck">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Family Medical History</label>
                                            <input type="text" class="form-control" id="family_medical_history"
                                                placeholder="Enter Family Medical History">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Current Medication</label>
                                            <input type="text" class="form-control" id="current_medication"
                                                placeholder="Enter Current Medication">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Family pregnency</label>
                                            <input type="text" class="form-control" id="family_pregnency"
                                                placeholder="Enter Family pregnency">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Breast Feeding</label>
                                            <input type="text" class="form-control" id="breast_feeding"
                                                placeholder="Enter Breast Feeding">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Health Insurance</label>
                                            <input type="text" class="form-control" id="health_insurance'"
                                                placeholder="Enter Health Insurance">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Low Income</label>
                                            <input type="text" class="form-control" id="low_income"
                                                placeholder="Enter Low Income">
                                            <span id="error_status" class="errorColor"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Reference</label>
                                            <input type="text" class="form-control" id="reference"
                                                placeholder="Enter Reference">
                                            <span id="error_status" class="errorColor"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label><span class="errorColor"> *</span><br>
                                            <input class="form-check-input " type="radio" class="status"
                                                value="Active" checked>Active
                                            <input class="form-check-input " type="radio" class="status"
                                                value="Inactive">Inactive<br>
                                            <span id="error_status" class="errorColor"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                {{-- <div class="row"> --}}
                <div class="card cardcenter">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">

                                    @csrf
                                    {{-- <span id="result"></span> --}}
                                    <table class="table " id="user_table">
                                        <thead>
                                            <tr>
                                                <th width="35%">Others Problem </th>
                                                <th width="30%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                            <tr>

                                                {{-- <td colspan="2" align="right">&nbsp;</td> --}}
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            $(document).on('click', '.editBtn', function() {
                var patient_id = $(this).val();
                // alert(patient_id);
                $('#editModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "/receptionist/edit-receptionist/" + patient_id,
                    success: function(response) {

                        $('#patient_id').val(response.patient.id);
                        $('#name').val(response.patient.name);
                        $('#email').val(response.patient.email);
                        $('#old_image').val(response.patient.image);
                        $('#address').val(response.patient.address);
                        $('#phone').val(response.patient.phone);
                        $('#gender').val(response.patient.sex);
                        $('#dob').val(response.patient.dob);
                        $('#age').val(response.patient.age);
                        $('#bloodgrp').val(response.patient.blood_group);

                        if (response.patient.sex == 'male') {
                            $('#editModal').find(':radio[name=gender1][value="male"]').prop(
                                'checked', true);
                        } else {
                            $('#editModal').find(':radio[name=gender1][value="female"]').prop(
                                'checked', true);
                        }
                    }
                })
            });
        });
    </script> --}}
    {{-- <script>
        // for adding data using ajax
        // for adding patient information
        $("#AddEmployeeFORM").on('submit', function(event) {
            event.preventDefault();
            let patient_id = $("#patient_id").val();
            let others = $("#others").val();

            let formData = new FormData($('#AddEmployeeFORM')[0]);
            axios.post('/Prescription/store', formData)
                .then(response => {
                    toastr.success(response.message);
                    location.reload();
                }).catch(error => {
                    console.log(error.response.data.errors);
                    console.log(error.response);
                    if (error.response.status == 422) {
                        $('#error_patient_id').text(error.response.data.errors.patient_id[0]);

                    }
                })

        })
    </script> --}}

    <script>
        $(document).ready(function() {
            var count = 1;
            dynamic_field(count);

            function dynamic_field(number) {
                html = '<tr>';
                html += '<td><input type="text" name="others[]" id="others" class="form-control" /></td>';
                // html += '<td><input type="text" name="last_name[]" id="last_name" class="form-control" /></td>';
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
@endsection
