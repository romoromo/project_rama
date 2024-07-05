@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Video') }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.videos.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="video_url">Video URL</label>
                            <input type="url" name="video_url" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Video</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
