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
                                <td><input wire:model="step5A" value="today" type="radio"
                                        class="w-8 h-8 m-4 border-2 border-gray-400" required /><span>Today</span></td>
                                <td><input wire:model="step5A" value="tomorrow" type="radio"
                                        class="w-8 h-8 m-4 border-2 border-gray-400" required /><span>Tomorrow</span>
                                </td>
                                <td><input wire:model="step5A" value="custom1" type="radio"
                                        class="w-8 h-8 m-4 border-2 border-gray-400" required /><span>Custom...</span>
                                </td>
                                @if($step5A == 'custom1' || gettype($step5A) == 'date')
                                <td><input wire:model.lazy="step5A2" value="" type="date"
                                        class="w-1/2 h-auto m-4 border-2 border-gray-400" required /><span>datetime
                                        field</span>
                                </td>
                                @endif
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
                                <td><input wire:model="step5B" value="flexible" type="radio"
                                        class="w-8 h-8 m-4 border-2 border-gray-400" required /><span>I'm
                                        flexible</span></td>
                                <td><input wire:model="step5B" value="noon" type="radio"
                                        class="w-8 h-8 m-4 border-2 border-gray-400" required /><span>Noon</span>
                                </td>
                                <td><input wire:model="step5B" value="evening" type="radio"
                                        class="w-8 h-8 m-4 border-2 border-gray-400" required /><span>Evening</span>
                                </td>
                                <td><input wire:model="step5B" value="night" type="radio"
                                        class="w-8 h-8 m-4 border-2 border-gray-400" required /><span>Night</span>
                                </td>
                                <td><input wire:model="step5B" value="custom2" type="radio"
                                        class="w-8 h-8 m-4 border-2 border-gray-400" required /><span>Custom...</span>
                                </td>
                                @if($step5B == 'custom2' || gettype($step5B2) == 'time')
                                <td class="container w-full justify-center">
                                    <input id="flatpickr" class="w-full mx-10" wire:model.lazy="step5B2" value=""
                                        type="date" class="w-30 h-auto m-4 border-2 border-gray-400" required />
                                    <input defaulDate="minDate:Today" type="date" class="form-control" name=""
                                        id="flatpicker">

                                </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between w-full md:w-full px-3 mb-6">
                    <button wire:click="$emitUp('moveBack')"
                        class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500">Back</button>
                    <button wire:click="$emitUp('moveNext')"
                        class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script_step5')
<script>
    flatpickr('#flatpickr');
</script>
@endsection
