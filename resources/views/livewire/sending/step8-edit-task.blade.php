<div class="mx-auto">
    @include('livewire.components.sessionMessage')
    @include('livewire.sending.delete-task-confirmation')
    @include('livewire.components.photo-upload-modal')
    @include('livewire.components.task-detail')
    <div class="flex flex-col mx-4 mb-6 text-lg space-y-2 text-left md:mx-20 md:text-center ">
        <div class="flex">Sit back and relax :), we've notified our community of helpers about your delivery. Once we
            find a match we'll let you know. In the meantime, add more details below. The more information you share the
            easier it is to get a match.
        </div>
        <div class="flex flex-row w-1/2 mx-auto justify-evenly space-x-2">
            <div class="flex flex-col">
                <span class="text-gray-500">Views</span>
                <div class="flex flex-row space-x-2">
                    <span class="flex-auto text-gray-300 self-center">@icon('eye')</span>
                    <span class="font-bold text-xl">10</span>
                </div>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-500">Helpers notified</span>
                <div class="flex flex-row self-center space-x-2">
                    <span class="flex-auto text-gray-300 self-center">@icon('users')</span>
                    <span class="font-bold text-xl">138</span>
                </div>
            </div>
        </div>
    </div>
    {{-- divider --}}
    <div class="m-6 border-b-2 border-gray-200"></div>

    {{-- edit form--}}
    @include('livewire.components.edit-task')
</div>
