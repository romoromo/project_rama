<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    public function show(Video $video)
    {
        // Check if user has permission to watch the video
        if(auth()->user()->role == 'customer') {
            $request = auth()->user()->videoRequests()->where('video_id', $video->id)->where('status', 'approved')->first();
            if (!$request) {
                return redirect()->route('videos.index')->with('error', 'You do not have permission to watch this video.');
            }
        }
        return view('videos.show', compact('video'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video_url' => 'required|url',
        ]);

        Video::create($request->all());

        return redirect()->route('admin.videos.index')
            ->with('success', 'Video created successfully.');
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video_url' => 'required|url',
        ]);

        $video->update($request->all());

        return redirect()->route('admin.videos.index')
            ->with('success', 'Video updated successfully.');
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return redirect()->route('admin.videos.index')
            ->with('success', 'Video deleted successfully.');
    }
}
