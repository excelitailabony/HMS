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

        .modal-header {
            border-top: 5px solid darkseagreen;
        }

        .modal-footer {
            border-top: none !important;
        }

        .modal-body .row .col-md-12 {
            margin-bottom: 1rem;
        }

        .modal-body input {
            height: 40px;
            border-radius: 20px;
            box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px;
            border: none;
        }

    </style>
    <div class="container-full topBar">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">Medicine Manufacture
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Medicine Manufacture
                            </button>
                        </h4>

                        <!-- AddModal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="background-color: #f9f9f9;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Medicine Manufacture</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('store.medicinemanufacture') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label> Medicine Name</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Medicine Type" name="name">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label> Email</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Medicine Type" name="email">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Phone Number</label>
                                                    <input type="number" class="form-control"
                                                        placeholder="Enter Medicine Type" name="phone_number">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Notes</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Medicine Type" name="note">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Medicine Type" name="address">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info" value="Add Medicine Type">
                                        </div>
                                    </form>
                                </div>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Medicine Manufacture</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form action="{{ route('update.medicinemanufacture') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" id="medicinemanufacture_id" name="medicinemanufacture_id">

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label> Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Manufacture"
                                                    name="name" id="name">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label> Email</label>
                                                <input type="text" class="form-control" placeholder="Enter Manufacture"
                                                    name="email" id="email">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Phone Number</label>
                                                <input type="text" class="form-control" placeholder="Enter Manufacture"
                                                    name="phone_number" id="phone_number">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Note</label>
                                                <input type="text" class="form-control" placeholder="Enter Manufacture"
                                                    name="note" id="note">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Note</label>
                                                <input type="text" class="form-control" placeholder="Enter Manufacture"
                                                    name="address" id="address">
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
                                                aria-label="Name: activate to sort column descending"> Name</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">Email </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">Phone Number </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">Note </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">Address</th>

                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 89px;"
                                                aria-label="Salary: activate to sort column ascending">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($medicinemanufactures as $medicinemanufacture)
                                            <tr>

                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    {{ $medicinemanufacture->name }}</td>
                                                <td>{{ $medicinemanufacture->email }}</td>
                                                <td>{{ $medicinemanufacture->phone_number }}</td>
                                                <td>{{ $medicinemanufacture->note }}</td>
                                                <td>{{ $medicinemanufacture->address }}</td>


                                                <td>
                                                    <button type="button" value="{{ $medicinemanufacture->id }}"
                                                        class="btn btn-success editBtn btn-sm">
                                                        <i class="fa fa-pencil-alt"></i></button>

                                                    <a href="{{ route('delete.medicinemanufacture', $medicinemanufacture->id) }}"
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
                var medicinemanufacture_id = $(this).val();

                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/Medicine/manufacture/edit/" + medicinemanufacture_id,
                    success: function(response) {
                        //   console.log(response.newbedtype.description);
                        $('#medicinemanufacture_id').val(response.medicinemanufacture.id);
                        $('#name').val(response.medicinemanufacture.name);
                        $('#email').val(response.medicinemanufacture.email);
                        $('#phone_number').val(response.medicinemanufacture.phone_number);
                        $('#note').val(response.medicinemanufacture.note);
                        $('#address').val(response.medicinemanufacture.address);
                    }
                })
            });
        });
    </script>
@endsection
