@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-4 flex-grow-1">
    <div class="row mt-5"></div>
    <div class="container mt-3">
        <div class="row">
        
            <form action="{{ route('storeSupplier') }}" method="POST" enctype="multipart/form-data" class=" p-5 ">
                @csrf
                <div class="row">
                    <div class="col-lg-12 text-center  ">
                        <h2>เพิ่มข้อมูลซัพพลายเออร์</h2>
                     
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
                    
                    
                    
                    <div class="col-md-12 form-inline ml-3">
                        <div class="m-lg-2">
                            <button type="submit" class="mt-3 btn btn-success">Submit</button></div>
                        <div class="">
                            <a href="{{ route('supplier') }}" class="btn btn-danger ml-4 mt-3 px-4 ">Back</a>
                        </div>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
       
     
  
  </main>
  @endsection
  