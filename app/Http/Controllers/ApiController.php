<?php

namespace App\Http\Controllers;

use App\Category;
use App\Challenge;

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

        foreach ($categories as $key => $category) {
            $categoriesArray[$key]['category'] = $category->category;
            $categoriesArray[$key]['description'] = $category->description;
        }

        return $categoriesArray;
    }

    public function getChallenges()
    {
        $challengesArray = [];
        $challenges = Challenge::all();

        foreach ($challenges as $key => $challenge) {
            $challengesArray[$key]['score'] = $challenge->score;
            $challengesArray[$key]['title'] = $challenge->title;
        }

        return $challengesArray;
    }

    public function getScoreBoard()
    {
        // TODO
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
