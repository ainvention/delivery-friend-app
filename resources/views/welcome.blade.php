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

<body class="antialiased">

    <div class="bg-indigo-900 relative overflow-hidden h-screen">
        <img src="/images/uikit/snow_background5.svg" class="absolute h-full w-full object-cover" />
        <div class="inset-0 bg-black opacity-25 absolute">
        </div>
        <header class="absolute top-0 left-0 right-0 z-20">
            <nav class="container mx-auto px-6 md:px-12 py-4">
                <div class="md:flex justify-between items-center">
                    <div class="flex justify-between items-center">
                        <a href="" class="text-white">
                            <svg class="w-8 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" data-name="Capa 1"
                                viewBox="0 0 16.16 12.57">
                                <defs>
                                </defs>
                                <path d="M14.02 4.77v7.8H9.33V8.8h-2.5v3.77H2.14v-7.8h11.88z">
                                </path>
                                <path d="M16.16 5.82H0L8.08 0l8.08 5.82z">
                                </path>
                            </svg>
                        </a>
                        <div class="md:hidden">
                            <button class="text-white focus:outline-none">
                                <svg class="h-12 w-12" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @include('livewire.components.welcome-login-register')
                </div>
            </nav>
        </header>
        <div class="container mx-auto px-6 md:px-12 relative z-10 flex items-center py-32 xl:py-40">
            <div class="sm:w-3/5 lg:w-2/5 xl:w-full flex flex-col items-start relative z-10">
                <span class="font-bold text-5xl uppercase text-red-400">
                    welcome
                </span>
                <h1 class="font-bold text-6xl sm:text-7xl text-white leading-tight mt-4">
                    Find the friendly neighbor to help you.
                    <br />
                    Save your opportunity cost at
                    <br />
                    <span class="font-bold uppercase text-yellow-300 text-7xl">"Delivery Friends"</span>
                </h1>
                <a href="#"
                    class="block bg-white hover:bg-gray-100 py-3 px-4 rounded-lg text-lg text-gray-800 font-bold uppercase mt-10">
                    Discover
                </a>
            </div>
        </div>
    </div>
</body>

</html>
