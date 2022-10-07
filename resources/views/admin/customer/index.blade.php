@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">


<main class="col bg-faded py-4 flex-grow-1">
  <div class="row mt-5"></div>
  <div class="container mt-3">
    <div class="row">
        <div class="col-lg-12   text-center ">
            <h2 >ข้อมูลลูกค้า</h2>
        </div>
      
        <div class="pl-0">
        <a href="{{ route('addCustomer') }}" class="btn btn-primary mt-1 "><i class="bi bi-plus-square-fill pl-0"></i> เพิ่มข้อมูลลูกค้า</a>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-responsive-lg  mt-3 text-center">
          <tr class=" text-white  " style="background: hsl(184, 57%, 38%)">
              <th width="30px">#</th>
              <th width="150px">ชื่อ-สกุล</th>
              <th width="50px">เพศ</th>
              <th width="150px">ที่อยู่</th>
              <th width="150px">อีเมล</th>
              <th width="100px">เบอร์โทร</th>
              
              <th width="150px">Action</th>
          </tr>
      @foreach($Customer as $row)
      <tr style="background-color: #ffffff">
                  <td>{{$Customer->firstItem()+$loop->index }}</td>
                  <td>{{ $row->fristname}} {{$row->lastname }}</td>
                  <td>{{  $row->sex }}</td>
                   <td>{{  $row->Address}}</td>
                    <td>{{  $row->Email }}</td>
                     <td>{{  $row->tell}}</td>
                  <td>  
                        <a href="{{route('editCustomer',$row->customers_id)}}" class="btn btn-warning bi bi-pencil-square"></a>
                        <a href="{{route('deleteCustomer',$row->customers_id)}}" 
                        
                        class="btn btn-danger bi bi-trash-fill"
                        onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่ ?')">
                        </a> 
                  </td>
              </tr>
          @endforeach 
      </table>
      {{--!! $Emp->links('pagination::bootstrap-5') !!--}} 


    </div>
  </div>
   

</main>
@endsection
