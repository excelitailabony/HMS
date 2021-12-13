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

        .modal-body .row .col-md-6,
        .modal-body .row .col-md-12 {
            margin-bottom: 1rem;
        }

        .errorColor {
            color: red;
        }

    </style>

    <div class="container-full topBar">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">



                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-buttons"
                                        class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline text-center align-middle"
                                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                        aria-describedby="datatable-buttons_info">

                                        <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1" style="width: 50px;">Image</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;"> First Name</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;"> Last Name</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Email</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Designation</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Doctor Department</th>

                                                <th rowspan="1" colspan="1" style="width: 120px;">Mobile</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Gender</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Address 1</th>
                                                {{-- <th rowspan="1" colspan="1" style="width: 120px;">Address 2</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">City</th>
                                                <th rowspan="1" colspan="1" style="width: 120px;">Zip</th>

                                                <th rowspan="1" colspan="1" style="width: 89px;">Date Of Birth</th>
                                                <th rowspan="1" colspan="1" style="width: 50px;">Age</th>
                                                <th rowspan="1" colspan="1" style="width: 50px;">Profile</th>
                                                <th rowspan="1" colspan="1" style="width: 50px;">Social Link</th>
                                                <th rowspan="1" colspan="1" style="width: 89px;">Blood Group</th>
                                                <th rowspan="1" colspan="1" style="width: 50px;">Image</th>
                                                <th rowspan="1" colspan="1" style="width: 50px;">Career Title</th>
                                                <th rowspan="1" colspan="1" style="width: 50px;">Short Biography</th>
                                                <th rowspan="1" colspan="1" style="width: 50px;">Long Biography</th>
                                                <th rowspan="1" colspan="1" style="width: 50px;">SPecialist</th>
                                                <th rowspan="1" colspan="1" style="width: 50px;">Education Degree</th> --}}
                                                <th rowspan="1" colspan="1" style="width: 89px;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($doctors as $doctor)
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset($doctor->image) }}" class="rounded avatar-lg"
                                                            alt="" style="width: 80px;">
                                                    </td>
                                                    <td>{{ $doctor->first_name1 }}</td>
                                                    <td>{{ $doctor->last_name1 }}</td>
                                                    <td>{{ $doctor->email }}</td>
                                                    <td>{{ $doctor->designation }}</td>
                                                    <td>{{ $doctor->doc_dept }}</td>

                                                    <td>{{ $doctor->mobile }}</td>
                                                    <td>{{ $doctor->sex }}</td>
                                                    <td>{{ $doctor->profile }}</td>
                                                    {{-- <td>{{ $doctor->dob }}</td>
                                                    <td>{{ $doctor->address1 }}</td>
                                                    <td>{{ $doctor->address12 }}</td>
                                                    <td>{{ $doctor->address12 }}</td>
                                                    <td>{{ $doctor->city }}</td>
                                                    <td>{{ $doctor->zip }}</td>
                                                    <td>{{ $doctor->specialist }}</td>
                                                    <td>{{ $doctor->age }}</td>
                                                    <td>{{ $doctor->blood_group }}</td>
                                                    <td>{{ $doctor->social_link }}</td>

                                                    <td>{{ $doctor->career_title }}</td>
                                                    <td>{{ $doctor->short_biography }}</td>
                                                    <td>{{ $doctor->long_biography }}</td>
                                                    <td>{{ $doctor->education_degree }}</td>
                                                    <td>{{ $doctor->status }}</td>
                                                    {{-- <td>{{ $doctor->city }}</td>
                                                                            <td>{{ $doctor->city }}</td>
                                                                              <td>{{ $doctor->city }}</td> --}}

                                                    {{-- <td>{{ $doctor->email }}</td>
                                                    <td>+{{ $doctor->phone }}</td>
                                                    <td>{{ $doctor->sex }}</td>
                                                    <td>{{ $doctor->dob }}</td>
                                                    <td>{{ $doctor->age }}</td>
                                                    <td>{{ $doctor->blood_group }}</td> --}}
                                                    <td>

                                                        <a href="{{ route('edit.doctor', $doctor->id) }}"
                                                            class="btn btn-success">Edit</a>

                                                        <a href="{{ route('delete.doctor', $doctor->id) }}"
                                                            class="btn btn-danger" id="#">Delete</a>
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
            </div>
        </div> <!-- end col -->
    </div>

@endsection

@section('scripts')


@endsection
