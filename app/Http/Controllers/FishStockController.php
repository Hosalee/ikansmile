<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\orderfish_details;
use App\Models\fishStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\fish;

class FishStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store($id)
    {
       //
       $F=orderfish_details::where('order_id',$id)->select('orderfish_details_id','fish_id','size','quantity')->get();
       $date=date('ymd'); 
       $count =count($F);
        //   dd($count);
       
        
         for($i=0;$i<$count;$i++){
            $fishStock = new fishStock();
            $fishStock -> orderfish_details_id = $F[$i]->orderfish_details_id; 
            $fishStock -> quantity = $F[$i]->fish_id;
            $fishStock -> size = $F[$i]->size;
            $fishStock -> quantity = $F[$i]->quantity;
            $fishStock -> date_exp = $date; 
            $fishStock -> save();
         

            
        }
        order::where('orders_id',$id )->update([ 'status'=>'ได้รับสินค้าแล้ว']);



        
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fishStock  $fishStock
     * @return \Illuminate\Http\Response
     */
    public function show(fishStock $fishStock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fishStock  $fishStock
     * @return \Illuminate\Http\Response
     */
    public function edit(fishStock $fishStock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fishStock  $fishStock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fishStock $fishStock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fishStock  $fishStock
     * @return \Illuminate\Http\Response
     */
    public function destroy(fishStock $fishStock)
    {
        //
    }
}
