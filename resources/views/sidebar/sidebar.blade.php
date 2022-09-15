
    <aside class="col-12 col-md-2 p-0 bg-dark flex-shrink-1 min-h-screen flex flex-col">
   
        
        <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2 ">
                   
          
            
            <div class="collapse navbar-collapse ">
                
                <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                    <li class="nav-item  mt-1  ">
                        <a class="nav-link pl-0 text-nowrap bi bi-house-door-fill " href="{{route('dashboard')}}"><span class="font-weight-bold">Dashboard</span></a>
                        <hr class="bg-light">
                    </li>
                    <li class="nav-item mt-1 ">
                        <a class="nav-link pl-0" href="{{route('fish')}}"> <i class="bi bi-cart-fill"></i> <span class="d-none d-md-inline">ข้อมูลปลา</span></a>
                     
                      </li>

                   

                    <li class="nav-item mt-1 ">
                        <a class="nav-link pl-0  " href="{{route('cage')}}"><i class="bi bi-border-outer"></i> <span class="d-none d-md-inline"> ข้อมูลกระชัง</span></a>
                    </li>
                   
                    <li class="nav-item dropdown mt-1   ">
                        <a class="nav-link dropdown-toggle pl-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                          <i class="bi bi-person-square"></i>
                          <span class="d-none d-md-inline"> ข้อมูลบุคคล</span></a>
                        
                        
                        <ul class="dropdown-menu dropdown-menu-dark">
                          <li><a class="dropdown-item bg-light text-dark bi bi-person " href="{{route('employee')}}">ข้อมูลพนักงาน</a></li>
                          <li><a class="dropdown-item bg-light text-dark bi bi-person" href="2">ข้อมูลค่าจ้างพนักงาน</a></li>
                          <li><a class="dropdown-item bg-light text-dark bi bi-person" href="{{route('supplier')}}">ข้อมูลซัพพลายเออร์</a></li>
                          <li><a class="dropdown-item bg-light text-dark bi bi-person" href="{{route('customer')}}">ข้อมูลลูกค้า</a> </li>
                        </ul>
                      </li>
                      <ul class="navbar-nav mt-1">
                        <li class="nav-item dropdown ">
                          <a class="nav-link dropdown-toggle  pl-0 bi bi-cart-fill" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          ข้อมูลอาหารปลา
                          </a>
                          <ul class="dropdown-menu dropdown-menu-dark ">
                            <li><a class="dropdown-item bg-light text-dark bi bi-cart-fill" href="#">ข้อมูลสูตรอาหาร</a></li>
                            <li><a class="dropdown-item bg-light text-dark bi bi-cart-fill" href="{{route('rawMaterial')}}">ข้อมูลวัตถุดิบ</a></li>
                          </ul>
                        </li>
                      </ul>
                      
                     
                        <ul class="navbar-nav mt-1">
                          <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle  pl-0 bi bi-cart-fill" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ข้อมูลการสั่งซื้อ
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark ">
                              <li><a class="dropdown-item bg-light text-dark bi bi-cart-fill" href="#">ข้อมูลสั่งซื้อวัตถุดิบ</a></li>
                              <li><a class="dropdown-item bg-light text-dark bi bi-cart-fill" href="#">ข้อมูลสั่งซื้อลูกปลา</a></li>
                            </ul>
                          </li>
                        </ul>
                       
                  
                        <ul class="navbar-nav mt-1">
                          <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle  pl-0  bi bi-tsunami" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ข้อมูลการเลี้ยง
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark ">
                              <li><a class="dropdown-item bg-light text-dark bi bi-cart-fill" href="#">ข้อมูลการเลี้ยงปลา</a></li>
                              <li><a class="dropdown-item bg-light text-dark bi bi-cart-fill" href="#">ข้อมูลการจับปลา</a></li>
                            </ul>
                          </li>
                        </ul>
                        
                        <ul class="navbar-nav mt-1 ">
                            <li class="nav-item dropdown ">
                              <a class="nav-link dropdown-toggle bi bi-archive-fill pl-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> ข้อมูลการขาย </a>
                              <ul class="dropdown-menu dropdown-menu-dark bg-light">
                                <li><a class="dropdown-item bg-light text-dark bi bi-archive-fill" href="#">ข้อมูลการขายปลา</a></li>
                                <li><a class="dropdown-item bg-light text-dark bi bi-cash" href="#">ข้อมูลการชำระเงิน</a></li>
                              </ul>
                            </li>
                          </ul>
                          <ul class="navbar-nav mt-1 ">
                            <li class="nav-item dropdown ">
                              <a class="nav-link dropdown-toggle bi bi-box pl-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> ข้อมูลสต็อกสินค้า </a>
                              <ul class="dropdown-menu dropdown-menu-dark bg-light">
                                <li><a class="dropdown-item bg-light text-dark bi bi-box" href="#">ข้อมูลสต็อกวัตถุดิบ</a></li>
                                <li><a class="dropdown-item bg-light text-dark bi bi-box" href="#">ข้อมูลสต็อกอาหารปลา</a></li>
                              </ul>
                            </li>
                         </ul>
    
                         
                            
                        <li class="nav-item mt-1">
                            <a class="nav-link pl-0 bi bi-ubuntu  " href=""> <span class="d-none d-md-inline">ข้อมูลการผลิตอาหารปลา</span></a>
                        </li> 
                          
                        <ul class="navbar-nav mt-1 ">
                            <li class="nav-item dropdown ">
                              <a class="nav-link dropdown-toggle bi bi-bank pl-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> ข้อมูลการเงิน </a>
                              <ul class="dropdown-menu dropdown-menu-dark bg-light">
                                <li><a class="dropdown-item bg-light text-dark bi bi-bank" href="#">ข้อมูลรายรับ</a></li>
                                <li><a class="dropdown-item bg-light text-dark bi bi-bank" href="#">ข้อมูลรายจ่าย</a></li>
                              </ul>
                            </li>
                          </ul>
                </ul>
            </div>
            
        </nav>
    
    </aside>
    
    