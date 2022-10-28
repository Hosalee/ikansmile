<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use App\Models\cage;
use App\Models\farming;
use App\Models\detail_farming;
use App\Models\fish;
use App\Models\Recipes;
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
        $recipes =Recipes::all();
        $fish=fish::paginate(10);
        $cage=cage::where('status','ว่าง')->paginate(5);
        $Emp = DB::table('employees')->where('position','พนักงานเลี้ยงปลา')->get();
        // $farming =farming::all();
        $farming = DB::table('farmings')->join('employees','farmings.emp_id','employees.emp_id')
        ->join('fish','fish.fish_id','farmings.fish_id')
        ->join('cages','cages.cage_id','farmings.cage_id')
        ->select('farmings.*','employees.emp_fristname','employees.emp_lastname','fish.name','fish.species','cages.cage_name')
        ->get();
        $i=1;
       
            return view('admin.farming.index',compact('fish','cage','Emp','farming','i','recipes'));
        
    
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('admin.farming.editFarming');
    }
    public function updateStatus($id)
    {
        
        $status =farming::where('farming_id',$id)->value('status');
        $status = ($status+1);
        farming::where('farming_id',$id)->update([ 'status'=>$status]);
        //
        return redirect()->route('farming')->with('success',"อัพเดตสถานะการเลี้ยงเรียบร้อย");
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
        $farming->fish_amount_left = $request->quantity;
        $farming->status = 0;
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
    public function show($id)
    {
        //
        // echo"แสดงผลน่ะ";
        $farming = DB::table('farmings')->join('employees','farmings.emp_id','employees.emp_id')
        ->join('fish','fish.fish_id','farmings.fish_id')
        ->join('cages','cages.cage_id','farmings.cage_id')->where('farmings.farming_id',$id)
        ->select('farmings.*','employees.emp_fristname','employees.emp_lastname','fish.name','fish.species','cages.cage_name')
        ->get();

        // $deadfish =detail_farming::where('farming_id',$id);
        $deadfish=DB::table('detail_farmings')->where('detail_farmings.farming_id',$id )->select('detail_farmings.dead_date','detail_farmings.dead_number')->get();
        // dd( $deadfish);
        $foodfish=DB::table('detail_farmings')->join('recipes','recipes.Recipes_id','detail_farmings.Recipes_id')->where('detail_farmings.farming_id',$id )->select('recipes.Recipes_name','detail_farmings.food_date','detail_farmings.amount')->get();
        // dd( $deadfish);
        $i=1;
        $j=1;
        return view('admin.farming.Showfarming',compact('farming','deadfish','foodfish','i','j'));

        






        


    }
    // public function showDetailFishDead($id)
    // {
    //     $farming = DB::table('farmings')->join('employees','farmings.emp_id','employees.emp_id')
    //     ->join('fish','fish.fish_id','farmings.fish_id')
    //     ->join('cages','cages.cage_id','farmings.cage_id')->where('farmings.farming_id',$id)
    //     ->select('farmings.*','employees.emp_fristname','employees.emp_lastname','fish.name','fish.species','cages.cage_name')
    //     ->get();


    //     $deadfish = DB::table('detail_farmings')->where('detail_farmings.farming_id',$id)
    //     ->select('detail_farmings.dead_number','detail_farmings.dead_date')
    //     ->get();
    //     return view('admin.farming.Showfarming',compact('farming','deadfish'));


    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\farming  $farming
     * @return \Illuminate\Http\Response
     */
    public function fishDead($id)
    {
        //
        $farming = farming::find($id);
        if($farming)
        {
            return response()->json([
                'status'=>200,
                'farming'=> $farming,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Student Found.'
            ]);
        }
    }
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\farming  $farming
     * @return \Illuminate\Http\Response
     */
    public function fishDeadUpdate(Request $request)
    {
        //
        $dead_number = $request->dead_number;
        $farming_id = $request->farming_id;
        $date =date('Ymd');
        // echo $farming_id;
        // echo $dead_number;

        // $sum1 = farming::where('farming_id',$farming_id)->value('dead_amount');
        $sum = DB::table('farmings')->where('farming_id',$farming_id)->value('dead_amount');
       
        if($sum == null){
            $sum=0;
        }else{
        }
        // dd($sum);
        $total=($sum+$dead_number);
        farming::where('farming_id',$farming_id)->update([ 'dead_amount'=>$total]);

       $dead_amount = DB::table('farmings')->where('farming_id',$farming_id)->value('dead_amount');
       $fish_quantity = DB::table('farmings')->where('farming_id',$farming_id)->value('fish_quantity');
        if($fish_quantity==null){
            $fish_quantity==0;
        }else{}
        $fish_amount_left=($fish_quantity-$dead_amount);
       farming::where('farming_id',$farming_id)->update([ 'fish_amount_left'=>$fish_amount_left]);

       $datail_farming = new detail_farming(); 
       $datail_farming->farming_id = $farming_id;
       $datail_farming->dead_number = $dead_number;
       $datail_farming->dead_date =  $date ;
       $datail_farming->save();

     return redirect()->route('farming')->with('success',"บันทึกข้อมูลปลาเรียบร้อย");
       
    }
    public function fishFoodUpdate(Request $request)
    {
        //
        $amount= $request->amount;
        $recipes_id = $request->Recipes_id;
        $farming_id = $request->farming_id;
        $date =date('Ymd');
        

        // $sum1 = farming::where('farming_id',$farming_id)->value('amount');
        $sum = DB::table('farmings')->where('farming_id',$farming_id)->value('total_feeding_amount');
        if($sum == null){
            $sum=0;
        }else{
        }
        // dd($sum);
        $total=($sum+$amount);
        farming::where('farming_id',$farming_id)->update([ 'total_feeding_amount'=>$total]);

        $datail_farming = new detail_farming(); 
       $datail_farming->farming_id = $farming_id;
       $datail_farming->Recipes_id = $recipes_id;
       $datail_farming->amount = $amount;
       $datail_farming->food_date =  $date ;
       $datail_farming->save();

     return redirect()->route('farming')->with('success',"บันทึกข้อมูลการให้อาหารปลาเรียบร้อย");
       
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
    public function destroy($id)
    {
        //
         //ลบข้อมูลจากฐานข้อมูล
         $delete=farming::find($id)->delete();
          return redirect()->back()->with('success',"ลบข้อมูลการเลี้ยงเรียบร้อย");
    }
}
