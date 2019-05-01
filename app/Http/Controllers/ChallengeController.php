<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function store(Request $request)
    {
    	$request->validate([
    		'topic' => 'required',
    		'category' => 'required',
    		'points' => 'required',
    		'description' => 'required'
    	]);

    	$challenge = new Challenge([
    		'topic' => $request->get('topic'),
    		'category' => $request->get('category'),
    		'points' => $request->get('points'),
    		'description' => $request->get('description')
    	]);

    	$challenge->save();
    	return redirect('/challenges')->with('success', 'Challenge saved!');
    }
}
