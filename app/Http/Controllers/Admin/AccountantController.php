<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accountant;
use Image;

class AccountantController extends Controller
{
    //View
    public function AccountantView(){

        $accountants=  Accountant::latest()->get();
    
        return View('super_admin.accountant.view_accountant', compact('accountants'));
    
        }// end method

           // store Accountant
  public function AccountantStore(Request $request){   
      
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
          Image::make($image)->resize(300,300)->save('upload/accountant/'.$name_gen);
          $save_url = 'upload/accountant/'.$name_gen;

       // Accountant Insert    
       Accountant::insert([

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
            'message' =>  'Brand Add Sucessyfuly',
            'alert-type' => 'success'
        ); 


        return Redirect()->back()->with($notification);        

  } // end method 

  public function AccountEdit($id){

    $accountant = Accountant::find($id);
        return response()->json([
            'status' =>200,
            'accountant' => $accountant,
        ]);
}



public function AccountUpdate(Request $request){
    $accountant_id = $request->id;
    $old_img  = $request->old_image;

    if ($request->file('image')) {

        unlink($old_img);
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/accountant/'.$name_gen);
        $save_url = 'upload/accountant/'.$name_gen;

     // Brand Update    
     Accountant::findOrFail($accountant_id)->update([
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
          'message' =>  'Slider Update Sucessyfully',
          'alert-type' => 'success'
      ); 

      return redirect()->route('all.accountant')->with($notification);


    }else{
      Accountant::findOrFail($accountant_id)->update([
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
             'message' =>  'Slider Update Sucessyfully',
             'alert-type' => 'info'
         ); 
 
         return redirect()->route('all.accountant')->with($notification);
}
}
// delete
public function AccountantDelete($id){

  $accountant = Accountant::findOrFail($id);

    $img = $accountant->slider_img;
    unlink($img);

    Accountant::findOrFail($id)->delete();

  $notification = array(
      'message' =>  'Slider deleted Successfully',
      'alert-type' => 'success'
     );
  return redirect()->back()->with($notification);  
}
  // Accountant deactive
  public function AccountantDeactive($id){
    Accountant::findOrFail($id)->update([
        'status' => 0, 
    
       ]);
       $notification = array(
        'message' =>  'Slider Deactivated Successfully',
        'alert-type' => 'info'
    ); 

    return redirect()->back()->with($notification);

}
// accountant active
public function AccountantActive($id){
  Accountant::findOrFail($id)->update([
        'status' => 1, 
    
       ]);
       $notification = array(
        'message' =>  'Slider Activated Successfully',
        'alert-type' => 'info'
    ); 

    return redirect()->back()->with($notification);

}


}
