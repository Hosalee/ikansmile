<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Salary = DB::table('salaries')->join('employees','salaries.emp_id','employees.emp_id')
        ->select('salaries.*','employees.emp_fristname','employees.emp_lastname','employees.profile')->paginate(5);

        return view('admin.salary.index',compact('Salary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $emp = employee::all();
        return view('admin.salary.addSalary',compact('emp'));
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
        $request->validate([
            
             'emp_id'=>'required:salary',
             'date'=>'required:salary',
             'amount'=>'required:salary',
             'number'=>'required:salary',
           

        ],
        [
            'emp_id.required'=>"กรุณาระบุพนักงาน",
                'date.required'=>"วันที่จ่าย",
            'amount.required'=>"กรุณาระบุค่าจ้างต่อวัน",
            'number.required'=>"กรุณาจำนวนวันที่ทำงาน"
        ]);
        
        $amount1=$request->amount;
        $number1=$request->number;
        $totalAmount = ($amount1*$number1);

        
           

     // เพิ่มข้อมูลเข้าปลา database
        salary::insert([
       'emp_id' => $request->emp_id,    
       'date' => $request->date,
        'amount' => $request->amount,
        'number'=> $request->number,
        'status'=> 'จ่ายแล้ว',
        'totalAmount'=> $totalAmount
    ]);
    
    return redirect()->route('salary')->with('success',"บันทึกข้อมูลค่าจ้างพนักงานเรียบร้อย");
   

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        
        $Slr = salary::find($id);
        return view('admin.salary.editSalary',compact('Slr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        
            //คำนวนค่ารวม
             $amount1=$request->amount;
             $number1=$request->number;
             $totalAmount = ($amount1*$number1);
            //อัพเดตข้อมูล
            salary::find($id)->update([

                'emp_id' => $request->emp_id,    
                'date' => $request->date,
                'amount' => $request->amount,
                'number'=> $request->number,
                'status'=> 'จ่ายแล้ว',
                'totalAmount'=> $totalAmount
                  
            ]);

            return redirect()->route('salary')->with('success',"อัพเดตข้อมูลค่าจ้างเรียบร้อย");

     

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete=salary::find($id)->delete();
         return redirect()->back()->with('success',"ลบข้อมูลเรียบร้อย");
    }
}
