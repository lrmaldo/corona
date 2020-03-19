<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
 

class DashboardController extends Controller
{
    //

    public function __construct(){
		$this->middleware('auth');
    }
    
    public function index()
    {
    
      $casos = \App\casos::All();
    return view('dashboard.index',compact('casos'));
    }


    public function login(){
		return view('auth/login');
	}

}
