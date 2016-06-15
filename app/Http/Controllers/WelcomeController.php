<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WelcomeController extends Controller
{
    //
    public function about(){
    	$about = "Xin chào bạn đến với website quản lý nhân viên";
    	return view('about')->with('ly',$about);
    }
}
