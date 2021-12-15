@extends('layouts.admin_master')
@section('css')

    <style>
        .filterBox{
            border:1px solid #ddd;
            color: black;
            background: white;
            padding: 15px;
        }
        .filterBox input{
             padding: 15px;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection

@section('super-admin-content')

<div class="container-full topBar">
    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons"
                    class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline text-center align-middle"
                    style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                    aria-describedby="datatable-buttons_info">
                    <div class="filterBox">
                        <form id="AssignToDoctor" method="POST">
                            @csrf
                            <select class="selUser" name="doctor_id" id="doctor_id">
                                <option value="" selected="" disabled="">Select Doctor Name
                                </option>
                                @foreach ($doctors as $doctors)
                                    <option value="{{ $doctors->id }}">{{ $doctors->first_name1 }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="date" name="starting_date">
                            <input type="date" name="ending_date">&emsp;
                            <button type="submit" class="btn btn-info">Filter</button>
                        </form>
                    </div>
                    <br>
                    <thead>
                        <tr role="row">
                            <th rowspan="1" colspan="1" style="width: 50px;">SN</th>
                            <th rowspan="1" colspan="1" style="width: 120px;">Appointment Id</th>
                            <th rowspan="1" colspan="1" style="width: 141px;">Patient Id</th>
                            <th rowspan="1" colspan="1" style="width: 117px;">Department</th>
                            <th rowspan="1" colspan="1" style="width: 53px">Doctor Name</th>
                            <th rowspan="1" colspan="1" style="width: 105px;">Serial No.
                            </th>
                            <th rowspan="1" colspan="1" style="width: 89px;">Problem</th>
                            <th rowspan="1" colspan="1" style="width: 50px;">Appointment Date</th>
                        </tr>
                    </thead>
                    <tbody id="SearchValue">
                        @php
                            $sn=1;
                        @endphp
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $sn++ }}</td>
                                <td>{{ $appointment->appointment_id }}</td>
                                <td>{{ $appointment->patient->patient_id }}</td>
                                <td>{{ $appointment->doctorDept->name }}</td>
                                <td>{{ $appointment->doctor->first_name1 }}</td>
                                <td>{{ $appointment->serial_no }}</td>
                                <td>{{ $appointment->problem }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
$('.selUser').select2();
</script>

<script>

$(document).ready(function() {

        // for adding patient information
        $(document).on('submit', '#AssignToDoctor', function(e) {
            e.preventDefault();
            var id =$('#doctor_id').val();
            // alert(id);
            let formData = new FormData($('#AssignToDoctor')[0]);
            $.ajax({
                type: "POST",
                url: "/Appointment/assign/to/doctor/ajax/" + id,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#SearchValue').empty();
                    console.log(response.length)
                    if( response.length != 0 ){
                        response.forEach(function(value) {
                        var appSearch = `<tr>
                                        <td> ${value.id} </td>
                                        <td> ${value.appointment_id} </td>
                                        <td> ${value.patient_id} </td>
                                        <td> ${value.doctor_dept.name} </td>
                                        <td> ${value.doctor.first_name1} </td>
                                        <td> ${value.serial_no} </td>
                                        <td> ${value.problem} </td>
                                        <td> ${value.appointment_date} </td>
                                        <td>
                                    </td>
                                        </tr>`
                            $('#SearchValue').append(appSearch);
                        });
                    }else{
                        var noData = `<span>No data found on these criteria</span>`
                        $('#SearchValue').append(noData);
                    }
                }
            });
        });

    });
</script>
@endsection

