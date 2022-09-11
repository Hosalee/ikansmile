<?php

namespace App\Http\Controllers;

use App\Models\cage;
use Illuminate\Http\Request;

class CageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Cage = cage::paginate(5);
        return view('admin.cage.index',compact('Cage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //เพิ่มข้อมูลกระชัง
        return view('admin.cage.addCage');
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
     * @param  \App\Models\cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function show(cage $cage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function edit(cage $cage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cage $cage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function destroy(cage $cage)
    {
        //
    }
}
