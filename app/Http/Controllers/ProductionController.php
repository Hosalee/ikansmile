<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\production;
use App\Models\Recipes;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $recipes = Recipes::all();
        $Emp = employee::where('position','พนักงานผลิตอาหาร')->get();


        $production=production::OrderBy('P_id','DESC')->get();
        $i=1;
        return view('admin.production.index',compact('recipes','Emp','i','production'));
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
        $r=$request->Recipes_id;
        $e=$request->emp_id;
        $date=date('Ymd');

       $production = new production();
       $production->Recipes_id = $r;
       $production->emp_id = $e;
       $production->P_date = $date;
       $production->save();

       return redirect()->route('production')->with('success',"เพิ่มข้อมูลการผลิตอาหารปลาเรียบร้อย");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\production  $production
     * @return \Illuminate\Http\Response
     */
    public function show(production $production)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\production  $production
     * @return \Illuminate\Http\Response
     */
    public function edit(production $production)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\production  $production
     * @return \Illuminate\Http\Response
     * 
     */
    public function updateStatus($id)
    {
        //
        $P_update =production::where('P_id',$id)->update(['P_status'=>1]);
        return redirect()->back()->with('success',"อัพเดตสถานะการผลิตอาหารปลาเรียบร้อย");
    }


    public function update(Request $request, production $production)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\production  $production
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $delete =production::find($id)->delete();
        return redirect()->back()->with('success',"ลบข้อมูลการผลิตอาหารปลาเรียบร้อย");

        //
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\production  $production
     * @return \Illuminate\Http\Response
     * 
     */
    public function stock(Request $request )
    {
        
        $total=0;
         $P_id =$request->P_id;
         $amount = $request->amount;

         $recipes_id =production::where('P_id',$P_id)->value('Recipes_id');
      
         $quantity = Recipes::where('Recipes_id',$recipes_id)->value('quantity');
         $total =($quantity+$amount);
         $quantity = Recipes::where('Recipes_id',$recipes_id)->update(['quantity'=>$total]);
         return redirect()->back()->with('success',"เพิ่มข้อมูลสต๊อกอาหารปลาเรียบร้อย");

        
    }


}
