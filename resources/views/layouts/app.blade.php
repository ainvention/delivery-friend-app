{{-- @if (app()->isLocal()) @endif --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Font --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

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

    {{-- AlpineJS https://laravel-livewire.com/docs/2.x/alpine-js --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

    {{-- Mix Script & Style --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- @livewireStyles --}}
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
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    {{-- for step8-edit-task checkbox readonly --}}
    {{-- <style>
        input[type="checkbox"][readonly] {
            pointer-events: none;
        }
    </style> --}}
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="flex flex-col min-h-screen">
        @livewire('navigation-dropdown')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main class="mx-auto mb-auto">
            {{ $slot }}
        </main>
        @include('livewire.components.footer')
    </div>

    @stack('modals')
    @livewireScripts

    {{-- below two lines need to adjust SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <x-livewire-alert::scripts />
</body>

</html>
