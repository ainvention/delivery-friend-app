<div>
    {{-- <input wire:model="toTimeCustom" value="" type="text" id="fickerTime" class="w-1/2 h-auto m-4" placeholder="Click"
        readonly> --}}
    {{-- <x-jet-input-error for="toTimeCustom" class="mt-2" /> --}}
    <script>
        flatpickr('#fickerTime', {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });
    </script>
</div>
