<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TeamService;

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
        dd($teams);
        return view('admin.teams');
    }

    /**
     * Returns the edit page for administrators.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $team_id = 1;
        $test_team_players = $this->teamsService->getTeamPlayers($team_id);
        dd($test_team_players);
    }

    public function update(Request $request, $id) 
    {
        // TODO 
    }

    public function create()
    {
        // TODO
    }
}
