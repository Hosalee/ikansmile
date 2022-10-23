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
                <h2>เพิ่มข้อมูลสูตรอาหารปลา</h2>
            </div>
           
           
            <form action="{{ route('storeRecipes') }}" method="POST" enctype="multipart/form-data" class=" p-5">
                @csrf
                <div class="row">
                    <div class="col-md-12">  
                         @if ($message = Session::get('Error'))
                        <div class="alert alert-success mt-2">
                         <p>{{ $message }}</p>
                        </div>
                        @endif</div>
                    <div class="col-md-4">
                     
                        <div class="form-group my-3">
                            <label>ชื่อสูตรอาหาร</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                            @error('name')
                                <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                   
                    
                    <div class="col-md-5">
                        <div class="form-group my-3">
                            <label>รายละเอียด</label>
                            <textarea  class="form-control" name="explain"  style="height: 100 px"   ></textarea> 
                            @error('explain')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <hr  style="height: 100 px">
                    <div class="col-md-12 mt-3 ml-1">
                       
                            <h4>รายละเอียดสูตรอาหาร</h4>
                     
                    </div>
                   
                    <div class="col-md-10  ">
                        
                        <table class="table table-responsive-lg text-center " id="dynamicAddRemove">
                          
                              <tr class=" text-white  " style="background: hsl(184, 57%, 38%)" >
                                <th width="30 px">#</th>
                                <th width="100 px">วัตถุดิบ</th>
                                  <th width="100 px">ปริมาณที่ต้องใช้ (กิโลกรัม,ลิตร)</th>
                                  <th width="100 px"><button type="button" name="add" id="dynamic-ar"  style="background: hsl(207, 96%, 11%) " class="btn text-white  px-3 bi bi-plus-square"> Add</button></th>
                              </tr>
                            </thead>
                              <tr>
                               
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
                          </table>
                    </div>
                   
                    
                    <div class="col-md-4 form-inline ml-3">
                        <div class="m-lg-2">
                            <button type="submit" class="mt-3 btn btn-success">Submit</button></div>
                        <div class="">
                            <a href="{{ route('Recipes') }}" class="btn btn-danger ml-4 mt-3 px-4 ">Back</a>
                        </div>
                    </div>

                  
                </div>
            </form>
        </div>
    </div>
       
     
  
  </main>
  <!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    
    $("#dynamic-ar").click(function () {
       
        $("#dynamicAddRemove").append(  '<tr><td>#</td><td><select class="custom-select my-1 mr-sm-2" aria-label="Default select example" name="RM_id[]" placeholder="Enter subject"><option >@foreach($RM as $row) <option  value="{{$row->Raw_Material_id}}">{{$row->Raw_Material_name}}</option>@endforeach </option></select></td>  <td><input type="text" name="Quantity[]" placeholder="ระบุจำนวน" class="form-control mt-1" /></td> <td><button type="button" class="btn btn-danger remove-input-field">Delete</button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>

  @endsection
  