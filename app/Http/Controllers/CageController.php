<?php

namespace App\Http\Controllers;

use App\Models\cage;
use Illuminate\Http\Request;

class CageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Cage = cage::paginate(10);
        return view('admin.cage.index',compact('Cage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //เพิ่มข้อมูลกระชัง
        return view('admin.cage.addCage');
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
            'cage_name'=>'required:cage',
            'cage_owner'=>'required:cage',
            'size'=>'required:cage',
            'Address'=>'required:cage',
            'capicity'=>'required:cage',
            'latitude'=>'required:cage',
            'longitude'=>'required:cage',
        ],
        [
            'cage_name.required'=>"กรุณาระบุชื่อกระชัง",
            'cage_owner.required'=>"กรุณาระบุชื่อเจ้าของ",
            'size.required'=>"กรุณาระบุขนาด",
            'Address.required'=>"กรุณาระบุที่อยู่",
            'capacity.required'=>"กรุณาระบุความจุ",
            'latitude.required'=>"กรุณาระบุละติจุด",
            'longitude.required'=>"กรุณาระบุลองจิจุด"
            

            
        ]);
      
    
      //เพิ่มข้อมูลเข้า database
        cage::insert([
       'cage_name' => $request->cage_name,    
       'cage_owner' => $request->cage_owner,
        'size'=> $request->size,
        'Address'=> $request->Address,
        'capicity'=> $request->capicity,
        'latitude'=> $request->latitude,
        'longitude'=> $request->longitude,
        'status'=> "ว่าง",

    ]);
    
    return redirect()->route('cage')->with('success',"บันทึกข้อมูลกระชังเรียบร้อย");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function show(cage $cage)
    {
        //
        $Cage = cage::paginate(5);
        return view('employee.cage.index',compact('Cage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Cage = cage::find($id);
        return view('admin.cage.editCage',compact('Cage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        cage::find($id)->update([
            'cage_name' => $request->cage_name,    
            'cage_owner' => $request->cage_owner,
             'size'=> $request->size,
             'Address'=> $request->Address,
             'capicity'=> $request->capicity,
             'latitude'=> $request->latitude,
             'longitude'=> $request->longitude,
             
     
         ]);
        
         
         return redirect()->route('cage')->with('success',"อัพเดตข้อมูลกระชังเรียบร้อย");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $Delete =cage::find($id)->delete();
        return redirect()->back()->with('success',"ลบข้อมูลเรียบร้อย");

    }
}
