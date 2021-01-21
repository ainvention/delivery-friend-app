<div>
    <div class="flex justify-center my-2 mx-4 md:mx-0">
        <div class="w-full max-w-xl bg-white rounded-lg shadow-md p-6">
            <div class="flex flex-wrap mx-3 mb-6">
                <div class="flex flex-col w-full h-auto px-3 mb-6">
                    <div class="my-10 self-center text-2xl tracking-tight">
                        <span>
                            When would you like to have it delivered ?
                        </span>
                    </div>
                    <table class="table-auto text-gray-400">
                        <tbody>
                            <tr class="flex flex-col m-2 border-2 border-gray-300">
                                <td class="flex items-center"><input wire:model="step5A" value="flexible" type="radio"
                                        class="w-8 h-8 m-4 border-2 border-gray-400" required /><span>I'm
                                        flexible</span></td>
                                <td class="flex items-center"><input wire:model="options.toDate" value="today"
                                        type="radio" class="w-8 h-8 m-4 border-2 border-gray-400"
                                        required /><span>Today</span></td>
                                <td class="flex items-center"><input wire:model="options.toDate" value="tomorrow"
                                        type="radio" class="w-8 h-8 m-4 border-2 border-gray-400"
                                        required /><span>Tomorrow</span>
                                </td>
                                <td class="flex items-center"><input wire:model="options.toDate" value="customDate"
                                        type="radio" class="w-8 h-8 m-4 border-2 border-gray-400"
                                        required /><span>Custom: </span>

                                    @if($options['toDate'] == 'customDate' || gettype($options['toDate']) == 'date')
                                    @include('livewire.flatpickr-date')
                                    @endif
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <table class="table-auto text-gray-400">
                        <tbody>
                            <div class="my-10 self-center text-2xl tracking-tight">
                                <span>
                                    ...and at what time?
                                </span>
                            </div>
                            <tr class="flex flex-col m-2 border-2 border-gray-300">
                                <td class="flex items-center"><input wire:model="options.toTime" value="flexible"
                                        type="radio" name="toTime" class="w-8 h-8 m-4 border-2 border-gray-400"
                                        required /><span>I'm
                                        flexible</span></td>
                                <td class="flex items-center"><input wire:model="options.toTime" value="noon"
                                        type="radio" name="toTime" class="w-8 h-8 m-4 border-2 border-gray-400"
                                        required /><span>Noon</span>
                                </td>
                                <td class="flex items-center"><input wire:model="options.toTime" value="evening"
                                        type="radio" name="toTime" class="w-8 h-8 m-4 border-2 border-gray-400"
                                        required /><span>Evening</span>
                                </td>
                                <td class="flex items-center"><input wire:model="options.toTime" value="night"
                                        type="radio" name="toTime" class="w-8 h-8 m-4 border-2 border-gray-400"
                                        required /><span>Night</span>
                                </td>
                                <td class="flex items-center"><input wire:model="options.toTime" value="customTime"
                                        type="radio" name="toTime" class="w-8 h-8 m-4 border-2 border-gray-400"
                                        required /><span>Custom: </span>
                                    @if($options['toTime'] == 'customTime' || gettype($options['toTime']) == 'date')
                                    @include('livewire.flatpickr-time')
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between w-full md:w-full px-3 mb-6">
                    <button wire:click="$emitUp('moveBack')"
                        class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500">Back</button>
                    <button wire:click="calculateSending"
                        class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
