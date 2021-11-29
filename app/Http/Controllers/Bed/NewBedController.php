<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewBedType;
use App\Models\NewBed;
use Illuminate\Support\Facades\Validator;

class NewBedController extends Controller
{
       // New Bed type View
       public function NewBedTypeView(){

        $newbedtypes= NewBedType::latest()->get();
        return View('Bed.view_newbed_type', compact('newbedtypes'));
  
    }// end method
   
     // new bede type store
     public function NewBedTypeStore(Request $request){

        $validator = Validator::make($request->all(), [
            'bed_types'=> 'required|max:191',
            'description'=>'required|max:191',
            
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $student = new NewBedType;
            $student->bed_types = $request->input('bed_types');
            $student->description = $request->input('description');
            $student->save();
            return response()->json([
                'status'=>200,
                'message'=>'Student Added Successfully.'
            ]);
            $notification = array(
                    'message' =>  'New Bed Added Successfuly',
                    'alert-type' => 'success'
                );     
                // return redirect()->back()->toast()->success('done'); 
        }
  
    } // end mathod


        // method for editing new bed type data
        public function NewBedTypeEdit($id){
            $newbedtype = NewBedType::find($id);
            if($newbedtype)
            {
                return response()->json([
                    'status'=>200,
                    'newbedtype'=> $newbedtype,
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No newbedtype Found.'
                ]);
            }
        }

    public function NewBedTypeUpdate(Request $request,$id)
    {
            $validator = Validator::make($request->all(), [
                'bed_types'=> 'required|max:191',
                'description'=>'required|max:191',
            ]);

            if($validator->fails())
            {
                return response()->json([
                    'status'=>400,
                    'errors'=>$validator->messages()
                ]);
            }
            else
            {
                $student = NewBedType::find($id);
                if($student)
                {
                    $student->bed_types = $request->input('bed_types');
                    $student->description = $request->input('description');
                    $student->update();
                    return response()->json([
                        'status'=>200,
                        'message'=>'New Bed Type Updated Successfully.'
                    ]);
                }
                else
                {
                    return response()->json([
                        'status'=>404,
                        'message'=>'No Student Found.'
                    ]);  
                }

            }
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
