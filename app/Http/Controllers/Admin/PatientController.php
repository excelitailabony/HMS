<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use Image;

class PatientController extends Controller
{
    public function index(){
        $patients = Patient::latest()->get();
        return view('super_admin.patient.view_patient',compact('patients'));
    }

    public function StorePatient(Request $request){
        $request->validate([
             'name' => 'required',
             'email' => 'required',
             'password' => 'required',
        ]);
    }
}
