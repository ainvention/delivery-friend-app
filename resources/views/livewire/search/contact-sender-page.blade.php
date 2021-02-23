<div class="text-gray-600 body-font relative">
    <div class="container py-24 mx-auto">
        <div class="text-center w-full mb-12">
            <span class="text-2xl text-center text-gray-500">Send message to sender</span>
        </div>
        <form wire:submit.prevent="sendMessageToSender" class="mx-auto">
            <div class="w-full relative mx-2 my-2 text-lg">
                <x-jet-label value="{{ __('Message') }}" class="text-xl" />
                <textarea wire:model.defer="messageToSender" id="message" name="message" rows="10" cols="10"
                    class="w-full h-40 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                    placeholder="Send message to sender..."></textarea>
                <x-jet-input-error for="messageToSender" class="my-2" />
            </div>

            <div class="w-full relative mx-2 my-2 sm:space-y-4 mt-4">
                <x-jet-label value="{{ __('Suggestion details') }}" class="text-xl" />
                <div>
                    <span>Date</span>
                    <x-jet-input wire:model.defer="dateSuggestion" wire:key="dateSuggestion" type="text" id="fickerDate"
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                        name="dateSuggestion" placeholder="Suggestion date" readonly />
                    <x-jet-input-error for="dateSuggestion" class="my-2" />
                </div>
                <div>
                    <span>Price(NOK)</span>
                    <x-jet-input wire:model.defer="priceSuggestion" wire:key="priceSuggestion" type="number"
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                        name="priceSuggestion" placeholder="Suggestion price" />
                    <x-jet-input-error for="priceSuggestion" class="my-2" />
                </div>
                <button type="submit"
                    class="py-2 px-4 bg-green-600 hover:bg-black text-white w-full text-center text-base font-semibold shadow-md rounded-lg">Send
                    Message</button>
            </div>
        </form>
    </div>
    <script>
        flatpickr("#fickerDate", {
            defaultDate: 'today',
            minDate: "today",
        });
    </script>
</div>
