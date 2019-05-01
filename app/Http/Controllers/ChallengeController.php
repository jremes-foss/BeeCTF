<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function store(Request $request)
    {
    	$request->validate([
    		'title' => 'required',
    		'category' => 'required',
    		'points' => 'required',
    		'content' => 'required',
    		'flag' => 'required'
    	]);

    	$challenge = new Challenge([
    		'title' => $request->get('title'),
    		'category' => $request->get('category'),
    		'score' => $request->get('score'),
    		'content' => $request->get('content'),
    		'flag' => $request->get('flag')
    	]);

    	$challenge->save();
    	return redirect('/challenges')->with('success', 'Challenge saved!');
    }
}
