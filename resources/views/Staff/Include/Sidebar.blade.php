  @php

    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
    
  @endphp

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   
   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!--
       <a id="nicks" href="{{asset('/home')}}" class="brand-link">
     
       <h5 class="nicks"> Nick's <span>RESTO</span></h5> 
    
    </a>  -->
    
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <img src="{{asset('/BackEndSourceFile')}}/Nicks_logo/nickslogo.jpg" class="img-circle elevation-2" style="width: 100px; margin-left: 50px;" alt="User Image"> 
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item has-treeview ">
            <a href="{{route('staff_dashboard')}}" class="nav-link {{($route == 'staff_dashboard')?'active':''}} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Staff Dashboard
               
              </p>
            </a>
            
          </li>

       <!--   
         <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                  Users 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
      
              <li class="nav-item"> 
                <a href="" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Manage Users</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Manage Category</p>
                </a>
              </li>
            </ul>
          </li>

          

         <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                 Dish 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
           
          

              <li class="nav-item"> 
                <a href="" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Manage Dish</p>
                </a>
              </li>
            </ul>
          </li>
        -->
           <li class="nav-item has-treeview ">
            <a href="{{route('manage_customer_orders')}}" class="nav-link {{($route == 'manage_customer_orders')?'active':''}}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                   Customer Orders 
              </p>
            </a>
           <!--  <ul class="nav nav-treeview">
              <li class="nav-item"> 
                <a href="{{route('customer_order')}}" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Manage Orders</p>
                </a>
              </li>
            </ul> -->
          </li>

         <!-- 
           <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-shopping-cart "></i>
              <p>
                  Report 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
      
              <li class="nav-item"> 
                <a href="" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Client Report</p>
                </a>
              </li>
                <li class="nav-item"> 
                <a href="" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Sales Report</p>
                </a>
              </li>

            </ul>
          </li>
          -->

          
              
          </li>

        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>