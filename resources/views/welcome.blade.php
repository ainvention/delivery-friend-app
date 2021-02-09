<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Font --}}
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

    {{-- Font --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Bitter&display=swap" rel="stylesheet"> --}}

    {{-- Flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    {{-- Load Leaflet from CDN --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    {{-- Load Esri Leaflet from CDN --}}
    <script src="https://unpkg.com/esri-leaflet@2.5.3/dist/esri-leaflet.js"></script>

    {{-- Load Esri Leaflet Geocoder from CDN --}}
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.css">
    <script src="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.js"></script>

    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" /> --}}

    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" /> --}}

    {{-- Mix Script & Style --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>

    <style>
        .map {
            position: absolute;
            width: 100%;
            height: 100%;
        }
    </style>


    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
        }
    </style>
    <style>
        #results {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #results>div {
            width: 33%;
            text-align: center;
            line-height: 24px;
        }

        @media (max-width: 814px) {

            #results {
                flex-flow: column;
            }

            #results>div {
                width: 100%;
                margin-bottom: 24px;
            }

        }

        video,
        canvas {
            border: 2px solid rgba(255, 255, 255, 1);
            background: #263238;
            height: 198px;
            width: 100%;
        }
    </style>
    @livewireStyles
</head>

<body class="antialiased bg-indigo-600"">
    <div class=" relative h-screen">
    {{-- <img src="/images/uikit/snow_background5.svg" class="absolute h-full w-full object-cover" /> --}}
    </div>
</body>

</html>
