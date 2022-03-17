@extends('layout')

@section('content')
    <div class="row">
        @foreach($pullRequests as $pullRequest)
            <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                <div class="card">
                    <div class="card-header">
                        {{ $pullRequest->title }} ({{ $pullRequest->marking }})
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $pullRequest->body }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('pull-request.show', ['pullRequest' => $pullRequest->id]) }}"
                           class="btn btn-outline-primary">
                            Manage
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
