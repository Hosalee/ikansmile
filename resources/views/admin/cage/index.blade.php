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
              <th>#</th>
              <th>ชื่อ</th>
              <th>เจ้าของ</th>
              <th>ที่อยู่</th>
              <th>ขนาดและความจุ</th>
              <th>ละติจุด,ลองจิจุด</th>
              <th>สถานะ</th>
              <th width="auto px">Action</th>
          </tr>
         @foreach($Cage as $row)
              <tr>
                  <td>{{$Cage->firstItem()+$loop->index }}</td>
                  <td>{{ $row->cage_name }}</td>
                  <td>{{  $row->cage_owner }}</td>
                   <td>{{  $row->Address }}</td>
                    <td>{{  $row->size }} , {{  $row->capicity }}</td> 
                    <td>{{  $row->latitude }} , {{  $row->longitude }}</td>
                    @if ($row->status=='ว่าง')
                    <div class=""></div>
                      <td class=""> <div class="text-white btn btn-danger pl-4 pr-4 pt-2" >{{  $row->status }}</div></td>
                    @endif
                    @if ($row->status!='ว่าง')
                    <td class=""> <div class="text-white btn btn-success " >{{$row->status}}</div></td>
                    @endif
                    

                 
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
     {{-- {!! $companies->links('pagination::bootstrap-5') !!}  --}}


    </div>
  </div>
   

</main>
@endsection
