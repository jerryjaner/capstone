<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\category;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DishController extends Controller
{
    public function index(){

    	$categories = Category::where('category_status',1) -> get();
    	return view(view:'Admin.Dish.AddCuisine', data: compact(var_name:'categories'));
    }

    public function save_dish(Request $request)
    {
    	
    	
    	$dish = new Dish();
    	$dish -> dish_name =   $request -> dish_name;
    	$dish -> category_id = $request -> category_id;
    	$dish -> dish_detail = $request -> dish_detail;
    	$dish -> dish_status = $request -> dish_status;
  
        $dish -> full_price = $request -> full_price;
    
       // $dish -> half_price = $request -> half_price;
        

    	if($request -> hasfile('dish_image'))
    	{
    		$file = $request ->file('dish_image');
    		$extention = $file->getClientOriginalExtension();
    		$filename = time ().'.'.$extention;
    		$file->move('BackEndSourceFile/dish_image/',$filename);

    		$dish->dish_image =$filename;
    	}
    	 $dish -> save();

    	 return back()->with('sms','Menu Added Successfully');
    //	return redirect(to:'/dish/manage')-> with('sms', 'Data Saved');

    }

    public function manage_dish()
    {
    	
    	$categories = Category::where('category_status',1) -> get();
    	
    	

    	$dishes = DB::table('dishes')
    		      ->join('categories','dishes.category_id', '=','categories.category_id')
    		      ->select('dishes.*','categories.category_name')
    		      ->get();


    	return view('Admin.Dish.ManageCuisine',compact('categories','dishes'));
    	
    }
     public function inactive_dish($id)
     {

    	$dish = Dish::find($id);
    	$dish -> dish_status = 0;
    	$dish -> save();

    	return back();
    }

    public function active_dish($id)
     {

    	$dish = Dish::find($id);
    	$dish -> dish_status = 1;
    	$dish -> save();

    	return back();
    }
    public function delete_dish($id)
     {

    	$dish = Dish::find($id);
    	$dish -> delete();

    	return back();
 
    }
     public function dish_update(Request $request)
     {

     	

        $dish = Dish::find($request -> id);

    	$dish -> dish_name =   $request -> dish_name;
    	$dish -> category_id = $request -> category_id;
    	$dish -> dish_detail = $request -> dish_detail;
      
        $dish -> full_price = $request -> full_price;
   
      //  $dish -> half_price = $request -> half_price;



    // for the image of the dish //


    	if($request -> hasfile('dish_image'))
    	{
    		$destination = 'BackEndSourceFile/dish_image/'.$dish ->dish_image;

    		if(File::exists($destination))
    		{
    			File::delete($destination);
    		}
    		$file = $request ->file('dish_image');
    		$extention = $file->getClientOriginalExtension();
    		$filename = time ().'.'.$extention;
    		$file->move('BackEndSourceFile/dish_image/',$filename);

    		$dish->dish_image =$filename;
    	}


    	 $dish -> update();
    	return redirect(to:'/admin/dish/manage')-> with('sms', 'Updated Successfully');

    	
    }

}
