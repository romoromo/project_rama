<?php

namespace App\Http\Controllers;

use App\Models\VideoRequest;
use Illuminate\Http\Request;

class VideoRequestController extends Controller
{
    public function index()
    {
        $videoRequests = auth()->user()->role == 'admin' ? VideoRequest::all() : auth()->user()->videoRequests;
        return view('video_requests.index', compact('videoRequests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'video_id' => 'required|exists:videos,id',
        ]);

        VideoRequest::create([
            'user_id' => auth()->id(),
            'video_id' => $request->video_id,
            'status' => 'pending',
        ]);

        return redirect()->route('video-requests.index')
            ->with('success', 'Video request created successfully.');
    }

    public function approve(VideoRequest $videoRequest)
    {
        $videoRequest->update(['status' => 'approved']);
        return redirect()->route('video-requests.index')
            ->with('success', 'Video request approved successfully.');
    }

    public function reject(VideoRequest $videoRequest)
    {
        $videoRequest->update(['status' => 'rejected']);
        return redirect()->route('video-requests.index')
            ->with('success', 'Video request rejected successfully.');
    }
}
