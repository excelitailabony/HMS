<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receptionist;
use Image;

class ReceptionistController extends Controller
{
    //
    
    // Receptionist View
    public function ReceptionistView(){

        $receptionists= Receptionist::latest()->get();
    
        return View('super_admin.receptionist.view_receptionist', compact('receptionists'));
    
        }// end method

 // store Receptionist
  public function ReceptionistStore(Request $request){   
      
    // validation 
        $request->validate([
            'name' => 'required', 
            'email' => 'required', 
            'password' => 'required', 
            'address' => 'required', 
            'phone' => 'required',  
            'sex' => 'required', 
            'dob' => 'required',     
            'age' => 'required', 
            'bloodgrp' => 'required',        
            'image' => 'required',       
          ]);
          // img upload and save
          $image = $request->file('image');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(300,300)->save('upload/receptionist/'.$name_gen);
          $save_url = 'upload/receptionist/'.$name_gen;

       // Accountant Insert    
       Receptionist::insert([

           'name' => $request->name,   
           'email' => $request->email,
           'password' => $request->password, 
           'address' => $request->address, 
           'phone' => $request->phone, 
           'sex' => $request->sex, 
           'dob' => $request->dob, 
           'age' => $request->age, 
           'bloodgrp' => $request->bloodgrp,            
           'image' => $save_url,  

          ]); 

          $notification = array(
            'message' =>  'Receptionist Added Successfuly',
            'alert-type' => 'success'
        ); 


        return Redirect()->back()->with($notification);        

  } // end method 

  // method for editing accountant data
  public function ReceptionistEdit($id){
    $receptionist = Receptionist::find($id);
    return response()->json([
        'status' =>200,
        'receptionist' => $receptionist,
    ]);
}



 // method for updating data
 public function ReceptionistUpdate(Request $request){
  $old_img  = $request->old_image;

  if ($request->file('image')) {

    unlink($old_img);
    $image = $request->file('image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(300,300)->save('upload/receptionist/'.$name_gen);
    $save_url = 'upload/receptionist/'.$name_gen;
  
   
// image
  $receptionist_id=$request->input('receptionist_id');
  $receptionist =Receptionist::find($receptionist_id);
  $receptionist->name=$request->name;
  $receptionist->email=$request->email;
  $receptionist->password=$request->password;
  $receptionist->address=$request->address;
  $receptionist->phone=$request->phone;
  $receptionist->sex=$request->sex;
  $receptionist->dob=$request->dob;
  $receptionist->age=$request->age;
  $receptionist->bloodgrp=$request->bloodgrp;
  $receptionist->image=$save_url;
  $receptionist->update();

   $notification=array(
      'message'=>'Receptionist Updated Success',
      'alert-type'=>'success'
  );

  return Redirect()->back()->with($notification);
}
else{
  $receptionist_id=$request->input('receptionist_id');
  $receptionist =Receptionist::find($receptionist_id);
  $receptionist->name=$request->name;
  $receptionist->email=$request->email;
  $receptionist->password=$request->password;
  $receptionist->address=$request->address;
  $receptionist->phone=$request->phone;
  $receptionist->sex=$request->sex;
  $receptionist->dob=$request->dob;
  $receptionist->age=$request->age;
  $receptionist->bloodgrp=$request->bloodgrp;
  
  $receptionist->update();

   $notification=array(
      'message'=>'Receptionist Updated Success',
      'alert-type'=>'success'
  );

  return Redirect()->back()->with($notification);
}
}
// delete
public function ReceptionistDelete($id){

  $receptionist = Receptionist::findOrFail($id);

            $img = $receptionist->image;
            unlink($img);  
            Receptionist::findOrFail($id)->delete(); 
            return redirect()->back();

 
}
  
}
