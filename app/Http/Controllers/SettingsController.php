<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\User;
use Auth;

class SettingsController extends Controller
{
    /**
     * Returns settings page with API token.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $api_token = $user->api_token;
        return view('settings')->with('api_token', $api_token);
    }

    /**
     * Updates API token. Back-end for AJAX call.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateApiToken()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $user->api_token = Str::random(60);
        $user->save();
        return response()->json($user->api_token);
    }
}
