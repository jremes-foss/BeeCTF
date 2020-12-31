<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamsController extends Controller
{
    private $teamsService;

    private function __construct()
    {
        $teamsService = $this->teamsService;
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
        return view('admin.teams');
    }

    /**
     * Returns the edit page for administrators.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // TODO
    }

    public function update(Request $request, $id) 
    {
        // TODO 
    }
}
