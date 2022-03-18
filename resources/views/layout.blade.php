<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') ?? 'Laravel workflow' }}</title>
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link
        href="{{ asset('css/bootstrap.min.css') }}"
        rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/bpmn-js.css') }}">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .container {
            min-height: calc(100vh - 128px);
        }
    </style>
</head>
<body>
<x-header/>

<div class="container py-4">
    @if(session('error'))
        <div class="alert alert-danger mb-4" role="alert">
            {{ session('error') }}
        </div>
    @endif
    @yield('content')
</div>

<x-footer/>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous">
</script>
<script src="{{ asset('js/bpmn-navigated-viewer.js') }}"></script>
<script defer>
    const canvasContainer = document.getElementById('canvas-container');
    const canvas = document.getElementById('canvas');
    const canvasValue = document.getElementById('js-canvas-file');

    if (canvasContainer && canvas && canvasValue) {
        let viewer = new BpmnJS({
            container: '#canvas',
            height: 500,
        });

        let xhr = new XMLHttpRequest();
        xhr.open('get', canvasValue.value);
        xhr.send();

        xhr.onload = async () => {
            if (xhr.status === 200) {
                await viewer.importXML(xhr.response);
                viewer.get('canvas');
            } else {
                alert("{{ __('Error occurred! Looks like file is broken') }}")
            }
        }
    }
</script>
</body>
</html>
