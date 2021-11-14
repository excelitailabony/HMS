<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use Carbon\Carbon;
use Image; 


class PatientController extends Controller
{
    // method for all patient data 
    public function index(){
        $patients = Patient::latest()->get();
        return view('super_admin.patient.view_patient',compact('patients'));
    }

    // method for storing patient data
    public function StorePatient(Request $request){
        $request->validate([
             'name' => 'required',
             'email' => 'required',
             'password' => 'required',
        ]);

        if($request->file('image')) {
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,110)->save('uploads/patient/'.$name_gen);
            $save_url = 'uploads/patient/'.$name_gen;
            Patient::insert([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $save_url,
            'password' => $request->password,
            'phone' => $request->phone,
            'sex' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'age' => $request->age,
            'blood_group' => $request->blood_group,
            'created_at' => Carbon::now(),
           ]);
        }else{
            Patient::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'sex' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'age' => $request->age,
            'blood_group' => $request->blood_group,
            'created_at' => Carbon::now(),
           ]);
        }

        $notification=array(
            'message'=>'Patient Upload Success',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);
    }

    // method for editing patient data
    public function EditPatient($id){
        $patient = Patient::find($id);
        return response()->json([
            'status' =>200,
            'patient' => $patient,
        ]);
    }

    // method for updating data
    public function UpdatePatient(Request $request){
        $patient_id=$request->input('patient_id');
        $patient = Patient::find($patient_id);
        $patient->name=$request->name;
        $patient->email=$request->email;
        $patient->address=$request->address;
        $patient->phone=$request->phone;
        $patient->sex=$request->gender;
        $patient->dob=$request->dob;
        $patient->age=$request->age;
        $patient->blood_group=$request->blood_group;
        $patient->update();

         $notification=array(
            'message'=>'Patient Updated Success',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);
    }

    // method for deleting patient data
     public function DeletePatient($id){

        $patient = Patient::findOrFail($id);
        if($patient->image){
             $img = $patient->image;
            unlink($img);
        }

        Patient::findOrFail($id)->delete();
        $notification = array(
            'message' =>  'Patient Delete Sucessyfully',
            'alert-type' => 'info'
        ); 
        return redirect()->back()->with($notification);
    } 

}
