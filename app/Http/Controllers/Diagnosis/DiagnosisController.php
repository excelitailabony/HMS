<?php

namespace App\Http\Controllers\Diagnosis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Diagnosis\DiagnosisTest;
use Carbon\carbon;

class DiagnosisController extends Controller
{
    public function DignsosisTestView(){
        $patients=Patient::all();
        $doctors=Doctor::all();
        $diagnosisTests=DiagnosisTest::with('patient','doctor')->get();
        return view('Diagnosis.view_diagnosis_test',compact('doctors','patients','diagnosisTests'));
    }

    public function DignsosisTestStore(Request $request){

         $request->validate([
            'patient_id' => 'required',   
            'doctor_id' => 'required',    
        ]);

        DiagnosisTest::insert([
            'patient_id' => $request->patient_id,
            'doctor_id'  => $request->doctor_id,
            'diagnosis_category_id' => $request->diagnosis_id,
            'report_number' => $request->report_number,
            'age' => $request->age,
            'height' => $request->height,
            'weight' => $request->weight,
            'average_glucose' => $request->glucose,
            'urine_sugar' => $request->urine,
            'blood_pressure' => $request->blood_pressure,
            'diabetes' => $request->diabetis,
            'cholesterol' => $request->cholestrol,
            'created_at' => carbon::now(),
        ]);

         $notification = array(
                'message' =>  'Diagnosis Test Added Successfuly',
                'alert-type' => 'success'
          );     
        return redirect()->back()->with($notification);
    }

    public function DignsosisTestDelete($id){
        DiagnosisTest::findOrFail($id)->delete(); 
        return redirect()->back();
    }
}
