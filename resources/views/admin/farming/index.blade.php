@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">

<style>

  .add{
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

    
  }
</style>
<main class="col  py-4 flex-grow-1" style="background-color: #fbfeff">
  <div class="row mt-5"></div>
  <div class="container mt-3">
    <div class="row">
        <div class="col-lg-12   text-center ">
            <h2 >แสดงข้อมูลการเลี้ยง</h2>
            
        </div>
      
        <div class="pl-0">
          {{-- <button type="button" name="add" id="addpage"  style="background: hsl(207, 93%, 45%) " class="btn text-white  px-3 bi bi-plus-square">เพิ่มข้อมูล</button> --}}
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">เพิ่มข้อมูลการเลี้ยง</button>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-responsive-lg  mt-3 text-center">
          <tr class=" text-white  " style="background: hsl(184, 57%, 38%)">
              <th width="50 px">#</th>
              <th width="100 px">ชื่อปลา</th>
              <th width="100 px">ชื่อกระชัง</th>
              <th width="100 px">ชื่อผู้รับผิดชอบ</th>
              <th width="100 px">วันที่ลง</th>
              <th width="100 px">ขนาดปลาที่ลง(นิ้ว)</th>
              <th width="100 px" >จำนวนปลาที่ลง</th>
              {{-- <th  width="100 px">จำนวนปลาที่เหลือ</th>
              <th  width="100 px">จำนวนปลาที่ตาย</th> --}}
              <th  width="100 px">สถานะ</th>
              <th width="100 px">Action</th>
          </tr>
         @foreach($farming as $row)
              <tr style="background-color: #ffffff">
                <td>{{$i++}}</td>
                  <td>{{ $row->fish_id }}</td>
                  <td>{{  $row->cage_id }}</td>
                  <td  >{{$row->emp_id}}</td>
                  <td  >{{$row->date_import}}</td>
                  <td  >{{$row->fishSize}}</td>
                  <td  >{{$row->fish_quantity}}</td>
                 <td  >{{$row->status}}</td>
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
     {{-- {!! $Fish->links('pagination::bootstrap-5') !!}  --}}


    </div>
  </div>
  {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">เพิ่มข้อมูลการเลี้ยง</button> --}}
  
  <!-- Modal -->
  <div class="modal fade " id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header justify-center "style="background: hsl(184, 57%, 38%)" >
         
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-center"><h3  id="ModalLabel">แสดงข้อมูลปลา</h3></div>
         
        
          <form action="{{ route('farmingStore') }}"method="POST">
            @csrf 
          
          <div class="row">
            <div class="col-5">
              <div class="form-group my-3 text-left">
             <Label>กระชัง</Label>
                <select class="custom-select my-1 mr-sm-2" aria-label="Default select example" name="cage_id" placeholder="Enter subject"><option selected >โปรดระบุ</option>
                    @foreach($cage as $row) @if($row->status=='ว่าง') <option  value="{{$row->cage_id}}">{{$row->cage_name}}@endif @endforeach </option></select>
              
            </div>
          </div>
          <div class="col-5">
            <div class="form-group my-3 text-left">
              <Label>พนักงานผู้รับผิดชอบ</Label>
              <select class="custom-select my-1 mr-sm-2" aria-label="Default select example" name="emp_id" placeholder="Enter subject"><option selected >โปรดระบุ</option>
                  @foreach($Emp as $row) <option  value="{{$row->emp_id}}">{{$row->emp_fristname}} {{$row->emp_lastname}}@endforeach </option></select>
            
            </div>
          </div>
          <div class="">
            <table class="table table-responsive-lg text-center mt-1" style="background: hsl(191, 42%, 93%)">
              <tr class=" text-white " style="background: hsl(184, 57%, 38%)">
              
                <th  width="250 px">ชื่อปลา</th>
               
                <th width="150 px">จำนวนที่มี</th>
                
                <th  width="150 px">Action</th>
              </tr>
              @foreach($fish as $row)
              @if($row->quantity>0)
              <tr class=" text-black  ">
               
                <td class="text-left">{{$row->name}} {{$row->species}}</td>
                <td class="">{{$row->quantity}}</td>
                
                <td><div class="form-check"><input class="form-check-input" type="radio" value="{{$row->fish_id}}" name="fish_id" id="flexRadioDefault1"> </div></td>
              </tr>
              @endif
              @endforeach
            </table>
            {!! $fish->links('pagination::bootstrap-5') !!}
          </div>
          <div class="row text-start ">
            <div class="col-4"><label for="">ขนาดปลา</label>
              <input class="form-control " type="text" name="fishSize" id="flexRadioDefault1" placeholder="ระบุขนาดปลา"> </div>
            <div class="col-4">
              <label for="">จำนวนที่ต้องการ</label>
              <input class="form-control " type="number"  name="quantity" id="flexRadioDefault1" placeholder="ระบุจำนวนที่ต้องการ"> 
              @error('quantity')
              <div class="alert alert-danger mt-1">{{ $message }}</div>
          @enderror
            </div>
          </div>
          <div class="mt-3"></div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
          <button type="submit" class="btn btn-primary">บันทึก</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  

  {{-- <div class="container">
    <div class="add">
      <form action="{{ route('farmingStore') }}"method="POST">
        @csrf 
      <div class="add-content ">
        <div class="col-12">
          <div class="close "> <a  class="close" id="close"><i class=" bi bi-x-square-fill"></i></a></div>
          <H2>ข้อมูลปลาในสต็อก</H2>
        </div>
        
       
       
        <div class="row">
          <div class="col-3">
            <div class="form-group my-3 text-left">
           <Label>กระชัง</Label>
              <select class="custom-select my-1 mr-sm-2" aria-label="Default select example" name="cage_id" placeholder="Enter subject"><option selected >โปรดระบุ</option>
                  @foreach($cage as $row) @if($row->status=='ว่าง') <option  value="{{$row->cage_id}}">{{$row->cage_name}}@endif @endforeach </option></select>
            
          </div>
        </div>
        <div class="col-3">
          <div class="form-group my-3 text-left">
            <Label>พนักงานผู้รับผิดชอบ</Label>
            <select class="custom-select my-1 mr-sm-2" aria-label="Default select example" name="emp_id" placeholder="Enter subject"><option selected >ผู้รับผิดชอบ</option>
                @foreach($Emp as $row) <option  value="{{$row->emp_id}}">{{$row->emp_fristname}} {{$row->emp_lastname}}@endforeach </option></select>
          
        </div>
      </div>
        <table class="table table-responsive-lg text-center mt-1" style="background: hsl(191, 42%, 93%)">
          <tr class=" text-white " style="background: hsl(184, 57%, 38%)">
          
            <th  width="250 px">ชื่อปลา</th>
           
            <th width="150 px">จำนวนที่มี</th>
            
            <th  width="150 px">Action</th>
          </tr>
          @foreach($fish as $row)
          @if($row->quantity>0)
          <tr class=" text-black  ">
           
            <td class="text-left">{{$row->name}} {{$row->species}}</td>
            <td class="">{{$row->quantity}}</td>
            
            <td><div class="form-check"><input class="form-check-input" type="radio" value="{{$row->fish_id}}" name="fish_id" id="flexRadioDefault1"> </div></td>
          </tr>
          @endif
          @endforeach
        </table>
        {!! $fish->links('pagination::bootstrap-5') !!}
        <div class="row text-start ">
        <div class="col-4"><label for="">ขนาดปลา</label>
          <input class="form-control " type="text" name="fishSize" id="flexRadioDefault1" placeholder="ระบุขนาดปลา"> </div>
        <div class="col-4">
          <label for="">จำนวนที่ต้องการ</label>
          <input class="form-control " type="number"  name="quantity" id="flexRadioDefault1" placeholder="ระบุจำนวนที่ต้องการ"> 
          @error('quantity')
          <div class="alert alert-danger mt-1">{{ $message }}</div>
      @enderror
        </div>
      </div>
        <div class="row flex  ">
          <div class="col-12  text-end  ">
            <button type="submit" class="mt-3 btn btn-success px-3  ">ตกลง</button>
      
         
          </div>
       </div>
        </div>
      </div>
    </form>
    </div>
  </div> --}}
   

</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
{{-- <script>
  document.getElementById("addpage").addEventListener("click",function(){
    document.querySelector(".add").style.display ="flex";
  })
  document.querySelector(".close").addEventListener("click",function(){
    document.querySelector(".add").style.display ="none";
  })
  
</script> --}}
<script type="text/javascript">
    
  $("#addpage").click(function () {
   document.querySelector(".add").style.display ="flex";
  });
  $("#pageadd").click(function () {
   document.querySelector(".add").style.display ="flex";
  });
  $("#close").click(function () {
   document.querySelector(".add").style.display ="none";
  });
</script>
@endsection
