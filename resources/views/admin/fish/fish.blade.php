@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">


<main class="col  py-4 flex-grow-1" style="background-color: #d3d4d5">
  <div class="container mt-5">
    <div class="row">
        <div class="col-lg-12   text-center ">
            <h2 >ข้อมูลปลา</h2>
        </div>
      
        <div class="pl-0">
        <a href="{{route('addfish')}}" class="btn btn-success mt-1 "><i class="bi bi-plus-square-fill pl-0"></i> เพิ่มข้อมูลปลา</a>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered  mt-3 text-center">
          <tr class="bg-info text-white  ">
              <th>#</th>
              <th>รูปปลา</th>
              <th>ชื่อปลา</th>
              <th>พันธ์ุปลา</th>
              <th>ลักษณะปลา</th>
              <th width="150 px">Action</th>
          </tr>
         @foreach($Fish as $row)
              <tr style="background-color: #f6fffc">
                 <td>{{$Fish->firstItem()+$loop->index }}</td>
                  <td><img src="{{asset($row->picture)}}" alt="" width="150px" height="100px"></td>
                  <td>{{ $row->name }}</td>
                  <td>{{  $row->species }}</td>
                  <td class="text-wrap text-left" style="width: 18rem;" > 
                    {{ Str::limit( $row->fish_appearance,150)}}
                 </td>
                  <td>
                 


                   <a href="{{url('/fish/editfish/'.$row->fish_id)}}" class="btn btn-warning bi bi-pencil-square"></a>
                    <a href="{{route('Deletefish',$row->fish_id)}}" 
                        
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
