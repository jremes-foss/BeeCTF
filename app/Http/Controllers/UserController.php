<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function index()
	{
		$users = User::all();
		return view('admin.users')->with('users', $users);
	}

	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted!');
	}
}
