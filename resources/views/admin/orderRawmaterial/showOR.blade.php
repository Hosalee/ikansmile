@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">



<main class="col bg-faded py-4 flex-grow-1">
    <div class="row mt-5"></div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>รายละเอียดการสั่งซื้อ</h2>
            </div>
           
           
           
                <div class="row">
                    <div class="row "></div>
                    
                    <div class="col-5 ml-3 mt-4 ">
                            <strong>รหัสการสั่งซื้อ  :  </strong><label>  {{  $orderR[0]->or_id}}</label>
                    </div>
                    <div class="col-5 mt-4">
                        <strong>วันที่สั่ง    :  </strong><label>  {{ $orderR[0]->date}}</label>
                </div>
                    <div class="col-5 ml-3  mt-4">
                        <strong>ยอดรวม   :  </strong><label>  {{ $orderR[0]->total}}</label>
                </div>
            <div class="col-5 mt-4 mb-5">
                <strong>สถานะ   :  </strong><label>  {{ $orderR[0]->status}}</label>
        </div>
            </div>
                   
                    
                   
                    <hr  >
                    <div class="col-md-12 mt-3 ml-5 ">
                       
                            <h4>รายละเอียดการสั่งซื้อวัตถุดิบ</h4>
                     
                    </div>
                   
                    <div class="col-md-10 mt-2  ml-5">
                        
                        <table class="table table-responsive-lg text-center " id="dynamicAddRemove">
                          
                              <tr class=" text-white  " style="background: hsl(184, 57%, 38%)" >
                                <th width="30 px">#</th>
                                <th width="100 px">ชื่อวัตถุดิบ</th>
                                  <th width="100 px">ราคาต่อหน่วย</th>
                                  <th width="100 px">จำนวน</th>
                               
                                  
                              </tr>
                            </thead>
                        @foreach($orderRM_details as $row) 
                              <tr>
                               
                               
                               <td>{{$i++}}</td>
                               <td >{{$row->Raw_Material_name}} </td>
                               <td>{{$row->price }}</td>
                               <td>{{$row->quantity }}</td>
                                  
                                 
                              </tr>
                              @endforeach  
                          </table>
                          <div class="col-12 text-xl-end mt-2 text-decoration-underline">
                            <h5> ราคารวม : {{$orderR[0]->total}}</h5>
                          </div>
                    </div>
                   
                    
                    <div class="col-md-4 form-inline ml-3">
                        
                        <div class="">
                            <a href="{{ route('orderRawmaterial')}}" class="btn btn-danger ml-4 mt-3 px-4 ">Back</a>
                        </div>
                    </div>

                  
                </div>
         
        </div>
    </div>
       
     
  
  </main>
  <!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    
    // $("#dynamic-ar").click(function () {
       
    //     $("#dynamicAddRemove").append(  
    //         /*  */);
    // });
    // $(document).on('click', '.remove-input-field', function () {
    //     $(this).parents('tr').remove();
    // });
</script>
  @endsection
  