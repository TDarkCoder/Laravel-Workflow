@extends('layout')

@section('content')
    <x-partials.subheader
        :title="$workflowUpload->title ?? __('New Workflow Upload')"
        :route="route('workflow-upload.index')"/>

    <x-workflow-upload.form :workflowUpload="$workflowUpload"/>

    <x-workflow-upload.canvas :file="$workflowUpload->file"/>
@endsection
