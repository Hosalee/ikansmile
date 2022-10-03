<style>
    .fixed-top {
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1030;
}
.navbar {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}
</style>
<nav class="  navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #5ddce8">
    <a class="navbar-brand ml-5" href="#"><b>Ikan Smile</b></a>  		
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- แถบด้านบน -->
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
        <div class="navbar-nav ml-auto">
            @if ($message = Session::get('user_name'))
            <label class="navbar-brand font-family " style="color: black"><i class="bi bi-person-circle "></i>   {{$message }}</label>
            @endif
           
            <a href="{{ route('logout') }}" class="nav-item nav-link mr-2 " style="color:rgb(75, 66, 66)"><i class="bi bi-door-open-fill"></i> Logout</a>
        </div>		
    </div>
    
</nav>


 
