<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\fish;
use App\Models\fishStock;
use App\Models\order;
use App\Models\orderfish_details;
use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orderfish = DB::table('orders')->join('employees','orders.emp_id','employees.emp_id')
        ->join('suppliers','orders.supplier_id','suppliers.supplier_id')
        ->select('orders.*','employees.emp_fristname','employees.emp_lastname','suppliers.name')->orderBy('orders_id','DESC')
        ->get();
       
        // $orderfish =order::all();
        $i=1;
        return view('admin.order.index',compact('orderfish','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       $sp=supplier::all();
       $fish=fish::all();
        return view('admin.order.addOrder',compact('sp','fish'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'supplier_id'=>'required|:Recipes',
           
        ],[
            'supplier_id.required'=>"กรุณาเลือกซัพพลายเออร์",
        ]);
        $createDate =date('ymd');
        $user_id = session()->get('user_id');
        $order = new order();
        $order->supplier_id=$request->supplier_id;
        $order->emp_id=$user_id;
        $order->date=$createDate;
        $order->status='กำลังจัดส่ง';
        $order->total=0;
        $order->save();
        $orders_id = DB::table('orders')->orderBy('orders_id','DESC')->value('orders_id');
        // dd($orders_id);
        $P = count($request->fish_id);
        $total1=0;
        $total=0;
        for($i=0;$i<$P;$i++){
            $details = new orderfish_details();
            $details -> order_id = $orders_id; 
            $details -> fish_id = $request->fish_id[$i]; 
            $details -> size = $request->size[$i]; 
            $details -> price = $request->price[$i]; 
            $details -> quantity = $request->quantity[$i];
            $details -> save();
            $total1=($request->price[$i] * $request->quantity[$i]);
            $total=($total+$total1);

            
        }
        order::where('orders_id',$orders_id )->update([ 'total'=>$total]);


        //addFish stock
     
        // for($i=0;$i<$P;$i++){
        //     $fishStock = new fishStock();
        //     $fishStock -> fishStock_id = $orders_id; 
        //     $fishStock -> orderfish_details_id = $request->fish_id[$i]; 
        //     $fishStock -> quantity = $request->quantity[$i];
        //     $fishStock -> date_exp = $request->price[$i]; 
        //     $fishStock-> quantity = $request->quantity[$i];
        //     $fishStock -> save();
         

            
        // }








        return redirect()->route('orderfish')->with('success',"บันทึกข้อมูลการสั่งซื้อลูกปลาเรียบร้อย");

        // dd($total);

        




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        // 
        $orderfish = DB::table('orders')->join('employees','orders.emp_id','employees.emp_id')->where('orders.orders_id',$id)
        ->join('suppliers','orders.supplier_id','suppliers.supplier_id')
        ->select('orders.*','employees.emp_fristname','employees.emp_lastname','suppliers.name')
        ->get();
        $orderfish_details = DB::table('orderfish_details')->join('fish','fish.fish_id','orderfish_details.fish_id')->where('orderfish_details.order_id',$id)
        ->select('orderfish_details.*','fish.name',)
        ->get();
        //  $orderfish_details = orderfish_details::where('order_id',$id)->select()->get();
         $i=1;
        return view('admin.order.showOrder',compact('orderfish_details','orderfish','i'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
