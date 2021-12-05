@extends('layouts.admin_master')

@section('super-admin-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Dashboard</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Welcome to Hospital Management System</li>
                        </ol>
                    </div>
                    <div class="col-md-4">
                        <div class="float-end d-none d-md-block">
                            <div class="dropdown">
                                <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-cog me-2"></i> Settings
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat">
                        <div class="card-body">
                            <i class="fas fa-user-alt fa-2x" style="color:#626ed4;"></i>
                            <p>Doctors</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat">
                        <div class="card-body">
                            <i class="fas fa-user-alt fa-2x text-success"></i>
                            <p>Patients</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat">
                        <div class="card-body">
                            <i class="fas fa-user-alt fa-2x text-primary"></i>
                            <p>Acountant</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat">
                        <div class="card-body">
                            <i class="fas fa-user-alt fa-2x text-secondary"></i>
                            <p>Patient</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat">
                        <div class="card-body">
                            <i class="fas fa-user-alt fa-2x text-info"></i>
                            <p>laboratorist</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat">
                        <div class="card-body">
                            <i class="fas fa-user-alt fa-2x text-success text-danger"></i>
                            <p>Receptionist</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat">
                        <div class="card-body">
                            <i class="fas fa-user-alt fa-2x text-warning"></i>
                            <p>Pharmacist</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat">
                        <div class="card-body">
                            <i class="fas fa-user-alt fa-2x" style="color:#626ed4;"></i>
                            <p>Nurse</p>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
