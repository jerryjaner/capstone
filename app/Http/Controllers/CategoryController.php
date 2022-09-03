<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
    	return view ('Admin.Category.AddCategory');
    }

     public function save (Request $Request)
     {

		$category = new Category();
    	$category -> category_name = $Request->category_name;
    	$category -> category_status = $Request->category_status;
    	$category->save();
    	return back()->with('added_msg','Category Added Successfully');

    	//return redirect(to:'/category/manage')->with('sms','Category Save');

    }		

 public function manage()
    {

    	$categories = Category::all();
    	return view('Admin.Category.ManageCategory', data: compact(var_name:'categories'));
    }

      public function active($category_id)
     {

    	$category = Category::find($category_id);
    	$category->category_status = 1;
    	$category->save();
    	return back()->with('status_msg','Status Updated Successfully');
    }
     public function Inactive($category_id)
     {

    	$category = Category::find($category_id);
    	$category ->category_status = 0;
    	$category->save();
    	return back()->with('status_msg','Status Updated Successfully');
    }

    public function delete($category_id)
     {

    	$category = Category::find($category_id);
    	$category->delete();
    	return back()->with('delete_msg', 'Category Deleted Successfully');
 
    }

     public function update(Request $request)
     {

    	$category = Category::find($request->category_id);
    	$category->category_name = $request->category_name;
    	$category->save();

    	return redirect(to:'/admin/category/manage')->with('update_msg','Category Updated Successfully');
 
    }

}
