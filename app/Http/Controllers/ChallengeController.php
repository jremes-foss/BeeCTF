<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenges;

class ChallengesController extends Controller
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

    public function create()
    {
    	return view('challenges.create');
    }

    public function indexAdmin()
    {
        $challenges = Challenges::all();
        return view('admin.challenges', compact('challenges'));
    }

    public function indexUser()
    {
        $challenges = Challenges::all();
        return view('challenges', compact('challenges'));
    }
}
