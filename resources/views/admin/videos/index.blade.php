@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manage Videos') }}</div>

                <div class="card-body">
                    <a href="{{ route('admin.videos.create') }}" class="btn btn-primary">Add Video</a>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($videos as $video)
                                <tr>
                                    <td>{{ $video->title }}</td>
                                    <td>{{ $video->description }}</td>
                                    <td>
                                        <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
