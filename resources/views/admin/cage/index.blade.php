@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">


<main class="col bg-faded py-3 flex-grow-1">
  <div class="container mt-2">
    <div class="row">
        <div class="col-lg-12   text-center ">
            <h2 >ข้อมูลกระชัง</h2>
        </div>
      
        <div class="pl-0">
        <a href="{{ route('addCage') }}" class="btn btn-success mt-1 "><i class="bi bi-plus-square-fill pl-0"></i> เพิ่มข้อมูลกระชัง</a>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered  mt-3 text-center">
          <tr class="bg-dark text-white  ">
              <th>ID</th>
              <th>ชื่อ</th>
              <th>เจ้าของ</th>
              <th>ที่อยู่</th>
              <th>ขนาดและความจุ</th>
              <th>ละติจุด,ลองจิจุด</th>
              <th width="auto px">Action</th>
          </tr>
       {{--  @foreach($Fish as $row)
              <tr>
                  <td>{{ $row->fish_id }}</td>
                  <td><img src="{{asset($row->picture)}}" alt="" width="100px" height="100px"></td>
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
