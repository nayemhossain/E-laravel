<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Manufacture;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $this->AdminAuthCheck();
        $product = Product::all();
         return view('backend.pages.all_product')->with('products', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AdminAuthCheck();
        $category = Category::all();
        $manufacture = Manufacture::all();

        //dd($category);
        return view('backend.pages.add_product')
                    ->with('categorys', $category)
                    ->with('manufactures', $manufacture);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $this->AdminAuthCheck();

    $product_image = $request->product_image;

    $new_product =  time().$product_image->getClientOriginalName();

    $product_image->move('uploads/products', $new_product);



     $product = new Product;
     $product->product_name= $request->product_name;
     $product->category_id= $request->category_id;
     $product->manufacture_id= $request->manufacture_id;
     $product->product_short_description= $request->product_short_description;
     $product->product_long_description= $request->product_long_description;
     $product->product_price= $request->product_price;
     $product->product_size= $request->product_size;
     $product->product_color= $request->product_color;
     $product->publication_status= $request->publication_status;
     

     $product->product_image= 'uploads/products/'. $new_product;
     //dd($product);
     $product->save();
      return redirect('/product')->with('success', 'Successfully Insert');
           
    }


   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        $category = Category::all();
        $manufacture = Manufacture::all();

        return view('backend.pages.edit_product')
        ->with('product', $product)
        ->with('categorys', $category)
        ->with('manufactures', $manufacture);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $product_image = $request->product_image;
        if($product_image){
        $new_product =  time().$product_image->getClientOriginalName();

        $product_image->move('uploads/products', $new_product);

     $product = Product::find($id);
     $product->product_name= $request->product_name;
     $product->category_id= $request->category_id;
     $product->manufacture_id= $request->manufacture_id;
     $product->product_short_description= $request->product_short_description;
     $product->product_long_description= $request->product_long_description;
     $product->product_price= $request->product_price;
     $product->product_size= $request->product_size;
     $product->product_color= $request->product_color;
     $product->publication_status= $request->publication_status;
     

     $product->product_image= 'uploads/products/'. $new_product;
     //dd($product); 
     $product->save();
     return redirect('/product')->with('success', 'Successfully Insert');
           
    }else{
        return redirect('/product');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
       //dd($manu);
       $product->delete();
       return redirect('/product');
    }
    public function product_inactive($id)
    {

      Product::where('id', $id)
              ->update(['publication_status' => NULL]);

      return redirect('/product');

    }

    public function product_active($id)
    {
      Product::where('id', $id)
              ->update(['publication_status' => 1]);

      return redirect('/product');

    }

    public function AdminAuthCheck()
    {
      $admin_id= session()->get('admin_id');
      
      if ($admin_id) {
         return;
      }else{
         return Redirect('/admin')->send();
      }
    }
}
