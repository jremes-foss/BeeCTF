<?php

namespace App\Http\Controllers;

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
        $categoriesArray = [];
        $categories = Category::all();

        foreach ($categories as $category) {
            $categoriesArray['category'] = $category->category;
            $categoriesArray['description'] = $category->description;
        }

        return $categoriesArray;
    }

    /**
     * Pings the application as a health check.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPing()
    {
        return response()->json([
            'message' => 'pong'
        ]);
    }
}
