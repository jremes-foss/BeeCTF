<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticContentController extends Controller
{
    public function index()
    {
    	return view('user.scontent');
    }
}
