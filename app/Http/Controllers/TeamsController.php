<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TeamService;
use App\Team;

class TeamsController extends Controller
{
    protected $teamsService;

    public function __construct(TeamService $teamsService)
    {
        $this->teamsService = $teamsService;
    }

    /**
     * Returns the teams index page.
     *
     * @return \Illuminate\Http\Response
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
        $teams = $this->teamsService->getTeams();
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

    public function store()
    {
        // TODO
    }
}
