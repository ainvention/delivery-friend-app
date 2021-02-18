<div
    class="flex flex-col justify-center my-10 mx-4 xl:mx-4 px-2 bg-white rounded-lg  text-gray-500  sm:tracking-widest">
    @include('livewire.components.sessionMessage')
    <div
        class="text-center flex mb-5 text-4xl justify-center px-4 py-1 dark:text-white rounded-full leading-relaxed font-semibold tracking-wide text-gray-500">
        What's the size
    </div>

    <div class="flex justify-center mx-4 md:mx-0">
        <div class="flex flex-wrap mx-3 mb-10">
            <div class="flex flex-col w-full h-auto px-3 mb-6">
                <table class="table-auto">
                    <tbody>
                        <tr class="flex flex-col sm:flex-row">
                            <td><input wire:model.ignore=size value='POCKET' type="radio" name="POCKET"
                                    class="w-8 h-8 m-4 border-1 border-gray-400" />
                            </td>
                            <td class="flex flex-col ml-4">
                                <label for="walk" class="text-lg tex-black">Fits in
                                    a
                                    Pocket</label>
                                <span>Phone, keys, glasses etc.</span>
                            </td>
                            <td class="ml-4">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="20.000000pt"
                                    height="20.000000pt" viewBox="0 0 757.000000 1280.000000"
                                    preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)"
                                        fill="#000000" stroke="none">
                                        <path
                                            d="M4084 12786 c-416 -68 -756 -378 -860 -785 -125 -485 105 -988 553 -1210 165 -82 277 -106 478 -105 139 1 173 4 257 27 363 97 649 374 752 728 75 260 51 520 -69 764 -139 281 -387 483 -690 561 -123 31 -301 40 -421 20z" />
                                        <path
                                            d="M3765 10455 c-149 -24 -309 -86 -443 -172 -74 -46 -2133 -1715 -2202 -1783 -60 -59 -99 -121 -124 -197 -22 -70 -474 -2108 -482 -2173 -8 -72 15 -180 56 -260 87 -172 293 -278 483 -249 91 14 195 68 266 140 91 91 122 163 177 409 55 250 351 1598 356 1623 2 13 738 620 745 614 1 -1 -254 -1134 -567 -2518 l-568 -2516 -685 -1150 c-377 -633 -697 -1177 -710 -1209 -91 -218 -88 -412 9 -613 38 -78 60 -108 132 -181 99 -99 186 -152 304 -187 250 -72 497 -13 689 164 33 31 80 84 103 117 81 114 1517 2546 1576 2669 l59 122 178 823 c97 452 180 821 184 820 12 -6 1529 -1669 1529 -1677 0 -16 459 -2425 476 -2496 58 -253 250 -466 488 -541 330 -104 696 50 852 358 71 140 93 324 60 499 -8 41 -45 233 -81 425 -36 192 -115 608 -175 924 -60 316 -139 733 -175 925 -65 345 -95 462 -134 526 -11 18 -442 532 -958 1142 -516 609 -937 1114 -936 1120 8 44 475 2093 478 2096 2 2 96 -181 208 -406 158 -315 215 -420 251 -460 57 -63 1612 -1139 1711 -1184 189 -85 399 -46 539 100 173 182 179 463 13 647 -31 35 -269 204 -785 560 l-740 509 -145 290 c-643 1278 -931 1841 -966 1888 -257 349 -656 525 -1046 462z" />
                                    </g>
                                </svg>
                            </td>
                        </tr>
                        <tr class="flex flex-col sm:flex-row">
                            <td><input wire:model.ignore=size type="radio" value='BAG' name="BAG"
                                    class="w-8 h-8 m-4 border-1 border-gray-400" />
                            </td>
                            <td class="flex flex-col ml-4"><label for="BAG" class="text-lg tex-black">Fits in
                                    a
                                    Bag</label><span>Laptop,
                                    book, clothes etc.</span></td>
                            <td class="ml-4">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="32" height="32px"
                                    viewBox="0 0 594.672 594.672" style="enable-background:new 0 0 594.672 594.672;"
                                    xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M488.094,434.415c-45.456,0-82.363-36.889-82.363-82.363c0-24.405,10.658-46.247,27.53-61.33l20.743,48.101
                                               c3.935,9.077,8.104,9.841,9.113,9.895h0.199h15.573c8.359,0,5.488-8.504,4.398-11.157l-26.613-61.643
                                               c9.704-3.998,20.308-6.242,31.419-6.242c45.476,0,82.382,36.884,82.382,82.369C570.476,397.545,533.569,434.415,488.094,434.415
                                               L488.094,434.415z M401.924,225.508L286.015,327.329c0,0.018,0,0.018,0,0.018c-13.628,11.939-20.261-0.972-20.361-1.181
                                               l-49.246-97.773l0,0c-4.379-8.708,3.816-9.872,7.478-9.972h166.653c0,0,11.466-0.104,12.602,2.485v0.009
                                               C403.877,222.605,404.004,223.686,401.924,225.508L401.924,225.508z M237.896,346.491l-24.995-2.081
                                               c-1.327-32.745-17.386-61.606-41.772-80.232l10.085-17.118c8.727-14.805,16.327,0.009,16.327,0.009l0,0
                                               c16.478,32.359,33.931,66.64,44.107,86.739C241.658,333.816,248.49,347.354,237.896,346.491L237.896,346.491z M140.873,338.468
                                               c-0.027-0.026-0.027-0.026-0.059-0.026c-12.334-1.027-4.493-15.064-4.043-15.828l20.67-35.158
                                               c16.741,13.184,28.23,32.686,30.851,54.928L140.873,338.468L140.873,338.468z M106.56,434.533
                                               c-45.479,0-82.377-36.897-82.377-82.382c0-45.493,36.889-82.363,82.377-82.363c9.981,0,19.498,1.872,28.357,5.115l-38.833,65.981
                                               c-1.108,1.872-1.554,3.889-1.704,5.888c-0.027,0.2-0.132,0.327-0.15,0.509c-0.063,0.846,0.186,1.581,0.282,2.399
                                               c0.082,0.509,0.036,0.963,0.172,1.472c1.222,5.179,5.501,9.285,11.103,9.758l81.632,6.76
                                               C180.173,405.704,146.742,434.533,106.56,434.533L106.56,434.533z M488.094,242.153c-14.982,0-29.266,3.125-42.23,8.745
                                               L401.27,147.56c-1.127-2.63-3.126-4.493-5.388-5.915c-1.972-1.367-4.262-2.335-6.869-2.335h-82.728
                                               c-6.923,0-12.52,5.602-12.52,12.511c0,6.905,5.597,12.507,12.52,12.507h63.456c3.062,0.159,9.495,1.29,12.257,7.664l5.016,11.603
                                               l0,0l0.954,2.176c0.918,2.708,1.281,6.969-5.624,6.969h-174c-7.964,0-11.726-4.193-13.333-6.81l-1.022-2.053v-0.032l-5.129-10.149
                                               c0,0,0,0,0-0.009l-0.054-0.091l-0.932-1.872l-0.1-0.009l-2.095-3.78c-0.454-1.181-0.291-3.125,6.047-3.125h24.173
                                               c0,0,14.201,1.181,14.601-11.843c0.2-6.71-4.525-13.611-10.844-13.611c-6.306,0-85.058,0-85.058,0s-13.611-1.572-14.392,12.729
                                               c0,6.401,5.315,12.725,12.82,12.725c2.744,0,6.505-0.018,10.135-0.063c4.761,0.132,12.911,1.136,15.591,6.306l0,0l1.09,2.04
                                               c2.667,5.247,6.978,13.688,12.207,23.928c0.381,0.727,0.772,1.536,1.172,2.29c0.995,2.662,1.758,7.5-1.935,13.788l-22.342,37.952
                                               c-12.988-5.638-27.294-8.809-42.377-8.809C47.729,242.24,0,289.94,0,348.79c0,58.858,47.729,106.577,106.568,106.577
                                               c51.749,0,94.843-36.889,104.52-85.771l53.63,4.442c2.171,0.191,4.197-0.363,6.069-1.181c2.362-0.399,4.707-1.182,6.624-2.898
                                               l129.937-114.11c1.781-1.526,8.123-6.31,10.703-0.373l4.144,9.622c-24.714,19.517-40.659,49.673-40.659,83.617
                                               c0,58.858,47.71,106.56,106.55,106.56c58.858,0,106.587-47.701,106.587-106.56C594.681,289.873,546.952,242.153,488.094,242.153
                                               L488.094,242.153z" />
                                        </g>
                                    </g>
                                </svg>
                            </td>
                        </tr>
                        <tr class="flex flex-col sm:flex-row">
                            <td><input wire:model.ignore=size type="radio" value="CAR" name="CAR"
                                    class="w-8 h-8 m-4 border-1 border-gray-400" />
                            </td>
                            <td class="flex flex-col ml-4"><label for="CAR" class="text-lg tex-black">Fits in
                                    a
                                    Car</label><span>Painting, guitar, pet etc.</span></td>
                            <td class="ml-4">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32px"
                                    viewBox="0 0 304.328 304.328" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    enable-background="new 0 0 304.328 304.328">
                                    <path
                                        d="m53.187,166.201c-13.039,0-23.645,10.606-23.645,23.645 0,13.045 10.606,23.657 23.645,23.657 13.045,0 23.651-10.612 23.651-23.657 0.006-13.039-10.605-23.645-23.651-23.645zm0,30.014c-3.51,0-6.362-2.852-6.362-6.368 0-3.504 2.852-6.362 6.362-6.362 3.516,0 6.368,2.858 6.368,6.362 0.001,3.516-2.852,6.368-6.368,6.368z" />
                                    <path
                                        d="m252.083,166.201c-13.045,0-23.651,10.606-23.651,23.645 0,13.045 10.606,23.657 23.651,23.657 13.039,0 23.645-10.612 23.645-23.657 0.006-13.039-10.606-23.645-23.645-23.645zm0,30.014c-3.516,0-6.368-2.852-6.368-6.368 0-3.504 2.852-6.362 6.368-6.362 3.51,0 6.362,2.858 6.362,6.362 0.001,3.516-2.852,6.368-6.362,6.368z" />
                                    <rect width="101.893" x="101.689" y="187.565" height="17.295" />
                                    <polygon
                                        points="298.803,161.929 285.432,143.406 261.758,130.582 233.036,126.414 206.713,126.414     190.863,96.808 155.953,90.824 106.148,90.824 64.201,102.862 23.011,140.46 0,185.952 15.426,193.759 37.011,151.09     72.863,118.369 108.581,108.118 154.486,108.118 179.61,112.42 196.358,143.703 231.785,143.703 256.228,147.248 273.726,156.73     282.644,169.083 287.411,191.64 304.328,188.065   " />
                                </svg>
                            </td>
                        </tr>
                        <tr class="flex flex-col sm:flex-row">
                            <td><input wire:model.ignore=size type="radio" value='SUV' name="SUV"
                                    class="w-8 h-8 m-4 border-1 border-gray-400" />
                            </td>
                            <td class="flex flex-col ml-4"><label for="SUV" class="text-lg tex-black">Fits
                                    in a
                                    SUV as big car</label><span>Chari, mirror, small furniture, etc.</span></td>
                            <td class="ml-4">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40" height="40px"
                                    viewBox="0 0 305.445 305.445" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    enable-background="new 0 0 305.445 305.445">
                                    <path
                                        d="m251.577,167.677c-12.713,0-23.057,10.344-23.057,23.057 0,12.713 10.344,23.046 23.057,23.046s23.052-10.332 23.052-23.046c-0.001-12.713-10.339-23.057-23.052-23.057zm0,31.702c-4.767,0-8.644-3.877-8.644-8.639 0-4.767 3.877-8.65 8.644-8.65 4.762,0 8.639,3.883 8.639,8.65 0.005,4.762-3.872,8.639-8.639,8.639z" />
                                    <path
                                        d="m50.289,167.677c-12.713,0-23.052,10.344-23.052,23.057 0,12.713 10.338,23.046 23.052,23.046s23.052-10.332 23.052-23.046c-0.001-12.713-10.339-23.057-23.052-23.057zm0,31.702c-4.762,0-8.644-3.877-8.644-8.639 0-4.767 3.883-8.65 8.644-8.65 4.767,0 8.644,3.883 8.644,8.65 0.006,4.762-3.871,8.639-8.644,8.639z" />
                                    <rect width="113.448" x="93.458" y="191.13" height="17.289" />
                                    <polygon
                                        points="299.001,155.977 289.606,134.31 215.463,125.212 181.456,91.665 54.614,91.665 54.596,91.688 31.632,91.688     31.632,99.069 48.199,99.069 0,154.719 0,184.261 17.289,184.261 17.289,161.163 62.507,108.954 174.36,108.954 207.511,141.662     277.679,150.26 284.617,166.263 288.157,169.482 288.157,191.974 305.445,191.974 305.445,161.833   " />
                                </svg>
                            </td>
                        </tr>
                        <tr class="flex flex-col sm:flex-row">
                            <td><input wire:model.ignore=size type="radio" value='VAN' name="VAN"
                                    class="w-8 h-8 m-4 border-1 border-gray-400" />
                            </td>
                            <td class="flex flex-col ml-4"><label for="VAN" class="text-lg tex-black">Fits in
                                    a
                                    Van</label><span>Sofas,
                                    dining table, piano, boat, etc.</span></td>
                            <td class="ml-4">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="45" height="45px"
                                    viewBox="0 0 31.224 31.224" style="enable-background:new 0 0 31.224 31.224;"
                                    xml:space="preserve">
                                    <path d="M21.427,21.712h-11.38c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h11.38c0.276,0,0.5,0.224,0.5,0.5
                                               S21.703,21.712,21.427,21.712z" />
                                    <path d="M7.339,24.42c-1.77,0-3.209-1.439-3.209-3.208c0-1.77,1.439-3.209,3.209-3.209c1.769,0,3.208,1.439,3.208,3.209
                                               C10.547,22.98,9.107,24.42,7.339,24.42z M7.339,19.003c-1.218,0-2.209,0.991-2.209,2.209s0.991,2.208,2.209,2.208
                                               s2.208-0.99,2.208-2.208S8.557,19.003,7.339,19.003z" />
                                    <path d="M24.135,24.42c-1.769,0-3.208-1.439-3.208-3.208c0-1.77,1.439-3.209,3.208-3.209c1.77,0,3.209,1.439,3.209,3.209
                                               C27.344,22.98,25.904,24.42,24.135,24.42z M24.135,19.003c-1.218,0-2.208,0.991-2.208,2.209s0.99,2.208,2.208,2.208
                                               s2.209-0.99,2.209-2.208S25.353,19.003,24.135,19.003z" />
                                    <path d="M21.431,21.712H10.048c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h11.383c0.276,0,0.5,0.224,0.5,0.5
                                           S21.707,21.712,21.431,21.712z" />
                                    <path d="M28.833,21.712h-1.992c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h1.992c0.767,0,1.391-0.624,1.391-1.391v-1.931
                                           c0-0.712-0.29-1.408-0.796-1.911l-2.243-2.229c-0.042-0.042-0.076-0.091-0.102-0.145l-1.839-3.98
                                           c-0.371-0.803-1.182-1.321-2.065-1.321H2.584C1.711,7.804,1,8.515,1,9.388v9.934c0,0.767,0.623,1.391,1.39,1.391h2.236
                                           c0.276,0,0.5,0.224,0.5,0.5s-0.224,0.5-0.5,0.5H2.39C1.072,21.712,0,20.64,0,19.321V9.388c0-1.425,1.159-2.584,2.584-2.584h20.595
                                           c1.272,0,2.439,0.746,2.974,1.901l1.801,3.899l2.18,2.166c0.693,0.688,1.091,1.644,1.091,2.62v1.931
                                           C31.224,20.64,30.151,21.712,28.833,21.712z" />
                                    <path d="M21.498,14.838H7.095c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h14.403c0.276,0,0.5,0.224,0.5,0.5
                                           S21.774,14.838,21.498,14.838z" />
                                </svg>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            @error($size) @include('livewire.components.error-messages.required')
            @enderror
            <div class="flex flex-col sm:flex-row sm:space-x-4 justify-between w-full md:w-full">
                <button wire:click.prevent="moveBack" wire:key=step2back
                    class="py-2 px-4  bg-red-600 hover:bg-black text-white w-full text-center text-base font-semibold shadow-md rounded-lg">Back</button>
                <button wire:click.prevent="moveStep3" wire:key=step2next
                    class="py-2 px-4  bg-blue-600 hover:bg-black text-white w-full text-center text-base font-semibold shadow-md rounded-lg {{ $size === null || strlen($size) < 3 ? 'disabled:opacity-50' : '' }}"
                    {{ $size === null || strlen($size) < 3 ? "disabled" : ""  }}>Next</button>
            </div>
        </div>
    </div>
</div>
