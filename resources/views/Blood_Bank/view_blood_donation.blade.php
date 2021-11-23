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

        .circle {
            height: 100px;
            width: 100px;

            display: block;
            border: 1px solid black;

            border-radius: 100px;
        }

    </style>
    <div class="container-full topBar">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">Blood Donation
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                New Blood Donation
                            </button>
                        </h4>

                        <!-- AddModal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New Blood Donation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('blooddonation.add') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <select name="donor_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Donor Name
                                                            </option>
                                                            @foreach ($blooddonors as $blooddonor)
                                                                <option value="{{ $blooddonor->id }}">
                                                                    {{ $blooddonor->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Blood Bags</label>
                                                        <input type="Number" class="form-control"
                                                            placeholder="Enter your age" name="bags">
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

                        {{-- modal end --}}
                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Blood Donation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('blooddonation.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" id="blooddonation_id" name="blooddonation_id">

                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Blood Donor Name</label>
                                                        <select name="donor_id" id="donor_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Donor Name
                                                            </option>
                                                            @foreach ($blooddonors as $blooddonor)
                                                                <option value="{{ $blooddonor->id }}">
                                                                    {{ $blooddonor->name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Blood Bags</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Enter your bags" name="bags" id="bags">
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
                        </div>
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
                                                    aria-label="Name: activate to sort column descending">Donor Name</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Bags</th>


                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($blooddonations as $blooddonation)
                                                <tr>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $blooddonation['donor']['name'] }} </td>
                                                    <td>{{ $blooddonation->bags }}</td>
                                                    <td>
                                                        <button type="button" value="{{ $blooddonation->id }}"
                                                            class="btn btn-primary editBtn btn-sm">
                                                            <i class="fa fa-pencil-alt"></i></button>

                                                        <a href="{{ route('blooddonation.delete', $blooddonation->id) }}"
                                                            class="btn btn-danger btn-sm" id="delete"><i
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
                var blooddonation_id = $(this).val();

                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/bloodDonation/edit-blooddonation/" + blooddonation_id,
                    success: function(response) {
                        $('#blooddonation_id').val(response.blooddonation.id);
                        $('#donor_id').val(response.blooddonation.donor_id);
                        $('#bags').val(response.blooddonation.bags);
                    }
                })
            });
        });
    </script>
@endsection
