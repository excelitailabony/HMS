<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laboratorist;
use Image;

class LaboratoristController extends Controller
{

    //View
    public function LaboratoristView(){

        $laboratorists=  Laboratorist::orderBy('name','ASC')->latest()->get();
    
        return View('super_admin.laboratorist.view_laboratorist', compact('laboratorists'));
    
        }// end method
                // store Accountant
  public function LaboratoristStore(Request $request){   
      
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
          Image::make($image)->resize(300,300)->save('upload/laboratorist/'.$name_gen);
          $save_url = 'upload/laboratorist/'.$name_gen;

       // Accountant Insert    
       Laboratorist::insert([

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
            'message' =>  'Laboratorist Added Successfuly',
            'alert-type' => 'success'
        ); 


        return Redirect()->back()->with($notification);        

  } // end method 

  // method for editing accountant data
  public function LaboratoristEdit($id){
    $laboratorist = Laboratorist::find($id);
    return response()->json([
        'status' =>200,
        'laboratorist' => $laboratorist,
    ]);
}



 // method for updating data
 public function LaboratoristUpdate(Request $request){
  $old_img  = $request->old_image;

  if ($request->file('image')) {

    unlink($old_img);
    $image = $request->file('image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(300,300)->save('upload/laboratorist/'.$name_gen);
    $save_url = 'upload/laboratorist/'.$name_gen;
  
   
// image
  $laboratorist_id=$request->input('laboratorist_id');
  $laboratorist =Laboratorist::find($laboratorist_id);
  $laboratorist->name=$request->name;
  $laboratorist->email=$request->email;
  $laboratorist->password=$request->password;
  $laboratorist->address=$request->address;
  $laboratorist->phone=$request->phone;
  $laboratorist->sex=$request->sex;
  $laboratorist->dob=$request->dob;
  $laboratorist->age=$request->age;
  $laboratorist->bloodgrp=$request->bloodgrp;
  $laboratorist->image=$save_url;
  $laboratorist->update();

   $notification=array(
      'message'=>'Laboratorist Updated Success',
      'alert-type'=>'success'
  );

  return Redirect()->back()->with($notification);
}
else{
  $laboratorist_id=$request->input('laboratorist_id');
  $laboratorist =Laboratorist::find($laboratorist_id);
  $laboratorist->name=$request->name;
  $laboratorist->email=$request->email;
  $laboratorist->password=$request->password;
  $laboratorist->address=$request->address;
  $laboratorist->phone=$request->phone;
  $laboratoristt->sex=$request->sex;
  $laboratorist->dob=$request->dob;
  $laboratorist->age=$request->age;
  $laboratorist->bloodgrp=$request->bloodgrp;
  
  $laboratorist->update();

   $notification=array(
      'message'=>'Laboratorist Updated Success',
      'alert-type'=>'success'
  );

  return Redirect()->back()->with($notification);
}
}
// delete
public function LaboratoristDelete($id){

  $laboratorist = Laboratorist::findOrFail($id);

            $img = $laboratorist->image;
            unlink($img);  
            Laboratorist::findOrFail($id)->delete(); 
            return redirect()->back();

 
}
  
  


}
