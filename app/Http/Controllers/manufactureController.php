<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacture;
class manufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AdminAuthCheck();
        $manufacture = Manufacture::all();
        
        return view('backend.pages.all_manufacture')->with('manufacture', $manufacture);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AdminAuthCheck();
        return view('backend.pages.add_manufacture');
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
        $manu = new Manufacture;
        $manu->manufacture_name = $request->input('manufacture_name');
        $manu->manufacture_description = $request->input('manufacture_description');
        $manu->publication_status = $request->input('publication_status');
        $manu->manufacture_description = $request->input('manufacture_description');
        $manu->save();

        return Redirect('/manufacture/create')->with('success', 'Brand Added');

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
        $manu = Manufacture::where('id',$id)->first();
        //dd($manu);

        return view('backend.pages.edit_manufacture')->with('manufacture', $manu);
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
        $manu = Manufacture::find($id);
        

        $manu->manufacture_name = $request->input('manufacture_name');
        $manu->manufacture_description = $request->input('manufacture_description');
        $manu->publication_status = $request->input('publication_status');
        $manu->manufacture_description = $request->input('manufacture_description');
        $manu->save();

        return Redirect('/manufacture')->with('success', 'Brand Update');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $manu = Manufacture::where('id', $id)->first();
       //dd($manu);
       $manu->delete();
       return redirect('/manufacture');
    }

    public function manufacture_inactive($id)
    {

      Manufacture::where('id', $id)
              ->update(['publication_status' => NULL]);

      return redirect('/manufacture');

    }

    public function manufacture_active($id)
    {
      Manufacture::where('id', $id)
              ->update(['publication_status' => 1]);

      return redirect('/manufacture');

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
