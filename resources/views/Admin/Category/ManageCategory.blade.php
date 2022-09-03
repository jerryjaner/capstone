@extends('Admin.master')
@section('title')

	 Manage Category

@endsection
@section('content')

<style>
  div.dataTables_wrapper div.dataTables_length select {
  width: 60px;
 
}
#userfont{
  font-family: poppins;
}
</style>
<!-- bootstrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


      <!-- for display mesage -->

            @if(Session::get('added_msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong> {{session::get('added_msg')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hiddden="true">&times;</span>
                  </button>
                </div>

            @elseif(Session::get('delete_msg'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong> {{session::get('delete_msg')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hiddden="true">&times;</span>
                  </button>
                </div>

            @elseif(Session::get('update_msg'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong> {{session::get('update_msg')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hiddden="true">&times;</span>
                  </button>
                </div>

            @elseif(Session::get('status_msg'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong> {{session::get('status_msg')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hiddden="true">&times;</span>
                  </button>
                </div>

            @endif  

          <div class="card my-5">
              <div class="card-header">
                <h3 class="card-title" id="userfont"><b>Manage Category</b></h3>
                 <button type="button" class="btn btn-success btn-sm" style="float: right;" data-bs-toggle="modal" data-bs-target="#add" data-bs-whatever="@fat" id="userfont"> Add Category  </button>
              </div>
              
        <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <!-- add categories modal -->
                   <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title"  id="add" style="font-family: poppins;">Add Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="{{route('cate_save')}}" method="post">
                               @csrf

                              <div class="form-group">
                                <label id="userfont"> Category Name</label>
                                <input type="text" class="form-control" id="userfont" 
                                       name="category_name"  
                                       placeholder="Enter Category Name" 
                                       pattern="[A-Za-z \s*]+$"
                                       oninvalid="this.setCustomValidity('Letters Only are Allowed')"
                                       oninput="this.setCustomValidity('')" 
                                       required>
                              </div>

                              <div class="form-group">
                                <label id="userfont" > Category Status</label>
                                <div class="radio">
                                  <input id="userfont"  type="radio" name="category_status" value="1" required> Active          
                                  <input id="userfont"  type="radio" name="category_status" value="0" required> Inactive
                                </div>
                               </div>
                               
                                   
                                <div class="modal-footer">
                                  <button id="userfont" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
                                  <button id="userfont"  type="submit" name="btn" class="btn btn-primary">Submit</button>
                                </div>
                          </form>
                       </div>
                      <!-- end of caategories modal -->

                      
                  <thead>
                    <tr>
                      <th  id="userfont">SL</th>
                      <th  id="userfont">Category Name</th>
                      <th  id="userfont">Status</th>
                      <th  id="userfont">Action</th>
                    </tr>
                  </thead>
                  <tbody>

             

                  	@php($i = 1)
                  	@foreach($categories  as $cate)

                  <tr>

                    <td  id="userfont">{{$i++}}</td>
                    <td  id="userfont">{{$cate->category_name}}</td>
                   
                    
                     <td  id="userfont">
                      @if($cate->category_status == 1)
                          Active
                      @else
                          Inactive
                      @endif    

                     </td>
                  
                    <td id="userfont">	
                      <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="userfont">
                          More
                        </button>
                       <ul class="dropdown-menu">

                         @if($cate->category_status == 1)
                          <li><a class="dropdown-item" href="{{route('Inactive_cate',['category_id'=>$cate->category_id])}}" id="userfont"><i class="fas fa-arrow-down "  title="click to Inactive"  ></i> Click to Inactive</li>
                         @else
                          <li><a class="dropdown-item" href="{{route('category_active',['category_id'=>$cate->category_id])}}" id="userfont"> <i class="fas fa-arrow-up"  title="click to Active"  ></i> Click to Active</li>     
                         @endif 
                          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit{{$cate->category_id}}" data-bs-whatever="@fat" id="userfont">
                            <i class="fas fa-edit"  title="click to Change it"  ></i> Edit Category</li>
                            
                          <li><a class="dropdown-item"  href="{{route('cate_delete',['category_id'=>$cate->category_id])}}"  id="userfont">
                            <i class="fas fa-trash"  title="click to Delete"></i> Delete Category </li>
                        </ul>
                      </div>  
                      
                    </td>
                   </tr>

                    <div class="modal fade" id="edit{{$cate->category_id}}" tabindex="-1" aria-labelledby="edit{{$cate->category_id}}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="edit{{$cate->category_id}}" style="font-family: poppins;">Update Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="{{route('cate_update')}}" method="post" >
                            
                                 @csrf

                              <div class="form-group">
                                 <label id="userfont" >Category Name</label>
                                 <input type="text" class="form-control" id="userfont" 
                                        name="category_name" 
                                        placeholder="Enter Category Name" 
                                        value="{{$cate->category_name}}"
                                        required>
                                 <input type="hidden" class="form-control"  name="category_id" value="{{$cate->category_id}}">
                              </div>
                              <div class="modal-footer">
                                <button id="userfont" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
                                <button type="submit" class="btn btn-primary" id="userfont" >Update</button>
                              </div>
                          </form>
                        </div>
                             



                  @endforeach

                 
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->



            </div>



                               
@endsection
