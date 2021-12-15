<?php

namespace App\Http\Controllers\Prescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prescription\PatientCaseStudy;
use App\Models\Check;
use App\Models\Prescription\Others_Case_Study;
use DB;
use Illuminate\Support\Facades\Validator;

class PatientcasestudyController extends Controller
{
    // view
     Public function PrescriptionCaseStudyView()
    {  
      $casestudys=PatientCaseStudy::get()->all();
        return view('super_admin.prescription.view_patient_case_study',compact('casestudys'));
    }
    // add
    Public function PrescriptionCaseStudyAdd()
    {  
      
        return view('super_admin.prescription.add_patient_case_study');
    }
    // store
    //  public function PrescriptionCaseStudyStore(Request $request){
    //     //    dd($request->all());
    //     // "patient_id" => "7"
    //     // "status" => "sfagasdfasdf"
    //     // "_token" => "TpGU3H09Tz6xPIAjoRHhetu5vsA50kS7Nfu89HtF"
    //     // "first_name" => array:2 [
    //     //     0 => "asdfghjhkl"
    //     //     1 => "asdfasdf"
    //     // ]
    //     // "last_name" => array:2 [
    //     //     0 => "sdfg"
    //     //     1 => "asdfasdf"
    //     // ]

    //     $validator = Validator::make($request->all(), [
       
    //         'first_name.*'  => 'required',
    //         'last_name.*'  => 'required',
    //         'patient_id'=> 'required',
    //         'status'=> 'required',
    //      ]);
    //         //   dd(  $validator );
    //      if($validator->fails())
    //      {
    //          return response()->json([
    //             //  'status'=>400,
    //              'errors'=>$validator->errors()
    //          ],
    //         422);
    //      }
    //      else{

    //             $patient=new PatientCaseStudy;
    //             $patient->patient_id=$request->input('patient_id');
    //             $patient->status=$request->input('status');
    //             $patient->save();

    //             $first_name = $request->first_name;
    //             $last_name = $request->last_name;
    //              $last3 = DB::table('doctors')->latest('id')->first();
    //             $last = $last3->id;
    //             for($count = 0; $count < count($first_name); $count++)
    //             {
    //                 $data = array(
    //                     'first_name' => $first_name[$count],
    //                     'last_name'  => $last_name[$count],
    //                     'doctor_name'  => $last
    //                 );
    //                 $insert_data[] = $data; 
    //              }
    //             Others_Case_Study::insert($insert_data);
    //             return response()->json([
    //              'status'=>200,
    //              'message'=>'Patient Added Successfully.'
    //          ]);
    //        }
    //      }
        //  ajax add
    //     public function Ajaxinsert(Request $request)
    //      {
    //         if($request->ajax())
    //         {
    //         $rules = array(
    //         'first_name.*'  => 'required',
    //         'last_name.*'  => 'required'
    //         );
    //         $error = Validator::make($request->all(), $rules);
    //         if($error->fails())
    //         {
    //         return response()->json([
    //             'error'  => $error->errors()->all()
    //         ]);
    //         }
    //         $last3 = DB::table('doctors')->latest('id')->first();
    //         $last = $last3->id;
    //         //   dd($last);
          
            
    //         Check::insert($insert_data);
    //         return response()->json([
    //         'success'  => 'Data Added successfully.'
    //         ]);
    //         }
    //    }
         public function PrescriptionCaseStudyStore(Request $request){
        //    dd($request->all());
        // "patient_id" => "7"
        // "status" => "sfagasdfasdf"
        // "_token" => "TpGU3H09Tz6xPIAjoRHhetu5vsA50kS7Nfu89HtF"
        // "first_name" => array:2 [
        //     0 => "asdfghjhkl"
        //     1 => "asdfasdf"
        // ]
        // "last_name" => array:2 [
        //     0 => "sdfg"
        //     1 => "asdfasdf"
        // ]

        $validator = Validator::make($request->all(), [
            'first_name.*'  => 'required',
            'last_name.*'  => 'required',
            'patient_id'=> 'required',
         ]);
            //   dd(  $validator );
         if($validator->fails())
         {
             return response()->json([
                //  'status'=>400,
                 'errors'=>$validator->errors()
             ],
            422);
         }
         else{

                $patient=new PatientCaseStudy;
                $patient->patient_id=$request->input('patient_id');
                $patient->food_allergies=$request->input('food_allergies');
                $patient->tendency_bleed=$request->input('tendency_bleed');
                $patient->heart_disease=$request->input('heart_disease');
                $patient->high_blood_pressure=$request->input('high_blood_pressure');
                $patient->diabetic=$request->input('diabetic');
                $patient->surgery=$request->input('surgery');
                $patient->accident=$request->input('accident');
                $patient->family_medical_history=$request->input('family_medical_history');
                $patient->current_medication=$request->input('current_medication');
                $patient->family_pregnency=$request->input('family_pregnency');
                $patient->breast_feeding=$request->input('breast_feeding');
                $patient->health_insurance=$request->input('health_insurance');
                $patient->low_income=$request->input('low_income');
                $patient->reference=$request->input('reference');
                $patient->status=$request->input('status');

                $patient->save();

                $others = $request->others;
                $last3 = DB::table('patient_case_studies')->latest('id')->first();
                $last = $last3->id;
                for($count = 0; $count < count($others); $count++)
                {
                    $data = array(
                        'others' => $others[$count],
                        'case_study_id'  => $last
                    );
                    $insert_data[] = $data; 
                 }
                Others_Case_Study::insert($insert_data);
              return response()->json([
                 'status'=>200,
                 'message'=>'Patient Case Study Added Successfully.'
             ]);  
           }
         }
        //  Edit
        
        // method for editing patient data
        public function PrescriptionCaseStudyEdit($id){
            $casestudy = PatientCaseStudy::find($id);
            return response()->json([
                'status' =>200,
                'patient' => $casestudy,
            ]);
        }

            //Delete
    public function PrescriptionCaseStudyDelete($id){
 
       $patient = PatientCaseStudy::findOrFail($id);
 
       PatientCaseStudy::findOrFail($id)->delete();
       $notification = array(
           'message' =>  ' Deleted Sucessfully',
           'alert-type' => 'info'
       ); 
       return redirect()->back()->with($notification);
    } 
}
