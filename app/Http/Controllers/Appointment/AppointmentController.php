<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment\Appointment;
use Carbon\carbon;
use App\Models\Event;
use DB;

class AppointmentController extends Controller
{
    public function AppointmentView(){
        $doctors=Doctor::all();
        $patients=Patient::all();
        $appointments=Appointment::with('doctor','patient')->get();
        return view('Appointment.appointment_view',compact('doctors','patients','appointments'));
    }

    public function AppointmentStore(Request $request){
        // validation 
        $request->validate([
            'appointment_date' => 'required',   
            'description' => 'required', 
            ]);
            
        // Blood Donor Insert    
        Appointment::insert([
            'patient_id' => $request->patient_name,   
            'doctor_dept' => $request->doctor_dept_id, 
            'doctor_id' => $request->doctor_name, 
            'date' => $request->appointment_date,   
            'description' => $request->description,
            'title' => $request->title, 
            'created_at' => Carbon::now(),          
            ]); 
            $notification = array(
            'message' =>  'Appointment Added Successfully',
            'alert-type' => 'success'
        ); 
        return Redirect()->back()->with($notification);        

    } // end method 

    public function AppointmentDelete($id){

        $appointments=Appointment::find($id);
        $appointments->delete();

        $notification = array(
            'message' =>  'Appointment Deleted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification); 
    }

    public function AppointmentEdit($id){
         $appointments = Appointment::find($id);
            return response()->json([
                'status' =>200,
                'appointments' => $appointments,
            ]);
    }

    public function AppointmentUpdate(Request $request){

        // dd($request->all());
        $appointment_id=$request->input('appointment_id');
        $appointments =Appointment::find($appointment_id);
        $appointments->patient_id=$request->patient_name;
        $appointments->doctor_dept=$request->doctor_dept;
        $appointments->doctor_id=$request->doctor_name;
        $appointments->date=$request->appointment_date;
        $appointments->description=$request->description;
        $appointments->update();
    
        $notification=array(
            'message'=>'Appointment Updated Successfully',
            'alert-type'=>'success'
        );
    
        return Redirect()->back()->with($notification); 
    }


    public function index(Request $request)
     {
     if($request->ajax())
    	{ 
            // $row=Appointment::orderBy('description','ASC')->get();
    		// $data = Appointment::get(['id', 'date','title']);
            $data = Appointment::join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->select('appointments.id as id','appointments.date as date', 'doctors.name as title')
            ->get();
            // dd($data);
            return response()->json($data);
    	}
    	return view('Appointment.appointment_calender');
    }
          
}
