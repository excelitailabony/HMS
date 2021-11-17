<?php

namespace App\Http\Controllers\Pharmacist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pharmacist;
use Image;

class PharmacistController extends Controller
{
    //view pharmacist info
    public function ViewPharmacist(){
        $pharmacists=Pharmacist::all();
        return view('admin.pharmacist.view_pharmacist',compact('pharmacists'));
        
    }//end method

    //add pharmacist info
    public function AddPharmacist(Request $request){
         // validation 
         $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required', 
            'password' => 'required',  
            'image' => 'required',      
          ],[ 
            'name.required' => 'Input Nurse name',
            'email.required' => 'Input nurse email',
            'phone.required' => 'Input nurse phone ',
            'password.required' => 'Input nurse password',
            'image.required' => 'Input nurse image',
          ]);

        // img upload and save
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(50,50)->save('upload/pharmacist/'.$name_gen);
        $save_url = 'upload/pharmacist/'.$name_gen;

        $PharmacistInfo=new Pharmacist();
        $PharmacistInfo->name=$request->name;
        $PharmacistInfo->email=$request->email;
        $PharmacistInfo->phone=$request->phone;
        $PharmacistInfo->password=$request->password;
        $PharmacistInfo->address=$request->address;
        $PharmacistInfo->sex=$request->sex;
        $PharmacistInfo->dob=$request->dob;
        $PharmacistInfo->age=$request->age;
        $PharmacistInfo->blood_group=$request->blood_group;
        $PharmacistInfo->image= $save_url;
        $PharmacistInfo->save();
        return redirect()->back()->with('message','Pharmacist info added successfully');
    }//end method

    // method for editing pharmacist data
    public function EditPharmacist($id){
        $pharmacist = Pharmacist::find($id);
        return response()->json([
            'status' =>200,
            'pharmacist' => $pharmacist,
        ]);
    }//end method

    //uplodad image
    protected function uploadImage($request){
        $image = $request->file('image');
       $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
       Image::make($image)->resize(50,50)->save('upload/nurse/'.$name_gen);
       $save_url = 'upload/pharmacist/'.$name_gen;
       return $save_url;
   }//end method


   //update nurse info with image
   protected function updatePharmacistInfoWithImage($pharmacistInfo,$request,$save_url){
       $pharmacistInfo->name=$request->name;
       $pharmacistInfo->email=$request->email;
       $pharmacistInfo->phone=$request->phone;
       $pharmacistInfo->password=$request->password;
       $pharmacistInfo->address=$request->address;
       $pharmacistInfo->sex=$request->sex;
       $pharmacistInfo->dob=$request->dob;
       $pharmacistInfo->age=$request->age;
       $pharmacistInfo->blood_group=$request->blood_group;
       $pharmacistInfo->image= $save_url;
       $pharmacistInfo->save();
   }//end method


   //update nurse info without image
   protected function updatePharmacistINfoWithOutImage($pharmacistInfo,$request){
       $pharmacistInfo->name=$request->name;
       $pharmacistInfo->email=$request->email;
       $pharmacistInfo->phone=$request->phone;
       $pharmacistInfo->password=$request->password;
       $pharmacistInfo->address=$request->address;
       $pharmacistInfo->sex=$request->sex;
       $pharmacistInfo->dob=$request->dob;
       $pharmacistInfo->age=$request->age;
       $pharmacistInfo->blood_group=$request->blood_group;
   }//end method

   //update nurse info
   public function UpdatePharmacist(Request $request){
       $pharmacistInfo=Pharmacist::find($request->pharmacist_id);
       $old_image=$pharmacistInfo->image;

       if($request->file('image')){
           @unlink($old_image);
            //image upload
           $save_url=$this->uploadImage($request);
       //update data with image
           $this->updatePharmacistInfoWithImage($pharmacistInfo,$request,$save_url);
      
       
       return redirect()->back()->with('message','pharmacist info updated successfully');

       } else{
           //update data without image
           $this->updatePharmacistINfoWithOutImage($pharmacistInfo,$request);
          
       $pharmacistInfo->save();
       return redirect()->back()->with('message','pharmacist info updated successfully');

       }
   }//end method


   //delete nurse info
   public function DeletePharmacist($id){
    $pharmacist=Pharmacist::find($id);
    $image=$pharmacist->image;
    unlink($image);
    $pharmacist->delete();
    return redirect()->back();
}//end method

    















}//main end
