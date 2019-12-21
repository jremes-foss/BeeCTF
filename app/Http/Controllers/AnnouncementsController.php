<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class AnnouncementsController extends Controller
{
    public function indexAdmin()
    {
    	$announcements = Announcement::all();
    	return view('admin.announcements', compact('announcements'));
    }
}
