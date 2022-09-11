@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">


<main class="col bg-faded py-3 flex-grow-1">
  <div class="container mt-2">
    <div class="row">
        <div class="col-lg-12   text-center ">
            <h2 >ข้อมูลพนักงาน</h2>
        </div>
      
        <div class="pl-0">
        <a href="{{ route('addEmployee') }}" class="btn btn-success mt-1 "><i class="bi bi-plus-square-fill pl-0"></i> เพิ่มข้อมูลพนักงาน</a>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered  mt-3 text-center">
          <tr class="bg-dark text-white  ">
              <th>ID</th>
              <th>รูปโปรไฟล์</th>
              <th>ชื่อ-สกุล</th>
              <th>เพศ</th>
              <th>ที่อยู่</th>
              <th>อีเมล</th>
              <th>เบอร์โทร</th>
              <th>ชื่อผู้ใช้</th>
              <th width="auto px">Action</th>
          </tr>
     @foreach($Emp as $row)
              <tr>
                  <td>{{ $row->emp_id }}</td>
                  <td><img src="{{asset($row->profile)}}" alt="" width="100px" height="100px"></td>
                  <td>{{ $row->emp_fristname}} {{$row->emp_lastname }}</td>
                  <td>{{  $row->sex }}</td>
                   <td>{{  $row->Address}}</td>
                    <td>{{  $row->Email }}</td>
                     <td>{{  $row->tell}}</td>
                      <td>{{  $row->Username}}</td>
                       
                       

                  {{-- <td class="text-wrap text-left" style="width: 18rem;" > 
                    {{ Str::limit( $row->fish_appearance,150)}}
                 </td> --}}
                  <td>
           
       


                   <a href="{{--url('/fish/editfish/'.$row->fish_id)--}}" class="btn btn-warning bi bi-pencil-square"></a>
                    <a href="{{--route('Deletefish',$row->fish_id)--}}" 
                        
                        class="btn btn-danger bi bi-trash-fill"
                        onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่ ?')">
                        </a> 
                   
                  </td>
              </tr>
          @endforeach
      </table>
      {!! $Emp->links('pagination::bootstrap-5') !!}  


    </div>
  </div>
   

</main>
@endsection
