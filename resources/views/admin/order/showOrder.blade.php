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
                            <strong>รหัสการสั่งซื้อ  :  </strong><label>  {{ $orderfish[0]->orders_id}}</label>
                    </div>
                    <div class="col-5 mt-4">
                        <strong>วันที่สั่ง    :  </strong><label>  {{$orderfish[0]->date}}</label>
                </div>
                    <div class="col-5 ml-3  mt-4">
                        <strong>ยอดรวม   :  </strong><label>  {{$orderfish[0]->total}}</label>
                </div>
            <div class="col-5 mt-4 mb-5">
                <strong>สถานะ   :  </strong><label>  {{$orderfish[0]->status}}</label>
        </div>
            </div>
                   
                    
                   
                    <hr  >
                    <div class="col-md-12 mt-3 ml-5 ">
                       
                            <h4>รายละเอียดสูตรอาหาร</h4>
                     
                    </div>
                   
                    <div class="col-md-10 mt-2  ml-5">
                        
                        <table class="table table-responsive-lg text-center " id="dynamicAddRemove">
                          
                              <tr class=" text-white  " style="background: hsl(184, 57%, 38%)" >
                                <th width="30 px">#</th>
                                <th width="100 px">ชื่อปลา</th>
                                  <th width="100 px">ขนาด</th>
                                  <th width="100 px">ราคาต่อหน่วย</th>
                                  <th width="100 px">จำนวน</th>
                                  <th width="100 px">ราคารวม</th>
                               
                                  
                              </tr>
                            </thead>
                          @foreach($orderfish_details as $row) 
                              <tr>
                               
                               
                               <td>{{$i++}}</td>
                               <td >{{$row->name}} {{$row->species}}</td>
                               <td>{{$row->size }}</td>
                               <td>{{$row->price }}</td>
                               <td>{{$row->quantity }}</td>
                               <td>{{($row->price*$row->quantity) }}</td>
                                  {{-- <td> --}}
                                    
                                  {{-- <select class="custom-select my-1 mr-sm-2" aria-label="Default select example" name="IVR_PID[]" placeholder="Enter subject">
                                      <option selected></option> --}}
                                      {{-- @foreach($product as $row) <option name="{{$row->IVR_PID}}" value="{{$row->IVR_PID}}">{{$row->IVR_PNAME_EN}}</option>@endforeach 
                                  </select>
                                  </td> --}}
                                  {{-- <td><input type="text" name="IVR_LOT_QUANTITY[]" placeholder="Enter subject" class="form-control" /></td>
                                    <td><input type="text" name="IVR_LOT_QUANTITY[]" placeholder="Enter subject" class="form-control" /> </td>  --}}
                                  {{-- <td><button type="button" name="add" id="dynamic-ar" class="btn btn-primary">Add Product</button></td>--}}
                                 
                              </tr>
                              @endforeach  
                          </table>
                          <div class="col-12 text-xl-end mt-2 text-decoration-underline">
                            <h5> ราคารวม : {{$orderfish[0]->total}}</h5>
                          </div>
                    </div>
                   
                    
                    <div class="col-md-4 form-inline ml-3">
                        
                        <div class="">
                            <a href="{{ route('orderfish') }}" class="btn btn-danger ml-4 mt-3 px-4 ">Back</a>
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
  