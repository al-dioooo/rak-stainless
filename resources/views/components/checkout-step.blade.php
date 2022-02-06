@props(['active' => false])

<div class="w-full py-6 border-b">
    <div class="flex">
        <div class="w-1/3">
            <div class="relative z-30 mb-2">
                <div
                    class="{{ $active == 1 ? 'bg-primary-500 transform scale-150' : 'bg-gray-300' }} flex items-center w-3 h-3 mx-auto text-lg rounded-full">
                </div>
            </div>

            <div class="text-xs text-center md:text-base">Shipping</div>
        </div>

        <div class="w-1/3">
            <div class="relative z-20 mb-2">
                <div
                    class="absolute z-0 flex items-center content-center w-full align-middle transform -translate-x-1/2 -translate-y-1/2 top-1/2 align-center">
                    <div class="w-full py-px bg-gray-300"></div>
                </div>

                <div
                    class="{{ $active == 2 ? 'bg-primary-500 transform scale-150' : 'bg-gray-300' }} flex items-center w-3 h-3 mx-auto text-lg text-white bg-gray-300 rounded-full">
                </div>
            </div>

            <div class="text-xs text-center md:text-base">Total</div>
        </div>

        <div class="w-1/3">
            <div class="relative z-10 mb-2">
                <div class="absolute flex items-center content-center align-middle align-center"
                    style="width: 100%; top: 50%; transform: translate(-50%, -50%)">
                    <div class="w-full py-px bg-gray-300"></div>
                </div>

                <div
                    class="{{ $active == 3 ? 'bg-primary-500 transform scale-150' : 'bg-gray-300' }} flex items-center w-3 h-3 mx-auto text-lg text-white bg-gray-300 rounded-full">
                </div>
            </div>

            <div class="text-xs text-center md:text-base">Review</div>
        </div>
    </div>
</div>
