<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CageController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\fishController;

//แอตมิน//แดชบอร์ท
Route::get('/dashboard',[dashboardController::class,'index'])->name('dashboard');
//แอตมิน//ปลา
Route::get('/fish',[fishController::class,'index'])->name('fish');
Route::get('/fish/delete/{id}',[fishController::class,'destroy'])->name('Deletefish');
Route::get('/fish/editfish/{id}',[fishController::class,'edit']);
Route::post('/fish/update/{id}',[fishController::class,'update'])->name('updatefish');
Route::get('/fish/addfish',[fishController::class,'create'])->name('addfish');
Route::post('/fish/addfish',[fishController::class,'store'])->name('adminAddfish');
//แอตมิน//กระชัง
 Route::get('/cage',[CageController::class,'index'])->name('cage');
 Route::get('/cage/addCage',[CageController::class,'create'])->name('addCage');
//แอตมิน//พนักงาน
Route::get('/employee',[EmployeeController::class,'index'])->name('employee');
Route::get('/employee/addEmployee',[EmployeeController::class,'create'])->name('addEmployee');
Route::post('/employee/addEmployee',[EmployeeController::class,'store'])->name('addStore');
Route::get('/employee/editEmployee/{id}',[EmployeeController::class,'edit'])->name('editEmployee');
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
    return view('login');
});
