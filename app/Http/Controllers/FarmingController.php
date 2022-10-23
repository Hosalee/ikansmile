<?php

namespace App\Http\Controllers;

use App\Models\cage;
use App\Models\farming;
use App\Models\fish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fish=fish::paginate(10);
        $cage=cage::where('status','ว่าง')->paginate(5);
        $Emp = DB::table('employees')->where('position','พนักงานเลี้ยงปลา')->get();
        $farming =farming::all();
        $i=1;
        return view('admin.farming.index',compact('fish','cage','Emp','farming','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $cage=cage::where('cage_id',$request->cage_id)->value('cage_name');
        $n=intval($request->quantity) ;
        $max =cage::where('cage_id',$request->cage_id)->value('capicity');
        if($n > $max){
            return redirect()->back()->with('error'," เกินความจุของกระชัง  $cage รองรับความจุปลาแค่ $max ตัว กรุณาลองอีกครั้ง");
            
        }else{
        $dateimport=date('Ymd');
        $fishSize=$request->fishSize.'Inch';
        $farming = new farming();
        $farming->fish_id = $request->fish_id;
        $farming->cage_id = $request->cage_id;
        $farming->emp_id = $request->emp_id;
        $farming->fishSize = $fishSize;
        $farming->fish_quantity = $request->quantity;
        $farming->date_import = $dateimport;
        $farming->status = 'ระยะที1';
        $farming->save();

        $number=$request->quantity;
        $sum=fish::where('fish_id',$request->fish_id )->value('quantity');
        $quantity = ($sum-$number);
        // echo $quantity;
        cage::where('cage_id',$request->cage_id )->update([ 'status'=>'มีการเลี้ยง']);
        fish::where('fish_id',$request->fish_id )->update([ 'quantity'=> $quantity]);

        return redirect()->route('farming')->with('success',"บันทึกข้อมูลปลาเรียบร้อย");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\farming  $farming
     * @return \Illuminate\Http\Response
     */
    public function show(farming $farming)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\farming  $farming
     * @return \Illuminate\Http\Response
     */
    public function edit(farming $farming)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\farming  $farming
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, farming $farming)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\farming  $farming
     * @return \Illuminate\Http\Response
     */
    public function destroy(farming $farming)
    {
        //
    }
}
