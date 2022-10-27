@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<main class="col  py-4 flex-grow-1" style="background-color: #fbfeff">
  <div class="row mt-5"></div>

  <div class="container mt-3  rounded-1 py-2 px-2  ">
 
    <div class="row mt-1"></div>
    <div class="row">
        <div class="col-12   text-center mt-1 ">
            <h2 >แสดงข้อมูลการเลี้ยง</h2>
        </div>
     </div>
     <div class="row mt-2">
      <div class="col-12   text-start mt-1   ">
        <a class="btn btn-danger"  href="{{ route('farming') }}" >ย้อนกลับ</a>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse1" role="button" aria-expanded="ture" aria-controls="collapseExample"><i class="bi bi-plus-square-fill pl-0 "></i> แสดงรายละเอียดปลาตาย</a>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapseExample1"style="background-color: #7443dc; color:rgb(255, 255, 255); "><i class="bi bi-plus-square-fill pl-0 "></i></i> แสดงรายละเอียดการให้อาหาร</a>
      
       
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
             @if($farming[0]->total_feeding_amount!= null)<label>{{$farming[0]->total_feeding_amount}} กิโลกรัม</label>@endif
            </div>
            <div class="col-4 mt-2 text-left ">
              <strong>สถานะการเลี้ยง   :  </strong><label>{{ $farming[0]->status}} </label>
              </div>
              <div class=" col-12 mb-3"></div>
            </div>
            
              







      </div>  
    </div>
     
   
   <br>
   
  <div class="collapse" id="collapse1">
    <div class="card card-body">
      <div class="row">
        <div class="col-12 text-end">
          <a class="btn btn-danger" href="" ><i class="bi bi-x-square-fill"></i></a>
        </div>
        <div class="col-12" >
        <h4>รายละเอียดปลาที่ตาย</h4>
        <table class="table table-responsive-lg  mt-3 text-center ">
         <tr class=" text-white " style="background: hsl(184, 57%, 38%)">
             <th width="50 px">#</th>
             <th width="auto">วันที่ปลาตาย</th>
             <th width="auto">จำนวนปลาที่ตาย  (ตัว)</th>
         </tr>
        @foreach($deadfish as $row1)
        @if($row1->dead_number !=null)
             <tr class="" style="background-color: #ffffff ">
                  <td>{{$i++}}</td>
                 <td>{{$row1->dead_date}}</td>
                 <td>{{ $row1->dead_number}}</td>
             </tr>
        @endif
         @endforeach
       </table>
     </div>
     </div>
    </div>
  </div>  
   
   

  



  <div class="collapse" id="collapse2">
    <div class="card card-body">
      <div class="row">
        <div class="col-12 text-end">
          <a class="btn btn-danger" href="" ><i class="bi bi-x-square-fill"></i></a>
        </div><div class="col-12">
        <h4>รายละเอียดการให้อาหาร</h4>
        <table class="table table-responsive-lg  mt-3 text-center ">
          <tr class=" text-white " style="background: hsl(184, 57%, 38%)">
            <th width="50 px">#</th>
              <th width="auto">วันที่ให้อาหาร</th>
              <th width="auto px">สูตรอาหาร</th>
              <th width="auto">จำนวนอาหาร (กิโลกรัม)</th>
          </tr>
         @foreach($foodfish as $row2)
         @if($row2->Recipes_name !=null)
              <tr class="" style="background-color: #ffffff ">
                  <td>{{$j++}}</td>
                  <td>{{$row2->food_date}}</td>
                  <td>{{$row2->Recipes_name}}</td>
                  <td>{{ $row2->amount}}</td>
              </tr>
              @endif
          @endforeach
        </table> 
       </div>
       </div>
    </div>
  </div>  
























        {{-- <div class="row"><div class="col-12">
  
          <table class="table table-responsive-lg  mt-3 text-center ">
            <tr class=" text-white " style="background: hsl(184, 57%, 38%)">
                <th width="auto px">สูตรอาหาร</th>
                <th width="auto">วันที่ให้อาหาร</th>
                <th width="auto">จำนวนอาหาร</th>
            </tr>
           @foreach($foodfish as $row2)
                <tr class="" style="background-color: #ffffff ">
                     <td>{{$row2->Recipes_id}}</td>
                    <td>{{$row2->food_date}}</td>
                    <td>{{ $row2->amount}}</td>
                </tr>
            @endforeach
          </table> 
         </div>
         </div> --}}
     
      </div>
    </div>
  </div>
</div>



  </div>
</div>


   

</main>
<script type="text/javascript">

  
</script>
@endsection
