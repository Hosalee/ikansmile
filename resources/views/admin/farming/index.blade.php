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
    opacity: 0.95;
    display: flex;
    justify-content: center;
    align-items: center;

  }
  .add-content{
    text-align: center;
    margin-top: 4rem;
    height: 600px;
    max-height: 600px;
    width: 850px;
    background: #fbfeff;
    opacity: 1.0;
    padding: 40px;
    border-radius: 5px;
    position: relative;

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
        <a href="{{--route('addfish')--}}" class="btn btn-primary mt-1 "><i class="bi bi-plus-square-fill pl-0 "></i> เพิ่มการเลี้ยง</a>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-responsive-lg  mt-3 text-center">
          <tr class=" text-white  " style="background: hsl(184, 57%, 38%)">
              <th width="50 px">#</th>
              <th width="100 px">ชื่อปลา</th>
              <th width="100 px">วันที่ลง</th>
              <th width="100 px">ขนาดปลาที่ลง</th>
              <th width="100 px" >จำนวนปลาที่ลง</th>
              <th  width="100 px">จำนวนปลาที่เหลือ</th>
              <th  width="100 px">จำนวนปลาที่ตาย</th>
              <th  width="100 px">สถานะ</th>
              <th width="100 px">Action</th>
          </tr>
         {{-- @foreach($Fish as $row)
              <tr style="background-color: #ffffff">
                 <td>{{$Fish->firstItem()+$loop->index }}</td>
                  <td><img src="{{asset($row->picture)}}" alt="" width="150px" height="100px"></td>
                  <td>{{ $row->name }}</td>
                  <td>{{  $row->species }}</td>
                  <td class="text-wrap text-left" style="width: 18rem;" > 
                    {{ Str::limit( $row->fish_appearance,150)}}
                 </td>
                 <td  width="50 px">{{$row->quantity}}</td>
                  <td>
                   <a href="{{url('/fish/editfish/'.$row->fish_id)}}" class="btn btn-warning bi bi-pencil-square"></a>
                    <a href="{{route('Deletefish',$row->fish_id)}}" 
                        
                        class="btn btn-danger bi bi-trash-fill"
                        onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่ ?')">
                        </a> 
                   
                  </td>
              </tr>
          @endforeach --}}
      </table>
     {{-- {!! $Fish->links('pagination::bootstrap-5') !!}  --}}


    </div>
  </div>
   <form>

  <div class="container">
    <div class="add">
      <div class="add-content ">
        <div class="col-12">
          <div class="text-end "> <a href="{{--url('/fish/editfish/'.$row->fish_id)--}}" class="btn btn-danger bi bi-x-square-fill"></a></div>
          <H2>ข้อมูลปลาในสต็อก</H2>
        </div>
       
       
       
        <div class="row">
          <div class="col-3">
            <div class="form-group my-3 text-left">
           
              <select class="custom-select my-1 mr-sm-2" aria-label="Default select example" name="supplier_id" placeholder="Enter subject"><option selected >โปรดระบุกระชัง</option>
                  @foreach($cage as $row) <option  value="{{$row->cage_id}}">{{$row->cage_name}}@endforeach </option></select>
            
          </div>
        </div>
        <table class="table table-responsive-lg text-center mt-1" style="background: hsl(191, 42%, 93%)">
          <tr class=" text-white " style="background: hsl(184, 57%, 38%)">
            <th  width="250 px">ชื่อปลา</th>
            <th width="150 px">ขนาด</th>
            <th width="150 px">จำนวนที่มี</th>
            
            <th  width="150 px">Action</th>
          </tr>
          @foreach($fish as $row)
          @if($row->quantity>0)
          <tr class=" text-black  ">
            <td class="text-left">{{$row->name}} {{$row->species}}</td>
            <td class="text-left " ><input class="form-control" type="number" ></td>
            <td class="">{{$row->quantity}}</td>
            
            <td><div class="form-check"><input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> </div></td>
          </tr>
          @endif
          @endforeach
        </table>
        {!! $fish->links('pagination::bootstrap-5') !!} 
        
        <div class="row flex ">
          <div class="col-12  text-end  ">
            <button type="submit" class="mt-3 btn btn-success  ">Submit</button>
      
            <button type="submit" class="mt-3 btn btn-danger ">ย้อนกลับ</button>
          </div>
       </div>
        </div>
      </div>
    </div>
  </div>
   </form>

</main>
@endsection
