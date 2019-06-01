<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Category;

class ChallengesController extends Controller
{
    public function store(Request $request)
    {

    	$challenge = array(
            'category' => $request->get('inputCategory'),
            'title' => $request->get('inputTitle'),
            'score' => $request->get('inputScore'),
            'flag' => $request->get('inputFlag'),
            'content' => $request->get('inputContent')
        );

    	Challenges::create($challenge);

    	return redirect()->route('user.challenges')->with('success', 'Challenge saved!');
    }

    public function create()
    {
        $categories = Category::all();
    	return view('admin.challenges_new')
            ->with('categories', $categories);
    }

    public function indexAdmin()
    {
        $challenges = Challenge::all();
        return view('admin.challenges', compact('challenges'));
    }

    public function indexUser()
    {
        $challenges = Challenge::all();
        return view('challenges', compact('challenges'));
    }

    public function edit($id)
    {
        $challenge = Challenge::find($id);
        return view('challenges.edit', compact('challenge'));
    }

    public function update(Request $request, $id)
    {
        $challenge = Challenge::find($id);
        $challenge->category = $request->get('inputCategory');
        $challenge->title = $request->get('inputTitle');
        $challenge->score = $request->get('inputScore');
        $challenge->flag = $request->get('inputFlag');
        $challenge->content = $request->get('inputContent');
        $challenge->save();
        return redirect()->route('user.challenges')->with('success', 'Challenge updated!');
    }

    public function submitFlag(Request $request)
    {
        $challenge = Challenge::find($request->id);
        $flag = $challenge->flag;

        $submit = array(
            'flag' => $request->get('flag'),
        );

        if($flag == $submit['flag']) {
            return redirect('/challenges')->with('message', 'Correct Flag, Congratulations!');
        } else {
            return redirect('/challenges')->with('message', 'Try Again!');
        } 
    }
}
