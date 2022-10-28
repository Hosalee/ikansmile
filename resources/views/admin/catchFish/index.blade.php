@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">

<style>

  /* .add{
    background: #353a3a;
    margin-left: -1.5rem;
    width: 100%;
    height:100%;
    position: absolute;
    top: 0;
    opacity: 0.98;
    display:none ;
    justify-content: center;
    align-items: center;

  }
  .add-content{
    text-align: center;
    margin-top: 4rem;
    height: 650px;
    max-height: 650px;
    width: 850px;
    background: #fbfeff;
    opacity: 1.0;
    padding: 40px;
    border-radius: 5px;
    position: relative;

  }
  .close{
    color: rgb(157, 5, 5);
    cursor: pointer;

    
  } */
</style>
<main class="col  py-4 flex-grow-1" style="background-color: #fbfeff">
  <div class="row mt-5"></div>
  <div class="container mt-3">
    <div class="row">
        <div class="col-lg-12   text-center ">
            <h2 >แสดงข้อมูลการจับปลา</h2>
            
        </div>
      
        <div class="pl-0">
          <a href="{{route('farming')}}" class="btn btn-danger">กลับไปยังการเลี้ยง</a>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif
       

        <table class="table table-responsive-lg  mt-3 text-center ">
          <tr class=" text-white " style="background: hsl(184, 57%, 38%)">
              <th width="50 px">#</th>
              <th width="100 px">รหัสการจับปลา</th>
              <th width="100 px">ปลา</th>
              <th width="100 px">กระชัง</th>
              <th width="100 px">วันที่จับ</th>
              <th width="100 px">จำนวน(กิโลกรัม)</th>
              <th width="100 px">Action</th>
          </tr>
          @foreach($catchFish as $row) 
         
              <tr class="" style="background-color: #ffffff ">
                <td>{{$catchFish->firstItem()+$loop->index }}</td>
                <td>{{$row->catchFish_id}}</td>
                <td>{{$row->name}} ({{$row->species}})</td>
                <td>{{$row->cage_name}} </td>
                <td>{{$row->catchfish_date}}</td>
                <td>{{$row->catchfish_quantity}}</td>
                  <td  class="text-center ">
                    <div class="">
                    {{-- <a href="" class="btn btn-warning bi bi-pencil-square"></a>  --}}
                      <a href=""  class="btn btn-danger bi bi-trash-fill"onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่ ?')"></a> 
                    </div>
                  </td>
               
              </tr>
           @endforeach 
      </table>
      
    


    </div>
  </div>






  
  
  
   

</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
