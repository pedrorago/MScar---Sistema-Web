<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\View;

class DashboardController extends Controller {

	public function index(){
		return view("index");
	}

}
