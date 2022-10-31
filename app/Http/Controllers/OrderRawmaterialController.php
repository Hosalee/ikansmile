<?php

namespace App\Http\Controllers;
use App\Models\supplier;
use App\Models\orderRawmaterial;
use App\Models\orderRMDetail;
use App\Models\RawMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderRawmaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orderRM = DB::table('orderrawmaterials')->join('employees','orderrawmaterials.emp_id','employees.emp_id')
        ->join('suppliers','orderrawmaterials.supplier_id','suppliers.supplier_id')
        ->select('orderrawmaterials.*','employees.emp_fristname','employees.emp_lastname','suppliers.name')->orderBy('or_id','DESC')
        ->get();
        $i =1;
        return view('admin.orderRawmaterial.index',compact('orderRM','i'));
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
        $RM =RawMaterial::all();
        return view('admin.orderRawmaterial.addOR',compact('sp','RM'));
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
            'supplier_id'=>'required|:Recipes',
            'Raw_Material_id'=>'required|:Recipes',
            
           
        ],[
            'supplier_id.required'=>"กรุณาเลือกซัพพลายเออร์",
            'Raw_Material_id.required'=>"กรุณาเลือกรายการสั่งซื้อ",
        ]);
        $createDate =date('ymd');
        $user_id = session()->get('user_id');
        // dd($request->supplier_id);

        $orderRM =new orderRawmaterial();
        $orderRM ->supplier_id=$request->supplier_id;
        $orderRM ->emp_id = $user_id;
        $orderRM ->date = $createDate;
        $orderRM ->status='กำลังจัดส่ง';
        $orderRM ->total=0;
         $orderRM ->save();
         $or_id = DB::table('orderrawmaterials')->orderBy('or_id','DESC')->value('or_id');
        //  dd($or_id);
         $P = count($request->Raw_Material_id);
         $total1=0;
         $total=0;
         for($i=0;$i<$P;$i++){
            $ordetails = new orderRMDetail();
            $ordetails -> or_id  =  $or_id ; 
            $ordetails -> Raw_Material_id = $request->Raw_Material_id[$i]; 
            $ordetails -> price = $request->price[$i]; 
            $ordetails -> quantity = $request->quantity[$i];
            $ordetails -> save();
            $total1=($request->price[$i] * $request->quantity[$i]);
            $total=($total+$total1);

            
        }
        orderRawmaterial::where('or_id',$or_id  )->update([ 'total'=>$total]);
        return redirect()->route('orderRawmaterial')->with('success',"บันทึกข้อมูลการสั่งซื้อวัตถุดิบเรียบร้อย");






    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orderRawmaterial  $orderRawmaterial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $orderR = DB::table('orderrawmaterials')->join('employees','orderrawmaterials.emp_id','employees.emp_id')->where('orderrawmaterials.or_id',$id)
        ->join('suppliers','orderrawmaterials.supplier_id','suppliers.supplier_id')
        ->select('orderrawmaterials.*','employees.emp_fristname','employees.emp_lastname','suppliers.name')
        ->get();
        // dd($orderR );
        $orderRM_details = DB::table('orderrm_detail')->join('raw_materials','raw_materials.Raw_Material_id','orderrm_detail.Raw_Material_id')->where('orderrm_detail.or_id',$id)
        ->select('orderrm_detail.*','raw_materials.Raw_Material_name')
        ->get();
        // dd( $orderRM_details);

        $i=1;
        return view('admin.orderRawmaterial.showOR',compact('orderR','orderRM_details','i'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orderRawmaterial  $orderRawmaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(orderRawmaterial $orderRawmaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\orderRawmaterial  $orderRawmaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orderRawmaterial $orderRawmaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orderRawmaterial  $orderRawmaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(orderRawmaterial $orderRawmaterial)
    {
        //
    }
}
