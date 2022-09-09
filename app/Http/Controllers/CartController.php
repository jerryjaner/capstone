<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

use Cart;



class CartController extends Controller
{
    public function insert(Request $request)
    {
    	$dish = Dish::where('id', $request -> id) -> first();
 
    	Cart::add([

    		'id'    => $request -> id,
    		'qty'   => $request -> qty,
    		'name'  => $dish -> dish_name,
    		'price' => $dish -> full_price,
    		'weight'=> 550,
    		 'options' =>
    		 [
    		 	'image' => 'BackEndSourceFile/dish_image/'.$dish ->dish_image,
    		 ],
    		
    	]);

    	
    	// return redirect()->route('cart_show'); 
         return back();
    }

    public function show()
    {
        
     	$CartDish = Cart::content();
     	return view('User.Cart.Show',data: compact(var_name:'CartDish'));
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return back();
    }

     public function update(Request $request)
    {
            Cart::update($request->rowId, $request->qty);
            return back();
    }

    public function cartCount()
    {
        // to count the cart content
        $cartCount = Cart::content()->count();
        return response() -> json(['count' => $cartCount]);
    }

}
