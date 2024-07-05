<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\VideoRequest;
use Illuminate\Http\Request;

class VideoRequestController extends Controller
{
    public function store(Request $request)
    {
        VideoRequest::create([
            'user_id' => auth()->id(),
            'video_id' => $request->video_id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Video request submitted.');
    }

    public function index()
    {
        $videoRequests = auth()->user()->videoRequests()->with('video')->get();
        return view('video_requests.index', compact('videoRequests'));
    }
}
