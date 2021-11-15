<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\NurseController;

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
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});


// Admin View 
Route::middleware(['auth.admin:admin', 'verified'])->get('/admin/dashboard', function () {
    return view('super_admin.home');
})->name('dashboard');


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//All nurse route 
Route::prefix('nurse')->group(function () {
   Route::get('/view',[NurseController::class,'ViewNurse'])->name('view.nurse');
   //add nurse
   Route::post('/view',[NurseController::class,'AddNurse'])->name('add.nurse');
    

    //update nurse info 
   Route::post('/update',[NurseController::class,'UpdateNurse'])->name('update.nurse');
});


//
