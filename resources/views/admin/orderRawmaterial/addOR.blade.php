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
                <h2>เพิ่มข้อมูลการสั่งวัตถุดิบ</h2>
            </div>
           
           
            <form action="{{route('storeOrderRawmaterial')}}" method="POST" enctype="multipart/form-data" class=" p-5">
                @csrf
                <div class="row">
                    <div class="col-md-12">  
                         @if ($message = Session::get('Error'))
                        <div class="alert alert-success mt-2">
                         <p>{{ $message }}</p>
                        </div>
                        @endif
                    
                    </div>
                    <div class="col-md-3">
                     
                        <div class="form-group my-3">
                            <label>ชื่อซัพพลายเออร์</label>
                            <select class="custom-select my-1 mr-sm-2" aria-label="Default select example" name="supplier_id" placeholder="Enter subject">
                                <option selected>โปรดระบุ</option>
                                @foreach($sp as $row) <option  value="{{$row->supplier_id}}">{{$row->name}}</option>@endforeach </select>
                            @error('supplier_id')
                                <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                   
                    
                    
                    <hr  style="height: 100 px">
                    <div class="col-md-12 mt-3 ml-1 text-center">
                       
                            <h4>รายการสั่งซื้อ</h4>
                     
                    </div>
                   
                    <div class="col-md-12 mt-3 ">
                        @error('Raw_Material_id')
                        <div class="alert alert-danger mt-1 ">{{ $message }}</div>
                    @enderror
                        
                        <table class="table table-responsive-lg text-center " id="dynamicAddRemove">
                          
                              <tr class=" text-white  " style="background: hsl(184, 57%, 38%)" >
                                <th width="30 px">#</th>
                                <th width="100 px">ชื่อวัตถุดิบ</th>
                                <th width="100 px">ราคาต่อหน่วย</th>
                                  <th width="100 px">จำนวน</th>
                                  <th width="100 px"><button type="button" name="add" id="dynamic-ar"  style="background: hsl(207, 96%, 11%) " class="btn text-white  px-3 bi bi-plus-square"> Add</button></th>
                              </tr>
                            </thead>
                              <tr>    
                              </tr>
                          </table>
                    </div>
                   
                    
                    <div class="col-md-4 form-inline ml-3">
                        <div class="m-lg-2">
                            <button type="submit" class="mt-3 btn btn-success">Submit</button></div>
                        <div class="">
                            <a href="{{route('orderRawmaterial')}}" class="btn btn-danger ml-4 mt-3 px-4 ">Back</a>
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
       
         $("#dynamicAddRemove").append(  '<tr><td></td><td><select class="custom-select my-1 mr-sm-2" aria-label="Default select example" name="Raw_Material_id[]" placeholder="Enter subject"><option selected >ระบุชื่อวัตถุดิบ</option > @foreach($RM as $row) <option  value="{{$row->Raw_Material_id}}">{{$row->Raw_Material_name}})</option> @endforeach</select></td>  <td><input type="number" name="price[]" placeholder="ระบุราคาต่อหน่วย" class="form-control mt-1" /></td>   <td><input type="number" name="quantity[]" placeholder="ระบุจำนวน" class="form-control mt-1" /></td> <td><button type="button" class="btn btn-danger remove-input-field">Delete</button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
  @endsection
  