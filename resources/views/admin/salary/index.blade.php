@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">


<main class="col py-3 flex-grow-1" style="background-color: #dae9e4">
  <div class="container mt-2">
    <div class="row">
        <div class="col-lg-12   text-center ">
            <h2 >ข้อมูลค่าจ้างพนักงาน</h2>
        </div>
      
        <div class="pl-0 mt-4 ">
        <a href="{{route('addSalary')}}" class="btn btn-success mt-1 "><i class="bi bi-plus-square-fill pl-0"></i> จ่ายค่าจ้างพนักงาน</a>
        </div>
        <div class=""></div>
        
        {{-- <form action="{{-- route('adminAddfish') }}" method="POST" enctype="multipart/form-data" class=" p-2">
            @csrf
                <div class="col-md-4">
                    <div class="form-group my-3">
                        <label>วันที่</label>
                        <input type="date" name="date" class="form-control" placeholder="Fish Name">
                        @error('name')
                            <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="col-md-12 form-inline">
                    <div class="">
                        <button type="submit" class="mt-3 btn btn-primary">Submit</button></div>
                    <div class="">
                        <a href="{{ route('fish') }}" class="btn btn-danger ml-4 mt-3 ">ย้อนกลับ</a>
                    </div>
                </div> 
              
           
        </form> --}}

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered  mt-3 text-center" >
          <tr class="bg-info text-white  ">
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
              <tr class="" style="background-color: #e2ebfc">
                   <td>{{$Salary->firstItem()+$loop->index }}</td> 
                  <td>{{  $row->date }}</td>
                  <td>{{ $row->emp_fristname}} </td>
                  {{-- <td>{{  $row->date }}</td> --}}
                   <td>{{  $row->amount}}</td>
                    <td>{{  $row->number }}</td>
                     <td >{{  $row->totalAmount}}</td>
                       <td ><a class="text-white btn btn-success ">{{  $row->status}}</a></td>
                   
                       
                       

                 
                  <td>
           
       


                   <a href="{{--route('editEmployee',$row->emp_id)--}}" class="btn btn-warning bi bi-pencil-square"></a>
                    <a href="{{--route('DeleteEmployee',$row->emp_id)--}}" 
                        
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


