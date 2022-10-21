<?php

namespace App\Http\Controllers;

use App\Models\cage;
use App\Models\farming;
use App\Models\fish;
use Illuminate\Http\Request;

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
        $fish=fish::paginate(5);
        $cage=cage::where('status','ว่าง')->paginate(5);
        return view('admin.farming.index',compact('fish','cage'));
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
