{{-- @extends('layouts.admin_master')

@section('super-admin-content')


 <div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
 

		



			<div class="col-8">
			<div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Slider Edit</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
    
					    
             <form action="{{ route('account.update', $accountant->id) }}" method="POST" enctype="multipart/form-data" >

                  @csrf

              <input type="hidden" name="id" value="{{ $accountant->id }}">

                  <input type="hidden" name="old_image" value="{{ $accountant->image }}">


                <div class="form-group">
                  <h5>Slider Title <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="slider_title"  class="form-control" id="slider_name" value="{{ $accountant->title }}">
                    </div>
                </div>

                <div class="form-group">
                  <h5>Slider Description <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="slider_description"  class="form-control" id="slider_description" value="{{ $slider->description }}">

                    </div>
                </div>

                <div class="form-group">
                  <h5>Slider Img <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="file" name="slider_image" class="form-control" id="slider_image" >
    
                    </div>
                </div>

                       <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info"  value="Update Slider" >
                        </div>

				</form> 

				</div>
			</div>


			</div>
		
				<div class="col-4"></div>

			<!-- /.col -->

		 </div>
        </div>
    </section>
</div>

@endsection --}}
rthrthrth