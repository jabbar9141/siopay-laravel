<?php

namespace App\Http\Controllers;

use App\Models\Anouncement;
use Illuminate\Http\Request;

class AnouncementController extends Controller
{
    public function index()
    {
        $announcements = Anouncement::paginate(10);
        return view('admin.announcement.index', compact('announcements'));
    }

    public function create()
    {
        $announcements = Anouncement::all();
        return view('welcome', compact('announcements'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'announcement_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/announcement/'), $fileName);

        }
        $anouncement = new Anouncement();
        $anouncement->title = $request->title;
        $anouncement->description = $request->description;
        $anouncement->image = $fileName;
        $anouncement->save();
        return redirect()->back()->with(['message' => 'Announcement Created Successfully', 'message_type' => 'success']);
    }

    public function show($id)
    {
        // Retrieve a single announcement
        $anouncement = Anouncement::find($id);
        return view('welcome', compact('announcement'));
    }

    public function edit($id)
    {
        // Retrieve a single announcement for editing
        $anouncement = Anouncement::find($id);
        return view('welcome', compact('announcement'));
    }

    public function remove($id)
    {
        $anouncement =  Anouncement::find($id);
        $anouncement->delete();
        return redirect()->back()->with(['message' => 'Announcement Removed Successfully', 'message_type' => 'success']);
    }
}
