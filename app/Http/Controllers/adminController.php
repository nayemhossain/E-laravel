<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;


class adminController extends Controller
{
    public function index(){

    	return view('admin_login');
    	//echo "admin";

    }



    public function dashboard(Request $request){

    	$admin_email=$request->admin_email;
    	$admin_password=md5($request->admin_password);

    	

        $result = Admin::where('admin_email', $admin_email)
            ->where('admin_password',$admin_password)
            ->first();
    	        
    	        
            if ($result) {
                    $request->session()->put('admin_name', $result->admin_name);
                    $request->session()->put('admin_id', $result->admin_id);

    	           //Session::put('admin_name',$result->admin_name);
    	           //Session::put('admin_id',$result->admin_id);
    	           return Redirect('/dashboard');
    	       }else{                
                   session()->put('messege','Email or Password Invalid');
                   return Redirect('/admin'); 
    	       }  

    	//return view('backend.pages.home');
    	//echo $admin_email;

    }


    
}