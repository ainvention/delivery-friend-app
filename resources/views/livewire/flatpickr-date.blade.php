<div>
    <input wire:model="options.toDateCustom" value="" type="text" id="fickerDate" class="w-1/2 h-auto m-4"
        placeholder="Click">
    <x-jet-input-error for="options.toDateCustom" class="mt-2" />
    <script>
        flatpickr("#fickerDate", {
        defaultDate: 'today',
        minDate: "today"
    });
    </script>
</div>
