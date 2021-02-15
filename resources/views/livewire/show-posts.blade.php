<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ShowPosts') }}
        </h2>
    </x-slot>
    <div class="mt-6">
        <div class="max-w-7xl max-h-screen mx-auto sm:px-6 lg:px-8">
            <div wire:model="step" class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('show-posts')
            </div>
        </div>
    </div>
</x-app-layout>
