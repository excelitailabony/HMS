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

        .ImgBox img {
            border-radius: 50%;
        }

        .circle {
            height: 80px;
            width: 80px;
            display: block;
            background-color: darkseagreen;
            border-radius: 80px;
            position: relative;
        }

        .word {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .modal-body select,
        .modal-body input {
            border: none;
            background: #f5f8fa !important;
            border-radius: 5%;
        }

        .addapoint {
            margin-left: 1rem;
        }

        .card-title i {
            color: ;
        }

    </style>

    <div class="container-full topBar">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">All Appointment
                            <!-- Button trigger modal -->
                            <div class="d-flex">
                                <a href="{{ url('Appointment/calender') }}"><i class="fas fa-calendar-alt fa-2x"></i></a>
                                <button type="button" class="btn btn-success addapoint" data-bs-toggle="modal"
                                    data-bs-target="#AddAppointment">
                                    New Appointment
                                </button>
                            </div>

                        </h4>

                        <!-- Modal for add doctor -->
                        <div class="modal fade" id="AddAppointment" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Appointment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('appointment.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Patient</label>
                                                        <select name="patient_name" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select Patient Name
                                                            </option>
                                                            @foreach ($patients as $patient)
                                                                <option value="{{ $patient->id }}">{{ $patient->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Doctor Dept</label>
                                                        <select name="doctor_dept_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select Doctor
                                                                Department
                                                            </option>
                                                            @foreach ($doctors as $doctor)
                                                                <option value="{{ $doctor->doc_dept }}">
                                                                    {{ $doctor->doc_dept }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Doctor</label>
                                                        <select name="doctor_name" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select Doctor
                                                            </option>
                                                            @foreach ($doctors as $doctor)
                                                                <option value="{{ $doctor->id }}">
                                                                    {{ $doctor->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <input type="datetime-local" class="form-control"
                                                            name="appointment_date">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter description" name="description">
                                                        @error('description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>title</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter description" name="title">
                                                        @error('description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info" value="Add Appointment">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for add Edit doctor -->
                        <div class="modal fade" id="EditAppointment" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Blood Issue</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('update.appointment') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" id="appointment_id" name="appointment_id">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Patient</label>
                                                        <select name="patient_name" id="patient_name_id"
                                                            class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select Patient Name
                                                            </option>
                                                            @foreach ($patients as $patient)
                                                                <option value="{{ $patient->id }}">
                                                                    {{ $patient->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Doctor Dept</label>
                                                        <select name="doctor_dept" id="doctor_dept_id"
                                                            class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select Doctor
                                                                Department
                                                            </option>
                                                            @foreach ($doctors as $doctor)
                                                                <option value="{{ $doctor->id }}">
                                                                    {{ $doctor->doc_dept }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Doctor</label>
                                                        <select name="doctor_name" id="doctor_name_id"
                                                            class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select Doctor
                                                            </option>
                                                            @foreach ($doctors as $doctor)
                                                                <option value="{{ $doctor->id }}">
                                                                    {{ $doctor->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <input type="datetime-local" class="form-control"
                                                            name="appointment_date" id="appointment_date_id">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter description" name="description"
                                                            id="description_id">
                                                        @error('description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info"
                                                value="Update Appointment">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-buttons"
                                        class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline text-center align-middle"
                                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                        aria-describedby="datatable-buttons_info">
                                        <thead>
                                            <tr>
                                                <th>Patient</th>
                                                <th>Doctor</th>
                                                <th>Doctor Dept</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody class="text-center">
                                            @foreach ($appointments as $appointment)
                                                <td>{{ $appointment['patient']['name'] }}</td>
                                                <td>{{ $appointment['doctor']['name'] }}</td>
                                                <td>{{ $appointment->doctor_dept }}</td>
                                                <td>{{ $appointment['date'] }}</td>
                                                <td>
                                                    <button type="button" value="{{ $appointment->id }}"
                                                        class="btn btn-success editBtn btn-sm"><i
                                                            class="fa fa-pencil-alt"></i></button>
                                                    <a href="{{ route('delete.appointment', $appointment->id) }}"
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

@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.editBtn', function() {
                var appointment_id = $(this).val();
                // alert(appointment_id);
                $('#EditAppointment').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/Appointment/edit/" + appointment_id,
                    success: function(response) {
                        // console.log(response.appointments); 
                        $('#appointment_id').val(response.appointments.id);
                        $('#patient_name_id').val(response.appointments.patient_id);
                        $('#doctor_dept_id').val(response.appointments.doctor_dept_id);
                        $('#doctor_name_id').val(response.appointments.doctor_id);
                        $('#appointment_date_id').val(response.appointments.date);
                        $('#description_id').val(response.appointments.description);
                    }
                })
            });
        });
    </script>
@endsection
