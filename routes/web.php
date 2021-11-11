<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\DoctorController;

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
Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){

    // Admin Profile
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');

});

// Patients routes goes here
Route::get('all/patient',[PatientController::class,'index'])->name('all.patient');
Route::post('store/patient',[PatientController::class,'StorePatient'])->name('store.patient');


// Doctors routes goes here
Route::get('all/doctor',[DoctorController::class,'index'])->name('all.doctor');


// Admin View 
Route::middleware(['auth.admin:admin', 'verified'])->get('/admin/dashboard', function () {
    return view('super_admin.home');
})->name('dashboard');


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
