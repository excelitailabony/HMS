<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewBedAllotment;
use App\Models\NewBed;
use App\Models\Doctor;
use App\Models\Patient;

class BedAssignController extends Controller
{
    public function BedAssignView(){
        $newbednames = NewBed::all();
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view ('Bed.view_bed_assign',compact('newbednames','doctors','patients'));
    }
}
