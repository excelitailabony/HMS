<?php

namespace App\Http\Controllers\Diagnosis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diagnosis\Diagnosis;

class NewDiagnosisController extends Controller
{
    //
    // New diagnosis View
    public function DiagnosisCategoryView(){

        $diagnosiscats= Diagnosis::latest()->get();
        return View('Diagnosis.view_diagnosiscategory', compact('diagnosiscats'));
  
    }// end method
    
           // store Diagnosis
  public function DiagnosisCategoryStore(Request $request){   
      
    // validation 
        $request->validate([
            'new_diagnosis_category' => 'required', 
            'description' => 'required', 
          ]);
          
       // Diagnosis Insert    
       Diagnosis::insert([

           'new_diagnosis_category' => $request->new_diagnosis_category,   
           'description' => $request->description,

          ]); 

          $notification = array(
            'message' =>  'Diagnosis Category Added Sucessyfuly',
            'alert-type' => 'success'
        ); 


        return Redirect()->back()->with($notification);        

  } // end method 

  // method for editing accountant data
  public function DiagnosisCategoryEdit($id){
    $diagnosiscat = Diagnosis::find($id);
    return response()->json([
        'status' =>200,
        'diagnosiscat' => $diagnosiscat,
    ]);
}



 // method for updating data
 public function DiagnosisCategoryUpdate(Request $request){
  

  
  
   
// image
  $diagnosiscat_id=$request->input('diagnosiscat_id');
  $diagnosiscat =Diagnosis::find($diagnosiscat_id);
  $diagnosiscat->new_diagnosis_category=$request->new_diagnosis_category;
  $diagnosiscat->description=$request->description;
  
 
  $diagnosiscat->update();

   $notification=array(
      'message'=>'Diagnosis category Updated Success',
      'alert-type'=>'success'
  );

  return Redirect()->back()->with($notification);


}
// delete
public function DiagnosisCategoryDelete($id){

  $diagnosiscat = Diagnosis::findOrFail($id);

            
  Diagnosis::findOrFail($id)->delete(); 
            return redirect()->back();

 
}
}
