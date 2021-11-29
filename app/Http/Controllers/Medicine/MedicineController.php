<?php

namespace App\Http\Controllers\Medicine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine\Medicine;
use App\Models\Medicine\MedicineCategory;
use App\Models\Medicine\Medicine_manufacture;
use Illuminate\Support\Facades\Validator;

class MedicineController extends Controller
{
    
     // Medicine type View
     public function MedicineTypeView(){

        $medicinetypes= Medicine::latest()->get();
        return View('Medicine.view_medicine_type', compact('medicinetypes'));
  
    }// end method

     // Medicine type store
          public function MedicineTypeStore(Request $request){
          // Sub category validation 
          $request->validate([
             'name' => 'required',   
            ]);
        
    
          // Medicine type Insert    
          Medicine::insert([
          'name' => $request->name,                  
          ]);    
          $notification = array(
              'message' =>  'Medicine Type Added Successfuly',
              'alert-type' => 'success'
          );     
          return redirect()->back()->with($notification);   
       } // end mathod

        // method for editing medicine type data
            public function MedicineTypeEdit($id){
            $medicinetype = Medicine::find($id);
            return response()->json([
                'status' =>200,
                'medicinetype' => $medicinetype,
            ]);
        }


    // method for updating data
    public function MedicineTypeUpdate(Request $request){

      $medicinetype_id=$request->input('medicinetype_id');
      $medicinetype =Medicine::find($medicinetype_id);
      $medicinetype->name=$request->name;
      $medicinetype->update();

      $notification=array(
          'message'=>' Medicine Type Updated Success',
          'alert-type'=>'success'
      );

      return Redirect()->back()->with($notification);
    }

    // delete Medicinetype
    public function MedicineTypeDelete($id){

      $medicinetype = Medicine::findOrFail($id);
      Medicine::findOrFail($id)->delete(); 
      return redirect()->back();
    }

// /////////////////////////////////////Medicine Category//////////////////////////////////////////


     // Medicine Category View
     public function MedicineCategoryView(){

        $medicinecategorys= MedicineCategory::latest()->get();
        return View('Medicine.view_medicine_category',compact('medicinecategorys'));

  
    }// end method

   
     // Medicine category store
        public function MedicineCategoryStore(Request $request){
        // Medicine category validation 

            $validator = Validator::make($request->all(), [
                'name'=> 'required|max:191',
            ]);

            $notification = array(
                'message' =>  'Medicine Category Added Successfuly',
                'alert-type' => 'success'
            );  

            if($validator->fails())
            {
                return response()->json([
                    'status'=>400,
                    'errors'=>$validator->messages()
                ]);
            }
            else
            {
                $student = new MedicineCategory;
                $student->name = $request->input('name');
                $student->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Medicine Category Added Successfully',
                ]);
            }
        } // end method


        // method for editing medicine category data
        public function MedicineCategoryEdit($id){
            $medicinecategory = MedicineCategory::find($id);
            return response()->json([
                'status' =>200,
                'medicinecategory' => $medicinecategory,
            ]);
        }


    // method for updating data
    public function MedicineCategoryUpdate(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:191',
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
            $medicinecategory = MedicineCategory::find($id);
            if($medicinecategory)
            {
                $medicinecategory->name = $request->input('name');
                $medicinecategory->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Medicine Category Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No medicine category Found.'
                ]);
            }

        }      
    }

    // delete Medicinetype
    public function MedicineCategoryDelete($id){

      $medicinecategory = MedicineCategory::findOrFail($id);
      MedicineCategory::findOrFail($id)->delete(); 
      return redirect()->back();
    }
///////////////////////////////////////////Medicine Manufacture//////////////////////////////////////////////


     // Medicine Manufacture View
     public function MedicineManufactureView(){

        $medicinemanufactures= Medicine_manufacture::latest()->get();
        return View('Medicine.view_medicine_manufacture', compact('medicinemanufactures'));
  
    }// end method
   
     // Medicine manufacture store
          public function MedicineManufactureStore(Request $request){
          // Medicine manufacture validation 
          $request->validate([
          'name' => 'required',   
          'email' => 'required',
          'phone_number' => 'required',  
          
          ]);
        
    
          // Medicine manufacture Insert    
          Medicine_manufacture::insert([
          'name' => $request->name,
          'email' => $request->email,
          'phone_number' => $request->phone_number,
          'note' => $request->note,
          'address' => $request->address,                          
          ]);    
          $notification = array(
              'message' =>  'Medicine Manufacture Added Successfuly',
              'alert-type' => 'success'
          );     
          return redirect()->back()->with($notification);   
       } // end method

        // method for editing medicine manufacture data
            public function MedicineManufactureEdit($id){
            $medicinemanufacture = Medicine_manufacture::find($id);
            return response()->json([
                'status' =>200,
                'medicinemanufacture' => $medicinemanufacture,
            ]);
        }


    // method for updating data
    public function MedicineManufactureUpdate(Request $request){

      $medicinemanufacture_id=$request->input('medicinemanufacture_id');
      $medicinemanufacture =Medicine_manufacture::find($medicinemanufacture_id);
      $medicinemanufacture->name=$request->name;
      $medicinemanufacture->email=$request->email;
      $medicinemanufacture->phone_number=$request->phone_number;
      $medicinemanufacture->note=$request->note;
      $medicinemanufacture->address=$request->address;
      $medicinemanufacture->update();

      $notification=array(
          'message'=>' Medicine Manufacture Updated Success',
          'alert-type'=>'success'
      );

      return Redirect()->back()->with($notification);
    }

    // delete Medicine manufacture
    public function MedicineManufactureDelete($id){

      $medicinemanufacture = Medicine_manufacture::findOrFail($id);
      Medicine_manufacture::findOrFail($id)->delete(); 
      return redirect()->back();
    }
}
