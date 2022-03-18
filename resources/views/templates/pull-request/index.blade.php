@extends('layout')

@section('content')
    <x-partials.subheader title="Pull Requests"/>

    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 g-4">
        @foreach($pullRequests as $pullRequest)
            <div class="col">
                <div class="card h-100">
                    <div class="card-header">
                        {{ $pullRequest->title }} ({{ $pullRequest->marking }})
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $pullRequest->body }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('pull-request.show', ['pullRequest' => $pullRequest->id]) }}"
                           class="btn btn-sm btn-outline-primary">
                            Manage
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if($pullRequests->count() < 1)
        <h3 class="m-5 text-center">No pull requests</h3>
    @endif
@endsection
