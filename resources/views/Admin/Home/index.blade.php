@extends('Admin.master')
@section('title')

	Admin Dashboard

@endsection

@section('Dashboard') 
<section class="content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol> --}}
          </div><!-- /.col -->
        </div><!-- /.row -->
          <!-- user count -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3 class="dashboard">{{$admin}}</h3>
                  <p class="dashboard">Admin Registered</p>
                </div> 
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3 class="dashboard">{{$staff}}</h3>
                  <p class="dashboard">Staff Registered</p>
                </div> 
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3 class="dashboard">{{$customers}}</h3>
                  <p class="dashboard">Customers Registered</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3 class="dashboard">{{$newuser}}</h3>
                  <p class="dashboard">User Registered Today</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Orders count -->
           <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3 class="dashboard">{{$orders}}</h3>
                  <p class="dashboard">Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
               
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3 class="dashboard">{{$pending_orders}}</h3>
                  <p class="dashboard">Pending Orders</p>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3 class="dashboard">{{$cancelled_orders}}</h3>
                  <p class="dashboard">Cancelled Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3 class="dashboard">{{$OnProcess_orders}}</h3>
                  <p class="dashboard">On Process</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Menucount  -->
           <div class="row">
             <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3 class="dashboard">{{$out_orders}}</h3>
                  <p class="dashboard">Out For Delivery</p>
                </div> 
              </div>
            </div>

             <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3 class="dashboard">{{$delivered_orders}}</h3>
                  <p class="dashboard">Delivered</p>
                </div> 
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3 class="dashboard">{{$categories}}</h3>
                  <p class="dashboard">Categories</p>
                </div> 
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3 class="dashboard">{{$dishes}}</h3>
                  <p class="dashboard">Menu / Dish</p>
                </div> 
              </div>
            </div> 
      </div>
    </section>

@endsection