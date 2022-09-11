@extends('layouts.master')
@include('navbar.header')
@section('content')
@include('sidebar.dashboard')
<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">

<main class="col bg-faded py-3 flex-grow-1">
    <h3>Home / Page / New</h3>
    <br>
   

</main>
@endsection
