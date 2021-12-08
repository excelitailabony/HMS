@extends('layouts.admin_master')

@section('css')
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
                .errorColor {
                    color: red;
                }
                .but {
                border: none;
                color: white;
                padding: 5px 9px; 
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
                }
                .button1 {
                background-color: white; 
                color: black; 
                border: 2px solid #c4c3c0;
                padding: 6px 8px;
                border-radius: 12%;
        
        }

        .button1:hover {
        background-color: #c4c3c0;
        color: white;
        }

        .modal{
            z-index:1050 !important;
        }
        /* input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
        } */

    </style> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- jQuery --> 
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    
@endsection 


@section('super-admin-content')

<div class="container-full topBar">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Add Schedule
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success add_schedule" data-bs-toggle="modal"
                                    data-bs-target="#addModal">
                                    Add Schedule
                            </button>
                        </h4>

                    </div>
                   

                </div>
            </div>
               
        </div> <!-- end col -->
</div>
       
    
    





      <!-- AddModal -->
        <div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Add Schedule</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    
                    <form >
                        @csrf
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Slot Time</label>
                                        <input type="number"  class="form-control slot_time" placeholder="08:00-12.00">
                                        <span id="error_slot_time" class="errorColor"  ></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label><br>
                                        <input class="form-check-input status" type="radio" name="gender"
                                                value="Active">Active
                                                <input class="form-check-input status" type="radio" name="gender" 
                                                    value="InActive">InActive<br>
                                        <span id="error_status" class="errorColor"></span>
                                    </div>
                                </div>
                            </div>
                                                                                    <div class="row">
                                <div class="col-md-12">
                                    <label> Doctor</label>
                                      {{-- <select id='selUser' name="patient_name" class="patient_name form-control"
                                                            required="" style='width: 200px;'>
                                                            <option value="" selected="" disabled="">Select docotor Name
                                                            </option>
                                                            @foreach ($docnames as $patient)
                                                                <option value="{{ $patient->id }}">{{ $patient->name }}
                                                                </option>
                                                            @endforeach
                                                        </select> --}}

                                    {{-- <select id='selUser' style='width: 200px;'>
                                        <option value='0'>Select User</option>

                                        <option value='1'>Yogesh singh</option>
                                        <option value='2'>Sonarika Bhadoria</option>
                                        <option value='3'>Anil Singh</option>
                                        <option value='4'>Vishal Sahu</option>
                                        <option value='5'>Mayank Patidar</option>
                                        <option value='6'>Vijay Mourya</option>
                                        <option value='7'>Rakesh sahu</option>
                                    </select>
                                        <br/>
                                         --}}
                                        
                                </div>
                                
                            </div>

                            <div id='result'></div>
                        </div>
                        <div class="modal-footer">
                                <button  type="reset" class="but button1 ">Reset</button>
                                    <button type="button" class="btn btn-primary add_timeslot">Save</button> 
                        </div>
                    </form>
                </div>
                
            </div>
            <div class="col-md-12">
                                    <label> Doctor</label>
                                      {{-- <select id='selUser' name="patient_name" class="patient_name form-control"
                                                            required="" style='width: 200px;'>
                                                            <option value="" selected="" disabled="">Select docotor Name
                                                            </option>
                                                            @foreach ($docnames as $patient)
                                                                <option value="{{ $patient->id }}">{{ $patient->name }}
                                                                </option>
                                                            @endforeach
                                                        </select> --}}

                                    <select id='selUser' style='width: 200px;'>
                                        <option value='0'>Select User</option>

                                        <option value='1'>Yogesh singh</option>
                                        <option value='2'>Sonarika Bhadoria</option>
                                        <option value='3'>Anil Singh</option>
                                        <option value='4'>Vishal Sahu</option>
                                        <option value='5'>Mayank Patidar</option>
                                        <option value='6'>Vijay Mourya</option>
                                        <option value='7'>Rakesh sahu</option>
                                    </select>
                                        <br/>
                                        
                                        
                                </div>
        </div>

   



@endsection

@section('scripts')

    <script>
        $(".add_schedule").on('click',function(){
            $("#selUser").select2();
        })
        $(document).ready(function(){
        // Initialize select2
        // Read selected option
        $('#but_read').click(function(){
        var username = $('#selUser option:selected').text();
          var userid = $('#selUser').val();
                 $('#result').html("id : " + userid + ", name : " + username);
           });
        });
        });
    </script>
@endsection
