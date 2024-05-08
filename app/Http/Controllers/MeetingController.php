<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Carbon\Carbon;
use Illuminate\Http\Request; // Add this line to import the Request class

class MeetingController extends Controller
{

    public function index()
{
    $meetings = Meeting::all();
    return view('meeting.index', compact('meetings'));
}
    public function show($id)
    {
        $meeting = Meeting::findOrFail($id);
        $currentTime = Carbon::now();

        if ($meeting->meeting_date->isPast()) {
            $countdown = 'Meeting has already started.';
        } else {
            $countdown = $currentTime->diffForHumans($meeting->meeting_date, [
                'parts' => 3,
                'join' => ', ',
                'short' => true,
                'syntax' => Carbon::DIFF_ABSOLUTE
            ]);
        }

        return view('meeting.show', compact('meeting', 'countdown'));
    }

    public function create()
    {
        return view('meeting.create');
    }

   public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'meeting_date' => 'required|date'
    ]);

    $meeting = Meeting::create($validatedData);

    return redirect()->route('meeting.index');
}
}
