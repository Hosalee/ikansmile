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
        $Cage = cage::paginate(5);
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
      

      //เพิ่มข้อมูลเข้าปลา database
        cage::insert([
       'cage_name' => $request->cage_name,    
       'cage_owner' => $request->cage_owner,
        'size'=> $request->size,
        'Address'=> $request->Address,
        'capicity'=> $request->capicity,
        'latitude'=> $request->latitude,
        'longitude'=> $request->longitude,
        'status'=> "มีการเลี้ยง",

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function edit(cage $cage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cage $cage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function destroy(cage $cage)
    {
        //
    }
}
