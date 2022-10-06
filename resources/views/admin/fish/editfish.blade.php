@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-4 flex-grow-1" style="background-color: #fbfeff">
    <div class="row mt-5"></div>
    <div class="container mt-3">
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
                                <img src="{{asset($fish->picture)}}" alt="" width="200px" height="150px" class="border rounded">
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
                            <label class="ml-2 my-2">ชื่อปลา</label>
                            <input type="text" name="name" class="form-control" value="{{$fish->name}}">
                            @error('name')
                                <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <label class="ml-2 my-2">พันธุ์ปลา</label>
                            <input type="text" name="species" class="form-control" value="{{$fish->species}}">
                            @error('species')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <label class="ml-2 my-2">ลักษณะปลา</label>
                            {{-- <input type="text" name="fish_appearance" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{$fish->fish_appearance}}"> --}}
                           {{-- <textarea class="form-control " name="fish_appearance "  style="height: 150px"  > {{$fish->fish_appearance}}</textarea> --}}
                           <textarea  class="form-control" name="fish_appearance"  style="height: 100px"   >{{$fish->fish_appearance}}</textarea> 
                            
                            @error('fish_appearance')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 form-inline ml-3">
                        <div class=" m-lg-2">
                            <button type="submit" class="mt-3 btn btn-warning ">Update</button></div>
                        <div class="">
                            <a href="{{ route('fish') }}" class="btn btn-danger ml-4 mt-3 px-4" >Back</a>
                        </div>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
       
     
  
  </main>
  @endsection
  