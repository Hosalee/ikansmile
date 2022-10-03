<?php

namespace App\Http\Controllers;
use App\Models\employee;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(Request $r){
        $username=$r->username;
        $password=md5($r->password);

        $session = employee::where('Username',$username)->where('Password', $password)->get();
        if(count($session)>0){
            
            $r->session()->put('user_id',$session[0]->emp_id);
            $r->session()->put('user_name',$session[0]->emp_fristname);
            $r->session()->put('position',$session[0]->position);
            // dd($session[0]->position);
            // if($session[0]->position =='Admin'){
            //     return view('admin.dashboard');
            // }elseif($session[0]->position =='employee'){
            //     return view('employee.home');
            // }else{
            //     return redirect()->route('login')->with('success',"ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง");
            // }
            return redirect()->route('protect');

        }else{
            return redirect()->route('login')->with('success',"ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง");
        }
    }



    public function protect(Request $r){
        if($r->session()->get('user_id') == ""){
            return redirect()->route('login');
            }else{
                if($r->session()->get('position') == "Admin"){
                    $username=$r->session()->get('user_name');
                    $capsule =array('username'=>$username);
                    return view('admin.dashboard')->with($capsule);
                    }elseif($r->session()->get('position') =='employee'){
                        $username=$r->session()->get('user_name');
                        $capsule =array('username'=>$username);
                        return view('employee.home')->with($capsule);
                    }
                    // else{
                    //     return redirect()->route('login')->with('success',"ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง");
                    // }
                
            }

    }

    public function logout(Request $r){
        $r->session()->forget('user_id');
        $r->session()->forget('user_name');
        $r->session()->forget('position');
        
        return redirect()->route('login');

    }
}
