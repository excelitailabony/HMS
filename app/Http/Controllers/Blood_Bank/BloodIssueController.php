<?php

namespace App\Http\Controllers\Blood_Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Blood_Bank\BloodDonor;
use App\Models\Blood_Bank\Blood_Issue;
use Carbon\carbon;

class BloodIssueController extends Controller
{
    public function BloodIssueView(){
        $doctors=Doctor::all();
        $patients=Patient::all();
        $donors=BloodDonor::all();
        $bloods=Blood_Issue::with('doctor','patient','donor')->get();
        return view('Blood_Bank.view_blood_issue',compact('doctors','patients','donors','bloods'));
    }

    public function BloodDonorGroup($donor_id){
        $donor_blood = BloodDonor::where('id',$donor_id)->get();
        // dd($donor_blood);
        return json_encode($donor_blood);
    }

    public function BloodDonorGroupEdit($blood_id){
        // dd($blood_id);
        $donor_blood_edit = BloodDonor::where('id',$blood_id)->get();
        return json_encode($donor_blood_edit);
    }


    public function BloodIssueStore(Request $request){
        // dd($request->all());
       Blood_Issue::insert([
            'doctor_id' => $request->doctor_name,
            'patient_id' => $request->patient_name,
            'donor_id' => $request->donor_id,
            'blood_group' => $request->blood_donor_group,
            'remarks' => $request->remarks,
            'amount' => $request->amount,
            'created_at' => Carbon::now(),
       ]);

        $notification=array(
            'message'=>'Blood Issue Added Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function BloodIssueDelete($id){
        Blood_Issue::findOrFail($id)->delete(); 
        return redirect()->back();
    }

    public function BloodIssueEdit($bloodissue_id){         
         $blood_issue = Blood_Issue::find($bloodissue_id);
         return response()->json([
            'status' =>200,
            'blood_issue' => $blood_issue,
         ]);
    }

    public function BloodDonorGroupUpdate(Request $request){
          $bloodissue_id=$request->input('bloodissue_id');
        
          $bloodissue =Blood_Issue::find($bloodissue_id);
            // dd($bloodissue);
          $bloodissue->doctor_id=$request->doctor_name;
          $bloodissue->patient_id=$request->patient_name;
          $bloodissue->donor_id=$request->donor_edit_id;
          $bloodissue->blood_group=$request->blood_donor_group_edit;
          $bloodissue->remarks=$request->remarks;
          $bloodissue->amount=$request->amount;
          $bloodissue->update();

          $notification=array(
              'message'=>'Blood Issue Updated Successfully',
              'alert-type'=>'success'
          );

          return Redirect()->back()->with($notification);
    }
}
