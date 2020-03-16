<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class AnnouncementsController extends Controller
{
    /**
     * Returns the create page.
     *
     * @return \Illuminate\Http\Response
     */
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
    	return view('announcements', compact('announcements'));
    }

    public function edit($id)
    {
        $announcements = Announcement::find($id);
        return view('admin.announcements.edit')
            ->with('announcement', $announcements);
    }

    public function update(Request $request, $id)
    {
        $announcement = Announcement::find($id);
        $announcement->title = $request->get('inputTitle');
        $announcement->content = $request->get('inputContent');
        $announcement->save();
        return redirect()->route('admin.announcements')
            ->with('success', 'Announcement updated!');
    }

    public function destroy($id)
    {
        $announcement = Announcement::find($id);
        $announcement->delete();
        return redirect()->route('admin.announcements')
            ->with('success', 'Announcement deleted!');
    }
}
