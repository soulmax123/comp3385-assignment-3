<?php

namespace App\Http\Controllers;

use App\Models\CommunityEvent;
use Illuminate\Http\Request;
use Illuminate\View\View;


class CommunityEventController extends Controller
{
    public function create()
    {
        return view('community-events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'venue' => ['required', 'string', 'max:255'],
            'starts_at' => ['required', 'date'],
            'banner_image' => ['required', 'image', 'max:2048'],
        ]);

        $data['banner_image'] = $request->file('banner_image')->store('community-event-banners', 'public');

        CommunityEvent::create($data);

        return redirect()->route('/dashboard')->with('message', 'Community event created successfully.');
    }
}
