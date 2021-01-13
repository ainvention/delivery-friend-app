<div>
    <h1>step6 view</h1>
    <div class="flex justify-between">
        <div class="w-full md:w-full px-3 mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='title'>Title</label>
            <input wire:model="step6"
                class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                type='text' aria-placeholder="Title(e.g. Office chair)" required>
        </div>
        <button wire:click="$emitUp('moveBack')"
            class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500">Back</button>
        <button wire:click="$emitUp('moveNext')"
            class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500">Next</button>
    </div>
</div>
