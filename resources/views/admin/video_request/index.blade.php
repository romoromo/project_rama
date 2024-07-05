@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manage Video Requests') }}</div>

                <div class="card-body">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>Video</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($videoRequests as $request)
                                <tr>
                                    <td>{{ $request->video->title }}</td>
                                    <td>{{ $request->user->name }}</td>
                                    <td>{{ $request->status }}</td>
                                    <td>
                                        @if($request->status == 'pending')
                                            <form action="{{ route('admin.video-requests.approve', $request->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <input type="datetime-local" name="approved_until" required>
                                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                            </form>
                                            <form action="{{ route('admin.video-requests.reject', $request->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                            </form>
                                        @endif
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
