@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-4 flex-grow-1">
    <div class="row mt-5"></div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>แก้ไขข้อมูลลูกค้า</h2>
            </div>
           
           
           
            <form action="{{url('/customer/updateCustomer/'.$Customer->customers_id)}}"  method="POST" enctype="multipart/form-data" class=" p-5">
                @csrf
                <div class="row">
                   
                  
                    <div class="col-md-4 m-auto">
                        <div class="form-group my-3 ">
                            <label>ชื่อ</label>
                            <input type="text" name="fristname" class="form-control mt-1" value="{{$Customer->fristname}}" >
                            @error('fristname')
                                <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="form-group my-3">
                            <label>สกุล</label>
                            <input type="text" name="lastname" class="form-control mt-1" value="{{$Customer->lastname}}">
                            @error('lastname')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 mt-1">
                        <div class="form-group my-3">
                            <label>เพศ</label>
                            <select class="form-select"  name="sex" id="autoSizingSelect" >
                              <option selected >{{$Customer->sex}}</option>
                              <option value="ชาย">ชาย</option>
                              <option value="หญิง">หญิง</option>
                            </select>
                            @error('sex')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>ที่อยู่</label>
                            
                            <textarea  class="form-control" name="Address"  style="height: 60px"   >{{$Customer->Address}}</textarea> 
                            @error('Address')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>Email</label>
                            <input type="email" name="Email" class="form-control mt-1" value="{{$Customer->Email}}">
                            @error('Email')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>เบอร์โทร</label>
                            <input type="text" name="tell" class="form-control mt-1" value="{{$Customer->tell}}">
                            @error('tell')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    
                   
                    <div class="col-md-12 form-inline ml-3">
                        <div class="m-lg-2">
                            <button type="submit" class="mt-3 btn btn-warning">Update</button></div>
                        <div class="">
                            <a href="{{ route('customer') }}" class="btn btn-danger ml-4 mt-3 px-4 ">Back</a>
                        </div>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
       
     
  
  </main>
  @endsection
  