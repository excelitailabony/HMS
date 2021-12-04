<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receptionist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Image; 
use Illuminate\Validation\Rules\Password;


class ReceptionistController extends Controller
{
    // method for all patient data 
    public function ReceptionistView(){
        $patients = Receptionist::latest()->get();

        // dd($patients);
        return view('super_admin.receptionist.view_receptionist',compact('patients'));
    }

    // method for storing patient data
    public function ReceptionistStore(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|unique:patients|email',
            'password' => [
                        'required',
                        Password::min(8)
                        ->letters()
                        ->numbers()
                    ],
            'address' => 'required',
            'phone' => 'required|numeric|digits_between: 1,11',
            'dob' => 'required',
            'blood_group' => 'required',
            'gender' => 'required',
            'age' => 'required|numeric',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else{
            $patient=new Receptionist;
            $patient->name=$request->input('name');
            $patient->email=$request->input('email');
            $patient->password=$request->input('password');
            $patient->address=$request->input('address');
            $patient->phone=$request->input('phone');
            $patient->sex=$request->input('gender');
            $patient->dob=$request->input('dob');
            $patient->age=$request->input('age');
            $patient->bloodgrp=$request->input('blood_group');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
                Image::make($file)->resize(300,300)->save('uploads/patient/'.$extension);
                $save_url = 'uploads/patient/'.$extension;
                $patient->image= $save_url;
            }
            $patient->save();
            return response()->json([
               'status'=>200,
               'message'=>'Patient Updated Successfully.'
           ]);
        }
    }

    // method for editing patient data
    public function ReceptionistEdit($id){
        $patient = Receptionist::find($id);
        return response()->json([
            'status' =>200,
            'patient' => $patient,
        ]);
    }

    // method for updating data
    public function ReceptionistUpdate(Request $request){
        // dd($request->all());
        $old_img  = $request->old_image;
        unlink($old_img);
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('uploads/receptionist/'.$name_gen);
        $save_url = 'uploads/receptionist/'.$name_gen;

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|email',
            // 'password' => [
            //             'required',
            //             Password::min(8)
            //             ->letters()
            //             ->numbers()
            //         ],
            'address' => 'required',
            'phone' => 'required|numeric|digits_between: 1,11',
            'dob' => 'required',
            'blood_group' => 'required',
            'gender' => 'required',
            'age' => 'required|numeric',

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
            $patient_id=$request->input('patient_id');
            $patient = Receptionist::find($patient_id);

            $patient->name = $request->input('name');
            $patient->email=$request->input('email');
            $patient->address=$request->input('address');
            $patient->phone=$request->input('phone');
            $patient->sex=$request->input('gender');
            $patient->dob=$request->input('dob');
            $patient->age=$request->input('age');
            $patient->blood_group=$request->input('blood_group');
            $patient->image=$save_url;
            $patient->update();
            return response()->json([
                'status'=>200,
                'message'=>'Patient Updated Successfully.'
            ]);

        }      
    }

    // method for deleting patient data
     public function ReceptionistDelete($id){

        $patient = Receptionist::findOrFail($id);
        if($patient->image){
             $img = $patient->image;
            unlink($img);
        }

        Receptionist::findOrFail($id)->delete();
        $notification = array(
            'message' =>  'Patient Delete Sucessyfully',
            'alert-type' => 'info'
        ); 
        return redirect()->back()->with($notification);
    } 

}
