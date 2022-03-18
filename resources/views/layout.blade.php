<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') ?? 'Laravel workflow' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bpmn-js@9.0.3/dist/assets/bpmn-js.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .container {
            min-height: calc(100vh - 128px);
        }
    </style>
    <link rel="stylesheet" href="{{ public_path('app.css') }}">
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

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous">
</script>
<script src="https://unpkg.com/bpmn-js@9.0.3/dist/bpmn-navigated-viewer.development.js"></script>
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
