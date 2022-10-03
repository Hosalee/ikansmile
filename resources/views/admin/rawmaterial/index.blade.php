@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">


<main class="col bg-faded py-4 flex-grow-1">
  <div class="container mt-5">
    <div class="row">
        <div class="col-lg-12   text-center ">
            <h2 >ข้อมูลวัตถุดิบ</h2>
        </div>
      
        <div class="pl-0">
        <a href="{{route('addRawMaterial')}}" class="btn btn-success mt-1 "><i class="bi bi-plus-square-fill pl-0"></i> เพิ่มข้อมูลวัตถุดิบ</a>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered  mt-3 text-center">
          <tr class="bg-dark text-white  ">
              <th>#</th>
              <th>รูปวัตถุดิบ</th>
              <th>ชื่อวัตถุดิบ</th>
              <th>รายละเอียด</th>
              <th width="150 px">Action</th>
          </tr>
          @foreach($RM as $row)
              <tr>
                 <td  style="width: 2rem;">{{$RM->firstItem()+$loop->index }}</td>
                  <td  style="width: 8rem;"><img src="{{asset($row->picture)}}" alt="" width="150px" height="100px"></td>
                  <td style="width: 8rem;">{{ $row->Raw_Material_name }}</td>
                  <td class="text-wrap text-left" style="width: 18rem;" > 
                    {{ Str::limit( $row->details,350)}}
                 </td>
                  <td>
                   <a href="{{url('/rawMaterial/editRawMaterial/'.$row->Raw_Material_id)}}" class="btn btn-warning bi bi-pencil-square"></a>
                    <a href="{{route('deleteRawMaterial',$row->Raw_Material_id)}}" 
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
