<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AdminAuthCheck();
        $slider = Slider::all();
        
        return view('backend.pages.all_slider')->with('sliders', $slider);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AdminAuthCheck();
        return view('backend.pages.add_slider');
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
    	 $slider_image = $request->slider_image;

	    $new_slider =  time().$slider_image->getClientOriginalName();

	    $slider_image->move('uploads/sliders', $new_slider);

        $slider = new Slider;
         $slider->slider_image= 'uploads/sliders/'. $new_slider;
        //$slider->slider_image = $request->input('slider_image');
        $slider->publication_status = $request->input('publication_status');
       
        $slider->save();

        return Redirect('/slider')->with('success', 'Brand Added');

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
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $slider = Slider::where('id', $id)->first();
       //dd($manu);
       $slider->delete();
       return redirect('/slider');
    }

    public function slider_inactive($id)
    {

      Slider::where('id', $id)
              ->update(['publication_status' => NULL]);

      return redirect('/slider');

    }

    public function slider_active($id)
    {
      Slider::where('id', $id)
              ->update(['publication_status' => 1]);

      return redirect('/slider');

    }

    public function AdminAuthCheck()
    {
      $admin_id= session()->get('admin_id');
      
      if ($admin_id) {
         return;
      }else{
         return Redirect::to('/admin')->send();
      }
    }


}

