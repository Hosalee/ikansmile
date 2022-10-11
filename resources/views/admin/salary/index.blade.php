@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">


<main class="col py-4 flex-grow-1" style="background-color: #fbfeff">
  <div class="row mt-5"></div>
  <div class="container mt-5">
    <div class="row">
        <div class="col-lg-12   text-center ">
            <h2 >ข้อมูลค่าจ้างพนักงาน</h2>
        </div>
      
        <div class="pl-0 mt-4 ">
        <a href="{{route('addSalary')}}" class="btn btn-primary mt-1 "><i class="bi bi-plus-square-fill pl-0"></i> จ่ายค่าจ้างพนักงาน</a>
        </div>
        <div class=""></div>
        
       

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-responsive-lg  mt-3 text-center">
          <tr class=" text-white  " style="background: hsl(184, 57%, 38%)">
               <th>#</th>  
              <th>วันที่จ่าย</th>
              <th width="150px">ชื่อ</th> 
              {{-- <th>วันที่จ่าย</th> --}}
              <th>ค่าจ้างรายวัน</th>
              <th>วันที่เข้างาน</th>
              <th>ค่าจ้างรวม</th>
              <th>สถานะ</th>
              <th width="150px">Action</th>
          </tr>
     @foreach($Salary as $row)
     <tr style="background-color: #ffffff"> 
                   <td>{{$Salary->firstItem()+$loop->index }}</td>  
                    <td>{{  $row->date }}</td>
                   <td>{{ $row->emp_fristname}} {{ $row->emp_lastname}}</td>
                 
                   <td>{{  $row->amount}}</td>
                    <td>{{  $row->number }}</td>
                     <td >{{  $row->totalAmount}}</td>
                       <td ><a class="text-white btn btn-success ">{{  $row->status}}</a></td> 
                   
                       
                       

                 
                  <td>
           
       


                   <a href="{{route('editSalary',$row->salary_id)}}" class="btn btn-warning bi bi-pencil-square"></a>
                    <a href="{{route('DeleteSalary',$row->salary_id)}}" 
                        
                        class="btn btn-danger bi bi-trash-fill"
                        onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่ ?')">
                        </a> 
                   
                  </td>
              </tr>
          @endforeach  
      </table>
      {{-- {!! $Emp->links('pagination::bootstrap-5') !!}   --}}


    </div>
  </div>
   

</main>
@endsection


