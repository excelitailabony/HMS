<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewBedAllotment;
use App\Models\NewBed;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;

class BedAssignController extends Controller
{
    public function BedAssignView(){
        $newbednames = NewBed::where('status','0')->get();
        $doctors = Doctor::all();
        $patients = Patient::all();
        $bedallotments = NewBedAllotment::with('bed','patient','doctor','bedTypeName')->get();
        // dd($bedallotments);

        return view ('Bed.view_bed_assign',compact('newbednames','doctors','patients','bedallotments'));
    }

    public function BedAssignStore(Request $request){
         $validator = Validator::make($request->all(), [
            'bed_name_id'=> 'required',
            'patient_name_id'=> 'required',
            'doctor_name_id'=> 'required',
            'appointment_date_id'=> 'required', 
            'discharge_date_id'=> 'required',
            'description_id'=> 'required',  
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $newbed = NewBed::find($request->bed_name_id);
            $newbed->status = '1';
            $newbed->update();

            $student = new NewBedAllotment;
            $student->new_bed_id = $request->input('bed_name_id');
            $student->patient_id = $request->input('patient_name_id');
            $student->doctor_id = $request->input('doctor_name_id');
            $student->allotment_time = $request->input('appointment_date_id');
            $student->discharge_time = $request->input('discharge_date_id');
            $student->discription = $request->input('description_id');
            $student->save();
            return response()->json([
                'status'=>200,
                'message'=>'New bed  Allotment Added Successfully.'
            ]);
        }
    }
}
