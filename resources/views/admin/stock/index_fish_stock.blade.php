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
            <h2 >ข้อมูลสต๊อกลูกปลา</h2>
        </div>
      
        <div class="pl-0 mt-4 ">
        <a href="{{--route('addSalary')--}}" class="btn btn-primary mt-1 "><i class="bi bi-plus-square-fill pl-0"></i> เพิ่มการสั่งซื้อปลา</a>
        </div>
        <div class=""></div>
        
       

        {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif --}}

        <table class="table table-responsive-lg  mt-3 text-center">
          <tr class=" text-white  " style="background: hsl(184, 57%, 38%)">
               <th width="50px">#</th>  
               <th width="150px">รูป</th>  
              
              <th width="150px">ชื่อ</th> 
              {{-- <th>พันธ์ุปลา</th> --}}
              <th width="60px">ขนาดปลา (นิ้ว)</th>
              <th width="50px">จำนวน (ตัว)</th>
              <th width="100px">วันที่นำเข้า</th>
              {{-- <th>สถานะ</th> --}}
              <th width="150px">Action</th>
          </tr>
          
     @foreach($fishstock as $row)
     
     
     <tr style="background-color: #ffffff"> 
                   <td>{{$i++ }}</td>  
                   <td><img src="{{asset($row->picture)}}" alt="" width="100px" height="50px"></td>
                   <td>{{ $row->name}}({{ $row->species}}) </td>
                   {{-- <td>{{ $row->species}} </td> --}}
                   <td>{{  $row->size}}</td>
                    <td>{{  $row->quantity }}
                   
                    </td>
                    <td>{{  $row->date_import }}</td>
                       {{-- <td ><a class="text-white btn btn-success ">{{  $row->status}}</a></td>  --}}
                   
                       
                       

                 
                  <td>
           
       

                    @if($row->quantity == 0)
                      <a href="{{route('deleteFishStock',$row->fishStock_id)}}" class="" id="button_id"></a>
                      @endif
                   <a href="{{--route('editSalary',$row->salary_id)--}}" class="btn btn-warning bi bi-pencil-square"></a>
                    <a href="{{--route('DeleteSalary',$row->salary_id)--}}" 
                      
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
<script>
 
  setInterval(function(){
  document.getElementById("button_id").click();	
  },1000);
  </script>
@endsection


