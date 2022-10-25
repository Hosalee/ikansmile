@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">


<main class="col  py-4 flex-grow-1" style="background-color: #fbfeff">
  <div class="row mt-5"></div>

  <div class="container mt-3  rounded-1 py-2 px-2  ">
 
    <div class="row mt-1"></div>
    <div class="row">
        <div class="col-12   text-center mt-1 ">
            <h2 >แสดงข้อมูลการเลี้ยง</h2>
        </div>
     </div>
     <div class="container  rounded-2  text-left my-4  " style="background-color: hsl(184, 57%, 38%); color:#fbfeff;  ">
     <div class="row ">
   
      <div class="col-12 mt-3"></div>
      <div class="col-4  mt-2 text-left ">
              <strong>รหัสการเลี้ยง  :  </strong><label>{{ $farming[0]->farming_id}}</label>
      </div>
      <div class="col-4   mt-2 text-left">
          <strong>ชื่อปลา    :  </strong><label> {{ $farming[0]->name}}({{ $farming[0]->species }})</label>
  </div>
      <div class="col-4   mt-2 text-left">
          <strong>พนักงานผู้รับผิดชอบ   :  </strong><label>{{ $farming[0]->emp_fristname}} {{ $farming[0]->emp_lastname}} </label>
    </div>
    <div class="col-4 mt-2 text-left">
      <strong>วันที่ลงปลา   :  </strong><label> {{ $farming[0]->date_import}}</label>
      </div>
          <div class="col-4 mt-2 text-left">
        <strong>จำนวนปลาที่ลง   :  </strong><label>{{ $farming[0]->fish_quantity}} </label>
        </div>
        <div class="col-4 mt-2 text-left">
          <strong>จำนวนปลาที่เหลือ   :  </strong><label>{{ $farming[0]->fish_amount_left}} ตัว</label>
          </div>
        <div class="col-4 mt-2 text-left">
          <strong>จำนวนปลาที่ตาย  :  </strong>@if($farming[0]->dead_amount==null)<label> 0  ตัว</label>@endif 
          @if($farming[0]->dead_amount!= null)<label>{{$farming[0]->dead_amount}} ตัว</label>@endif
          </div>
          <div class="col-4 mt-2 text-left">
            <strong>จำนวนอาหารรวม  :  </strong>
            {{-- <label>{{ $farming[0]->total_feeding_amount}} </label> --}}
            @if($farming[0]->total_feeding_amount==null)<label> 0  กิโลกรัม</label>@endif 
             @if($farming[0]->total_feeding_amount!= null)<label>{{$farming[0]->total_feeding_amount}} ตัว</label>@endif
            </div>
            <div class="col-4 mt-2 text-left ">
              <strong>สถานะการเลี้ยง   :  </strong><label>{{ $farming[0]->status}} </label>
              </div>
              <div class=" col-12 mb-3"></div>
            </div>
            
              







      </div>  
    </div>
     
     <div class="row mt-2">
      <div class="col-12   text-start mt-1   ">
        <a href="{{--route('addfish')--}}" class="btn btn-primary mt-1 "><i class="bi bi-plus-square-fill pl-0 "></i> แสดงรายละเอียดปลาตาย</a>
        <a href="{{--route('addfish')--}}" class="btn  mt-1 ml-2 " style="background-color: #41f453; color:rgb(255, 255, 255); "><i class="bi bi-plus-square-fill pl-0 "></i> แสดงรายละเอียดการให้อาหาร</a>
        
      </div>
     
   </div>


        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif

    
  </div>
</div>
   

</main>
@endsection
