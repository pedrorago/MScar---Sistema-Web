<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcessosController extends Controller
{
	public function ordens() {
		return view('ordensServico');
	}
	public function estoque() {
		return view('estoque');
	}
}
