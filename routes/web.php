<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\fishController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SupplierController;
use Symfony\Component\Finder\Iterator\CustomFilterIterator;

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
 Route::post('/cage/storeCage',[CageController::class,'store'])->name('storeCage');

//แอตมิน//พนักงาน
Route::get('/employee',[EmployeeController::class,'index'])->name('employee');
Route::get('/employee/addEmployee',[EmployeeController::class,'create'])->name('addEmployee');
Route::post('/employee/addEmployee',[EmployeeController::class,'store'])->name('addStore');
Route::get('/employee/editEmployee/{id}',[EmployeeController::class,'edit'])->name('editEmployee');
Route::post('/employee/updateEmployee/{id}',[EmployeeController::class,'update']);
Route::get('/employee/DeleteEmployee/{id}',[EmployeeController::class,'destroy'])->name('DeleteEmployee');
//แอตมิน//พนักงาน
Route::get('/salary',[SalaryController::class,'index'])->name('salary');
//แอตมิน//:ซัพพลาย
Route::get('/supplier',[SupplierController::class,'index'])->name('supplier');
Route::get('/supplier/addSupplier',[SupplierController::class,'create'])->name('addSupplier');
Route::post('/supplier/storeSupplier',[SupplierController::class,'store'])->name('storeSupplier');
Route::get('/supplier/editSupplier/{id}',[SupplierController::class,'edit'])->name('editSupplier');
Route::post('/supplier/updateSupplier/{id}',[SupplierController::class,'update'])->name('updateSupplier');
Route::get('/supplier/deleteSupplier/{id}',[SupplierController::class,'destroy'])->name('deleteSupplier');
//แอตมิน//:ลูกค้า
Route::get('/customer',[CustomerController::class,'index'])->name('customer');
Route::get('/customer/addCustomer',[CustomerController::class,'create'])->name('addCustomer');
Route::post('/customer/storeCustomer',[CustomerController::class,'store'])->name('storeCustomer');
Route::get('/customer/editCustomer/{id}',[CustomerController::class,'edit'])->name('editCustomer');
Route::post('/customer/updateCustomer/{id}',[CustomerController::class,'update'])->name('updateCustomer');
Route::get('/customer/deleteCustomer/{id}',[CustomerController::class,'destroy'])->name('deleteCustomer');
//แอตมิน//:วัตถุดิบ
Route::get('/rawMaterial',[RawMaterialController::class,'index'])->name('rawMaterial');
Route::get('/rawMaterial/addRawMaterial',[RawMaterialController::class,'create'])->name('addRawMaterial');
Route::post('/rawMaterial/storeRawMaterial',[RawMaterialController::class,'store'])->name('storeRawMaterial');
Route::get('/rawMaterial/editRawMaterial/{id}',[RawMaterialController::class,'edit'])->name('editRawMaterial');
Route::post('/rawMaterial/updateRawMaterial/{id}',[RawMaterialController::class,'update'])->name('updateRawMaterial');
Route::get('/rawMaterial/deleteRawMaterial/{id}',[RawMaterialController::class,'destroy'])->name('deleteRawMaterial');




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
//พนักงาน//:ลูกค้า

//แอตมิน//แดชบอร์ท
//Route::get('/homeCustomer',[dashboardController::class,'index'])->name('homeCustomer');
//แอตมิน//ปลา
Route::get('/employee/fish',[fishController::class,'show'])->name('showfish');
//แอตมิน//กระชัง
//Route::get('/employee/cage',[CageController::class,'index'])->name('cage');
//แอตมิน//พนักงาน
//Route::get('/employee/employee',[EmployeeController::class,'index'])->name('employee');
//Route::get('/employee/editEmployee/{id}',[EmployeeController::class,'edit'])->name('editEmployee');
//Route::post('/employee/updateEmployee/{id}',[EmployeeController::class,'update']);
//แอตมิน//:ซัพพลาย
//Route::get('/employee/supplier',[SupplierController::class,'index'])->name('supplier');

//แอตมิน//:ลูกค้า
//Route::get('/employee/customer',[CustomerController::class,'index'])->name('customer');
// Route::get('/customer/addCustomer',[CustomerController::class,'create'])->name('addCustomer');
// Route::post('/customer/storeCustomer',[CustomerController::class,'store'])->name('storeCustomer');
// Route::get('/customer/editCustomer/{id}',[CustomerController::class,'edit'])->name('editCustomer');
// Route::post('/customer/updateCustomer/{id}',[CustomerController::class,'update'])->name('updateCustomer');
// Route::get('/customer/deleteCustomer/{id}',[CustomerController::class,'destroy'])->name('deleteCustomer');





























//

Route::get('/', function () {
    return view('login');
});
