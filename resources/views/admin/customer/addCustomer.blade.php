@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-4 flex-grow-1">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>เพิ่มข้อมูลลูกค้า</h2>
            </div>
           
           
           
            <form action="{{ route('storeCustomer') }}" method="POST" enctype="multipart/form-data" class=" p-2">
                @csrf
                <div class="row">
                   
                  
                    <div class="col-md-4 m-auto">
                        <div class="form-group my-3 ">
                            <label>ชื่อ</label>
                            <input type="text" name="fristname" class="form-control mt-1" placeholder=" fristname">
                            @error('fristname')
                                <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="form-group my-3">
                            <label>สกุล</label>
                            <input type="text" name="lastname" class="form-control mt-1" placeholder="lastname">
                            @error('lastname')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 mt-1">
                        <div class="form-group my-3">
                            <label>เพศ</label>
                            <select class="form-select"  name="sex" id="autoSizingSelect" >
                              <option selected></option>
                              <option value="ชาย">ชาย</option>
                              <option value="หญิง">หญิง</option>
                            </select>
                            @error('sex')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <label>ที่อยู่</label>
                            <input type="text" name="Address" class="form-control mt-1" placeholder=" Address">
                            @error('Address')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>Email</label>
                            <input type="email" name="Email" class="form-control mt-1" placeholder=" Email">
                            @error('Email')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>เบอร์โทร</label>
                            <input type="text" name="tell" class="form-control mt-1" placeholder=" tell">
                            @error('tell')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    
                   
                    <div class="col-md-12 form-inline">
                        <div class="">
                            <button type="submit" class="mt-3 btn btn-primary">Submit</button></div>
                        <div class="">
                            <a href="{{ route('customer') }}" class="btn btn-danger ml-4 mt-3 ">ย้อนกลับ</a>
                        </div>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
       
     
  
  </main>
  @endsection
  