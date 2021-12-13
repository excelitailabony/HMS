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
    // apoointment view start
    // public function AppointmentView(){
    //     $doctors=Doctor::all();
    //     $patients=Patient::all();
    //     $appointments=Appointment::with('doctor','patient')->get();
    //     return view('Appointment.appointment_view',compact('doctors','patients','appointments'));
    // }

    // // apoointment store start
    // public function AppointmentStore(Request $request){

    //     $validator = Validator::make($request->all(), [
    //         'patient_id'=> 'required',
    //         'doctor_dept'=>'required|max:20',
    //         'doctor_id'=>'required',
    //         'date'=>'required',
    //         'description'=>'required|max:191',
    //         'title'=>'required|max:10',
    //     ],
    //     [
    //         'patient_id.required'=>"Patient type is required",
    //     ]);

    //     if($validator->fails())
    //     {
    //         return response()->json([
    //             'status'=>400,
    //             'errors'=>$validator->messages()
    //         ]);
    //     }
    //     else
    //     {
    //         $appointment = new Appointment;
    //         $appointment->patient_id = $request->input('patient_id');
    //         $appointment->doctor_dept = $request->input('doctor_dept');
    //         $appointment->doctor_id = $request->input('doctor_id');
    //         $appointment->date = $request->input('date');
    //         $appointment->description = $request->input('description');
    //         $appointment->title = $request->input('title');
    //         $appointment->save();
    //         return response()->json([
    //             'status'=>200,
    //             'message'=>'Appointment Added Successfully.'
    //         ]);
    //         $notification = array(
    //                 'message' =>  'Appointment added Successfuly',
    //                 'alert-type' => 'success'
    //             );     
                
    //     }

    // } // end method 

    // // apoointment delete start
    // public function AppointmentDelete($id){

    //     $appointments=Appointment::find($id);
    //     $appointments->delete();

    //     $notification = array(
    //         'message' =>  'Appointment Deleted Successfully',
    //         'alert-type' => 'success'
    //     );

    //     return Redirect()->back()->with($notification); 
    // }

    // // apoointment edit start
    // public function AppointmentEdit($id){
    //     $appointments = Appointment::find($id);
    //     if($appointments)
    //     {
    //         return response()->json([
    //             'status'=>200,
    //             'appointments'=> $appointments,
    //         ]);
    //     }
    //     else
    //     {
    //         return response()->json([
    //             'status'=>404,
    //             'message'=>'No Appointment Found.'
    //         ]);
    //     }
    // }

    // // apoointment update start
    // public function AppointmentUpdate(Request $request,$id){

    //     $validator = Validator::make($request->all(), [
    //         'patient_name_id'=> 'required',
    //         'doctor_dept_id'=> 'required',
    //         'doctor_name_id'=>'required',
    //         'appointment_date_id'=>'required',
    //         'description_id'=>'required',
    //         'title_id'=>'required',
    //     ],
    // [
    //     'patient_name_id.required'=>'Patient name required',
    //     'doctor_dept_id.required'=>'Doctor department required',
    //     'doctor_name_id.required'=>'Doctor name required',
    //     'appointment_date_id.required'=>'appointment date required',
    //     'description_id.required'=>'description required',
    //     'title_id.required'=>'title required',
    // ]);

    //     if($validator->fails())
    //     {
    //         return response()->json([
    //             'status'=>400,
    //             'errors'=>$validator->messages()
    //         ]);
    //     }
    //     else
    //     {
    //         $appointments = Appointment::find($id);
    //         if($appointments)
    //         {
    //             $appointments->patient_id = $request->input('patient_name_id');
    //             $appointments->doctor_dept = $request->input('doctor_dept_id');
    //             $appointments->doctor_id = $request->input('doctor_name_id');
    //             $appointments->date = $request->input('appointment_date_id');
    //             $appointments->description = $request->input('description_id');
    //             $appointments->title = $request->input('title_id');
    //             $appointments->update();
    //             return response()->json([
    //                 'status'=>200,
    //                 'message'=>'Appointment Updated Successfully.'
    //             ]);
    //         }
    //         else
    //         {
    //             return response()->json([
    //                 'status'=>404,
    //                 'message'=>'No Appointment Found.'
    //             ]);  
    //         }

    //     }
    // }


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
        $myDate = '12/12/2021';
        $date = Carbon::createFromFormat('m/d/Y', $myDate)->format('l');
        dd($date);
        $doctors=Doctor::all();
        $docdepts=DoctorDept::all();
        return view('Appointment.appointment_view',compact('doctors','docdepts'));
    }

    // for getting doctors free schedule
    public function SlotName($doctor_name){
        $scheduleList = Schedulelist::where('doctor_id',$doctor_name)->get();
        // dd($scheduleList);
        return response()->json($scheduleList);
    }
    // apoointment store start
    public function AppointmentStore(Request $request){
        // validation 
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
    public function PatientName($name)
    {
        $patient = Patient::where('patient_id','like',$name)->first();
        return response()->json($patient);
    }
          
}
