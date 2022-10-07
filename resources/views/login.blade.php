 @extends('layouts.master')
@section('content')
<main>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    width: 100vw;
    height: 100vh;
}

body {
   
    margin-top: 0 em;
    margin-left: 0em;
     padding: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-position: top;
    background-image: url(image/background.png);
    width: 100%;
    height: 100%;
    font-family: Arial, Helvetica, sans-serif;
    letter-spacing: 0.02em;
    font-weight: 400;
}

.blurred-box {
    position: relative;
    margin-top: -3em;
    margin-left: 15em;
    width: 400px;
    height: 500px;
    opacity: 0.9;
    top: calc(50% - 175px);
    left: calc(50% - 125px);
    background-color:rgb(255, 255, 255);
    border-radius: 1em;
    overflow: hidden;
}

.blurred-box:after {
    content: '';
    width: 300px;
    height: 300px;
    background: inherit;
    /* position: absolute; */
    left: -20px;
    right: 0;
    top: -25px;
    bottom: 0;
    box-shadow: inset 0 0 0 200px rgba(255, 255, 255, 0.05);
    
    filter: blur(10px);
}

.user-login-box {
    position: relative;
    margin-top: 50px;
    text-align: center;
    z-index: 1;
}

.user-login-box > * {
    display: inline-block;
    width: 300px;
}

.user-icon {
    margin-bottom: 1rem;
    width: 150px;
    height: 150px;
    position: relative;
    border-radius: 50%;
    background-size: contain;
    background-image: url(image/IkanSmile.png);
    /* background-repeat: no-repeat; */
}

.user-name {

    margin-top: 3em;
    text-align: center;
    margin-bottom: 20px;
    color: rgb(23, 23, 23);
}

input.user-username {
    margin-bottom: 2px !important;
}

input.user-username, input.user-password {
    display: block;
    width: 300px;
    height: 3rem;
    opacity: 1.0;
    border-radius: 2px;
    padding: 15px 15px;
    border:2px solid rgb(186, 186, 186);
    border-radius: 5px;
    margin-top: 1em;
    margin-left: 3rem;
    outline: none;
}
.check {
   
   width: 300px;
   
   opacity: 1.0;
   border-radius: 2px;
   padding: 15px 15px;
  
   margin-left: 2rem;
   outline: none;
  
}
.button {
    width: 300px;
    opacity: 1.0;
  
    padding: 5px 5px;
    margin-left: 2rem;
    
    
    outline: none;
   
}
.Login{
    width: 300px;
    opacity: 1.0;
    background-color:rgb(24, 79, 209);
    border:2px solid rgb(255, 255, 255);
    border-radius: 5px;
    padding: 5px 5px;
    color: rgb(255, 255, 255);
    outline: none;
   
}

</style>


  <div class="blurred-box">
    <form id="login-form" class="form" width="250 px" action="{{route('Checklogin')}}" method="post">
    @csrf
        <div class="user-login-box">
       
        <span class="user-icon"></span>
          @if ($message = Session::get('success'))
                         <div class="alert alert-danger mt-2">
                        <p>{{ $message }}</p>
                         </div>
             @endif
        <input type="text" class="user-username" name="username" id="username" placeholder="Username" >
        <input type="password" id="password" class="user-password" name="password" placeholder="Password" >
       
    </div>
            <div class="check">
                <input type="checkBox" onclick="showpassword()">
                <label for="checkbox" class="text-info">แสดงรหัสผ่าน</label>   
            </div>
    
    <div  class="button  "  >
        <button type="submit" class="Login"   name="btn_login">Login</button>
    </div>
    
    </form> 


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

