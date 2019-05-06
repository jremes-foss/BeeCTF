<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenges;

class ChallengesController extends Controller
{
    public function store(Request $request)
    {

    	$challenge = new Challenges([
            'category' => $request->get('inputCategory'),
    		'title' => $request->get('inputTitle'),
    		'score' => $request->get('inputScore'),
            'flag' => $request->get('inputFlag'),
    		'content' => $request->get('inputContent')
    	]);

    	Challenges::create($request->all());
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
