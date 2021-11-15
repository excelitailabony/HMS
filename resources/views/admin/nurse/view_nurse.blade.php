@extends('layouts.admin_master')
@section('super-admin-content')
    <style>
        .topBar {
            margin-top: 4rem;
        }
        .topBar {
            padding: 2rem;
        }
        .card-title
        {
            display: flex;
            justify-content: space-between;
        }

        .marge{
            margin-bottom:30px;
        }
    </style>
    <div class="container-full topBar">
       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">All Patient
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float:right">
        Add Nurse Info
      </button> 
      
      <!-- Modal -->
       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add nurse info</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

           

            <form action="{{route('add.nurse')}}" method="POST" enctype="multipart/form-data">
                    @csrf
            <div class="modal-body">
                <div class="row">
                    
                
                
               

                <div class="form-group col-md-6 marge" >
                            <label style="padding-right: 175px;">Name:</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail3" placeholder="Name">
                            @error('name')
                            <strong style="color:red;">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3" style="padding-right: 175px;">Email:</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email">

                            @error('email')
                            <strong style="color:red;">{{$message}}</strong>
                            @enderror
                        </div>
    </br>
                        
                       

                        <div class="form-group col-md-6 marge">
                            <label  style="padding-right: 175px;">Phone</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputPassword3" placeholder="phone">
                            @error('phone')
                            <strong style="color:red;">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword3"  style="padding-right: 175px;">password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword3" placeholder="password">
                            @error('password')
                            <strong style="color:red;">{{$message}}</strong>
                            @enderror
                        </div> 

                        <div class="form-group col-md-6 marge">
                            <label for="exampleInputPassword3"  style="padding-right: 175px;">Address</label>
                            <textarea type="text" name="address" class="form-control" id="exampleInputPassword3" placeholder="address"></textarea>
                        </div>

                       <!--  <div class="form-group col-md-6">
                            <label for="exampleInputPassword3"  style="padding-right: 194px;">sex</label>
                            <input type="text" name="sex" class="form-control" id="exampleInputPassword3" placeholder="sex">
                        </div> -->

                        <div class="radio col-md-6" style="padding-top: 15px;">
                              <label>Sex </label>
                                <input type="radio" name="sex" id="sex" value="male">
                                male

                                 <input type="radio" name="sex" id="sex" value="female">
                                female
                             
                            </div>

                        <div class="form-group col-md-6 marge">
                            <label  style="padding-right: 195px;" >dob</label>
                            <input type="date" name="dob" class="form-control" id="exampleInputPassword3" placeholder="date of birth">
                        </div>

                        <div class="form-group col-md-6">
                            <label  for="exampleInputPassword3"  style="padding-right: 194px;">age</label>
                            <input type="text" name="age" class="form-control" id="exampleInputPassword3" placeholder="age">
                        </div>

                        <div class="form-group col-md-6 marge">
                            <label for="exampleInputPassword3"  style="padding-right: 175px;">blood_group</label>
                            <input type="text" name="blood_group" class="form-control" id="exampleInputPassword3" placeholder="blood_group">
                        </div>

                        <div class="form-group col-md-6">
                            <label  for="exampleInputPassword3"  style="padding-right: 175px;">image</label>
                            <input type="file" name="image" class="form-control" id="exampleInputPassword3" placeholder="phone">

                            @error('image')
                            <strong style="color:red;">{{$message}}</strong>
                            @enderror
                        </div> 

                        
                        <div class="form-group col-md-6" style="margin-top:10px;">
                            <label class="sr-only" for="exampleInputPassword3"></label>
                            <button type="submit" class="btn btn-success" style="float:left" >Add info</button>
                        </div>
                        
                        

                    
                
    
    </div>{{--end row--}}
            </div>
            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
          </div>
        </div>
      </div>
    </h4>

    
                    
                        
                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                               
                               
                                <div class="col-sm-12">
                              

                               
                               
                                    
                                  
                                    <table id="datatable"
                                        class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                        aria-describedby="datatable-buttons_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Id</th>

                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Name</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 141px;"
                                                    aria-label="Position: activate to sort column ascending">Image</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 117px;"
                                                    aria-label="Office: activate to sort column ascending">Email</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 53px;"
                                                    aria-label="Age: activate to sort column ascending">Phone</th>

                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 53px;"
                                                    aria-label="Age: activate to sort column ascending">Password</th>

                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 53px;"
                                                    aria-label="Age: activate to sort column ascending">Address</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 105px;"
                                                    aria-label="Start date: activate to sort column ascending">Sex
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Dob</th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 50px;"
                                                    aria-label="Salary: activate to sort column ascending">Age</th>
                                                    
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Blood Group</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 89px;"
                                                    aria-label="Salary: activate to sort column ascending">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($nurses as $nurse)
                                            <tr class="odd">
                                                <td class="id">{{$nurse->id}}</td>
                                               <td class="name">{{$nurse->name}}</td>
                                               <td class="image"><img src="{{asset($nurse->image)}}" ></td>
                                               <td class="email">{{$nurse->email}}</td>
                                               <td class="phone">{{$nurse->phone}}</td>
                                               <td class="password">{{$nurse->password}}</td>
                                               <td class="address">{{$nurse->address}}</td>
                                               <td class="sex">{{$nurse->sex}}</td>
                                               <td class="dob">{{$nurse->dob}}</td>
                                               <td class="age">{{$nurse->age}}</td>
                                               <td class="blood_group">{{$nurse->blood_group}}</td>
                                               <td>

                                               






                                               
                                               <button id=""  data-bs-toggle="modal" data-bs-target="#editModal"      class="btn btn-primary edit" title="Edit"  data-bs-target="#exampleModal2" >
                                               <i class="fas fa-comment-times"></i>
                                               </button> 
                                                   <!-- <a class="btn btn-success btn-sm"  href="#exampleModal" title="Edit"><i class="fas fa-pencil-alt"></i></a> -->
                                                   <a class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-comment-times"></i></a>
                                               </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>

                                    {{--modal for data edit--}}
                                <div class="modal fade" id="editModal"  tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel2">Edit nurse info</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            

           

            <form action="{{route('update.nurse')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$nurse->id}}">
            <div class="modal-body">
                <div class="row">
 
               
                
               

                <div class="form-group col-md-6 marge" >
                            <label style="padding-right: 175px;">Name:</label>
                            <input type="text" name="name" id="name" value=""  class="form-control"  placeholder="Name">
                            @error('name')
                            <strong style="color:red;">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail3" style="padding-right: 175px;">Email:</label>
                            <input type="email" name="email" id="email" value="" class="form-control"  placeholder="Email">

                            @error('email')
                            <strong style="color:red;">{{$message}}</strong>
                            @enderror
                        </div>
    </br>
                        
                       

                        <div class="form-group col-md-6 marge">
                            <label  style="padding-right: 175px;">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control"  placeholder="phone">
                            @error('phone')
                            <strong style="color:red;">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword3"  style="padding-right: 175px;">password</label>
                            <input type="password" name="password" id="password" class="form-control"  placeholder="password">
                            @error('password')
                            <strong style="color:red;">{{$message}}</strong>
                            @enderror
                        </div> 

                        <div class="form-group col-md-6 marge">
                            <label for="exampleInputPassword3"  style="padding-right: 175px;">Address</label>
                            <textarea type="text" name="address" id="address" class="form-control placeholder="address"></textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword3"  style="padding-right: 175px;">sex</label>
                            <input type="text" name="sex" id="sex" class="form-control"  placeholder="sex">
                        </div>

                        <div class="form-group col-md-6 marge">
                            <label  style="padding-right: 175px;" >dob</label>
                            <input type="date" name="dob" id="dob" class="form-control"  placeholder="date of birth">
                        </div>

                        <div class="form-group col-md-6">
                            <label  for="exampleInputPassword3"  style="padding-right: 175px;">age</label>
                            <input type="text" name="age" id="age" class="form-control"  placeholder="age">
                        </div>

                        <div class="form-group col-md-6 marge">
                            <label for="exampleInputPassword3"  style="padding-right: 175px;">blood_group</label>
                            <input type="text" name="blood_group" id="blood_group" class="form-control" placeholder="blood_group">
                        </div>

                        <div class="form-group col-md-6">
                            <label  for="exampleInputPassword3"  style="padding-right: 175px;">image</label>
                            <input type="file" name="image" id="image" class="form-control"  placeholder="phone">

                            @error('image')
                            <strong style="color:red;">{{$message}}</strong>
                            @enderror
                        </div> 

                        
                        <div class="form-group col-md-6" style="margin-top:10px;">
                            <label class="sr-only" for="exampleInputPassword3"></label>
                            <button type="submit" class="btn btn-success" style="float:left" >Update info</button>
                        </div>
                        
                        

                    
                
    
    </div>{{--end row--}}
            </div>
            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
          </div>
        </div>
      </div>
                                {{--end modal for data edit--}}
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
    <!-- for showing nurse data in bootstrap modal -->
    <script type="text/javascript">
      $(document).on('click','.edit',function()
      {
        var _this=$(this).parents('tr');
        $('#id').val(_this.find('.id').text());
        $('#name').val(_this.find('.name').text());
        $('#email').val(_this.find('.email').text());
        $('#phone').val(_this.find('.phone').text());
        $('#password').val(_this.find('.password').text());
        $('#address').val(_this.find('.address').text());
        $('#sex').val(_this.find('.sex').text());
        $('#age').val(_this.find('.age').text());
        $('#blood_group').val(_this.find('.blood_group').text());
        $('#image').val(_this.find('.image').text());
      })
    </script>
@endsection