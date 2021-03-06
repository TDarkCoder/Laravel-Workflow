@extends('layout')

@section('content')
    <x-partials.subheader :title="$pullRequest->title" :route="route('pull-request.index')"/>

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
                                @endif>
                                {{ $transition }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-6 text-end">
                <button
                    class="btn btn-primary btn-sm"
                    name="transition"
                    value="reset"
                    @if($pullRequest->marking === $pullRequest->initialPlace)
                    disabled
                    @endif>
                    {{ __('Reset') }}
                </button>
            </div>
        </div>
    </form>

    <x-pull-request.graph :file="$file" :marking="$pullRequest->marking"/>
@endsection
