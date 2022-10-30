<?php

namespace App\Http\Controllers;
use App\Models\supplier;
use App\Models\orderRawmaterial;
use App\Models\RawMaterial;
use Illuminate\Http\Request;

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
        return view('admin.orderRawmaterial.index');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orderRawmaterial  $orderRawmaterial
     * @return \Illuminate\Http\Response
     */
    public function show(orderRawmaterial $orderRawmaterial)
    {
        //
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
