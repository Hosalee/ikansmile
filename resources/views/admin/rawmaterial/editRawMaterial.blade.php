@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-3 flex-grow-1">
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>แก้ไขข้อมูลวัตถุดิบ</h2>
            </div>
          
            <form action="{{url('/rawMaterial/updateRawMaterial/'.$RM->Raw_Material_id)}}" method="POST" enctype="multipart/form-data" class=" p-2 ">
                @csrf 
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="form-group my-3">
                            <input type="hidden" name="old_image" value="{{$RM->picture}}">
                            <div class="form-group align-items-center text-center ">
                                <img src="{{asset($RM->picture)}}" alt="" width="150px" height="150px" class="border rounded">
                            </div>
    
                            <br>
                            <label for="picture">รูปวัตถุดิบ</label>
                            <input type="file" class="form-control" name="picture" value="{{$RM->picture}}">
                           
                       
                        </div>
                    </div>
                   
                    
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <label>ชื่อวัตถุดิบ</label>
                            <input type="text" name="Raw_Material_name" class="form-control" value="{{$RM->Raw_Material_name}}">
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3 ">
                            <label>ลักษณะปลา</label>
                            <input type="text" name="details" class="form-control" id="exampleFormControlTextarea1"  value="{{$RM->details}}"> 
                           {{-- <textarea  type="text" class="form-control" name="details " id="exampleFormControlTextarea1" rows="4"  value="{{$RM->details}}" >{{$RM->details}}</textarea> --}}
                           @error('details')
                           <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                       @enderror
                        </div>

                    </div>

                    <div class="col-md-12 form-inline">
                        <div class="">
                            <button type="submit" class="mt-3 btn btn-primary">Submit</button></div>
                        <div class="">
                            <a href="{{ route('rawMaterial') }}" class="btn btn-danger ml-4 mt-3  ">ย้อนกลับ</a>
                        </div>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
       
     
  
  </main>
  @endsection
  