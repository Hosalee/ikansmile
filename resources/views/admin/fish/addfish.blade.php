@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-4 flex-grow-1" style="background-color: #fbfeff">
    <div class="row mt-5"></div>
  <div class="container mt-3 ">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>เพิ่มข้อมูลปลา</h2>
            </div>
           
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
           
            <form action="{{ route('adminAddfish') }}" method="POST" enctype="multipart/form-data" class=" p-5">
                @csrf
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="form-group my-3">
                            
                            <h6 class="ml-2 my-2"><b>รูปปลา</b></h6>
                            <input type="file" class="form-control" name="picture"  placeholder="Fish Picture">
                            @error('picture')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                   
                    
                    <div class="col-md-12">
                        <div class="form-group my-3">
                           
                            <h6 class="ml-2 my-2"><b>ชื่อปลา</b></h6>
                            <input type="text" name="name" class="form-control" placeholder="Fish Name">
                            @error('name')
                                <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            
                            <h6 class="ml-2 my-2"><b>พันธุ์ปลา</b></h6>
                            <input type="text" name="species" class="form-control" placeholder="Fish Species">
                            @error('species')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <h6 class="ml-2 my-2"><b>ลักษณะปลา</b></h6>
                            <textarea class="form-control" name="fish_appearance" id="exampleFormControlTextarea1" rows="3" placeholder="Fish Species"></textarea>
                            
                            @error('fish_appearance')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 form-inline ml-3">
                        <div class="m-lg-2">
                            <button type="submit" class="mt-3 btn btn-success ">Submit</button></div>
                        <div class="">
                            <a href="{{ route('fish') }}" class="btn btn-danger ml-4 mt-3 px-4">Back</a>
                        </div>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
       
     
  
  </main>
  @endsection
  