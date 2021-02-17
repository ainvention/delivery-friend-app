<div class="flex items-center justify-center">
    @if (Route::has('login'))
    <div class="flex items-center">
        @auth
        <a href="{{ secure_url('/sending') }}"
            class=" text-2xl uppercase mx-3 text-white cursor-pointer hover:text-gray-600 font-bold">sending</a>
        <a href="{{ secure_url('/search') }}"
            class="text-2xl uppercase mx-3 text-white cursor-pointer hover:text-gray-600 font-bold">search</a>
        <a href="{{ secure_url('/dashboard') }}"
            class="text-2xl uppercase mx-3 text-white cursor-pointer hover:text-gray-600 font-bold">dashboard</a>
        @else
        <a href="{{ route('login') }}"
            class="text-2xl uppercase mx-3 text-white cursor-pointer hover:text-gray-600 font-bold">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}"
            class="text-2xl uppercase mx-3 text-white cursor-pointer hover:text-gray-600 font-bold">Register</a>
        @endif
        @endauth
    </div>
    @endif
</div>
