<?php

namespace App\Http\Controllers\Blood_Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blood_Bank\BloodDonation;
use App\Models\Blood_Bank\BloodDonor;

class BloodDonationController extends Controller
{
    //
     // Blood Donation View
     public function BloodDonationView(){

            $blooddonors = BloodDonor::orderBy('name', 'ASC')->get();
            $blooddonations = BloodDonation::latest()->get();
            return view('Blood_Bank.view_blood_donation', compact('blooddonors','blooddonations'));
    
        }// end method
         // Blood Donation store
         public function BloodDonationStore(Request $request){
            // Sub category validation 
            $request->validate([
                'donor_id' => 'required',   
                'bags' => 'required',    
              ]);
          
      
            // Blood Donation Insert    
            BloodDonation::insert([
            'donor_id' => $request->donor_id,         
            'bags' => $request->bags,                 
            ]);    
            $notification = array(
                'message' =>  'Donor Added Successfuly',
                'alert-type' => 'success'
            );     
            return redirect()->back()->with($notification);   
             } // end mathod
             
                // method for editing blood donation data
            public function BloodDonationEdit($id){
              $blooddonors = BloodDonor::orderBy('name', 'ASC')->get();
              $blooddonation = BloodDonation::find($id);
              return response()->json([
                  'status' =>200,
                  'blooddonors' => $blooddonors,
                  'blooddonation' => $blooddonation,
              ]);
          }//end edit of blood donation


  
            // method for updating data
          public function BloodDonationUpdate(Request $request){

              $blooddonation_id=$request->input('blooddonation_id');
              $blooddonation =BloodDonation::find($blooddonation_id);
              $blooddonation->donor_id=$request->donor_id;
              $blooddonation->bags=$request->bags;

              $blooddonation->update();
            
              $notification=array(
                  'message'=>'Blood Donation Updated Success',
                  'alert-type'=>'success'
              );
            
              return Redirect()->back()->with($notification);
            
            
            }
            
              // delete
          public function BloodDonationDelete($id){

              $blooddonation = BloodDonation::findOrFail($id);
              BloodDonation::findOrFail($id)->delete(); 
                        return redirect()->back();
            }
            

}
