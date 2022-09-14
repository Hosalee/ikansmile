@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-3 flex-grow-1">
    <div class="container mt-2">
        <div class="row">
        
            <form action="{{ route('storeSupplier') }}" method="POST" enctype="multipart/form-data" class=" p-2 ">
                @csrf
                <div class="row">
                    <div class="col-lg-12 text-center mt-3 ">
                        <h2>เพิ่มข้อมูลซัพพลายเออร์</h2>
                      <hr>
                    </div>
                    
                  
                    <div class="col-md-12 ">

                        <div class="form-group my-3">
                            <label for="picture">รูปซัพพลายเออร์</label>
                            <input type="file" class="form-control" name="picture"  placeholder="supplier Picture">
                            @error('picture')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                   
                    
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <label>ชื่อ</label>
                            <input type="text" name="name" class="form-control" placeholder="supplier Name">
                            @error('name')
                                <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ที่อยู่</strong>
                            <textarea class="form-control" name="Address" id="exampleFormControlTextarea1" rows="3" placeholder="Address"></textarea>
                            
                            @error('Address')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <label>Email</label>
                            <input type="text" name="Email" class="form-control" placeholder="Email">
                            @error('Email')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <label>เบอร์โทร</label>
                            <input type="text" name="tell" class="form-control" placeholder="Tell">
                            @error('tell')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-md-12 form-inline">
                        <div class="">
                            <button type="submit" class="mt-3 btn btn-primary">Submit</button></div>
                        <div class="">
                            <a href="{{ route('supplier') }}" class="btn btn-danger ml-4 mt-3 ">ย้อนกลับ</a>
                        </div>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
       
     
  
  </main>
  @endsection
  