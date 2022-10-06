@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.sidebar2')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">


<main class="col bg-faded py-4 flex-grow-1">
  <div class="mt-5"></div>
  <div class="container mt-5">
    <div class="row">
      
        <div class="col-lg-12   text-center">
            <h2>หน้า Home Hello Employee</h2>
        </div>

     
    </div>
  </div>
   

</main>
@endsection
