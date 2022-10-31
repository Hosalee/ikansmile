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
            <h2 >ข้อมูลการชำระเงิน</h2>
        </div>
      
        <div class="pl-0">
        <a href="{{route('saleFish')}}" class="btn btn-danger mt-1 "><i class="bi bi-plus-square-fill pl-0"></i> กลับไปยังการขายปลา</a>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-responsive-lg  mt-3 text-center">
          <tr class=" text-white  " style="background: hsl(184, 57%, 38%)">
              <th width="30 px">No</th>
              <th width="100 px">รหัสการขาย</th>
              <th width="100 px">ราคาที่ต้องชำระ (บาท)</th>
              <th width="100 px">สถานะการชำระ</th>
              <th width="150 px">Action</th>
          </tr>
          
            @foreach( $payment  as $row)
          
          <tr style="background-color: #ffffff">
                 <td  >{{$i++}}</td>
                  <td  >{{ $row->saleFish_id}}</td>
                   <td >{{ $row->total}}</td>
                       <td>
                        @if($row->payment_status == 0)
                        <a class=" btn btn-warning px-4">ยังไม่ชำระเงิน</a>
                        @endif
                        @if($row->payment_status != 0)
                        <a class=" btn btn-success text-white">ชำระเงินแล้ว</a>
                        @endif
                      </td> 
                      
                  <td class="">
                    
                    @if($row->payment_status == 0)
                  <a href="{{route('paymentUpdate',$row->payment_id)}}" class="btn btn-success  bi bi-cash"  onclick="return confirm('คุณต้องการยืนยันการชำระเงินหรือไม่ ?')"></a> 
                  @endif
                     <a href="{{route('paymentDelete',$row->payment_id)}}" class="btn btn-danger bi bi-trash-fill"
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
