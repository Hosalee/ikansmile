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

        <table class="table table-responsive-lg  mt-3 text-center ">
          <tr class=" text-white " style="background: hsl(184, 57%, 38%)">
              <th width="50 px">#</th>
              <th width="150 px">ชื่อปลา</th>
              <th width="100 px">ชื่อกระชัง</th>
              <th width="100 px">ชื่อผู้รับผิดชอบ</th>
              <th width="100 px">วันที่ลง</th>
              <th width="120 px">ขนาดปลาที่ลง(นิ้ว)</th>
              <th width="100 px" >จำนวนปลาที่ลง</th>
              {{-- <th  width="100 px">จำนวนปลาที่เหลือ</th>
              <th  width="100 px">จำนวนปลาที่ตาย</th> --}}
              <th  width="120 px">สถานะ</th>
              <th width="120 px">Action</th>
          </tr>
         @foreach($farming as $row)
         @if($row->status != 3 )
              <tr class="" style="background-color: #ffffff ">
             
                <td>{{$i++}}</td>
                  <td>{{ $row->name }}({{ $row->species }})</td>
                  <td>{{  $row->cage_name}}</td>
                  <td  >{{$row->emp_fristname}}{{$row->emp_lastname}}</td>
                  <td  >{{$row->date_import}}</td>
                  <td  >{{$row->fishSize}}</td>
                  <td  >{{$row->fish_quantity}}</td>
                 <td  >
                  @if($row->status == 0 )
                  <a class="btn btn-primary text-white">ปลาขนาดเล็ก</a>
                  @endif
                  @if($row->status == 1 )
                  <a class="btn  text-white" style="background: hsl(320, 67%, 53%)">ปลาขนาดกลาง </a>
                  @endif
                  @if($row->status == 2 )
                  <a class="btn  text-white px-3" style="background: hsl(152, 50%, 50%)">พร้อมจับขาย</a>
                  @endif
                </td>
                  <td  class="text-end">
                    <div class="">
                      <a href="{{route('farmingShow',$row->farming_id)}}" class="btn btn-primary bi bi bi-eye"></a>
                    <a href="{{--url('/fish/editfish/'.$row->farming_id)--}}" class="btn btn-warning bi bi-pencil-square"></a> 
                      <a href="{{route('farmingDelete',$row->farming_id)}}" 
                        class="btn btn-danger bi bi-trash-fill"
                        onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่ ?')">
                        </a> 
                   
                    </div><div class=" mt-2">
                      {{-- <a href="route('farmingCreate',$row->farming_id)" id="edit" class="btn btn-Secondary bi bi-hourglass-split"  data-bs-toggle="modal" data-bs-target="#editModal" ></a> --}}
                      <button type="button" value="{{$row->farming_id}}"  class="btn  addFishDead  bi bi-hourglass-split" style="background-color: #5aa8a8 ; color:#fbfeff"></button>
                      <button type="button" value="{{$row->farming_id}}"  class="btn  addFood  bi  bi-egg-fill" style="background-color: #323f3f ; color:#fbfeff"></button>
                      {{-- <a href="{{--url('/fish/editfish/'.$row->farming_id)}}" class="btn btn-Info bi-egg-fill"></a> --}}
                      @if($row->status != 2 )
                      <a href="{{route('updateStatus',$row->farming_id)}}" class="btn    bi-hand-index-fill " style="background-color: #1c779b ; color:#fbfeff"   onclick="return confirm('คุณต้องการอัพเดตสถานะการเลี้ยงหรือไม่ ?')"></a>
                      @endif
                      @if($row->status == 2 )
                       <button type="button"   value="{{$row->farming_id}}"
                        class="btn bi-dropbox addcatchFish " style="background-color: #5ec29a ; color:#fbfeff"
                        {{-- onclick="return confirm('โปรดยืนยันการจับปลาในการเลี้ยงนี้ ?')" --}}
                        >
                        </button> 
                    @endif
                    </div>
                   
              
                    
                  </td>
                  @endif
              </tr>
          @endforeach
      </table>
      {{-- {!! $farming->links('pagination::bootstrap-5') !!}  --}}
    


    </div>
  </div>





  {{--จับปลา --}}
  <div class="modal fade" id="addcatchFishModal" tabindex="-2" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background: hsl(184, 57%, 38%)">
                
                <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
  
            <div class="modal-body  ">
              <div class="col-12 text-center">
                <h4>เพิ่มข้อมูลการจับปลา</h4>
              </div>
              <form action="{{ route('CatchFishStore') }}" method="POST" >
                @csrf 
               
               
                <div class="form-group mb-3 mt-3">
                    <label for="" >จำนวนปลาทั้งหมด(กิโลกรัม)</label>
                    <input type="number"  name="quantity"   required  class="form-control">
                    @error('dead_number')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                <button type="submit" name="farming_id" id="catchFish"  class="btn btn-primary " onclick="return confirm('โปรดยืนยันการจับปลาในการเลี้ยงนี้ ?')">บันทึก</button>
            </div>
          </form>
        </div>
    </div>
  </div>






  {{--บันทึกข้อมูลการให้อาหาร --}}

  <div class="modal fade" id="addFoodModal" tabindex="-2" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">บันทึกการให้อาหารปลา</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
  
            <div class="modal-body">
              <form action="{{ route('fishFoodUpdate') }}" method="POST" >
                @csrf 
               
                <div class="form-group my-3 text-left">
                  <Label>สูตรอาหาร</Label>
                     <select class="custom-select my-1 mr-sm-2" aria-label="Default select example" name="Recipes_id"  required  placeholder="Enter subject"><option selected >โปรดระบุ</option>
                         @foreach($recipes as $row) <option  value="{{$row->Recipes_id}}">{{$row->Recipes_name}} @endforeach </option></select>
                   
                 </div>
                <div class="form-group mb-3">
                    <label for="" >จำนวน</label>
                    <input type="number"  name="amount"   required  class="form-control">
                    @error('dead_number')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                <button type="submit" name="farming_id" id="food_id"  class="btn btn-primary ">บันทึก</button>
            </div>
          </form>
        </div>
    </div>
  </div>
  {{----}}


