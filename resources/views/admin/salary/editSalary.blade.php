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
                <h2>แก้ไขค่าจ้างพนักงาน</h2>
            </div>
           
           
           
            <form action="{{url('/salary/updateSalary/'.$Slr->salary_id)}}" method="POST" enctype="multipart/form-data" class=" p-5">
                @csrf
                <div class="row">
                    
                  
                   
                  
                    <div class="col-md-12 mt-1">
                        <div class="form-group my-3">
                            <label>พนักงาน</label>
                            <select class="form-select"  name="emp_id" id="autoSizingSelect" >
                                <option selected value="{{$Slr->emp_id}}">{{$Slr->employee1->emp_fristname}} {{$Slr->employee1->emp_lastname}}</option>
                               
                            </select>
                            @error('emp_id')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="form-group my-3">
                            <label>วันที่จ่าย</label>
                            <input type="date" name="date" class="form-control mt-1" value="{{ $Slr->date}}">
                            @error('date')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                      
                   
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <label>ค่าจ้างรายวัน</label>
                          
                            <input type="number" name="amount" class="form-control mt-1" value="{{ $Slr->amount}}" >     
                            @error('amount')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <label>จำนวนวันที่ทำ</label>
                            <input type="number" name="number" class="form-control mt-1" value="{{ $Slr->number}}">
                            @error('number')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                   
                    <div class="col-md-12 form-inline ml-3">
                        <div class="m-lg-2">
                            <button type="submit" class="mt-3 btn btn-warning">Update</button></div>
                        <div class="">
                            <a href="{{ route('salary') }}" class="btn btn-danger ml-4 mt-3 px-4">Back</a>
                        </div>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
       
     
  
  </main>
  @endsection
  