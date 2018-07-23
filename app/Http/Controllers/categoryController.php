<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AdminAuthCheck();
        $category = Category::all();
        
        return view('backend.pages.all_category')->with('categorys', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AdminAuthCheck();
        return view('backend.pages.add_category');
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
        $category = new Category;
        $category->category_name = $request->input('category_name');
        $category->category_description = $request->input('category_description');
        $category->publication_status = $request->input('category_status');
        $category->category_description = $request->input('category_description');
        $category->save();

        return Redirect('/category/create')->with('success', 'Brand Added');

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
        //echo $manufacture_id;
        $this->AdminAuthCheck();
        $category = Category::where('id',$id)->first();
        //dd($manu);

        return view('backend.pages.edit_category')->with('categorys', $category);
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
        $this->AdminAuthCheck();
        $manu = Category::find($id);
        

        $manu->category_name = $request->input('category_name');
        $manu->category_description = $request->input('category_description');
        $manu->publication_status = $request->input('category_status');
        $manu->category_description = $request->input('category_description');
        $manu->save();

        return Redirect('/category')->with('success', 'Brand Update');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $manu = Category::where('id', $id)->first();
       //dd($manu);
       $manu->delete();
       return redirect('/category');
    }

    public function category_inactive($id)
    {

      Category::where('id', $id)
              ->update(['publication_status' => NULL]);

      return redirect('/category');

    }

    public function category_active($id)
    {
      Category::where('id', $id)
              ->update(['publication_status' => 1]);

      return redirect('/category');

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
