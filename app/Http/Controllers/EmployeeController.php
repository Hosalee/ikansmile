<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Emp = employee::paginate(5);
        return view('admin.employee.index',compact('Emp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.employee.addEmployee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
           //ตรวจสอบข้อมูล
           $request->validate([
            'emp_fristname'=>'required:employee',
            'emp_lastname'=>'required:employee',
            'profile'=>'required|mimes:jpg,jpeg,png',
            'sex'=>'required:employee',
            'Address'=>'required:employee',
            'email'=>'required:employee',
            'tell'=>'required:employee',
            'salary'=>'required:employee',
            'username'=>'required:employee',
            'password'=>'required:employee',

        ],
        [
            'emp_fristname.required'=>"กรุณาระบุชื่อ",
            'emp_lastname.required'=>"กรุณาระบุสกุล",
            'profile.required'=>"กรุณาใส่รูป",
            'sex.required'=>"กรุณาระบุเพศ",
            'Address.required'=>"กรุณาระบุที่อยู่",
            'email.required'=>"กรุณาระบุอีเมล",
            'tell.required'=>"กรุณาระบุเบอร์โทร์",
            'salary.required'=>"กรุณาระบุรายได้",
            'username.required'=>"กรุณาระบุชื่อผู้ใช้",
            'password.required'=>"กรุณาใส่รหัสผ่าน",

            
        ]);
        //การเข้ารหัสรูปภาพ
        $picture = $request->file('profile');

        //Generate ชื่อภาพ
        $name_gen=hexdec(uniqid());

         // ดึงนามสกุลไฟล์ภาพ
         $img_ext = strtolower($picture->getClientOriginalExtension());
         $img_name = $name_gen.'.'.$img_ext;
         
        //อัพโหลดและบันทึกข้อมูล
        $upload_location = 'image/profile/';
        $full_path = $upload_location.$img_name;

      //เพิ่มข้อมูลเข้าปลา database
        employee::insert([
       'emp_fristname' => $request->emp_fristname,    
       'emp_lastname' => $request->emp_lastname,
        'profile' => $full_path,
        'sex'=> $request->sex,
        'Address'=> $request->Address,
        'Email'=> $request->email,
        'tell'=> $request->tell,
        'Username'=> $request->username,
        'Password'=> $request->password,
        'salary'=> $request->salary,


        
     
    ]);
    $picture->move($upload_location,$img_name);
    return redirect()->route('employee')->with('success',"บันทึกข้อมูลพนักงานเรียบร้อย");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit( $employee)
    {
        //
        $emp =employee::find($employee);
        return view('admin.employee.editEmployee',compact('emp'));
     
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {
        //
    }
}
