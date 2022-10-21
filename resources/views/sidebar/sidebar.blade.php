 <!-- Fonts -->
 <link rel="dns-prefetch" href="//fonts.gstatic.com">
 <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

 <!-- Scripts -->
 @vite(['resources/sass/app.scss', 'resources/js/app.js'])

 <!-- Link bootstrap -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
 <!-- Load an icon library -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

 <script src="https://kit.fontawesome.com/c701cf1e02.js" crossorigin="anonymous"></script>

 <style>

/* แต่ง Sidebar */
.sidenav {
margin-top: 3.5em;
height: 100%;
width: 230px;
position: fixed;
z-index: 1;
top: 0;
left: 0;
background-color: #3C8085;
overflow-x: hidden;
padding-top: 20px;
}

.sidenav a {
padding: 6px 6px 6px 32px;
text-decoration: none;
font-size: 25px;
color: #818181;
display: block;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
padding: 6px 8px 6px 16px;
text-decoration: none;
font-size: 18px;
display: block;
border: none;
background: none;
width: 100%;
text-align: left;
cursor: pointer;
outline: none;
color: white;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
color: white;
}

/* Main content */
.main {
margin-left: 250px; /* Same as the width of the sidenav */
font-size: 20px; /* Increased text to enable scrolling */
padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
background-color: #d32a2a;
color: white;

}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
display: none;
background-color: #5c5c5c;
color: #000000;
padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
float: right;
padding-right: 8px;
}

.sidenav a:hover {
color: #000000;
background-color: #ffffff;
}

@media screen and (max-height: 350px) {
.sidenav {padding-top: 15px;}
.sidenav a {font-size: 18px;}
}

.f-navbar {
         background-color: #3C8085;
         height: 4px;
         width: 100%;
     }

/* .container {
 margin-right: 0;
} */

</style>

    <aside class="col-12 col-md-2 p-0  flex-shrink-1 min-h-screen flex flex-col "style="background-color: #3C8085">
   
        
      <nav class="navbar navbar-expand navbar-dark  flex-md-column flex-row align-items-start py-2 ">
                 
        
          
          <div class="collapse navbar-collapse ">
              
              <ul class=" flex-md-column flex-row navbar-nav w-100 justify-content-between">
                <div id="mySidenav" class="sidenav">
                  {{-- <center><img src="{{asset('/img/TRAVELOCAL-GP.png')}}" id="logo" alt="" width="180" height="auto"></center><BR> --}}
                      <a class=" mt-1 mb-3  text-center " href="{{route('dashboard')}}"><b>Dashboard</b></a>  
                      <a href="{{route('fish')}}">ข้อมูลปลา</a>
                      <a href="{{route('cage')}}">ข้อมูลกระชัง</a>
                    <button class="dropdown-btn"><i class=""></i> ข้อมูลบุคคล
                    <i class="fa-sharp fa-solid fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                      <a href="{{route('employee')}}">ข้อมูลพนักงาน</a>
                      <a href="{{route('salary')}}">ข้อมูลค่าจ้างพนักงาน</a>
                      <a href="{{route('supplier')}}">ข้อมูลซัพพลายเออร์</a>
                      <a href="{{route('customer')}}">ข้อมูลลูกค้า</a>
                    </div>
                    <button class="dropdown-btn"><i class=""></i>ข้อมูลอาหาร
                    <i class="fa-sharp fa-solid fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                      <a href="{{route('Recipes')}}">ข้อมูลสูตรอาหาร</a>
                      <a href="{{route('rawMaterial')}}">ข้อมูลวัตถุดิบ</a>
                     
                    </div>
                    <button class="dropdown-btn"><i class=""></i>ข้อมูลการสั่งซื้อ
                    <i class="fa-sharp fa-solid fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                      <a href="{{route('orderfish')}}">ข้อมูลการสั่งซื้อปลา</a>
                      <a href="#">ข้อมูลการสั่งวัตถุดิบ</a>
                      
                    </div>
                    <button class="dropdown-btn"><i class=""></i>ข้อมูลการเลี้ยง
                      <i class="fa-sharp fa-solid fa-caret-down"></i>
                      </button>
                      <div class="dropdown-container">
                        <a href="{{route('farming')}}">ข้อมูลการเลี้ยงปลา</a>
                        <a href="#">ข้อมูลการจับปลา</a>
                        
                      </div>
                      <button class="dropdown-btn"><i class=""></i>ข้อมูลการขาย
                        <i class="fa-sharp fa-solid fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                          <a href="#">ข้อมูลการขายปลา</a>
                          <a href="#">ข้อมูลการชำระเงิน</a>
                          
                        </div>
                        <button class="dropdown-btn"><i class=""></i>ข้อมูลสต๊อก
                          <i class="fa-sharp fa-solid fa-caret-down"></i>
                          </button>
                          <div class="dropdown-container">
                            <a href="{{route('FishStock')}}">ข้อมูลสต๊อกลูกปลา</a>
                            <a href="#">ข้อมูลสต๊อกวัตถุดิบ</a>
                            <a href="#">ข้อมูลสต๊อกอาหารปลา</a>
                            
                          </div>
                    <a href="#">ข้อมูลการผลิตอาหารปลา</a>
                    <button class="dropdown-btn"><i class=""></i> ข้อมูลการเงิน 
                    <i class="fa-sharp fa-solid fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                     
                      <a href="#">ข้อมูลรายรับ</a>
                      <a href="#">ข้อมูลรายจ่าย</a>
                    </div>
                  </div>
          
      </nav>
  
  </aside>
  <script>
    // dropdown script
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
    
    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      });
    }
    </script>


 
  