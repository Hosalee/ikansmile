@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-3 flex-grow-1">
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>เพิ่มข้อมูลวัตถุดิบ</h2>
            </div>
           
           
            <form action="{{ route('storeRawMaterial') }}" method="POST" enctype="multipart/form-data" class=" p-2">
                @csrf
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="form-group my-3">
                            <label for="picture">รูปวัตถุดิบ</label>
                            <input type="file" class="form-control" name="picture"  placeholder="Picture">
                            @error('picture')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                   
                    
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <label>ชื่อวัตถุดิบ</label>
                            <input type="text" name="Raw_Material_name" class="form-control" placeholder="Name">
                            @error('Raw_Material_name')
                                <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                   
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <label>รายละเอียดวัตถุดิบ</label>
                            <textarea class="form-control" name="details" id="exampleFormControlTextarea1" rows="3" placeholder="details"></textarea>
                            @error('details')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 form-inline">
                        <div class="">
                            <button type="submit" class="mt-3 btn btn-primary">Submit</button></div>
                        <div class="">
                            <a href="{{ route('rawMaterial') }}" class="btn btn-danger ml-4 mt-3 ">ย้อนกลับ</a>
                        </div>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
       
     
  
  </main>
  @endsection
  