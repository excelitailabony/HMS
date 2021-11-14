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

        //   $notification = array(
        //     'message' =>  'Brand Add Sucessyfuly',
        //     'alert-type' => 'success'
        // ); 

        return redirect()->back();          

  } // end method 


}
