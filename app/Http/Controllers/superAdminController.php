<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;
class superAdminController extends Controller
{
	public function index(){
		$this->AdminAuthCheck();
		return view('backend.pages.home');
	}
    public function logout(){
    	//Session::put('admin_name', null);
    	//Session::put('admin_id', null);
    	session()->flush();
    	return Redirect('/admin');
    	//echo "logout";

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
