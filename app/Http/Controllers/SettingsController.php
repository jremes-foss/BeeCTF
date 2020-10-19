<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;


class SettingsController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $api_token = $user->api_token;
        return view('settings')->with('api_token', $api_token);
    }

    public function updateApiToken($request)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $user->api_token = $request->get('inputApiToken');
        $user->save();
    }
}
