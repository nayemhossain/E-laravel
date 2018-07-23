<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Manufacture;
use App\Slider;

class homeController extends Controller
{
    public function index(){

    	return view('pages.home_content')
    		->with('title', 'Home')
    		->with('cats', Category::all())
    		->with('manus', Manufacture::all())
    		->with('products', Product::all()->take(6))
    		->with('sliders', Slider::all());
    }

    public function product_by_category($id){

    	return view('pages.product_by_category')
    				//->with('title', 'Product by Category')
    				//->with('cats', Category::where('category_name', $id)->first())
    				//->with('products', Product::all()->where('publication_status', $id));
    		->with('cats', Category::all())
    		->with('manus', Manufacture::all())
			->with('title', 'Category by product')
    		->with('products', Product::all()->where('category_id', $id)->where('publication_status', 1)->take(9));
    		

    }

    public function product_by_manufacture($id){

    	return view('pages.product_by_manufacture')
    		->with('cats', Category::all())
    		->with('manus', Manufacture::all())
			->with('title', 'Category by Manufacture')
    		->with('products', Product::all()->where('manufacture_id', $id)->where('publication_status', 1)->take(9));
    		

    }

    public function product_details($id){

    	//$product = Product::get()->where('id', $id)->where('publication_status', 1);
			//dd($product);
    	return view('pages.product_details')
    		->with('cats', Category::all())
    		->with('manus', Manufacture::all())
			->with('title', 'Product details')
			->with('products', Product::get()->where('id', $id)->where('publication_status', 1));

    		

    		
    		

    }
}
