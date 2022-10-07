@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-4 flex-grow-1">
    <div class="row mt-5"></div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12 ">
                <h2 class=" ">แก้ไขข้อมูลซัพพลายเออร์</h2>
            </div>
           
           
            <form action="{{url('/supplier/updateSupplier/'.$Sp->supplier_id)}}"  method="POST" enctype="multipart/form-data" class=" p-5">
                @csrf
                <div class="row  align-items-end ">
                    
                    <div class="col-md-12 ">
                        <div class="form-group my-2 ">
                             <input type="hidden" name="old_image" value="{{$Sp->picture}}">
                                <div class="form-group align-items-center text-center  ">   
                                     <img src="{{asset($Sp->picture)}}" alt="" width="100px" height="150px" class="border rounded">
                                 </div> 
                                 <label  for="pictuer">รูปซัพพลายเออร์</label>
                             <input type="file" class="form-control" name="picture" value="{{$Sp->picture}}">
                                 @error('pictuer')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                  @enderror
                        </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group  my-2 ">
    
                        <label>ชื่อ</label>
                        <input type="text" name="name" class="form-control "  value="{{$Sp->name}}">
                        @error('name')
                            <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>   
               
                
                  
                <div class="col-md-12">
                    <div class="form-group my-2">
                        <label>ที่อยู่</label>
                        
                        <textarea  class="form-control" name="Address"  style="height: 100px"   >{{$Sp->Address}}</textarea> 
                            
                        @error('Address')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group my-2">
                        <label>Email</label>
                        <input type="email" name="Email" class="form-control mt-1" value="{{$Sp->Email}}">
                        @error('Email')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group my-2">
                        <label>เบอร์โทร</label>
                        <input type="text" name="tell" class="form-control mt-1" value="{{$Sp->tell}}">
                        @error('tell')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                

                
            </div> 
                    <div class="col-md-12 form-inline ml-3">
                        <div class="m-lg-2">
                            <button type="submit" class="mt-3 btn btn-warning">Update</button></div>
                        <div class="">
                            <a href="{{ route('supplier') }}" class="btn btn-danger ml-4 mt-3 px-4">Back</a>
                        </div>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
  </main>
  @endsection
  