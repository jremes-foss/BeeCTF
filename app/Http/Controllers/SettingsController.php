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
        $api_token = User::where('id', $user_id)->pluck('api_token');
        return view('settings');
    }
}
