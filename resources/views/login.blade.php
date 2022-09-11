@extends('layouts.master')

@section('content')



<main class="col bg-faded py-3 flex-grow-1 bg-info">
    <h3 class="text-center text-white pt-5  mt-5"></h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center  " >
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12 ">
                    <form id="login-form" class="form bg-light  pt-5 pl-5 pr-5 pb-5 rounded" width="250 px" action="" method="post">
                        @csrf
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                           
                        </div>
                        <div class="col-md-5" width="50px">
                          <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
   

</main>
@endsection