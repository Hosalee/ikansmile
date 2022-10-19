@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-3 flex-grow-1">
    <div class="row mt-5"></div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>เพิ่มข้อมูลพนักงาน</h2>
            </div>
           
            {{-- @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif --}}
           
            <form action="{{ route('addStore') }}" method="POST" enctype="multipart/form-data" class=" p-5">
                @csrf
                <div class="row">
                    <div class="col-md-4 mt-1 ">
                        <div class="form-group my-3 ">
                            <label for="profile">รูปโปรไฟล์</label>
                            <input type="file" class="form-control" name="profile"  placeholder="Profile">
                            @error('profile')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                  
                    <div class="col-md-4 m-auto">
                        <div class="form-group my-3 ">
                            <label>ชื่อ</label>
                            <input type="text" name="emp_fristname" class="form-control mt-1" placeholder=" fristname">
                            @error('emp_fristname')
                                <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                            @enderror
                        </div>
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
                              <option value="ชาย">ชาย</option>
                              <option value="หญิง">หญิง</option>
                            </select>
                            @error('sex')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 mt-1">
                        <div class="form-group my-3">
                            <label>ตำแหน่ง</label>
                            <select class="form-select"  name="position" id="autoSizingSelect" >
                              <option selected></option>
                              <option value="พนักงานเลี้ยงปลา">พนักงานเลี้ยงปลา</option>
                              <option value="พนักงานขายปลา">พนักงานขายปลา</option>
                              <option value="พนักงานผลิตอาหาร">พนักงานผลิตอาหาร</option>
                            </select>
                            @error('position')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group my-3">
                            <label>ที่อยู่</label>
                            
                            <textarea  class="form-control" name="Address"  style="height: 60px"   ></textarea> 
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
                  
                    
                   
                    <div class="col-md-12 form-inline ml-3">
                        <div class="m-lg-2">
                            <button type="submit" class="mt-3 btn btn-success">Submit</button></div>
                        <div class="">
                            <a href="{{ route('employee') }}" class="btn btn-danger px-4 ml-4 mt-3 ">Back</a>
                        </div>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
       
     
  
  </main>
  @endsection
  