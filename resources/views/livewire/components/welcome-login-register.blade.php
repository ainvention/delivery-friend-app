<div class="hidden md:flex items-center">
    @if (Route::has('login'))
    <div class="hidden md:flex items-center">
        @auth
        <a href="{{ url('/sending') }}"
            class="text-lg uppercase mx-3 text-white cursor-pointer hover:text-gray-300">sending</a>
        <a href="{{ url('/search') }}"
            class="text-lg uppercase mx-3 text-white cursor-pointer hover:text-gray-300">search</a>
        <a href="{{ url('/dashboard') }}"
            class="text-lg uppercase mx-3 text-white cursor-pointer hover:text-gray-300">dashboard</a>
        @else
        <a href="{{ route('login') }}"
            class="text-lg uppercase mx-3 text-white cursor-pointer hover:text-gray-300">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}"
            class="text-lg uppercase mx-3 text-white cursor-pointer hover:text-gray-300">Register</a>
        @endif
        @endauth
    </div>
    @endif
</div>
