@extends('layout')

@section('content')
    <x-partials.subheader
        :title="__('Workflow uploads')"
        :route="route('workflow-upload.show')"
        :routeName="__('Create')"/>

    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 g-4">
        @foreach($workflowUploads as $workflowUpload)
            <div class="col">
                <div class="card text-center h-100">
                    <div class="card-header">
                        {{ $workflowUpload->title }}
                    </div>
                    <div class="card-body">
                        <a
                            href="{{ route('workflow-upload.show', ['workflowUpload' => $workflowUpload->id]) }}"
                            class="btn btn-sm btn-outline-primary">
                            {{ __('Manage') }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if($workflowUploads->count() < 1)
        <h3 class="m-5 text-center">{{ __('No workflows uploaded') }}</h3>
    @endif
@endsection
