<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sending') }}
        </h2>
    </x-slot>
    <div class="mt-6">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div wire:model="step" class="bg-white shadow-xl sm:rounded-lg">
                @livewire('sending.step1')
            </div>
        </div>
    </div>
</x-app-layout>
