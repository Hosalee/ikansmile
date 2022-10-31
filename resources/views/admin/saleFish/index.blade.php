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
            <h2 >ข้อมูลการขายปลา</h2>
        </div>
      
        <div class="pl-0">
        <a href="{{route('addsaleFish')}}" class="btn btn-primary mt-1 "><i class="bi bi-plus-square-fill pl-0"></i> เพิ่มการขายปลา</a>
        <a href="{{route('payment')}}" class="btn btn-success mt-1 "><i class="bi bi bi-cash pl-0"></i> ไปยังการชำระเงิน</a>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-responsive-lg  mt-3 text-center">
          <tr class=" text-white  " style="background: hsl(184, 57%, 38%)">
              <th width="30 px">#</th>
              <th width="100 px">รหัสการขาย</th>
              <th width="100 px">วันที่ขาย</th>
              <th width="100 px">ลูกค้า</th>
              <th width="100 px">ผู้รับผิดชอบ</th>
              <th width="100 px">ราคารวม</th>
              <th width="100 px">สถานะ</th>

              <th width="150 px">Action</th>
          </tr>
          
           @foreach( $saleFish  as $row)
          
          <tr style="background-color: #ffffff">
                 <td  >{{$i++}}</td>
                  <td  >{{ $row->saleFish_id}}</td>
                   <td >{{ $row->date}}</td>
                   <td >{{ $row->fristname }} {{ $row->lastname }}</td>
                   <td >{{ $row->emp_fristname}} {{ $row->emp_lastname}}  </td>
                       <td >{{ $row->total}}</td>
                        <td  >
                        @if($row->status == 0)
                        <a class=" btn btn-warning px-4">กำลังดำเนินการ</a>
                        @endif
                      
                        @if($row->status != 0)
                        <a class=" btn btn-success text-white px-5">ขายสำเร็จ</a>
                        @endif
                      </td> 
                      
                  <td class=" text-end">
                    
                    <a href="{{route('saleFishShow',$row->saleFish_id)}}" class="btn btn-info  bi bi-eye-fill"></a>
                    @if($row->status == 0)
                   <a href="" class="btn btn-warning bi bi-pencil-square"></a>
                   @endif
                     <a href="{{route('saleFishDelete',$row->saleFish_id)}}" 
                        class="btn btn-danger bi bi-trash-fill"
                        onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่ ?')">
                        </a>  
                  </td>
              </tr>
              
          @endforeach  
      </table>
     {{-- {!! $RM->links('pagination::bootstrap-5') !!}  --}}


    </div>
  </div>
   

</main>
@endsection
