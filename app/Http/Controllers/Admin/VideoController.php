<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index', compact('videos'));
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
        return redirect()->route('admin.videos.index')->with('success', 'Video created successfully.');
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
        return redirect()->route('admin.videos.index')->with('success', 'Video updated successfully.');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('admin.videos.index')->with('success', 'Video deleted successfully.');
    }
}
