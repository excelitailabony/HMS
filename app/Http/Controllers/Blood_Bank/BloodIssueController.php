<?php

namespace App\Http\Controllers\Blood_Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Donor;

class BloodIssueController extends Controller
{
    public function BloodIssueView(){
        $doctors=Doctor::all();
        $patients=Patient::all();
        return view('Blood_Bank.view_blood_issue',compact('doctors','patients'));
    }
}
