@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Videos') }}</div>

                <div class="card-body">
                    @foreach($videos as $video)
                        <div>
                            <a href="{{ route('videos.show', $video->id) }}">{{ $video->title }}</a>
                            @if(auth()->user()->role == 'customer')
                                <form action="{{ route('video-requests.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="video_id" value="{{ $video->id }}">
                                    <button type="submit" class="btn btn-primary btn-sm">Request Access</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
