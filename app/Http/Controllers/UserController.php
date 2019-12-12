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

	public function destroy($id)
	{
		$user = User::find($id);
		$solved = Solved::where('user_id', $user)->get();
		
		foreach($solved as $challenge) {
			$challenge->delete();
		}
		
		$user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted!');
	}
}
