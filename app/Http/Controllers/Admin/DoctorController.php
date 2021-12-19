<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Check;
use App\Models\Apointment\Apointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Image;
use Illuminate\Validation\Rules\Password;
use App\Models\DoctorDept;
use DB;

class DoctorController extends Controller
{
    // method for all patient data
    public function index()
    {
        $doctorDepts = DoctorDept::latest()->get();
        $doctors = Doctor::latest()->get();
        return view('super_admin.doctor.view_doctor', compact('doctors', 'doctorDepts'));
    }

    // method for add doctor page
    public function CreateDoctor()
    {
        $doctorDepts = DoctorDept::latest()->get();
        return view('super_admin.doctor.add_doctor', compact('doctorDepts'));
    }


    //      // method for storing patient data
    public function StoreDoctor(Request $request)
    {
        // validation
        $request->validate([
            'first_name1' => 'required',
            'last_name1' => 'required',

        ], [
            'first_name1.required' => 'Input The First Name',
            'last_name1.required' => 'Input The last Name',
        ]);
        // img upload and save
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('uploads/doctor/' . $name_gen);
        $save_url = 'uploads/doctor/' . $name_gen;
        // Doctor Insert
        Doctor::insert([
            'first_name1' => $request->first_name1,
            'last_name1' => $request->last_name1,
            'email' => $request->email,
            'password' => $request->password,
            'designation' => $request->designation,
            'doc_dept' => $request->doc_dept,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'sex' => $request->sex,
            'profile' => $request->profile,
            'dob' => $request->dob,
            'address1' => $request->address1,
            'address12' => $request->address12,
            'city' => $request->city,
            'zip' => $request->zip,
            'specialist' => $request->specialist,
            'age' => $request->age,
            'blood_group' => $request->blood_group,
            'social_link' => $request->social_link,
            'image' => $save_url,
            'career_title' => $request->career_title,
            'short_biography' => $request->short_biography,
            'long_biography' => $request->long_biography,
            'education_degree' => $request->education_degree,
            'status' => $request->status,
            'created_at' => $request->Carbon::now(),
            'updated_at' => $request->Carbon::now()

        ]);
        $notification = array(
            'message' =>  'Doctor Added Sucessfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // edit DOctor
    public function EditDoctor($id)
    {
        $DoctorDepts = DoctorDept::orderBy('name', 'ASC')->get();

        $doctors = Doctor::findOrfail($id);

        return view('super_admin.doctor.edit_doctor', compact('doctors', 'DoctorDepts'));
    }
    // update Doctor
    public function UpdateDoctor(Request $request)
    {

        $doctor_id = $request->id;
        $old_img  = $request->old_image;

        if ($request->file('image')) {

            unlink($old_img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/doctor/' . $name_gen);
            $save_url = 'uploads/doctor/' . $name_gen;

            // Brand Update
            Doctor::findOrFail($doctor_id)->update([
                'first_name1' => $request->first_name1,
                'last_name1' => $request->last_name1,
                'email' => $request->email,
                'password' => $request->password,
                'designation' => $request->designation,
                'doc_dept' => $request->doc_dept,
                'phone' => $request->phone,
                'mobile' => $request->mobile,
                'sex' => $request->sex,
                'profile' => $request->profile,
                'dob' => $request->dob,
                'address1' => $request->address1,
                'address12' => $request->address12,
                'city' => $request->city,
                'zip' => $request->zip,
                'specialist' => $request->specialist,
                'age' => $request->age,
                'blood_group' => $request->blood_group,
                'social_link' => $request->social_link,
                'image' => $save_url,
                'career_title' => $request->career_title,
                'short_biography' => $request->short_biography,
                'long_biography' => $request->long_biography,
                'education_degree' => $request->education_degree,
                'status' => $request->status,
            ]);

            $notification = array(
                'message' =>  'Doctor Updated Sucessfuly',
                'alert-type' => 'info'
            );

            return redirect()->route('view_doctor')->with($notification);
        } else {
            Doctor::findOrFail($doctor_id)->update([
                'first_name1' => $request->first_name1,
                'last_name1' => $request->last_name1,
                'email' => $request->email,
                'password' => $request->password,
                'designation' => $request->designation,
                'doc_dept' => $request->doc_dept,
                'phone' => $request->phone,
                'mobile' => $request->mobile,
                'sex' => $request->sex,
                'profile' => $request->profile,
                'dob' => $request->dob,
                'address1' => $request->address1,
                'address12' => $request->address12,
                'city' => $request->city,
                'zip' => $request->zip,
                'specialist' => $request->specialist,
                'age' => $request->age,
                'blood_group' => $request->blood_group,
                'social_link' => $request->social_link,
                'career_title' => $request->career_title,
                'short_biography' => $request->short_biography,
                'long_biography' => $request->long_biography,
                'education_degree' => $request->education_degree,
                'status' => $request->status,
                'created_at' => $request->Carbon::now(),
                'updated_at' => $request->Carbon::now()
            ]);

            $notification = array(
                'message' =>  'Doctor Updated Sucessfully',
                'alert-type' => 'info'
            );

            return redirect()->route('view_doctor')->with($notification);
        } // else end

    } // method end
    // delete sub category

    public function DeleteDoctor($id)
    {

        Doctor::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Doctor Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    } // end mathod
    // for language start
    public function insertt(Request $request)
    {
        if ($request->ajax()) {
            $rules = array(
                'first_name.*'  => 'required',
                'last_name.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            $last3 = DB::table('doctors')->latest('id')->first();
            $last = $last3->id;
            //   dd($last);
            $first_name = $request->first_name;
            $last_name = $request->last_name;
            for ($count = 0; $count < count($first_name); $count++) {
                $data = array(
                    'first_name' => $first_name[$count],
                    'last_name'  => $last_name[$count],
                    'doctor_name'  => $last
                );
                $insert_data[] = $data;
            }

            Check::insert($insert_data);
            return response()->json([
                'success'  => 'Data Added successfully.'
            ]);
        }
    }
    // for language end

    // all doctor view in dashboard
    public function AllDoctorView()
    {

        $listdoctors = Doctor::latest()->get();
        return view('super_admin.doctor.list_doctor', compact('listdoctors'));
    }


    // single doctor view in dashboard
    public function SingleDoctorView($id)
    {
        $doctor = Doctor::find($id);

        $appointments = Apointment::where('doctor_id', $id)->count();
        $appointmentsAll = Apointment::where('doctor_id', $id)->get();
        // dd($appointmentsAll);
        return view('super_admin.doctor.single_doctor', compact('doctor', 'appointments', 'appointmentsAll'));
    }
}
