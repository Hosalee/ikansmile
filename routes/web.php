<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\CageController;
use App\Http\Controllers\CatchFishController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FarmingController;
use App\Http\Controllers\fishController;
use App\Http\Controllers\FishStockController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderRawmaterialController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SaleFishController;
use App\Http\Controllers\SupplierController;
use App\Models\detail_farming;
use App\Models\orderRawmaterial;
use Symfony\Component\Finder\Iterator\CustomFilterIterator;



Route::post('/Checklogin',[LoginController::class,'login'])->name('Checklogin');
Route::get('/protect',[LoginController::class,'protect'])->name('protect');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
//แอตมิน//แดชบอร์ท
Route::get('/dashboard',[dashboardController::class,'index'])->name('dashboard');
//พนักงาน//หน้าแรก
Route::get('/home',[LoginController::class,'home'])->name('home');
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
 Route::get('/cage/editCage/{id}',[CageController::class,'edit'])->name('editCage');
 Route::post('/cage/updateCage/{id}',[CageController::class,'update'])->name('updateCage');
 Route::get('/cage/deleteCage/{id}',[CageController::class,'destroy'])->name('deleteCage');

//แอตมิน//พนักงาน
Route::get('/employee',[EmployeeController::class,'index'])->name('employee');
Route::get('/employee/addEmployee',[EmployeeController::class,'create'])->name('addEmployee');
Route::post('/employee/addEmployee',[EmployeeController::class,'store'])->name('addStore');
Route::get('/employee/editEmployee/{id}',[EmployeeController::class,'edit'])->name('editEmployee');
Route::post('/employee/updateEmployee/{id}',[EmployeeController::class,'update']);
Route::get('/employee/DeleteEmployee/{id}',[EmployeeController::class,'destroy'])->name('DeleteEmployee');
//แอตมิน//ค่าจ้างพนักงาน
Route::get('/salary',[SalaryController::class,'index'])->name('salary');
Route::get('/salary/addSalary',[SalaryController::class,'create'])->name('addSalary');
Route::post('/salary/storeSalary',[SalaryController::class,'store'])->name('salaryStore');
Route::get('/salary/editSalary/{id}',[SalaryController::class,'edit'])->name('editSalary');
Route::post('/salary/updateSalary/{id}',[SalaryController::class,'update']);
Route::get('/salary/daleteSalary/{id}',[SalaryController::class,'destroy'])->name('DeleteSalary');

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
//แอตมิน//:สูตรอาหาร
Route::get('/Recipes',[RecipesController::class,'index'])->name('Recipes');
Route::get('/Recipes/addRecipes',[RecipesController::class,'create'])->name('addRecipes');
Route::post('/Recipes/storeRecipes',[RecipesController::class,'store'])->name('storeRecipes');
Route::get('/Recipes/showRecipes/{id}',[RecipesController::class,'show'])->name('showRecipes');
Route::get('/Recipes/editRecipes/{id}',[RecipesController::class,'edit'])->name('editRecipes');
Route::post('/Recipes/updateRecipes/{id}',[RecipesController::class,'update'])->name('updateRecipes');
//แอตมิน//:วัตถุดิบ
Route::get('/rawMaterial',[RawMaterialController::class,'index'])->name('rawMaterial');
Route::get('/rawMaterial/addRawMaterial',[RawMaterialController::class,'create'])->name('addRawMaterial');
Route::post('/rawMaterial/storeRawMaterial',[RawMaterialController::class,'store'])->name('storeRawMaterial');
Route::get('/rawMaterial/editRawMaterial/{id}',[RawMaterialController::class,'edit'])->name('editRawMaterial');
Route::post('/rawMaterial/updateRawMaterial/{id}',[RawMaterialController::class,'update'])->name('updateRawMaterial');
Route::get('/rawMaterial/deleteRawMaterial/{id}',[RawMaterialController::class,'destroy'])->name('deleteRawMaterial');
//แอตมิน//:การสั่งซื้อปลา
Route::get('/orderfish',[OrderController::class,'index'])->name('orderfish');
Route::get('/addOrderfish',[OrderController::class,'create'])->name('addOrderfish');
Route::post('/storeOrderfish',[OrderController::class,'store'])->name('storeOrderfish');
Route::get('/showOrderfish/{id}',[OrderController::class,'show'])->name('showOrderfish');
//แอตมิน//:การสั่งซื้อวัตถุดิบ
 Route::get('/orderRawmaterial',[OrderRawmaterialController::class,'index'])->name('orderRawmaterial');
 Route::get('/addOrderRawmaterial',[OrderRawmaterialController::class,'create'])->name('addOrderRawmaterial');


//แอตมิน//:สต๊อกลูกปลา
Route::get('/FishStock',[FishStockController::class,'index'])->name('FishStock');
Route::get('/addFishStock/{id}',[FishStockController::class,'store'])->name('addFishStock');
Route::get('/deleteFishStock/{id}',[FishStockController::class,'destroy'])->name('deleteFishStock');
//แอตมิน//:การเลี้ยง
Route::get('/farming',[FarmingController::class,'index'])->name('farming');
Route::post('/farmingStore',[FarmingController::class,'store'])->name('farmingStore');
Route::get('/farmingCreate',[FarmingController::class,'create'])->name('farmingCreate');
Route::get('/farmingDead/{id}',[FarmingController::class,'fishDead'])->name('farmingDead');
Route::get('/farmingUpdateStatus/{id}',[FarmingController::class,'updateStatus'])->name('updateStatus');
Route::get('/farming/farmingDelete/{id}',[FarmingController::class,'destroy'])->name('farmingDelete');
Route::get('/farming/farmingShow/{id}',[FarmingController::class,'show'])->name('farmingShow');
Route::post('/farming/fishDeadUpdate',[FarmingController::class,'fishDeadUpdate'])->name('fishDeadUpdate');
Route::post('/farming/fishFoodUpdate',[FarmingController::class,'fishFoodUpdate'])->name('fishFoodUpdate');
Route::get('/farming/showDetailFishDead/{id}',[FarmingController::class,'showDetailFishDead'])->name('showDetailFishDead');

//แอตมิน//:การจับปลา
Route::get('/CatchFish',[CatchFishController::class,'index'])->name('CatchFish');
Route::post('/CatchFishStore',[CatchFishController::class,'store'])->name('CatchFishStore');

//แอตมิน//:การขาย
Route::get('/saleFish',[SaleFishController::class,'index'])->name('saleFish');
Route::get('/addsaleFish',[SaleFishController::class,'create'])->name('addsaleFish');
Route::post('/storeSaleFish',[SaleFishController::class,'store'])->name('storeSaleFish');



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
//พนักงาน//ปลา
Route::get('/employee/fish',[fishController::class,'show'])->name('showfish');
//พนักงาน//กระชัง
Route::get('/employee/cage',[CageController::class,'show'])->name('Showcage');
//พนักงาน//พนักงาน
Route::get('/employee/employee',[EmployeeController::class,'Show'])->name('showEmployee');
Route::get('/employee/employeeEdit/{id}',[EmployeeController::class,'employeeEdit'])->name('employeeEdit');
Route::post('/employee/employeeUpdate/{id}',[EmployeeController::class,'employeeUpdate'])->name('employeeUpdate');
//พนักงาน//กระชัง
Route::get('/employee/salaryEmployee/',[SalaryController::class,'show'])->name('ShowSalary');

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

Route::get('/', function () { return view('login');})->name('login');


//  Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');


