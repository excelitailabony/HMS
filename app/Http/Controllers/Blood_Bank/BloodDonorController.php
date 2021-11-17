<?php

namespace App\Http\Controllers\Blood_Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blood_bank\BloodDonor;

class BloodDonorController extends Controller
{
    //
     // Blood Donor View
     public function BloodDonorView(){

        $blooddonors= BloodDonor::latest()->get();
    
        return View('Blood_Bank.view_blood_donor', compact('blooddonors'));
    
        }// end method
        public function BloodDonorStore(Request $request){   
      
            // validation 
                $request->validate([
                    'name' => 'required',   
                    'age' => 'required', 
                    'gender' => 'required',
                    'blood_group' => 'required',        
                    'last_donation_date' => 'required'     
                  ]);
                 
        
               // Blood Donor Insert    
               BloodDonor::insert([
        
                   'name' => $request->name,   
                   'age' => $request->age, 
                   'gender' => $request->gender, 
                   'blood_group' => $request->blood_group,            
                   'last_donation_date' => $request->last_donation_date,  
        
                  ]); 
        
                  $notification = array(
                    'message' =>  'Blood Donor Added Sucessyfuly',
                    'alert-type' => 'success'
                ); 
        
        
                return Redirect()->back()->with($notification);        
        
          } // end method 
}
