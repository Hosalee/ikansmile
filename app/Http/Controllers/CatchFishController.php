<?php

namespace App\Http\Controllers;
use App\Models\cage;
use App\Models\farming;
use App\Models\fish;
use App\Models\catchFish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatchFishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $catchFish = DB::table('catch_fish')->join('farmings','farmings.farming_id','catch_fish.farming_id')
        ->join('fish','fish.fish_id','farmings.fish_id')
        ->join('cages','cages.cage_id','farmings.cage_id')
        ->select('catch_fish.*','fish.name','fish.species','cages.cage_name')
        ->paginate(5);

        // $farming = DB::table('farmings')->join('employees','farmings.emp_id','employees.emp_id')
        // ->join('fish','fish.fish_id','farmings.fish_id')
        // ->join('cages','cages.cage_id','farmings.cage_id')
        // ->select('farmings.*','employees.emp_fristname','employees.emp_lastname','fish.name','fish.species','cages.cage_name')
        // ->paginate(5);

        // dd($catchFish);
        return view('admin.catchFish.index',compact('catchFish'));

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
        $farming_id=$request->farming_id;
        $catchfish_quantity=$request->quantity;
        $catchfish_date = date('Ymd');

        $catchFish = new catchFish();
        $catchFish->farming_id = $farming_id;
        $catchFish->catchfish_date = $catchfish_date ;
        $catchFish->catchfish_quantity =$catchfish_quantity;
        $catchFish->save();

        $status =farming::where('farming_id',$farming_id)->value('status');
        $status = ($status+1);
         farming::where('farming_id',$farming_id)->update([ 'status'=>$status]);
         $cage_id =farming::where('farming_id',$farming_id)->value('cage_id');
        cage::where('cage_id',$cage_id )->update([ 'status'=>'ว่าง']);

         return redirect()->route('CatchFish');
        



       
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\catchFish  $catchFish
     * @return \Illuminate\Http\Response
     */
    public function show(catchFish $catchFish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\catchFish  $catchFish
     * @return \Illuminate\Http\Response
     */
    public function edit(catchFish $catchFish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\catchFish  $catchFish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, catchFish $catchFish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\catchFish  $catchFish
     * @return \Illuminate\Http\Response
     */
    public function destroy(catchFish $catchFish)
    {
        //
    }
}
