<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index(){
        $doctors = Doctor::latest()->get();
        return view('super_admin.doctor.view_doctor',compact('doctors'));
    }
}
