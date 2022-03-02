@extends('layout')

@section('content')
    <form action="{{ route('pull-request.update', ['pullRequest' => $pullRequest->id]) }}" method="post">
        <div class="row">
            <div class="col-md-6">
                @csrf
                @method('put')
                <ul class="list-group list-group-flush">
                    @foreach($pullRequest->transitions as $transition)
                        <li class="list-group-item">
                            <button
                                name="transition"
                                value="{{ $transition }}"
                                @if(!$pullRequest->workflow_can($transition))
                                class="btn btn-primary btn-sm"
                                disabled
                                @else
                                class="btn btn-success btn-sm"
                                @endif
                            >
                                {{ $transition }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <button
                    class="btn btn-primary btn-sm"
                    name="transition"
                    value="reset"
                    @if($pullRequest->marking === $pullRequest->initialPlace)
                    disabled
                    @endif
                >
                    Reset
                </button>
            </div>
        </div>
    </form>

    @include('templates.pull-request.graph', ['file' => $file, 'marking' => $pullRequest->marking])
@endsection
