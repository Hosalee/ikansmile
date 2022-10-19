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
            <h2 >ข้อมูลการสั่งซื้อปลา</h2>
        </div>
      
        <div class="pl-0">
        <a href="{{route('addOrderfish')}}" class="btn btn-primary mt-1 "><i class="bi bi-plus-square-fill pl-0"></i> เพิ่มการสั่งซื้อปลา</a>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-responsive-lg  mt-3 text-center">
          <tr class=" text-white  " style="background: hsl(184, 57%, 38%)">
              <th width="30 px">#</th>
              <th width="100 px">รหัสการสั่งซื้อ</th>
              <th width="100 px">วันที่สั่ง</th>
              <th width="100 px">ซัพพลายเออร์</th>
              <th width="100 px">ผู้รับผิดชอบ</th>
              <th width="100 px">ราคารวม</th>
              <th width="100 px">สถานะ</th>

              <th width="150 px">Action</th>
          </tr>
          
           @foreach($orderfish as $row)
          
          <tr style="background-color: #ffffff">
                 <td  >{{$i++}}</td>
                  <td  >{{ $row->orders_id}}</td>
                  <td >{{ $row->date }}</td>
                   <td >{{ $row->name}}</td>
                   <td >{{ $row->emp_fristname }} {{ $row->emp_lastname }}</td>
                       <td >{{ $row->total}}</td>
                       <td  >
                        @if($row->status == 'กำลังจัดส่ง')
                        <a class=" btn btn-warning px-4">{{ $row->status}}</a>
                        @endif
                      
                        @if($row->status != 'กำลังจัดส่ง')
                        <a class=" btn btn-success text-white">{{ $row->status}}</a>
                        @endif
                      </td>
                      
                  <td class="text-right">
                    @if($row->status=='กำลังจัดส่ง')
                    <a href="{{route('addFishStock',$row->orders_id)}}" class="btn btn-success  bi bi-box-seam"   onclick="return confirm('คุณต้องการยืนยันคำสั่งซื้อและเพิ่มสินค้าไปยังสต๊อก ?')"></a>
                    @endif
                    <a href="{{route('showOrderfish',$row->orders_id)}}" class="btn btn-info  bi bi-eye-fill"></a>
                   <a href="{{--route('editRecipes',$row->Recipes_id)--}}" class="btn btn-warning bi bi-pencil-square"></a>
                    {{-- <a href="{{route('deleteRawMaterial',$row->Raw_Material_id)}}" 
                        class="btn btn-danger bi bi-trash-fill"
                        onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่ ?')">
                        </a>  --}}
                  </td>
              </tr>
              
          @endforeach  
      </table>
     {{-- {!! $RM->links('pagination::bootstrap-5') !!}  --}}


    </div>
  </div>
   

</main>
@endsection
