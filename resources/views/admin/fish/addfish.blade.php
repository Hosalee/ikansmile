@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-4 flex-grow-1">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>เพิ่มข้อมูลปลา</h2>
            </div>
           
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
           
            <form action="{{ route('adminAddfish') }}" method="POST" enctype="multipart/form-data" class=" p-2">
                @csrf
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="form-group my-3">
                            <label for="picture">รูปปลา</label>
                            <input type="file" class="form-control" name="picture"  placeholder="Fish Picture">
                            @error('picture')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                   
                    
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อปลา</strong>
                            <input type="text" name="name" class="form-control" placeholder="Fish Name">
                            @error('name')
                                <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>พันธุ์ปลา</strong>
                            <input type="text" name="species" class="form-control" placeholder="Fish Species">
                            @error('species')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ลักษณะปลา</strong>
                            <textarea class="form-control" name="fish_appearance" id="exampleFormControlTextarea1" rows="3" placeholder="Fish Species"></textarea>
                            
                            @error('fish_appearance')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 form-inline">
                        <div class="">
                            <button type="submit" class="mt-3 btn btn-primary">Submit</button></div>
                        <div class="">
                            <a href="{{ route('fish') }}" class="btn btn-danger ml-4 mt-3 ">ย้อนกลับ</a>
                        </div>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
       
     
  
  </main>
  @endsection
  