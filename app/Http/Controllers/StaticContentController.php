<?php

namespace App\Http\Controllers;

class StaticContentController extends Controller
{
    /**
     * Return static content to index page.
     */
    public function index()
    {
        return view('scontent');
    }
}
