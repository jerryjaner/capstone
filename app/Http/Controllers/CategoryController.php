<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
    	return view (view:'Admin.Category.AddCategory');
    }

     public function save (Request $Request)
     {

		$category = new Category();
    	$category -> category_name = $Request->category_name;
    	
    	$category -> category_status = $Request->category_status;
    

    	$category->save();

    	return back()->with('sms','Category Save');

    	//return redirect(to:'/category/manage')->with('sms','Category Save');

    }		

 public function manage()
    {

    	$categories = Category::all();

    	return view(view:'Admin.Category.ManageCategory', data: compact(var_name:'categories'));
    }

      public function active($category_id)
     {

    	$category = Category::find($category_id);
    	$category->category_status = 1;
    	$category->save();

    	return back();
    }
     public function Inactive($category_id)
     {

    	$category = Category::find($category_id);
    	$category ->category_status = 0;
    	$category->save();

    	return back();
    }

    public function delete($category_id)
     {

    	$category = Category::find($category_id);
    	$category->delete();

    	return back();
 
    }

     public function update(Request $request)
     {

    	$category = Category::find($request->category_id);
    	$category->category_name = $request->category_name;
    

    	$category->save();

    	return redirect(to:'/admin/category/manage')->with('sms','Category Updated');
 
    }

}
