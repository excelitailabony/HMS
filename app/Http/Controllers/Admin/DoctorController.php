<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    // method for showing all doctors
    public function index(){
        $doctors = Doctor::latest()->get();
        return view('super_admin.doctor.view_doctor',compact('doctors'));
    }

     // method for storing doctors data
    public function StoreDoctor(Request $request){
        // gdfhb
        dd($request->all());
         // validation 
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'profile' => 'required',
            'doc_dept' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'age' => 'required',
            'blood_group' => 'required',
            'social_link' => 'required',
            'image' => 'required',
         ]);
        
        // ,
        // [
        //     'patient_id.required'=>"Patient type is required",
        // ]);
        $image = $request->image;

        // dd($image);
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(166,110)->save('uploads/doctor/'.$name_gen);
        $save_url = 'uploads/doctor/'.$name_gen;
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $doctor = new Doctor;
            $doctor->name = $request->input('name');
            $doctor->email = $request->input('email');
            $doctor->password = $request->input('password');
            $doctor->address = $request->input('address');
            $doctor->phone = $request->input('phone');
            $doctor->profile = $request->input('profile');
            $doctor->doc_dept = $request->input('doc_dept');
            $doctor->gender = $request->input('gender');
            $doctor->dob = $request->input('dob');
            $doctor->age = $request->input('age');
            $doctor->blood_group = $request->input('blood_group');
            $doctor->social_link = $request->input('social_link');
            $doctor->image=$save_url;
            $doctor->save();
           
            return response()->json([
                'status'=>200,
                'message'=>'Doctor Added Successfully.'
            ]);
            $notification = array(
                    'message' =>  'Doctor added Successfuly',
                    'alert-type' => 'success'
                );     
                
        }
        // fbfdb
       
    }

    // Doctor deactive
    public function DoctorDeactive($id){
     

        Doctor::findOrFail($id)->update([
            'status' => 0, 
        ]);
        $notification = array(
            'message' =>  'Doctor Deactivated Successfully',
            'alert-type' => 'info'
        ); 

        return redirect()->back()->with($notification);
    }
    // Doctor active
    public function DoctorActive($id){
        Doctor::findOrFail($id)->update([
                'status' => 1, 
            ]);
            $notification = array(
                'message' =>  'Doctor Activated Successfully',
                'alert-type' => 'info'
            ); 
            return redirect()->back()->with($notification);
    }

    // method for edit doctor data
    public function EditDoctor($id){
        $doctor = Doctor::find($id);

        // dd($patient);
        return response()->json([
            'status' =>200,
            'doctor' => $doctor,
        ]);
    }

    // method for update doctor
    public function UpdateDoctor(Request $request){
        $doctor_id=$request->doctor_id;
        $old_image=$request->old_image;
        // dd($old_image);
        if ($request->file('image')) {
            unlink($old_image);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,110)->save('uploads/doctor/'.$name_gen);
            $save_url = 'uploads/doctor/'.$name_gen;

            $doctor = Doctor::find($doctor_id);
            $doctor->name=$request->name;
            $doctor->email=$request->email;
            $doctor->image=$save_url;
            $doctor->address=$request->address;
            $doctor->phone=$request->phone;
            $doctor->sex=$request->gender;
            $doctor->dob=$request->dob;
            $doctor->age=$request->age;
            $doctor->profile=$request->profile;
            $doctor->doc_dept=$request->doc_dept;
            $doctor->social_link=$request->social_link;
            $doctor->blood_group=$request->blood_group;
            $doctor->update();
        }else{
            $doctor = Doctor::find($doctor_id);
            $doctor->name=$request->name;
            $doctor->email=$request->email;
            $doctor->address=$request->address;
            $doctor->phone=$request->phone;
            $doctor->sex=$request->gender;
            $doctor->dob=$request->dob;
            $doctor->age=$request->age;
            $doctor->profile=$request->profile;
            $doctor->doc_dept=$request->doc_dept;
            $doctor->social_link=$request->social_link;
            $doctor->blood_group=$request->blood_group;
            $doctor->update();
        }


         $notification=array(
            'message'=>'Doctor Updated Success',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);
        
    }

    // method for deleting doctor data
     public function DeleteDoctor($id){

        $doctor = Doctor::findOrFail($id);
        if($doctor->image){
             $img = $doctor->image;
             unlink($img);
        }

        Doctor::findOrFail($id)->delete();
        $notification = array(
            'message' =>  'Doctor Delete Sucessyfully',
            'alert-type' => 'info'
        ); 
        return redirect()->back()->with($notification);
    } 
}
