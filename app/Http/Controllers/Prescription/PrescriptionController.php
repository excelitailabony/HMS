<?php

namespace App\Http\Controllers\Prescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prescription\PatientCaseStudy;
use App\Models\Patient;
use App\Models\Prescription\Prescription;

class PrescriptionController extends Controller
{
    //
   public function PrescriptionAdd()
   {
       return view('super_admin.prescription.add_prescription');
   }

 public function DeatilsPrescription($id)
 {
      $patients  =  Patient::where('patient_id', $id)->get();
     $casestudy  =  PatientCaseStudy::where('patient_id', $id)->get();
        return response()->json([
            'status' => 200,
            'patients' => $patients ,
            'casestudy' => $casestudy,
        ]);
 }
 
}

