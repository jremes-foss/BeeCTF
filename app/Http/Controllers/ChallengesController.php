<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Category;
use App\Solved;
use App\Score;
use Carbon\Carbon;

class ChallengesController extends Controller
{
    public function store(Request $request)
    {
    	$challenge = array(
            'category' => $request->get('inputCategory'),
            'title' => $request->get('inputTitle'),
            'score' => $request->get('inputScore'),
            'flag' => $request->get('inputFlag'),
            'content' => $request->get('inputContent'),
        );

        if($request->hasFile('inputFile')) {
            $challenge_file = $request->file('inputFile');
            $directory = 'public/challenges';
            $file = $challenge_file->getClientOriginalName();
            $ext = $challenge_file->getClientOriginalExtension();
            $challenge_file->storeAs($directory, $file);
        }

        $challenge['resource'] = $file;
    	Challenge::create($challenge);

    	return redirect()->route('admin.challenges')->with('success', 'Challenge saved!');
    }

    public function create()
    {
        $categories = Category::all();
    	return view('admin.challenges.create')
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
        $challenges = Challenge::find($id);
        $categories = Category::all();
        return view('admin.challenges.edit')
            ->with('categories', $categories)
            ->with('challenge', $challenges);
    }

    public function update(Request $request, $id)
    {
        $challenge = Challenge::find($id);
        $challenge->category = $request->get('inputCategory');
        $challenge->title = $request->get('inputTitle');
        $challenge->score = $request->get('inputScore');
        $challenge->flag = $request->get('inputFlag');
        $challenge->content = $request->get('inputContent');
        $challenge->$challenge_file = $request->get('inputFile');
        $challenge->update();
        return redirect()->route('user.challenges')->with('success', 'Challenge updated!');
    }

    public function destroy($id)
    {
        $challenge = Challenge::find($id);
        $challenge->delete();
        return redirect()->route('user.challenges')->with('success', 'Challenge deleted!');
    }

    public function submitFlag(Request $request)
    {
        $challenge = Challenge::find($request->id);
        $flag = $challenge->flag;

        $submit = array(
            'flag' => $request->get('flag'),
        );

        if($flag == $submit['flag']) {
            $solved = new Solved;
            $solved->challenge_id = $request->id;
            $solved->user_id = $request->user()->id;
            $solved->save();
            $this->addScore($request);
            return redirect('/challenges')->with('message', 'Correct Flag, Congratulations!');
        } else {
            return redirect('/challenges')->with('message', 'Try Again!');
        } 
    }

    public function addScore(Request $request)
    {
        $challenge = Challenge::find($request->id);
        $score = $challenge->score;
        $user = $request->user()->id;
        $user_score = Score::find($user);
        Score::where('user_id', $user)
            ->increment('score', $score, ['updated_at' => Carbon::now()]);
    }
}
