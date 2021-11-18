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
    
        return View('Blood_Bank.Blood_Donor.view_blood_donor', compact('blooddonors'));
    
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
          
          // method for editing blood donor data
          public function BloodDonorEdit($id){
            $blooddonor = BloodDonor::find($id);
            return response()->json([
                'status' =>200,
                'blooddonor' => $blooddonor,
            ]);
        }



        // method for updating data
        public function BloodDonorUpdate(Request $request){

          $blooddonor_id=$request->input('blooddonor_id');
          $blooddonor =BloodDonor::find($blooddonor_id);
          $blooddonor->name=$request->name;
          $blooddonor->age=$request->age;
          $blooddonor->gender=$request->gender;
          $blooddonor->blood_group=$request->blood_group;
          $blooddonor->last_donation_date=$request->last_donation_date;
          $blooddonor->update();

          $notification=array(
              'message'=>'Blood Donor Updated Success',
              'alert-type'=>'success'
          );

          return Redirect()->back()->with($notification);


        }
        // delete
        public function BloodDonorDelete($id){

            $blooddonor = BloodDonor::findOrFail($id);
            BloodDonor::findOrFail($id)->delete(); 
            return redirect()->back();
        }
}
