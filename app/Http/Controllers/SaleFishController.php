<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\saleDetail;
use App\Models\saleFish;
use App\Models\catchFish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleFishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $saleFish = saleFish::all();
        // $catchFish = DB::table('sale_fish')
        // ->join('customers','sale_fish.customer_id','customers.customers_id')
        // ->join('employees','sale_fish.emp_id','employees.emp_id')
        // ->select('sale_fish.*','employees.emp_fristname','employees.emp_lastname',)
        // ->paginate(5);

        $i=1;
        return view('admin.saleFish.index',compact('saleFish','i'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customer = customer::all();
        $i =1;

        $catchFish = DB::table('catch_fish')->join('farmings','farmings.farming_id','catch_fish.farming_id')
        ->join('fish','fish.fish_id','farmings.fish_id')
        ->join('cages','cages.cage_id','farmings.cage_id')->orderBy('catchfish_date','DESC')
        ->select('catch_fish.*','fish.name','fish.species','cages.cage_name')
        ->paginate(5);
        $date =date('d M Y');

        return view('admin.saleFish.addSaleFish',compact('customer','i','catchFish','date'));
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
            'customer_id'=>'required|:Recipes',
            'catchFish_id'=>'required|:Recipes',
            
           
        ],[
            'customer_id.required'=>"กรุณาเลือกลูกค้า",
            'catchFish_id.required'=>"กรุณาเลือกรายการขาย",
        ]);
        
        $createDate =date('ymd');
        $user_id = session()->get('user_id');
        
        $saleFish = new saleFish();
        $saleFish->customer_id= $request->customer_id;
        $saleFish->emp_id= $user_id;
        $saleFish->date = $createDate;
        $saleFish->save();

        $saleFish_id = DB::table('sale_fish')->orderBy('saleFish_id','DESC')->value('saleFish_id');
       
        $num = count($request->catchFish_id);
        
        $total1=0;
        $total=0;
        $sum1=0;
        $sum2=0;

        for($i=0;$i<$num;$i++){
            $saledetails = new saleDetail();
            $saledetails->saleFish_id = $saleFish_id;
            $saledetails->catchFish_id = $request->catchFish_id[$i];
            $saledetails->quantity = $request->quantity[$i];
            $saledetails->price = $request->price[$i];
            $saledetails->save();
            
             $total1=($request->price[$i] * $request->quantity[$i]);
             $total=($total+$total1);

             $catchFish_Quantity = DB::table('catch_fish')->where('catchFish_id',$request->catchFish_id[$i])->value('catchfish_quantity');


            $sum1 = ($catchFish_Quantity - $request->quantity[$i]);
             catchFish::where('catchFish_id',$request->catchFish_id[$i] )->update([ 'catchfish_quantity'=>$sum1]);
             
        }
        saleFish::where('saleFish_id',$saleFish_id )->update([ 'total'=>$total]);
        return redirect()->route('saleFish')->with('success',"บันทึกข้อมูลการสั่งซื้อลูกปลาเรียบร้อย");














    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\saleFish  $saleFish
     * @return \Illuminate\Http\Response
     */
    public function show(saleFish $saleFish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\saleFish  $saleFish
     * @return \Illuminate\Http\Response
     */
    public function edit(saleFish $saleFish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\saleFish  $saleFish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, saleFish $saleFish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\saleFish  $saleFish
     * @return \Illuminate\Http\Response
     */
    public function destroy(saleFish $saleFish)
    {
        //
    }
}
