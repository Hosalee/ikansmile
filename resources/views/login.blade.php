 @extends('layouts.master')
@section('content')

 <main class="col bg-faded py-3 flex-grow-1 bg-info">
    <h3 class="text-center text-white pt-5  mt-5"></h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center  " >
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12 ">
                    <form id="login-form" class="form bg-light  pt-5 pl-5 pr-5 pb-5 rounded" width="250 px" action="{{--route('login')--}}" method="post">
                        @csrf
                        <h3 class="text-center text-info">Login</h3>
                        @if ($message = Session::get('success'))
                         <div class="alert alert-success mt-2">
                        <p>{{ $message }}</p>
                         </div>
                          @endif
                        <div class="form-group ">
                            <label class="text-info">ประเภทเข้าใช้งาน</label>
                            <select class="form-select"  name="status" id="autoSizingSelect"   >
                              <option ></option>
                              <option value="Employee">พนักงาน</option>
                              <option  value="Admin">เจ้าของ</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                            @error('username')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                        <input type="checkBox" onclick="showpassword()">
                        <label for="checkbox" class="text-info">แสดงรหัสผ่าน</label>
                       
                        </div>
                       
                        
                        <div  class="form-group" width="100px">
                            <button type="submit" class="mt-3 btn btn-primary" name="btn_login">Login</button></div>
                        <div class="">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
   

</main> 

@endsection  
<script>function showpassword() {
    var password = document.getElementById('password');
    if (password.type == 'password') {
        password.type = 'text';
    } else if (password.type == 'text') {
        password.type = 'password';
    }
}</script>

