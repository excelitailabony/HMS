<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Carbon\Carbon;
use Image;

class DoctorController extends Controller
{
    // method for showing all doctors
    public function index(){
        $doctors = Doctor::latest()->get();
        return view('super_admin.doctor.view_doctor',compact('doctors'));
    }

     // method for storing doctors data
    public function StoreDoctor(Request $request){
        $request->validate([
             'name' => 'required',
             'email' => 'required',
             'password' => 'required',
        ]);

        if($request->file('image')) {
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,110)->save('uploads/doctor/'.$name_gen);
            $save_url = 'uploads/doctor/'.$name_gen;
            Doctor::insert([
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
            'doc_dept' => $request->doc_dept,
            'profile' => $request->profile,
            'social_link' => $request->social_link,
            'created_at' => Carbon::now(),
           ]);
        }else{
            Doctor::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'sex' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'age' => $request->age,
            'blood_group' => $request->blood_group,
            'doc_dept' => $request->doc_dept,
            'profile' => $request->profile,
            'social_link' => $request->social_link,
            'created_at' => Carbon::now(),
           ]);
        }

        $notification=array(
            'message'=>'Doctor Upload Success',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);
    }
}
