<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule\Schedulelist;
use App\Models\Schedule\Schedule;
use App\Models\Doctor;

class SchedulelistController extends Controller
{
    //
     //
     public function ViewTimeSlotlist()

     {
         $docnames=Doctor::get()->all();
         $slotsnames=Schedule::get()->all();
         $diagnosiscats= Schedulelist::latest()->get();
         return view('super_admin.schedule.view_schedulelist',compact('diagnosiscats','slotsnames','docnames'));
     }
      // new time slot store
    //   public function StoreTimeSlotlist(Request $request){   
         
    //      $validator = Validator::make($request->all(), [
    //      'slot_name'=> 'required|max:10',
    //      'slot_time'=>'required',
    //      'status'=>'required',
             
    //      ]);
 
    //      if($validator->fails())
    //      {
    //          return response()->json([
    //              'status'=>400,
    //              'errors'=>$validator->messages()
    //          ]);
    //      }
    //      else
    //      {
    //          $diagnosis = new Schedulelist;
    //          $diagnosis->slot_name = $request->input('slot_name');
    //          $diagnosis->slot_time = $request->input('slot_time');
    //          $diagnosis->status = $request->input('status');
    //          $diagnosis->save();
    //          return response()->json([
    //              'status'=>200,
    //              'message'=>'Time Slot added Successfully.'
    //          ]);
    //          $notification = array(
    //                  'message' =>  'Time Slot  added Successfuly',
    //                  'alert-type' => 'success'
    //              );     
                 
    //      }
    //  } // end method 
 
    //  // new diagnosis category edit
    //  public function EditTimeSlotlist($id){
    //      $diagnosiscat = Schedulelist::find($id);
    //      if($diagnosiscat)
    //      {
    //          return response()->json([
    //              'status'=>200,
    //              'diagnosiscat'=> $diagnosiscat,
    //          ]);
    //      }
    //      else
    //      {
    //          return response()->json([
    //              'status'=>404,
    //              'message'=>'No diagnosis Found.'
    //          ]);
    //      }
    //  }
 
 
    //  //  new diagnosis category update
    //  public function UpdateTimeSlotlist(Request $request,$id){
         
    //      $validator = Validator::make($request->all(), [
    //          'slot_name'=> 'required|max:10',
    //          // 'slot_time'=>'required|max:191',
    //          'status'=>'required',
    //      ]);
 
    //      if($validator->fails())
    //      {
    //          return response()->json([
    //              'status'=>400,
    //              'errors'=>$validator->messages()
    //          ]);
    //      }
    //      else
    //      {
    //          $diagnosis = Schedulelist::find($id);
    //          if($diagnosis)
    //          {
    //              $diagnosis->slot_name = $request->input('slot_name');
    //              $diagnosis->slot_time = $request->input('slot_time');
    //              $diagnosis->status = $request->input('status');
    //              $diagnosis->update();
    //              return response()->json([
    //                  'status'=>200,
    //                  'message'=>'Schedule Updated Successfully.'
    //              ]);
    //          }
    //          else
    //          {
    //              return response()->json([
    //                  'status'=>404,
    //                  'message'=>'No Schedule Found.'
    //              ]);  
    //          }
 
    //      }
    //  }
 
    //  //diagnosis category delete
    //  public function DeleteTimeSlot($id){
    //      $diagnosis = Schedulelist::findOrFail($id);
    //      Schedulelist::findOrFail($id)->delete(); 
    //      return redirect()->back(); 
    //  }//end method
}
