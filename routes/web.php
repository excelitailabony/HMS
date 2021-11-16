<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\NurseController;

use App\Http\Controllers\Admin\AccountantController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Pharmacist\PharmacistController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Admin Login View
// Admin View 
Route::middleware(['auth.admin:admin', 'verified'])->get('/admin/dashboard', function () {
    return view('super_admin.home');
})->name('dashboard');


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



// Nurse Start
Route::prefix('nurse')->group(function () {
Route::get('/view',[NurseController::class,'ViewNurse'])->name('view.nurse');
Route::post('/add',[NurseController::class,'AddNurse'])->name('add.nurse');
Route::post('/update',[NurseController::class,'UpdateNurse'])->name('update.nurse');
Route::get('/delete/{id}',[NurseController::class,'DeleteNurse'])->name('delete.nurse');
});
Route::get('edit-nurse/{id}',[NurseController::class,'EditNurse'])->name('edit.nurse');
// Nurse End

//All pharmacist  
Route::prefix('pharmacist')->group(function () {
Route::get('/view',[PharmacistController::class,'ViewPharmacist'])->name('view.pharmacist');
Route::post('/add',[PharmacistController::class,'AddPharmacist'])->name('add.pharmacist');
 Route::post('/update',[PharmacistController::class,'UpdatePharmacist'])->name('update.pharmacist');
    Route::get('/delete/{id}',[PharmacistController::class,'DeletePharmacist'])->name('delete.pharmacist');
 });
Route::get('edit-pharmacist/{id}',[PharmacistController::class,'EditPharmacist'])->name('edit.pharmacist');
//pharmacist end


//
Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){

    // Admin Profile
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');

});

// Patients routes goes here
Route::get('all/patient',[PatientController::class,'index'])->name('all.patient');
Route::post('store/patient',[PatientController::class,'StorePatient'])->name('store.patient');
Route::get('delete/patient/{id}',[PatientController::class,'DeletePatient'])->name('delete.patient');
Route::get('edit-patient/{id}',[PatientController::class,'EditPatient'])->name('edit.patient');
Route::post('update-patient',[PatientController::class,'UpdatePatient'])->name('update.patient');


// Doctors routes goes here
Route::get('all/doctor',[DoctorController::class,'index'])->name('all.doctor');
Route::post('store/doctor',[DoctorController::class,'StoreDoctor'])->name('store.doctor');

// Accountant Start
// Route::prefix('accountant')->group(function () {
    Route::get('/view', [AccountantController::class, 'AccountantView'])->name('all.accountant'); 
    Route::post('/add', [AccountantController::class, 'AccountantStore'])->name('accountant.add'); 
    Route::get('edit-patient/{id}', [AccountantController::class, 'AccountEdit']); 
    Route::post('/update', [AccountantController::class, 'AccountUpdate'])->name('account.update');
    Route::get('/delete/{id}', [AccountantController::class, 'AccountDelete'])->name('accountant.delete'); 
    Route::get('/deactive/{id}', [AccountantController::class, 'AccountantDeactive'])->name('accountant.deactive'); 
    Route::get('/active/{id}', [AccountantController::class, 'AccountantActive'])->name('accountant.active');
     
//   });// Admin Brand All Route Group End 
