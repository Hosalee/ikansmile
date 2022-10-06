<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dashboard ;

class dashboardController extends Controller
{
    //หน้าแรกของ dashboard
    public function index(){
        return view('admin.dashboard');
    }
   
}
