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

        $accountants=  Accountant::orderBy('id', 'DESC')->get();
    
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
            'message' =>  'Accountant Added Sucessyfuly',
            'alert-type' => 'success'
        ); 


        return Redirect()->back()->with($notification);        

  } // end method 

  // method for editing accountant data
  public function AccountEdit($id){
    $accountant = Accountant::find($id);
    return response()->json([
        'status' =>200,
        'accountant' => $accountant,
    ]);
}



 // method for updating data
 public function AccountUpdate(Request $request){
  $old_img  = $request->old_image;

  if ($request->file('image')) {

    unlink($old_img);
    $image = $request->file('image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(300,300)->save('upload/accountant/'.$name_gen);
    $save_url = 'upload/accountant/'.$name_gen;
  
   
// image
  $accountant_id=$request->input('accountant_id');
  $accountant =Accountant::find($accountant_id);
  $accountant->name=$request->name;
  $accountant->email=$request->email;
  $accountant->password=$request->password;
  // $accountant->address=$request->address;
  // $accountant->phone=$request->phone;
  $accountant->sex=$request->sex;
  $accountant->dob=$request->dob;
  $accountant->age=$request->age;
  $accountant->bloodgrp=$request->bloodgrp;
  $accountant->image=$save_url;
  $accountant->update();

   $notification=array(
      'message'=>'Accountant Updated Success',
      'alert-type'=>'success'
  );

  return Redirect()->back()->with($notification);
}
else{
  $accountant_id=$request->input('accountant_id');
  $accountant =Accountant::find($accountant_id);
  $accountant->name=$request->name;
  $accountant->email=$request->email;
  $accountant->password=$request->password;
  // $accountant->address=$request->address;
  // $accountant->phone=$request->phone;
  $accountant->sex=$request->sex;
  $accountant->dob=$request->dob;
  $accountant->age=$request->age;
  $accountant->bloodgrp=$request->bloodgrp;
  
  $accountant->update();

   $notification=array(
      'message'=>'Accountant Updated Success',
      'alert-type'=>'success'
  );

  return Redirect()->back()->with($notification);
}
}
// delete
public function AccountDelete($id){

  $accountant = Accountant::findOrFail($id);

            $img = $accountant->image;
            unlink($img);  
            Accountant::findOrFail($id)->delete(); 
            return redirect()->back();

 
}
  // Accountant deactive
  public function AccountantDeactive($id){
    Accountant::findOrFail($id)->update([
        'status' => 0, 
    
       ]);
       $notification = array(
        'message' =>  'Accountant Deactivated Successfully',
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
        'message' =>  'Accountant Activated Successfully',
        'alert-type' => 'info'
    ); 

    return redirect()->back()->with($notification);

}


}
