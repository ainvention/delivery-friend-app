<div>
    <div
        class="flex flex-col justify-center space-y-4 my-20 mx-4 xl:mx-4 px-2 bg-white rounded-lg pt-0 p-6  text-gray-500">
        @include('livewire.components.sessionMessage')
        <div
            class="flex flex-col text-center mb-5 text-4xl item-center justify-center px-4 py-1 dark:text-white rounded-full leading-relaxed font-semibold tracking-wide">
            What do you want to send ?
            </h2>
            <span class="text-lg">or <a href="/search" class="text-blue-500">
                    to help sender
                </a>
            </span>
        </div>
        <div class="border-b-2 border-gray-200">
            {{ $tasks->count()}} deliveries found
        </div>
        @foreach ($tasks as $task)
        <div class="flex flex-col sm:flex-row .shadow-lg pb-4 border-b-2 border-gray-200 text-left">
            <div class="flex flex-col sm:flex-row sm:w-full">
                <div class="w-28 px-2 sm:self-center">
                    <img src=" {{ asset('storage/'.$task->photo) }}" alt="item photo">
                </div>

                <div class="w-full space-y-2">
                    <div class="text-2xl font-bold uppercase">{{ $task->title }}</div>
                    <div>{{ $task->simple_from_address }}
                        <span class="px-2 text-gray-500 self-center">@icon('long-arrow-alt-right
                            ')</span>
                        {{ $task->simple_to_address }}</div>
                    <div>
                        {{ "Fits in a ". $task->size.', '.$task->total_distance.' km, Posted'.$task->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row sm:w-full">
                <div class="flex sm:w-2/5 font-bold text-2xl self-center">
                    {{ $task->total_delivery_cost}} NOK
                </div>
                <div class="flex-row sm:w-full justify-center">
                    {{-- <img src="{{ asset('storage/'.$users->where('id', $task->user_id)->get('profile_photo_path')) }}"
                    --}}
                    <div class="flex sm:w-full">
                        <img src="{{ asset('storage/'.$task->photo) }}" alt="user avatar"
                            class="object-scale-down w-12 h-auto p-2">
                        <div class="p-2 text-sm">
                            <div class="text-gray-400">SENDER</div>
                            <div class="uppercase text-gray-800">{{ $task->user_name }}</div>
                        </div>
                    </div>
                    <button wire:click="detail(task.id)"
                        class="w-full h-1/3 text-lg border-2 border-gray-200 bg-green-400 text-white hover:text-gray-600 hover:border-gray-500 rounded-lg">See
                        more
                        details @icon('hand-point-right')

                    </button>
                </div>
            </div>
        </div>
        @endforeach
        {{ $tasks->links() }}
    </div>
</div>
</div>
