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
              <p class="sidebarfont">
                  Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="{{route('manage_user')}}" class="nav-link ">
               <i class="nav-icon fas fa-users"></i>
              <p class="sidebarfont">
                  Users
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="{{route('manage_cate')}}" class="nav-link ">
                <i class="nav-icon fas fa-utensil-spoon"></i>
              <p class="sidebarfont">
                  Category
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="{{route('manage_dish_table')}}" class="nav-link ">
              <i class="nav-icon fas fa-utensils"></i>
              <p class="sidebarfont">
                  Menu
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="{{route('show_order')}}" class="nav-link ">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p class="sidebarfont">
                  Orders
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="{{route('client_report')}}" class="nav-link ">
              <i class="nav-icon fas fa-folder"></i>
              <p class="sidebarfont">
                  Report of Customers
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview ">
            <a href="{{route('monthly')}}" class="nav-link ">
              <i class="nav-icon fas fa-folder"></i>
              <p class="sidebarfont">
                  Monthly Report
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>