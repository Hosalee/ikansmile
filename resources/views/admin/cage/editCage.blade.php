@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-4 flex-grow-1">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>แก้ไขข้อมูลกระชัง</h2>
            </div>
           
           
           
            <form action="{{ route('updateCage',$Cage->cage_id) }}" method="POST" enctype="multipart/form-data" class=" p-2">
                @csrf
                <div class="row">
                  
                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>ชื่อกระชัง</label>
                            <input type="text" name="cage_name" class="form-control mt-1"  value="{{$Cage->cage_name}}">
                            @error('Cage_name')
                                <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>ชื่อเจ้าของกระชัง</label>
                            <input type="text" name="cage_owner" class="form-control mt-1"  value="{{$Cage->cage_owner}}">
                            @error('species')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>ที่อยู่กระชัง</label>
                            <input type="text" name="Address" class="form-control mt-1"  value="{{$Cage->Address}}">
                            @error('Address')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>ขนาดกระชัง</label>
                            <input type="text" name="size" class="form-control mt-1"  value="{{$Cage->size}}">
                            @error('Address')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                       <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>ความจุของกระชัง(ปลากี่ตัว)</label>
                            <input type="text" name="capicity" class="form-control mt-1"  value="{{$Cage->capicity}}">
                            @error('capicity')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>ละติจุด</label>
                            <input type="text" name="latitude" class="form-control mt-1"  value="{{$Cage->latitude}}">
                            @error('latitude')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>ลองจิจุด</label>
                            <input type="text" name="longitude" class="form-control mt-1"  value="{{$Cage->longitude}}">
                            @error('longitude')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
               
                   
                    <div class="col-md-12 form-inline">
                        <div class="">
                            <button type="submit" class="mt-3 btn btn-primary">Update</button></div>
                        <div class="">
                            <a href="{{ route('cage') }}" class="btn btn-danger ml-4 mt-3 ">ย้อนกลับ</a>
                        </div>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
       
     
  
  </main>
  @endsection
  