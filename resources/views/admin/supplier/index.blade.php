@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">


<main class="col  py-4 flex-grow-1" style="background-color: #fbfeff">
  <div class="row mt-5"></div>
  <div class="container mt-3">
    <div class="row">

        <div class="col-lg-12  text-center  ">
            <h2 >ข้อมูลซัพพลายเออร์</h2>
          
        </div>
      
        <div class="pl-0 mt-3 ">
        <a href="{{route('addSupplier')}}" class="btn btn-primary mt-1 "><i class="bi bi-plus-square-fill pl-0"></i> เพิ่มข้อมูลซัพพลายเออร์</a>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-responsive-lg  mt-3 text-center">
          <tr class=" text-white  " style="background: hsl(184, 57%, 38%)">
              <th width="20 px">#</th>
              <th width="150 px">รูป</th>
              <th width="100 px">ชื่อ</th>
              <th width="250 px">ที่อยู่</th>
              <th width="150 px">Email</th>
              <th width="150 px">เบอร์โทร</th>
              <th width="150 px">Action</th>
          </tr>
          @foreach($Sp as $row)
          <tr style="background-color: #ffffff">
                 <td>{{$Sp->firstItem()+$loop->index }}</td>
                  <td><img src="{{asset($row->picture)}}" alt="" width="150px" height="100px"></td>
                  <td>{{ $row->name }}</td>
                  <td>{{  $row->Address }}</td>
                  <td>{{  $row->Email }}</td>
                  <td>{{  $row->tell }}</td>
                  <td>
                   <a href="{{url('/supplier/editSupplier/'.$row->supplier_id)}}" class="btn btn-warning bi bi-pencil-square"></a>
                    <a href="{{route('deleteSupplier',$row->supplier_id)}}" 
                          class="btn btn-danger bi bi-trash-fill"
                        onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่ ?')">
                        </a> 
                  </td>
              </tr>
          @endforeach 
      </table>
     {{-- {!! $companies->links('pagination::bootstrap-5') !!}  --}}


    </div>
  </div>
   

</main>
@endsection
