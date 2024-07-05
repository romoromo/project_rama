<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoRequest;
use Illuminate\Http\Request;

class VideoRequestController extends Controller
{
    public function index()
    {
        $videoRequests = VideoRequest::with('video', 'user')->get();
        return view('admin.video_requests.index', compact('videoRequests'));
    }

    public function approve(Request $request, VideoRequest $videoRequest)
    {
        $videoRequest->update([
            'status' => 'approved',
            'approved_until' => $request->approved_until,
        ]);

        return redirect()->route('admin.video-requests.index')->with('success', 'Video request approved.');
    }

    public function reject(VideoRequest $videoRequest)
    {
        $videoRequest->update(['status' => 'rejected']);

        return redirect()->route('admin.video-requests.index')->with('success', 'Video request rejected.');
    }
}
