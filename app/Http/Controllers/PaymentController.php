<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Models\saleFish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payment =DB::table('payments')
        ->join('sale_fish','payments.saleFish_id','sale_fish.saleFish_id')
        
        ->select('payments.*','sale_fish.total')->orderBy('payment_id','Desc')->paginate(5);
        $i=1;
        // dd($payment);
        return view('admin.payment.index',compact('payment','i'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
       
        $sale_id =payment::where('payment_id',$id)->value('saleFish_id');
        $date=date('Ymd');
        payment::where('payment_id',$id)->update([
            'payment_status'=>1,
            'payment_date'=>$date
        ]);
        saleFish::where('saleFish_id',$sale_id)->update([
            'status'=>1
        ]);

        return redirect()->route('payment')->with('success',"ยืนยันการชำระเงินเรียบร้อย");

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $delete=payment::find($id)->delete();
        return redirect()->route('payment')->with('success',"ยืนยันการชำระเงินเรียบร้อย");
        
    }
}
