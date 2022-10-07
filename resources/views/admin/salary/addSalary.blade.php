@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-4 flex-grow-1">
    <div class="row mt-5"></div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>เพิ่มข้อมูลค่าจ้างพนักงาน</h2>
            </div>
           
           
           
            <form action="{{ route('salaryStore')}}" method="POST" enctype="multipart/form-data" class=" p-5">
                @csrf
                <div class="row">
                    
                  
                   
                  
                    <div class="col-md-4 mt-1 ml-5 mr-5">
                        <div class="form-group my-3">
                            <label>พนักงาน</label>
                            <select class="form-select"  name="emp_id" id="autoSizingSelect" >
                                <option selected ></option>
                                @foreach($emp as $row)
                                <tr>
                                     <option value="{{ $row->emp_id}}"> {{ $row->emp_fristname}} {{ $row->emp_lastname}}  </option>
                                </tr>
                               
                            @endforeach
                            </select>
                            @error('emp_id')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                           
                        </div>
                    </div>
                 
                           {{-- <div class="form-group align-items-center text-center  ">   
                                <img src="{{asset($emp->profile)}}" alt="" width="100px" height="150px" class="border rounded">
                            </div>  --}}
                          
                    <div class="col-md-4 ml-5 ">
                        <div class="form-group my-3">
                            <label>วันที่จ่าย</label>
                            <input type="date" name="date" class="form-control mt-1" placeholder="lastname">
                            @error('date')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                      
                   
                    <div class="col-md-4 ml-5 mr-5">
                        <div class="form-group my-3">
                            <label>ค่าจ้างรายวัน</label>
                          
                            <input type="number" name="amount" class="form-control mt-1"  placeholder=" amount" >     
                            @error('amount')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="col-md-4 ml-5">
                        <div class="form-group my-3">
                            <label>จำนวนวันที่ทำ</label>
                            <input type="number" name="number" class="form-control mt-1" placeholder="number">
                            @error('number')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                   
                    <div class="col-md-4 ml-5 mr-5 form-inline ml-3">
                        <div class="m-lg-2">
                            <button type="submit" class="mt-3 btn btn-primary">Submit</button></div>
                        <div class="">
                            <a href="{{ route('salary') }}" class="btn btn-danger ml-4 mt-3 px-4 ">Back</a>
                        </div>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
       
     
  
  </main>
  @endsection
  