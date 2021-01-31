<div>
    {{-- <input wire:model="toDateCustom" value="" type="text" id="fickerDate" class="w-1/2 h-auto m-4" placeholder="Click"
        readonly> --}}
    {{-- <x-jet-input-error for="toDateCustom" class="mt-2" /> --}}
    <script>
        flatpickr("#fickerDate", {
        defaultDate: 'today',
        minDate: "today",
    });
    </script>
</div>
