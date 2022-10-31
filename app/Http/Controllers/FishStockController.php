<?php

namespace App\Http\Controllers;
use App\Models\orderRawmaterial;
use App\Models\orderRMDetail;
use App\Models\RawMaterial;
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
        
        $fishstock = DB::table('fish_stocks')->join('orderfish_details','fish_stocks.orderfish_details_id','orderfish_details.orderfish_details_id')/* ->where('fish_stocks.quantity',) */
            ->join('fish','orderfish_details.fish_id','fish.fish_id')
            ->select('fish_stocks.*','fish.name','fish.species','fish.picture')
            ->get();
            $i=1;
            return view("admin.stock.index_fish_stock ",compact('fishstock','i'));
       
           
       
       
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
       
        $num=0;
        $num2=0;
         for($i=0;$i<$count;$i++){
            $fishStock = new fishStock();
            $fishStock -> orderfish_details_id = $F[$i]->orderfish_details_id; 
            // $fishStock -> fish_id = $F[$i]->fish_id;
            $fishStock -> size = $F[$i]->size;
            $fishStock -> quantity = $F[$i]->quantity;
            $fishStock -> date_import = $date; 
            $fishStock -> save();
            // dd($F[$i]->fish_id);
            
            $num=fish::where('fish_id',$F[$i]->fish_id)->value('quantity');
            $num2=intval($num+$F[$i]->quantity);
            // dd($num2);
            // fish::find($F[$i]->fish_id)->update(["quantity"=>$num2 ]);
            fish::where('fish_id',$F[$i]->fish_id) ->update(['quantity' =>$num2]);
            

            
        }
        order::where('orders_id',$id )->update([ 'status'=>'ได้รับสินค้าแล้ว']);

        return redirect()->back();

        
    }
    public function store2($id)
    {
       //
       $ORM =orderRMDetail::where('or_id',$id)->select('Raw_Material_id','quantity')->get();
       $date=date('ymd'); 
       $count =count($ORM);
        //    dd($ORM);
       
        $num=0;
        $num2=0;
         for($i=0;$i<$count;$i++){
            // dd($ORM[$i]->Raw_Material_id);
            $num=RawMaterial::where('Raw_Material_id',$ORM[$i]->Raw_Material_id)->value('quantity');
            $num2=intval($num+$ORM[$i]->quantity);
              
            RawMaterial::where('Raw_Material_id',$ORM[$i]->Raw_Material_id) ->update(['quantity' =>$num2]);
            

            
        }
        orderRawmaterial::where('or_id',$id )->update([ 'status'=>'ได้รับสินค้าแล้ว']);

        return redirect()->back();

        
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
    public function destroy($id)
    {
        //
        $delete=fishStock::find($id)->delete();
        return redirect()->back()->with('success',"ลบข้อมูลเรียบร้อย");
    }
}
