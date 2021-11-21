<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewBedType;

class NewBedController extends Controller
{
        // Blood Donor View
        public function NewBedTypeView(){

            $newbedtypes= NewBedType::latest()->get();
            return View('Bed.view_newbed_type', compact('newbedtypes'));
      
        }// end method
       
        // new bede type store
        public function NewBedTypeStore(Request $request){
          // Sub category validation 
          $request->validate([
              'bed_types' => 'required',   
              'description' => 'required',    
            ]);
        
          // new bed type Insert    
          NewBedType::insert([
          'bed_types' => $request->bed_types,         
          'description' => $request->description,                 
          ]);    
          $notification = array(
              'message' =>  'New Bed Added Successfuly',
              'alert-type' => 'success'
          );     
          return redirect()->back()->with($notification);   
            } // end mathod
            // method for editing blood donor data
          public function NewBedTypeEdit($id){
            $newbedtype = NewBedType::find($id);
            return response()->json([
                'status' =>200,
                'newbedtype' => $newbedtype,
            ]);
        }

        // method for updating data
        public function NewBedTypeUpdate(Request $request){

          $newbedtype_id=$request->input('newbedtype_id');
          $newbedtype =NewBedType::find($newbedtype_id);
          $newbedtype->bed_types=$request->bed_types;
          $newbedtype->description=$request->description;
          $newbedtype->update();

          $notification=array(
              'message'=>'New Bed Updated Success',
              'alert-type'=>'success'
          );

          return Redirect()->back()->with($notification);
        }

        // delete bedtype
        public function NewBedTypeDelete($id){

          $newbedtype = NewBedType::findOrFail($id);
          NewBedType::findOrFail($id)->delete(); 
                    return redirect()->back();
        }

}
