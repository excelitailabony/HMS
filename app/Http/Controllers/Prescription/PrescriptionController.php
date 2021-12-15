<?php

namespace App\Http\Controllers\Prescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prescription\PatientCaseStudy;

class PrescriptionController extends Controller
{
    //
    public function PrescriptionCaseStudyStore(Request $request){

        $validator = Validator::make($request->all(), [
             'patient_id' => 'required',
             'status' => 'required',
             
         ]);
         if($validator->fails())
         {
             return response()->json([
                 'status'=>400,
                 'errors'=>$validator->messages()
             ]);
         }
         else{

                $patient=new PatientCaseStudy;
                $patient->patient_id=$request->input('patient_id');
                $patient->status=$request->input('status');
                $patient->save();
                return response()->json([
                 'status'=>200,
                 'message'=>'Patient Added Successfully.'
             ]);
           }
         }
 }
 