{{-- บันทึกข้อมูลปลาตาย--}}

<div class="modal fade" id="addFishDeadModal" tabindex="-2" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">บันทึกข้อมูลปลาตาย</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">

             
            <form action="{{ route('fishDeadUpdate') }}" method="POST" >
              @csrf 
             
              <div class="form-group mb-3">
                  <label for="">จำนวนปลาที่ตาย</label>
                  <input type="number"  name="dead_number"  required="กรุณาระบุจำนวนปลาตาย"  class="form-control">
                  @error('dead_number')
              <div class="alert alert-danger mt-1">{{ $message }}</div>
              @enderror
              </div>
              
             
            
              
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="submit" name="farming_id" id="farming_id"  class="btn btn-primary ">บันทึก</button>
          </div>
        </form>
      </div>
  </div>
</div>

  
  
  
  <!-- add -->
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
             <Label>ข้อมูลกระชังที่ว่าง</Label>
                <select class="custom-select my-1 mr-sm-2" aria-label="Default select example" name="cage_id"  required placeholder="Enter subject"><option selected >โปรดระบุ</option>
                    @foreach($cage as $row) @if($row->status=='ว่าง') <option  value="{{$row->cage_id}}">{{$row->cage_name}} {{$s=$row->capicity}}@endif @endforeach </option></select>
              
            </div>
          </div>
          <div class="col-5">
            <div class="form-group my-3 text-left">
              <Label>พนักงานผู้รับผิดชอบ</Label>
              <select class="custom-select my-1 mr-sm-2" aria-label="Default select example" name="emp_id"  required placeholder="Enter subject"><option selected >โปรดระบุ</option>
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
                
                <td><div class="form-check"><input class="form-check-input" type="radio" value="{{$row->fish_id}}"  required name="fish_id" id="flexRadioDefault1"> </div></td>
              </tr>
              @endif
              @endforeach
            </table>
            {!! $fish->links('pagination::bootstrap-5') !!}
          </div>
          <div class="row text-start ">
            <div class="col-4"><label for="">ขนาดปลา</label>
              <input class="form-control " type="text" name="fishSize" id="flexRadioDefault1"  required placeholder="ระบุขนาดปลา"> </div>
            <div class="col-4">
              <label for="">จำนวนที่ต้องการ</label>
              <input class="form-control " type="number"  name="quantity" id="flexRadioDefault1"  required placeholder="ระบุจำนวนที่ต้องการ"> 
              @error('quantity')
              <div class="alert alert-danger mt-1">{{ $message }}</div>
          @enderror
            </div>
            <div class="col-4">
              <label for="">ความจุของกระชัง</label>
              <input class="form-control " type="number" value="{{$s}}"  name="quantity" id="flexRadioDefault1"  required placeholder="ระบุจำนวนที่ต้องการ"> 
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
    // $(document).on('click', '.editbtn', function (e) {
    //         e.preventDefault();
    //         var stud_id = $(this).val();
    //         // alert(stud_id);
    //         $('#editModal').modal('show');
    //         // $.ajax({
    //         //     type: "GET",
    //         //     url: "/edit-student/" + stud_id,
    //         //     success: function (response) {
    //         //         if (response.status == 404) {
    //         //             $('#success_message').addClass('alert alert-success');
    //         //             $('#success_message').text(response.message);
    //         //             $('#editModal').modal('hide');
    //         //         } else {
    //         //             // console.log(response.student.name);
    //         //             $('#name').val(response.student.name);
    //         //             $('#course').val(response.student.course);
    //         //             $('#email').val(response.student.email);
    //         //             $('#phone').val(response.student.phone);
    //         //             $('#stud_id').val(stud_id);
    //         //         }
    //         //     }
    //         // });
    //         $('.btn-close').find('input').val('');

    //     });

  $(".addFishDead").click(function (e) {
    e.preventDefault();
            var stud_id = $(this).val();
            console.log(stud_id);
            // alert(stud_id);
            $('#addFishDeadModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/farmingDead/" + stud_id,
                success: function (response) {
                        $('#farming_id').val(response.farming.farming_id);
                    } 
            });
  });
  $(".addFood").click(function (e) {
    e.preventDefault();
            var farming_id = $(this).val();
            console.log(farming_id);
            
            $('#addFoodModal').modal('show');
            $('#food_id').val(farming_id);
           
  });
  $(".addcatchFish").click(function (e) {
    e.preventDefault();
            var farming_id = $(this).val();
            console.log(farming_id);
            
            $('#addcatchFishModal').modal('show');
            $('#catchFish').val(farming_id);
           
  });
  
</script>
@endsection
