<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment\Appointment;
use App\Models\DoctorDept;
use App\Models\Schedule\Schedulelist;
use Carbon\carbon;
use App\Models\Event;
use DB;
use Illuminate\Support\Facades\Validator;


class AppointmentController extends Controller
{
    // apointment calender view page
    public function index(Request $request)
     {
      if($request->ajax())
        { 
              $data = Appointment::join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
              ->select('appointments.id as id','appointments.date as date', 'doctors.name as title')
              ->get();
              return response()->json($data);
        }
        return view('Appointment.appointment_calender');
    }

    // for adding in appointment
    public function AppointmentView(){
        $doctors=Doctor::all();
        $docdepts=DoctorDept::all();
        return view('Appointment.appointment_view',compact('doctors','docdepts'));
    }

    // for getting doctors free schedule
    public function SlotName($doctor_name){
        $scheduleList = Schedulelist::where('doctor_id',$doctor_name)->get();
        return response()->json($scheduleList);
    }

    // for getting serial number by date
    public function SerialDate($date,$id){
        $date = Carbon::createFromFormat('Y-m-d', $date)->format('l');
        $serialNumber = Schedulelist::where('doctor_id',$id)->where('available_days',$date)->first();

        return response()->json([
            'status'=>200,
            'id' => $id,
            'serialNumber' => $serialNumber,
            'message'=>'Serial Number'
        ]);
    }

    // apoointment store start
    public function AppointmentStore(Request $request){
        // validation 
        dd($request->all());
        $request->validate([
            'department_name' => 'required',
            'doctor_name' => 'required',
          ],[ 
            'department_name.required' => 'Input The Department Name',
            'doctor_name.required' => 'Input The Doctor Name',
          ]);

        // Apointment Insert    
          Apointment::insert([
           'patient_id' => $request->patient_id,
           'department_name' => $request->department_name,
           'doctor_name' => $request->doctor_name,
           'appointment_date' => $request->appointment_date,
           'serial_no' => $request->serial_no,
           'problem' => $request->problem,
           'status' => $request->status,
          ]); 

          $notification = array(
            'message' =>  'Appointment Added Sucessyfuly',
            'alert-type' => 'success'
        ); 

        return redirect()->back()->with($notification);
    }

    // checking if patient exist or not using ajax
    public function PatientName($name)
    {
        $patient = Patient::where('patient_id','like',$name)->first();
        return response()->json($patient);
    }
            
}
