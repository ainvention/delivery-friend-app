<div x-data="{ openContact: $wire.entangle('openContact') }"
    class="flex flex-col max-w-7xl m-6 justify-between border-b-2 border-gray-200">
    <div class="flex flex-col md:flex-row md:w-full space-y-2 mb-6">
        @isset($selectedTask->photo)
        <div class="md:w-1/6 md:self-center">
            <img src=" {{ url($selectedTask->photo) }}" alt="item photo" class="p-2">
        </div>
        @else
        <div class="md:w-1/6 m-2 self-center">
            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" class="max-w-sm">
                <defs>
                    <style>
                        .cls-1 {
                            fill: none;
                        }
                    </style>
                </defs>
                <title />
                <g data-name="Layer 2" id="Layer_2">
                    <path
                        d="M26,27H6a3,3,0,0,1-3-3V8A3,3,0,0,1,6,5H26a3,3,0,0,1,3,3V24A3,3,0,0,1,26,27ZM6,7A1,1,0,0,0,5,8V24a1,1,0,0,0,1,1H26a1,1,0,0,0,1-1V8a1,1,0,0,0-1-1Z" />
                    <path d="M21,15a3,3,0,1,1,3-3A3,3,0,0,1,21,15Zm0-4a1,1,0,1,0,1,1A1,1,0,0,0,21,11Z" />
                    <path
                        d="M26,27a1,1,0,0,1-.83-.45l-4.34-6.5a1,1,0,0,0-1.66,0l-.34.5a1,1,0,0,1-1.66-1.1l.33-.51a3,3,0,0,1,5,0l4.33,6.51a1,1,0,0,1-.28,1.38A.94.94,0,0,1,26,27Z" />
                    <path
                        d="M6,27a1,1,0,0,1-.54-.16,1,1,0,0,1-.3-1.38l6.23-9.62a3,3,0,0,1,2.5-1.37h0a3,3,0,0,1,2.5,1.34l6.42,9.64a1,1,0,0,1-1.66,1.1l-6.43-9.63a1,1,0,0,0-.83-.45h0a1,1,0,0,0-.83.46L6.84,26.54A1,1,0,0,1,6,27Z" />
                </g>
                <g id="frame">
                    <rect class="cls-1" height="32" width="32" />
                </g>
            </svg>
        </div>
        @endisset
        <div class="flex flex-col w-full">
            <div class="flex flex-col md:flex-row w-full">
                <div class="md:w-4/6 m-4 leading-relaxed">
                    <div class="text-2xl font-bold uppercase">{{ $selectedTask->title }}</div>
                    <div>Description : <span class="font-bold">{{ $selectedTask->note }}</span></div>
                    <div>Pickup from : <span class="font-bold">{{ $selectedTask->from_address }}</span></div>
                    <div>Deliver to : <span class="font-bold">{{ $selectedTask->to_address }}</span></div>
                    <div>Delivery date / time : <span class="font-bold">
                            {{ isset($selectedTask->to_date) ? $selectedTask->to_date : date('d. M. Y', strtotime($selectedTask->to_date_manually)) }}
                            <span>/</span>
                            {{ isset($selectedTask->to_time) ? $selectedTask->to_time : date('H:i', strtotime($selectedTask->to_time_manually)) }}</span>
                    </div>
                    <div class="text-lg">
                        {{ "Fits in a ". $selectedTask->size.', '.$selectedTask->total_distance.' km'}}
                    </div>
                    <br />
                    <div>Bringer's reward <span class="font-bold">{{ $selectedTask->reward }} NOK</span></div>
                    <div>Insurance and Service fee <span class="font-bold">{{ $selectedTask->service_charge }}
                            NOK</span>
                    </div>
                    <div>Included insurance <span class="font-bold">{{ $selectedTask->insurance_cost }} NOK</span></div>
                </div>
                <div class="flex flex-col md:w-2/6 m-4 md:self-start md:justify-end md:text-right leading-relaxed">
                    <span class="text-gray-600 text-xl font-bold">Total delivery cost</span>
                    <span class="font-bold text-4xl ">{{ $selectedTask->recommended_cost}} NOK</span>
                    <span>Inclusive of VAT if applicable</span>
                </div>
            </div>
            <div class="flex flex-col w-full md:flex-row mx-2 space-y-2 md:space-y-0">
                <div class="flex flex-row w-full mx-2 space-x-2">
                    <span>Extra needs :&nbsp</span>
                    <span class="font-bold">
                        @if($selectedTask->is_fraglile == 1)
                        Fragle,&nbsp
                        @endif
                        @if($selectedTask->need_animal_cage == 1)
                        Animal Cage,&nbsp
                        @endif
                        @if($selectedTask->need_cooling_equipment == 1)
                        Cooling Equipment,
                        @endif
                        @if($selectedTask->need_help_wrapping == 1)
                        Wrapping,&nbsp
                        @endif
                        @if($selectedTask->help_pick_up == 1)
                        Help Pick Up,&nbsp
                        @endif
                        @if($selectedTask->help_delivery == 1)
                        Help Delivery&nbsp
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div x-show="!openContact" class="flex flex-col md:flex-row md:space-x-4">
        <button wire:click="$emit('movePage', 'home')"
            class="py-2 px-4  bg-gray-600 hover:bg-black text-white w-full text-center text-base font-semibold shadow-md rounded-lg">Back
            to Search</button>
        <button @click="openContact = true"
            class="mt-4 md:mt-0 py-2 px-4 bg-blue-600 hover:bg-black text-white w-full text-center text-base font-semibold shadow-md rounded-lg">Contact
            Sender @icon('envelope')</button>
    </div>
    @livewire('search.contact-sender-page', ['selectedTask' => $selectedTask])
</div>