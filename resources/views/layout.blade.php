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
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
