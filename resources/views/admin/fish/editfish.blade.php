@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-4 flex-grow-1">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>แก้ไขข้อมูลปลา</h2>
            </div>
           
           
           
            <form action="{{url('/fish/update/'.$fish->fish_id)}}" method="POST" enctype="multipart/form-data" class=" p-2 ">
                @csrf 
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="form-group my-3">
                           
                            <input type="hidden" name="old_image" value="{{$fish->picture}}">
                            <div class="form-group align-items-center text-center ">
                                <img src="{{asset($fish->picture)}}" alt="" width="200px" height="200px" class="border rounded">
                            </div>
    
                            <br>
                            <label for="picture">รูปปลา</label>
                          
                            <input type="file" class="form-control" name="picture" value="{{$fish->picture}}">
                            @error('picture')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                       
                        </div>
                    </div>
                   
                    
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อปลา</strong>
                            <input type="text" name="name" class="form-control" value="{{$fish->name}}">
                            @error('name')
                                <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>พันธุ์ปลา</strong>
                            <input type="text" name="species" class="form-control" value="{{$fish->species}}">
                            @error('species')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ลักษณะปลา</strong>
                            {{-- <input type="text" name="fish_appearance" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{$fish->fish_appearance}}"> --}}
                           {{-- <textarea class="form-control " name="fish_appearance "  style="height: 150px"  > {{$fish->fish_appearance}}</textarea> --}}
                           <textarea  class="form-control" name="fish_appearance"  style="height: 150px"   >{{$fish->fish_appearance}}</textarea> 
                            
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
  