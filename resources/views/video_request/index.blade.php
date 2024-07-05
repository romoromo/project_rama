@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Video Requests') }}</div>

                <div class="card-body">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>Video</th>
                                <th>Status</th>
                                <th>Approved Until</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($videoRequests as $request)
                                <tr>
                                    <td>{{ $request->video->title }}</td>
                                    <td>{{ $request->status }}</td>
                                    <td>{{ $request->approved_until }}</td>
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
