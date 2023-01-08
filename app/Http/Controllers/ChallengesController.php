<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Challenge;
use App\Category;
use App\ChallengeCategory;
use App\Solved;
use App\Score;
use App\Attachment;
use Carbon\Carbon;

class ChallengesController extends Controller
{
    /**
     * Store a newly created challenge in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $challenge = array(
            'title' => $request->get('inputTitle'),
            'score' => $request->get('inputScore'),
            'flag' => $request->get('inputFlag'),
            'content' => $request->get('inputContent'),
        );

        Challenge::create($challenge);

        $category = array();
        $category['category'] = $request->get('inputCategory');

        if ($request->has('inputCategory')) {
            $get_challenge = Challenge::orderBy('updated_at', 'DESC')->first();
            $get_category = Category::where('category', $category['category'])->first();
            $challenge_id = $get_challenge->id;
            $category_id = $get_category->id;
            $category['challenge_id'] = $challenge_id;
            $category['category_id'] = $category_id;
        }

        if (!empty($category)) {
            // This needs to be unset so the DB can be inserted
            unset($category['category']);
            ChallengeCategory::create($category);
        }

        $attachment = array();

        if ($request->has('inputURL') || $request->has('inputFile')) {
            $get_challenge = Challenge::orderBy('updated_at', 'DESC')->first();
            $challenge_id = $get_challenge->id;
            $attachment['challenge_id'] = $challenge_id;

            if ($request->has('inputURL')) {
                $attachment['url'] = $request->get('inputURL');
            }

            if ($request->hasFile('inputFile')) {
                $attachment_file = $request->file('inputFile');
                $directory = 'public/challenges';
                $file = $attachment_file->getClientOriginalName();
                $ext = $attachment_file->getClientOriginalExtension();
                $attachment_file->storeAs($directory, $file);
            }
        }

        if ($request->hasFile('inputFile')) {
            $attachment['filename'] = $directory . '/' . $file;
        }

        if (!empty($attachment)) {
            Attachment::create($attachment);
        }

        return redirect()->route('admin.challenges')->with('success', 'Challenge saved!');
    }

    /**
     * Returns the create page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.challenges.create')
            ->with('categories', $categories);
    }

    /**
     * Returns the index page for administrators.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function indexAdmin()
    {
        $challenges = Challenge::with('challengeCategories.categories')->get();
        return view('admin.challenges')->with('challenges', $challenges);
    }

    /**
     * Returns the index page for administrators.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function indexUser()
    {
        $user_id = Auth::user()->id;
        $solved = Solved::where('user_id', $user_id)->pluck('challenge_id');
        $challenges = Challenge::whereNotIn('id', $solved)->with('challengeCategories')->get();
        $categories = Category::with('challengeCategories')->get();
        return view('challenges')
            ->with('challenges', $challenges)
            ->with('categories', $categories);
    }

    /**
     * Returns the edit page for administrators.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $attachments = Attachment::all();
        $challenges = Challenge::with('challengeCategories')->find($id);
        $categories = Category::with('challengeCategories')->get();
        $challenge_category = ChallengeCategory::where('challenge_id', $id)->first();
        return view('admin.challenges.edit')
            ->with('attachments', $attachments)
            ->with('categories', $categories)
            ->with('challenge', $challenges)
            ->with('challenge_category', $challenge_category);
    }

    /**
     * Returns the edit page for administrators.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $challenge = Challenge::find($id);
        $attachment = Attachment::where('challenge_id', $id)->first();

        /** Updates the entry in challenge_category table */
        $challenge_category = ChallengeCategory::where('challenge_id', $id)->first();
        $challenge_category->category_id = $request->get('inputCategory');
        $challenge->title = $request->get('inputTitle');
        $challenge->score = $request->get('inputScore');
        $challenge->flag = $request->get('inputFlag');
        $challenge->content = $request->get('inputContent');

        // Update the attachment file
        if ($request->hasFile('inputFile')) {
            $attachment_file = $request->file('inputFile');
            $directory = 'public/challenges';
            $file = $attachment_file->getClientOriginalName();
            $ext = $attachment_file->getClientOriginalExtension();
            $attachment_file->storeAs($directory, $file);
        }

        // Update the attachment and challenge database entries
        if ($request->has('inputURL')) {
            $attachment->url = $request->get('inputURL');
        }

        $attachment->update();
        $challenge->update();
        $challenge_category->update();

        return redirect()->route('admin.challenges')->with('message', 'Challenge updated!');
    }

    /**
     * Deletes a Challenge.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $challenge = Challenge::find($id);
        $challenge->delete();
        return redirect()->route('user.challenges')->with('success', 'Challenge deleted!');
    }

    /**
     * A method for a flag submit.
     *
     * @return \Illuminate\Http\Response
     */
    public function submitFlag(Request $request)
    {
        $challenge = Challenge::find($request->id);
        $flag = $challenge->flag;

        $submit = array(
            'flag' => $request->get('flag'),
        );

        if ($flag == $submit['flag']) {
            $solved = new Solved;
            $solved->challenge_id = $request->id;
            $solved->user_id = $request->user()->id;
            $solved->save();
            $this->addScore($request);
            return redirect()
                ->route('user.challenges')
                ->with('message', 'Correct Flag, Congratulations!');
        } else {
            return redirect()
                ->route('user.challenges')
                ->with('message', 'Try Again!');
        }
    }

    /**
     * A method for incrementing score.
     * 
     * @return null
     */
    public function addScore(Request $request)
    {
        $challenge = Challenge::find($request->id);
        $score = $challenge->score;
        $user = $request->user()->id;
        $user_score = Score::where('user_id', $user)->first();

        if (!$user_score) {
            $user_score = Score::create([
                'user_id' => $user,
                'score' => 0
            ]);
        }

        Score::where('user_id', $user)
            ->increment('score', $score, ['updated_at' => Carbon::now()]);
    }

    /**
     * A method for downloading attachment.
     * 
     * @return null
     */
    public function download($id)
    {
        $attachment = Attachment::where('challenge_id', $id)->first();
        $storage_path = storage_path('app/' . $attachment->filename);
        return response()->download($storage_path);
    }
}
