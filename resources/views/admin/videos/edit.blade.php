@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Video') }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.videos.update', $video->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $video->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" required>{{ $video->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="video_url">Video URL</label>
                            <input type="url" name="video_url" class="form-control" value="{{ $video->video_url }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Video</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
