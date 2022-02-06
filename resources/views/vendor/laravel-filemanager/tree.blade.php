<div class="flex flex-col space-y-8">
    <div class="flex items-center mx-4 space-x-4">
        <img src="{{ $icon }}" class="h-10" alt="">
        <h1 class="text-lg font-semibold tracking-wide uppercase">{{ __('File Manager') }}</h1>
    </div>

    <ul class="flex flex-col overflow-hidden">
        @foreach ($root_folders as $root_folder)
            <li class="transition bg-gray-100 group hover:bg-gray-200">
                <a class="inline-flex items-center w-full p-4 space-x-2 text-primary-500 group-hover:text-primary-700" href=""
                    data-type="0" data-path="{{ $root_folder->url }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                    </svg>
                    <span>
                        {{ $root_folder->name }}
                    </span>
                </a>
            </li>
            @foreach ($root_folder->children as $directory)
                <li class="transform translate-x-8 group hover:bg-gray-200">
                    <a class="inline-flex items-center w-full p-4 space-x-2 text-primary-500 group-hover:text-primary-700" href=""
                        data-type="0" data-path="{{ $directory->url }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                        </svg>
                        <span>
                            {{ $directory->name }}
                        </span>
                    </a>
                </li>
            @endforeach
        @endforeach
    </ul>
</div>
