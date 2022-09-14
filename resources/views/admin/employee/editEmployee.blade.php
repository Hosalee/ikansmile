@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-3 flex-grow-1">
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>เพิ่มข้อมูลพนักงาน</h2>
            </div>
           
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
           
            <form action="{{-- route('addStore') --}}" method="POST" enctype="multipart/form-data" class=" p-2">
                @csrf
                <div class="row  align-items-end ">
                    <div class="col-md-4 ">
                        <div class="form-group my-2 ">
                            
                            
                             <input type="hidden" name="old_image" value="{{$emp->profile}}">
                                <div class="form-group align-items-center text-center  ">
                                     <img src="{{asset($emp->profile)}}" alt="" width="100px" height="150px">
                                 </div> 
                                 <label  for="picture">รูปพนักงาน</label>
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
                  











                    {{--
                  
                   
                    </div>
                    <div class="col-md-4 ">
                        <div class="form-group my-3">
                            <label>สกุล</label>
                            <input type="text" name="emp_lastname" class="form-control mt-1" placeholder="lastname">
                            @error('emp_lastname')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 mt-1">
                        <div class="form-group my-3">
                            <label>เพศ</label>
                            <select class="form-select"  name="sex" id="autoSizingSelect" >
                              <option selected></option>
                              <option value="Men">ชาย</option>
                              <option value="Women">หญิง</option>
                            </select>
                            @error('sex')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>ที่อยู่</label>
                            <input type="text" name="Address" class="form-control mt-1" placeholder=" Address">
                            @error('Address')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control mt-1" placeholder=" email">
                            @error('email')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                       <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>เบอร์โทร</label>
                            <input type="text" name="tell" class="form-control mt-1" placeholder=" tell">
                            @error('tell')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control mt-1" placeholder=" Username">
                            @error('username')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control mt-1" id="inputPassword4" placeholder=" Password">
                            @error('password')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                      
                    </div>
                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>ค่าจ้างรายวัน</label>
                            <input type="number" name="salary" class="form-control mt-1" placeholder=" salary">
                            @error('salary')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                     --}}
                   
                    <div class="col-md-12 form-inline">
                        <div class="">
                            <button type="submit" class="mt-3 btn btn-primary">Submit</button></div>
                        <div class="">
                            <a href="{{ route('employee') }}" class="btn btn-danger ml-4 mt-3 ">ย้อนกลับ</a>
                        </div>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
       
     
  
  </main>
  @endsection
  