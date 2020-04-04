<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Solved;

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
        return view('admin.users.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->get('inputName');
        $user->email = $request->get('inputEmail');
        $user->save();
        return redirect()->route('admin.users')->with('success', 'User updated!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $solved = Solved::where('user_id', $user)->get();

        foreach ($solved as $challenge) {
            $challenge->delete();
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted!');
    }
}
