<x-guest-layout>
    <div class="md:h-20"></div>
    <div
        class="flex flex-col m-auto md:mt-10 justify-center space-y-4 text-gray-900 uppercase text-4xl md:text-6xl font-bold md:mx-4 text-center mb-10">
        <span>Send hva som
            helst,
            hvor
            som helst,</span>
        <span>når som helst.</span>
    </div>
    <div class=" w-8/12 mx-auto md:my-20">
        @include('livewire.components.svgs.delivery1')
    </div>
    <div class="flex flex-col md:flex-row mt-10">
        <div class="flex flex-col w-full md:w-1/2 mx-4 md:mx-10 mb-20 space-y-10">
            <a href="/companies">
                <button
                    class="w-full text-2xl xl:text-4xl font-bold leading-snug bg-green-400 rounded-2xl px-4 py-4 hover:bg-black hover:text-white">Frakt
                    for bedrifter<span class="mx-2 hover:bg-black hover:text-white">@icon('chevron-right
                        ')</span>
                </button>
            </a>
            <span class="text-xl md:text-3xl font-medium">
                Glade kunder gir mer salg. Tilbyr du hjemlevering til et presist tidspunkt, er sjansen større for at
                kundene dine fortsetter å handle hos deg. Det kan du tilby gjennom oss.
            </span>
        </div>
        <div class="flex flex-col w-full md:w-1/2 mx-4 md:mx-10 space-y-10">
            <a href="/individuals">
                <button
                    class="w-full text-2xl xl:text-4xl font-bold leading-snug bg-blue-400 rounded-2xl px-4 py-4 hover:bg-black hover:text-white">Og
                    for
                    private<span class="mx-2 hover:bg-black hover:text-white">@icon('chevron-right
                        ')</span>
                </button>
            </a>
            <span class="text-xl md:text-3xl font-medium">Du kan være sikker på at du alltid vil få tak i en som kan
                levere varene dine til det tidspunktet som
                passer best for deg.</span>
        </div>
    </div>
</x-guest-layout>
