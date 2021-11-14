<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use Image; 


class PatientController extends Controller
{
    public function index(){
        $patients = Patient::latest()->get();
        return view('super_admin.patient.view_patient',compact('patients'));
    }

    public function StorePatient(Request $request){
        $request->validate([
             'name' => 'required',
             'email' => 'required',
             'password' => 'required',
        ]);

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
            // 'created_at' => Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Patient Upload Success',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);
    }
}
