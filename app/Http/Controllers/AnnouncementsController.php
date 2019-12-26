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

	public function store(Request $request)
	{
		$announcement = array(
			'title' => $request->get('inputTitle'),
			'content' => $request->get('inputContent')
		);

		Announcement::create($announcement);

        return redirect()->route('admin.announcements')
        	->with('success', 'Announcement saved!');
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
