<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ApiController extends Controller
{
    public function getCategories() 
    {
        return Category::all();
    }
}
