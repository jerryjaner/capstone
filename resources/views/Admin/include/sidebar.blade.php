  <script src="https://kit.fontawesome.com/ffc4ac712c.js" crossorigin="anonymous"></script>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
    
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <img src="{{asset('/BackEndSourceFile')}}/Nicks_logo/nickslogo.jpg" class="img-circle elevation-2" style="width: 100px; margin-left: 50px;" alt="User Image"> 
         <!-- <h4 style="color: white; margin-left: 20px;">  Nick's Resto Bar</h4> -->
        </div>
       
           <!-- <div class="info">
              <br>
              <br>
              <br>
              <br>
              <h2>
             <a href="#" id="info" class="d-block" style="text-decoration: none;">Nick's Resto Bar</a> </h2> 
            </div> 
          -->
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item has-treeview ">
            <a href="{{asset('/home')}}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                  Dashboard
              </p>
            </a>
            
          </li>


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
                <a href="{{route('manage_user')}}" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Manage Users</p>
                </a>
              </li>
              <!-- <li class="nav-item"> 
                <a href="{{route('manage_order')}}" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Orders</p>
                </a>
              </li> -->

            </ul>
          </li>


          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-utensil-spoon"></i>
              <p>
                 Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

             <!--  <li class="nav-item">
                <a href="{{route('show_cate_table')}}" class="nav-link">
                  <i class=" fa fa-plus-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li> -->

              <li class="nav-item">
                <a href="{{route('manage_cate')}}" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Manage Category</p>
                </a>
              </li>
            </ul>
          </li>

          

           <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-utensils"></i>
              <p>
                 Dish 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
           
            <!-- 
              <li class="nav-item">
                <a href="{{route('show_dish_table')}}" class="nav-link ">
                  <i class="fa fa-plus-circle nav-icon"></i>
                  <p>Generate Dish</p>
                </a>
              </li> -->

              <li class="nav-item"> 
                <a href="{{route('manage_dish_table')}}" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Manage Dish</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-shopping-cart "></i>
              <p>
                  Orders 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
      
              <li class="nav-item"> 
                <a href="{{route('show_order')}}" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Manage Orders</p>
                </a>
              </li>

            </ul>
          </li>
           <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-folder "></i>
              <p>
                  Report 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
      
              <li class="nav-item"> 
                <a href="{{route('client_report')}}" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>Client Report</p>
                </a>
              </li>
                <li class="nav-item"> 
                <a href="{{route('sales')}}" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>Sales Report</p>
                </a>
              </li>

            </ul>
          </li>
 
          </li>

        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>