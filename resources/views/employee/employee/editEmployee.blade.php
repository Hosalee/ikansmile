@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar2')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-4 flex-grow-1" style="background-color: #fbfeff">>
    <div class="row mt-5"></div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="text-decoration-">แก้ไขข้อมูลพนักงาน</h2>
            </div>
           
           
            <form action="{{route('employeeUpdate',$emp->emp_id)}}"  method="POST" enctype="multipart/form-data" class=" p-5">
                @csrf
                <div class="row  align-items-end ">
                    
                    <div class="col-md-12 ">
                        <div class="form-group my-2 ">
                             <input type="hidden" name="old_image" value="{{$emp->profile}}">
                                <div class="form-group align-items-center text-center  ">   
                                     <img src="{{asset($emp->profile)}}" alt="" width="120px" height="150px" class="border rounded">
                                 </div> 
                                 {{-- <label  for="profile">รูปพนักงาน</label>
                             <input type="file" class="form-control" name="profile" value="{{$emp->profile}}">
                                 @error('profile')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                  @enderror --}}
                        </div>
                </div>
                <div class="col-md-4   mt-4">
                    <div class="form-group  my-2 ">
    
                        <label  for="profile">รูปพนักงาน</label>
                        <input type="file" class="form-control" name="profile" value="{{$emp->profile}}">
                            @error('profile')
                       <div class="alert alert-danger mt-1">{{ $message }}</div>
                             @enderror
                    </div>
                </div>  
                <div class="col-md-4   mt-4">
                    <div class="form-group  my-2 ">
    
                        <label>ชื่อ</label>
                        <input type="text" name="emp_fristname" class="form-control "  value="{{$emp->emp_fristname}}">
                        @error('emp_fristname')
                            <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>   
                <div class="col-md-4   mt-3">
                    <div class="form-group  my-2  ">
                        <label>สกุล</label>
                        <input type="text" name="emp_lastname" class="form-control "  value="{{$emp->emp_lastname}}">
                        @error('emp_lastname')
                            <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>  
                <div class="col-md-4 ">
                    <div class="form-group my-3">
                        <label>เพศ</label>
                        <select class="form-select"  name="sex" id="autoSizingSelect"  >
                          <option selected> {{$emp->sex}}</option>
                          <option value="ชาย">ชาย(Men)</option>
                          <option value="หญิง">หญิง(Women)</option>
                        </select>
                        @error('sex')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div> 
                  
                <div class="col-md-4 ">
                    <div class="form-group my-0 ">
                        <label>ที่อยู่</label>
                        
                        <textarea  class="form-control" name="Address"  style="height: 60px"   >{{$emp->Address}}</textarea> 
                        @error('Address')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4 ">
                    <div class="form-group my-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control mt-1" value="{{$emp->Email}}">
                        @error('email')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="form-group my-2">
                        <label>เบอร์โทร</label>
                        <input type="text" name="tell" class="form-control mt-1" value="{{$emp->tell}}">
                        @error('tell')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group my-2">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control mt-1" value="{{$emp->Username}}">
                        @error('username')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="form-group my-2">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control mt-1" id="inputPassword4" value="{{$emp->Password}}">
                        @error('password')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
            </div> 
                    <div class="col-md-12 form-inline">
                        <div class="m-lg-2">
                            <button type="submit" class="mt-3 btn btn-warning">Update</button></div>
                        <div class="">
                            <a href="{{ route('showEmployee') }}" class="btn btn-danger ml-4 mt-3 px-4">Back</a>
                        </div>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
  </main>
  @endsection
  