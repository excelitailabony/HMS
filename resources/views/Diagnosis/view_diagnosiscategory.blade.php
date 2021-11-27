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

    </style>
    <div class="container-full topBar">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">New Diagnosis Category
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Add New Diagnosis Category
                            </button>
                        </h4>

                        <!-- AddModal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Diagnosis Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('diagnosisCategory.add') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label> Diagnosis Category</label>
                                                    <input type="text" class="form-control" placeholder="Enter Diagnosis Category"
                                                        name="new_diagnosis_category">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label> Description</label>
                                                        <input type="text" class="form-control"  name="description">
                                                    </div>
                                                </div>
                                            </div>
                                          
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-rounded btn-info" value="Add New Bed">
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
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Bed</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('update.diagnosisCategory') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" id="diagnosiscat_id" name="diagnosiscat_id">

                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label> Diagnosis Category</label>
                                                    <input type="text" class="form-control" placeholder="Enter Diagnosis Category"
                                                        name="new_diagnosis_category" id="new_diagnosis_category">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label> Description</label>
                                                        <input type="text" class="form-control"  name="description" id="description">
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
                                                    aria-label="Name: activate to sort column descending">New Diagnosis Category </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Description</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($diagnosiscats as $diagnosiscat)
                                                <tr>
                                                    <td class="dtr-control sorting_1" tabindex="0">{{ $diagnosiscat->new_diagnosis_category}}</td>
                                                    <td>{{ $diagnosiscat->description }}</td>
                                              

                                                    <td>

                                                        <button type="button" value="{{ $diagnosiscat->id }}"
                                                            class="btn btn-success editBtn btn-sm">
                                                            <i class="fa fa-pencil-alt"></i></button>
                                                        <a href="{{ route('delete.diagnosisCategory', $diagnosiscat->id) }}"
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
                var diagnosiscat_id= $(this).val();
                // alert(newbed_id);

                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/Diagnosis/edit/" + diagnosiscat_id,
                    success: function(response) {
                        //   console.log(response.newbed);
                        $('#diagnosiscat_id').val(response.diagnosiscat.id);
                        $('#new_diagnosis_category').val(response.diagnosiscat.new_diagnosis_category);
                        $('#description').val(response.diagnosiscat.description);
                    }
                })
            });
        });
    </script>
@endsection
