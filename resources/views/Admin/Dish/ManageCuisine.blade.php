@extends('Admin.master')
@section('title')

   Manage Menu

@endsection
@section('content')



<style>

div.dataTables_wrapper div.dataTables_length select {
  width: 60px;
 
}
#menu_font{
  font-family: poppins;
}


</style>

<!-- Bootstrap link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


            @if(Session::get('added_msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong> {{session::get('added_msg')}}</strong>
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

            @elseif(Session::get('error_msg'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong> {{session::get('error_msg')}}</strong>
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
                <h3 class="card-title" id="menu_font"><b> Manage Menu </b></h3>
                 <button  id="menu_font" type="button" class="btn btn-success btn-sm" style="float: right;" data-bs-toggle="modal" data-bs-target="#add" data-bs-whatever="@fat"> Add Menu  </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">

                    <!-- add categories modal -->
                   <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                           <h5 class="modal-title" id="add" style="font-family: poppins;"> Add New Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                         <form action="{{route('save_dish_data')}}" method="post" enctype="multipart/form-data">
                               @csrf

                             <div class="form-group ">
                                <label  id="menu_font">Menu Name</label>
                                <input type="text" class="form-control"  id="menu_font"
                                       name="dish_name"
                                       placeholder="Enter Menu Name" 
                                       pattern="[A-Za-z \s*]+$"
                                       oninvalid="this.setCustomValidity('Letters Only are Allowed')"
                                       oninput="this.setCustomValidity('')" 
                                       required>
                              </div>
                                  
                              <div class="form-group">
                                <label  id="menu_font"> Select Category </label>
                                  <select name="category_id" class="form-select"  id="menu_font" required>

                                    <option value="" hidden > ---Select Category---</option>
                                    @foreach($categories as $cate)
                                    <option value="{{$cate->category_id}}"  id="menu_font">
                                       {{$cate->category_name}}
                                    </option>
                                    @endforeach

                                  </select>
                              </div>

                              <div class="form-group">
                                <label id="menu_font"> Details</label>
                                  <textarea type="text" name="dish_detail" class="form-control" rows="5"  
                                            placeholder="Enter Details"
                                            id="menu_font" 
                                            required>                 
                                 </textarea>
                              </div>

                               <div class="form-group">
                                <label  id="menu_font"> Price :</label>     
                                  <input type="number" step="any" min="1" max="1000"  name="full_price"
                                         id="menu_font"
                                         style="border-right: none; border-left: none; border-top: none; outline: none;" 
                                         required>
                              </div>

                              <div class="form-group">
                                <label  id="menu_font"> Menu Image</label>
                                <input type="file" class="form-control" name="dish_image" accept="image/*" required>
                              </div>

                              <div class="form-group">
                                <label  id="menu_font"> Status</label>
                                <div class="radio">
                                  <input   type="radio" name="dish_status" value="1"   required style="font-family: poppins;"> Active
                                  <input   type="radio" name="dish_status" value="0"   required style="font-family: poppins;"> Inactive
                                </div>
                                
                              
                              </div>
               
                                <div class="modal-footer">
                                 <button  id="menu_font" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
                                 <button  id="menu_font" type="submit" name="btn" class="btn btn-primary"> Add Menu</button>
                                </div>
                                </form>
                             </div>
                      <!-- end of caategories modal -->

                  <thead>
                  <tr>

                    <th id="menu_font">SL</th>
                    <th id="menu_font">Name</th>
                    <th id="menu_font">Category</th>
                    <th id="menu_font">Dish Detail</th>
                    <th id="menu_font">Dish Image</th>
                    <th id="menu_font">Price</th>
                    <th id="menu_font">Status</th>
                    <th id="menu_font">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach($dishes  as $dish)
                  <tr>
                    <td id="menu_font">{{$i++}}</td>
                    <td id="menu_font">{{$dish->dish_name}}</td>
                    <td id="menu_font">{{$dish->category_name}}</td>
                    <td id="menu_font">{{$dish->dish_detail}}</td>
                    <td>
                         <img src="{{asset('BackEndSourceFile/dish_image/'.$dish->dish_image)}}" alt="Image" width="90" height="50" class="img-fluid img-thumbnail">
                    </td>
                    <td id="menu_font">{{$dish->full_price}}</td>
                    <td id="menu_font">
                      @if($dish -> dish_status == 1)

                          Active

                      @else

                          Inactive

                      @endif
                    </td>
                    <td> 
                             <!--  action -->
                          <div class="btn-group">
                              <button id="menu_font" type="button" class="btn btn-default btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                More
                              </button>
                              <ul class="dropdown-menu">
                                @if($dish->dish_status == 1)
                                   <li><a class="dropdown-item"  href="{{route('dish_Inactive',['id'=>$dish->id])}}" id="menu_font"><i class="fas fa-arrow-down"  title="click to Inactive"> </i> Click to Inactive</a></li>
                                @else
                                   <li><a class="dropdown-item"  href="{{route('dish_Active',['id'=>$dish->id])}}" id="menu_font"><i class="fas fa-arrow-up"  title="click to Active">  </i> Click to Active</a></li>
                                @endif
                                   <li><a class="dropdown-item" type=" button"  data-bs-toggle="modal" data-bs-target="#edit{{$dish->id}}" data-bs-whatever="@fat" id="menu_font"> <i class="fas fa-edit"  title="click to edit"></i> Edit</a></li>

                              </ul>
                            </div>                                                    
                      </td>
                   </tr>
 
                   <!-- modal -->
                    <div class="modal fade" id="edit{{$dish->id}}" tabindex="-1" aria-labelledby="edit{{$dish->id}}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="edit{{$dish->id}}" style="font-family: poppins;">Update Dish</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="{{route('update_dish')}}" method="post" enctype="multipart/form-data" >
                                 @csrf

                              <div class="form-group">

                                 <label id="menu_font">Menu Name</label>
                                 <input type="text" class="form-control" name="dish_name" value="{{$dish->dish_name}}"
                                        placeholder="Enter Menu Name" 
                                        pattern="[A-Za-z \s*]+$"
                                        oninvalid="this.setCustomValidity('Letters Only are Allowed')"
                                        oninput="this.setCustomValidity('')"
                                        id="menu_font"
                                        required>
                                    
                                 <input type="hidden" class="form-control"  name="id" value="{{$dish->id}}">
                                        
                                        
                            
                              </div>

                                <div>
                                   <label id="menu_font">Select Category</label>             
                                  <select id="menu_font" name="category_id" class="form-select" required>
                                    <option value="" hidden > ---Select Category---</option>
                                    @foreach($categories as $cate)
                                    <option id="menu_font" value="{{$cate->category_id}}"> {{$cate->category_name}}</option>
                                    @endforeach
                                   </select>

                               </div>

                               <div class="form-group">
                                  <label id="menu_font"> Detail</label>
                                  <textarea id="menu_font" type="text" name="dish_detail" class="form-control" required>{{$dish->dish_detail}}</textarea>
                              </div>

                              <div class="form-group">
                                <label id="menu_font"> Price</label>                
                                  <input type="number" step="any" min="1" max="1000" name="full_price" 
                                         placeholder="Enter Price"
                                         value="{{$dish->full_price}}"
                                         id="menu_font"
                                         style="border-right: none; border-left: none; border-top: none; outline: none;">
                              </div>

                              <div class="form-group">
                                  <label id="menu_font"> Previous Image</label>
                                 <img src="{{asset('BackEndSourceFile/dish_image/'.$dish->dish_image)}}" alt="Image" width="100x" height="100px" border-radius="50%">
                              </div>
                              
                              <div class="form-group">
                                   <label id="menu_font"> Menu Image</label>
                                   <input type="file" class="form-control" name="dish_image" accept="image/*">
                              </div>
                              <br>
                                <div class="modal-footer">
                                  <button  id="menu_font" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
                                  <button  id="menu_font" type="submit" class="btn btn-primary">Update</button>
                                </div>
                                </form>
                              </div>
                             
                       @endforeach
                
                  
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            
<!-- validation for character -->
<script>
  
  function letterOnly(input){

    var regex = /[^a-z]/gi;
    input.value = input.value.replace(regex,"");

  }

</script>

@endsection
