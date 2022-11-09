@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">


<main class="col bg-faded py-4 flex-grow-1">
  <div class="row mt-5"></div>
  <div class="container mt-3">
    <div class="row">
        <div class="col-lg-12   text-center ">
            <h2 >ข้อมูลการผลิตอาหารปลา</h2>
        </div>
      
        <div class="pl-0">
        
        <button type="button" class="btn btn-primary bi-plus-square-fill mt-1" data-bs-toggle="modal" data-bs-target="#Modal"> เพิ่มข้อมูลการผลิตอาหารปลา</button>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-responsive-lg  mt-3 text-center">
          <tr class=" text-white  " style="background: hsl(184, 57%, 38%)">
              <th width="30 px">#</th>
              <th width="160 px">รหัสการผลิต</th>
              <th width="70 px">วันที่ผลิต</th>
              <th width="150 px">สูตรอาหาร</th>
              <th width="150 px">สถานะการผลิต</th>
              <th width="150 px">Action</th>
          </tr>
          @foreach($production as $row)
          <tr style="background-color: #ffffff">
                 <td  style="width: 2rem;">{{$i++}}</td>
                  <td  style="width: 2rem;">{{$row->P_id}}</td>
                  <td style="width: 2rem;">{{$row->P_date }}</td>
                  <td style="width: 2rem;">{{$row->Recipes_id}}</td>
                  @if($row->P_status == 0 )
                  <td style="width: 2rem;"><a class="btn btn-warning">กำลังผลิต</a></td>
                  @endif
                  @if($row->P_status != 0 )
                  <td style="width: 2rem;"><a class="btn btn-success text-white ">เสร็จสิ้น</a></td>
                  @endif
               
                  <td>
                    @if($row->P_status == 0 )
                   <a  href="{{route('P_UpdateStatus',$row->P_id)}}" class="btn btn-warning bi bi-hand-index-fill   " style="background-color: #1c779b ; color:#fbfeff"     onclick="return confirm('คุณต้องการอัพเดตสถานะการผลิตอาหารปลานี้หรือไม่ ?')" ></a>
                   @endif
                   <a href="{{route('P_Delete',$row->P_id)}}" class="btn btn-danger bi bi-trash-fill"
                        onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่ ?')">
                        </a> 

                        @if($row->P_status == 1 )
                        <button type="button"   value="{{$row->P_id}}"
                         class="btn bi-dropbox addStockRecipes " style="background-color: #5ec29a ; color:#fbfeff" data-bs-toggle="modal" data-bs-target="#exampleModal">
                         </button> 
                     @endif



                  </td>
              </tr>
          @endforeach 
      </table>
     {{-- {!! $RM->links('pagination::bootstrap-5') !!}  --}}


    </div>
  </div>
  {{--addStock--}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มไปยังสต๊อกอาหารปลา</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('stockProduction')}}" method="post">
                        @csrf 
                        <label for="">จำนวนอาหารปลาที่ผลิตได้</label>
                        <input type="number" name="amount" class="form-control">
                   
                </div>
            </div>
         </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dan" data-bs-dismiss="modal">ปิด</button>
          <button type="submit" id="P_id" name="P_id" class="btn btn-primary">บันทึก</button>
        </div>
    </form>
      </div>
    </div>
  </div>


  {{--add--}}
  <div class="modal fade " id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header justify-center "style="background: hsl(184, 57%, 38%)" >
         
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-centered">
          <div class="text-center"><h3  id="ModalLabel">เพิ่มข้อมูลการผลิตอาหารปลา</h3></div>
         
        
          <form action="{{ route('storeProduction') }}"method="POST">
            @csrf 
          
          <div class="row">
            <div class="col-5">
                <div class="form-group my-3 text-left">
                  <Label>สูตรอาหาร</Label>
                  <select class="custom-select my-1 mr-sm-2" aria-label="Default select example" name="Recipes_id"  required placeholder="Enter subject"><option selected >โปรดระบุ</option>
                      @foreach($recipes as $row) <option  value="{{$row->Recipes_id}}">{{$row->Recipes_name}} @endforeach </option></select>
                
                </div>
              </div>
           
          <div class="col-5">
            <div class="form-group my-3 text-left">
              <Label>พนักงานผู้รับผิดชอบ</Label>
              <select class="custom-select my-1 mr-sm-2" aria-label="Default select example" name="emp_id"  required placeholder="Enter subject"><option selected >โปรดระบุ</option>
                  @foreach($Emp as $row) <option  value="{{$row->emp_id}}">{{$row->emp_fristname}} {{$row->emp_lastname}} @endforeach </option></select>
            
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


<script type="text/javascript">
 $(".addStockRecipes").click(function (e) {
    e.preventDefault();
            var P_id = $(this).val();
            console.log(P_id);
            
            //  $('#addcatchFishModal').modal('show');
             $('#P_id').val(P_id);
           
  });
</script>
@endsection
