<div class="hidden md:flex items-center">
    @if (Route::has('login'))
    <div class="hidden md:flex items-center">
        @auth
        <a href="{{ url('/dashboard') }}"
            class=class="text-lg uppercase mx-3 text-white cursor-pointer hover:text-gray-300">Dashboard</a>
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
