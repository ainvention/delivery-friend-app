<div>
    @if (session()->has('message'))
    <div class="flex w-11/12 h-12 border-gray-300 text-red-500 font-semibold text-lg">
        {{ session('message') }}
    </div>
    @endif
</div>
