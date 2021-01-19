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
    public function edit()
    {
        $team_id = 1;
        return view('admin.teams.edit')->with('id', $team_id);
    }

    public function update(Request $request, $id) 
    {
        $team = Team::find($id);

        return redirect()->route('admin.teams')->with('message', 'Team updated!');

    }

    public function create()
    {
        // TODO
    }
}
