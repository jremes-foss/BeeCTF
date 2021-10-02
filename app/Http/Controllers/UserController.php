<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Solved;
use App\Team;
use App\TeamPlayer;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('user_type', 'User')->get();
        return view('admin.users')->with('users', $users);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $team_player = TeamPlayer::where('player_id', $id);
        $teams = Team::all();
        return view('admin.users.edit')
            ->with('user', $user)
            ->with('teams', $teams)
            ->with('team_player', $team_player);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $team_player = TeamPlayer::where('player_id', $id)->first();
        $user->name = $request->get('inputName');
        $user->email = $request->get('inputEmail');

        if (!is_null($team_player)) {
            $team_player->team_id = $request->get('inputTeam');
        }
        
        $team_player->save();
        $user->save();
        return redirect()->route('admin.users')->with('success', 'User updated!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $solved = Solved::where('user_id', $user->id)->get();

        foreach ($solved as $challenge) {
            $challenge->delete();
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted!');
    }
}
