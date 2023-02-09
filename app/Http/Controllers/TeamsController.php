<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamsController extends Controller
{
    /**
     * Returns the teams index page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return view('teams');
    }

    /**
     * Returns the teams admin index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin()
    {
        $teams = Team::all();
        return view('admin.teams')->with('teams', $teams);
    }

    /**
     * Returns the edit page for administrators.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        return view('admin.teams.edit')->with('team', $team);
    }

    /**
     * Updates the team record.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $team = Team::find($id);
        $team->name = $request->get('inputName');
        $team->update();
        return redirect()->route('admin.teams')->with('message', 'Team updated!');
    }

    /**
     * Returns the create page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('admin.teams.create', compact('teams'));
    }

    /**
     * Store a newly created challenge in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team = array(
            'name' => $request->get('inputTeam')
        );
        
        Team::create($team);

        return redirect()->route('admin.teams')->with('success', 'Team saved!');
    }
}
