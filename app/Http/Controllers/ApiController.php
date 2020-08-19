<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ApiController extends Controller
{
    /**
     * Return all categories in JSON format
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories() 
    {
        return Category::all();
    }
}
