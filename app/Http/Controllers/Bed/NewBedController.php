<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewBedType;
use App\Models\NewBed;

class NewBedController extends Controller
{
        // New Bed type View
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

            // method for editing new bed type data
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

// /////////////////////////For New Bed/////////////////////////////////////
        // New Bed View
        public function NewBedView(){
            $newbedtypes = NewBedType::orderBy('bed_types', 'ASC')->get();
            $newbeds= NewBed::latest()->get();

            return View('Bed.view_new_bed', compact('newbeds','newbedtypes'));

          }// end method
          
        // new bede type store
        public function NewBedStore(Request $request){
            // Sub category validation 
            $request->validate([
                'bed'=>'required',
                'bed_type_id' => 'required', 
                'charge' => 'required',     
                'description' => 'required',    
              ]);
          

            // new bed type Insert    
            NewBed::insert([
            'bed'=>$request->bed,
            'bed_type_id' => $request->bed_type_id,
            'charge'=>$request->charge,         
            'description' => $request->description,                 
            ]);    
            $notification = array(
                'message' =>  'New Bed Added Successfuly',
                'alert-type' => 'success'
            );     
            return redirect()->back()->with($notification);   
        } // end mathod

        // method for editing new bed  data
        public function NewBedEdit($id){
          $newbed = NewBed::find($id);
          $newbedtypes = NewBedType::orderBy('bed_types', 'ASC')->get();
          return response()->json([
              'status' =>200,
              'newbed' => $newbed,
              'newbedtypes' => $newbedtypes,
          ]);
        }



        // method for updating data
        public function NewBedUpdate(Request $request){

            $newbed_id=$request->input('newbed_id');
            $newbed =NewBed::find($newbed_id);
            $newbed->bed=$request->bed;
            $newbed->bed_type_id=$request->bed_type_id;
            $newbed->charge=$request->charge;
            $newbed->description=$request->description;
            $newbed->update();

            $notification=array(
                'message'=>'New Bed Updated Success',
                'alert-type'=>'success'
            );

            return Redirect()->back()->with($notification);
        }
        // delete
        public function NewBedDelete($id){

            $newbed = NewBed::findOrFail($id);
            NewBed::findOrFail($id)->delete(); 
                      return redirect()->back();
          }//end method
      
    }
