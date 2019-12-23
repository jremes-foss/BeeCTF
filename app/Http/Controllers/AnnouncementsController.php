<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class AnnouncementsController extends Controller
{
	public function create() 
	{
		$announcements = Announcement::all();
        return view('admin.announcements.create', compact('announcements'));
	}

    public function indexAdmin()
    {
    	$announcements = Announcement::all();
    	return view('admin.announcements', compact('announcements'));
    }

    public function indexUser()
    {
    	$announcements = Announcement::all();
    	return view('user.announcements', compact('announcements'));
    }
}
