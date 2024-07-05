@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $video->title }}</div>

                <div class="card-body">
                    <p>{{ $video->description }}</p>
                    <video width="100%" controls>
                        <source src="{{ $video->video_url }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
