<?php

namespace App\Http\Controllers;

class StaticContentController extends Controller
{
    public function index()
    {
        return view('scontent');
    }
}
