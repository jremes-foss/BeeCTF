<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamsController extends Controller
{
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

    public function edit()
    {
        // TODO
    }
}
