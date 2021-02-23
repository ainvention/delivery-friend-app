<x-search-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>
    <div class="mt-6">
        <div class="max-w-full sm:px-6 lg:px-8">
            <div wire:model="step" class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('search.step1')
            </div>
        </div>
    </div>
</x-search-layout>
