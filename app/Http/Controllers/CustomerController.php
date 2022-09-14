<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Customer = customer::paginate(5);
        return view('admin.customer.index',compact('Customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.customer.addCustomer');
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
            'fristname'=>'required:customer',
            'lastname'=>'required:customer',
            'sex'=>'required:customer',
            'Address'=>'required:customer',
            'Email'=>'required:customer',
            'tell'=>'required:customer',
        ],
        [
            'fristname.required'=>"กรุณาระบุชื่อ",
            'lastname.required'=>"กรุณาระบุสกุล",
            'sex.required'=>"กรุณาระบุเพศ",
            'Address.required'=>"กรุณาระบุที่อยู่",
            'Email.required'=>"กรุณาระบุอีเมล",
            'tell.required'=>"กรุณาระบุเบอร์โทร์"
            

            
        ]);
      

      //เพิ่มข้อมูลเข้าปลา database
        customer::insert([
       'fristname' => $request->fristname,    
       'lastname' => $request->lastname,
        'sex'=> $request->sex,
        'Address'=> $request->Address,
        'Email'=> $request->Email,
        'tell'=> $request->tell
    ]);
    
    return redirect()->route('customer')->with('success',"บันทึกข้อมูลลูกค้าเรียบร้อย");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $Customer = customer::find($id);
        return view('admin.customer.editCustomer',compact('Customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            // 'fristname'=>'required:',
            // 'lastname'=>'required',
            // 'sex'=>'required',
            // 'Address'=>'required',
            // 'Email'=>'required',
            // 'tell'=>'required',
           
        ]
        );  //อัพเดตข้อมูลอย่างเดียว
            customer::find($id)->update([
                'fristname'=> $request->fristname, 
                'lastname'=> $request->lastname, 
                'sex'=> $request->sex, 
                'Address'=> $request->Address, 
                'Email'=> $request->Email, 
                'tell'=> $request->tell, 
             
            ]);
            return redirect()->route('customer')->with('success',"อัพเดตข้อมูลลูกค้าเรียบร้อย");
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //ลบข้อมูลจากฐานข้อมูล
        $delete=customer::find($id)->delete();
         return redirect()->back()->with('success',"ลบข้อมูลลูกค้าเรียบร้อย");
    }
}
