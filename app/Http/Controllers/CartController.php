<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Manufacture;
use App\Slider;
use Cart;

class CartController extends Controller
{
	
    
    public function add_to_cart(Request $request){

    	$qty=$request->qty;
    	$product_id=$request->product_id;

    	//echo $product_id;
    	//echo $qty;
    	$product = Product::where('id', $product_id)->get();
    	echo "<pre>";
    	//print_r($product);
    	$product->qty=$qty;
    	print_r($product);
        //$product->id=$product->id;
       // $data['name']=$product->product_name;
        //$data['price']=$product->product_price;
        //$data['options']['image']=$product->product_image;

       //Cart::add($product);

    		
    }

    public function show_cart(){

		return view('pages.add_to_cart')->with('title', 'Add to cart');
	 }
}
