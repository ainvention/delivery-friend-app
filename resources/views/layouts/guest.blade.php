<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta name="robots" content="noindex">
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

    {{-- Mix Script & Style --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireStyles
</head>

<body class="flex flex-col w-full mx-auto h-screen antialiased">
    <div class="flex flex-col h-screen">
        @auth
        @livewire('navigation-dropdown')

        {{-- <img src="/images/uikit/snow_background5.svg" class="absolute h-full w-full object-cover"/> --}}

        @else
        {{-- Top Nav Bar Custom version--}}
        <div class="flex w-9/12 mx-auto mb-20">
            <div class="flex flex-col md:flex-row w-full my-10 sm:items-center">
                <div class="ml-0 md:w-full text-center md:text-left mb-4 md:mb-0">
                    @include('livewire.components.logo')
                </div>
                @if (Route::has('login'))
                <div
                    class="flex flex-col md:flex-row w-full md:justify-end my-auto space-y-2 md:space-y-0 md:space-x-2">
                    @auth
                    <a href="{{ secure_url('/sending') }}">
                        <button class="w-full md:max-w-3xl text-xl mx-3 bg-green-300 cursor-pointer hover:text-white font-bold border-2 border-gray-500 rounded-md
                    p-3 py-2 uppercase">sending</button></a>
                    <a href="{{ secure_url('/search') }}">
                        <button class="w-full md:max-w-3xl text-xl mx-3 bg-green-300 cursor-pointer hover:text-white font-bold border-2 border-gray-500 rounded-md
                    p-3 py-2 uppercase">search</button></a>
                    <a href="{{ secure_url('/dashboard') }}">
                        <button class="w-full md:max-w-3xl text-xl mx-3 bg-green-300 cursor-pointer hover:text-white font-bold border-2 border-gray-500 rounded-md
                    p-3 py-2 uppercase">dashboard</button></a>
                    @else
                    <a href="{{ route('login') }}">
                        <button class="w-full md:max-w-3xl text-xl mx-3 bg-green-300 cursor-pointer hover:text-white font-bold border-2 border-gray-500 rounded-md
                    p-3 py-2 uppercase">Loggg inn</button></a>

                    {{-- @if (Route::has('register'))
                    <a href="{{ route('register') }}">
                    <button class="w-full md:max-w-3xl text-xl mx-3 bg-green-300 cursor-pointer hover:text-white font-bold border-2 border-gray-500 rounded-md
                         p-3 py-2 uppercase">Registrer deg</button></a>
                    @endif --}}
                    @endauth
                </div>
                @endif
            </div>
        </div>
        @endauth
        {{-- Page Content --}}
        <main class="w-9/12 m-auto">
            {{ $slot }}
        </main>
        @include('livewire.components.footer')
        {{-- <a href="https://jswizard.no">
                <span
                    class="text-center text-blue-600 font-semibold text-xl mx-auto pb-10 hover:text-red-600 hover:font-extrabold">
                    by Alex Sung</span>
            </a> --}}

    </div>
</body>

</html>
