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
            <h2 >ข้อมูลสูตรอาหารปลา</h2>
        </div>
      
        <div class="pl-0">
        <a href="{{route('addRecipes')}}" class="btn btn-primary mt-1 "><i class="bi bi-plus-square-fill pl-0"></i> เพิ่มข้อมูลสูตรอาหารปลา</a>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-responsive-lg  mt-3 text-center">
          <tr class=" text-white  " style="background: hsl(184, 57%, 38%)">
              <th width="30 px">#</th>
              <th width="160 px">ชื่อสูตร</th>
              <th width="70 px">รายละเอียด</th>
              <th width="150 px">Action</th>
          </tr>
          
          @foreach($Recipes as $row)
          
          <tr style="background-color: #ffffff">
                 <td  style="width: 2rem;">{{$i++}}</td>
                  <td  style="width: 8rem;">{{ $row->Recipes_name }}</td>
                  <td style="width: 8rem;">{{ $row->explain }}</td>
                  
                  <td>
                    <a href="{{route('showRecipes',$row->Recipes_id)}}" class="btn btn-info  bi bi-eye"></a>
                   <a href="{{--url('/rawMaterial/editRawMaterial/'.$row->Raw_Material_id)--}}" class="btn btn-warning bi bi-pencil-square"></a>
                    <a href="{{--route('deleteRawMaterial',$row->Raw_Material_id)--}}" 
                        class="btn btn-danger bi bi-trash-fill"
                        onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่ ?')">
                        </a> 
                  </td>
              </tr>
              
          @endforeach 
      </table>
     {{-- {!! $RM->links('pagination::bootstrap-5') !!}  --}}


    </div>
  </div>
   

</main>
@endsection
