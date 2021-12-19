<?php

namespace App\Http\Controllers\Prescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prescription\PatientCaseStudy;
use App\Models\Patient;
use App\Models\Prescription\Prescription;
use App\Models\Check;
use App\Models\Prescription\Others_Case_Study;
use DB;
use Illuminate\Support\Facades\Validator;

class PatientcasestudyController extends Controller
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

    public function Patientname($patientname)
    {
        $patient = Patient::where('patient_id', 'like', $patientname)->first();
        return response()->json($patient);
    }
}
