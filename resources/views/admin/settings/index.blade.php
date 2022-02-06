@extends('layout.app-admin')
@section('title', 'Settings')

@section('content')

    <div class="container p-6">
        <h2 class="mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Settings
        </h2>

        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Store</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Information about the store.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Store
                                            name</label>
                                        <input type="text" name="name" id="name" autocomplete="none"
                                            value="{{ $info->where('key', 'name')->first()->value }}"
                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') border-red-300 @enderror ">
                                        @error('name')
                                            <p class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">
                                        Description
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="description" name="description" rows="3"
                                            class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('description') border-red-300 @enderror ">{{ $info->where('key', 'description')->first()->value }}</textarea>
                                    </div>
                                    @error('description')
                                        <p class="mt-2 text-sm text-red-500">
                                            {{ $message }}
                                        </p>
                                    @else
                                        <p class="mt-2 text-sm text-gray-500">
                                            Store description for search engine optimization.
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <div class="items-center bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Store Icon
                                        </label>
                                        <div class="flex items-center mt-2">
                                            <span class="inline-flex w-12 h-12 overflow-hidden bg-white rounded-full">
                                                <img id="image" src="{{ asset($icon) }}" alt=""
                                                    class="object-cover bg-white">
                                            </span>
                                            <label for="icon"
                                                class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:bg-gray-50 focus:outline-none">
                                                Change
                                            </label>
                                        </div>
                                    </div>
                                    <input type="file" name="icon" id="icon" class="hidden" accept="image/*"
                                        x-on:change="view()">
                                </div>
                            </div>
                            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                                <input type="submit" value="Save" name="info"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm cursor-pointer hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Banner</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Information on user home page banner.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                        <input type="text" name="title" id="title" autocomplete="none"
                                            value="{{ $info->where('key', 'title')->first()->value }}"
                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('title') border-red-300 @enderror ">
                                        @error('title')
                                            <p class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="subtitle" class="block text-sm font-medium text-gray-700">
                                        Subtitle
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="subtitle" name="subtitle" rows="3"
                                            class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('subtitle') border-red-300 @enderror ">{{ $info->where('key', 'subtitle')->first()->value }}</textarea>
                                    </div>
                                    @error('subtitle')
                                        <p class="mt-2 text-sm text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <div class="block text-sm font-medium text-gray-700">
                                        Items
                                    </div>
                                    <div class="flex items-center mt-2 space-x-4">
                                        @foreach ($featured as $row)
                                            <span class="inline-flex w-12 h-12 overflow-hidden bg-white rounded-full">
                                                <img src="{{ asset('image/products') . '/' . $row->pict }}" alt="" class="object-cover bg-white">
                                            </span>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                                <input type="submit" value="Save" name="banner"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm cursor-pointer hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Contact</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Contact information on contact page.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="sales" class="block text-sm font-medium text-gray-700">Sales
                                            name</label>
                                        <input type="text" name="sales" id="sales" autocomplete="none"
                                            value="{{ $info->where('key', 'sales')->first()->value }}"
                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('sales') border-red-300 @enderror ">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email
                                            address</label>
                                        <input type="text" name="email" id="email" autocomplete="none"
                                            value="{{ $info->where('key', 'email')->first()->value }}"
                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-300 @enderror ">
                                        @error('email')
                                            <p class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @else
                                            <p class="mt-2 text-sm text-gray-500">
                                                Use store email address.
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="contact" class="block text-sm font-medium text-gray-700">Contact</label>
                                        <div class="flex mt-1 rounded-md shadow-sm">
                                            <span
                                                class="inline-flex items-center px-3 text-sm text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50">
                                                +62
                                            </span>
                                            <input type="text" name="contact" id="contact"
                                                value="{{ $info->where('key', 'contact')->first()->value }}"
                                                class="flex-1 block w-full border-gray-300 rounded-none focus:ring-indigo-500 focus:border-indigo-500 rounded-r-md sm:text-sm @error('contact') border-red-300 @enderror ">
                                        </div>
                                        @error('contact')
                                            <p class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="whatsapp"
                                            class="block text-sm font-medium text-gray-700">WhatsApp</label>
                                        <div class="flex mt-1 rounded-md shadow-sm">
                                            <span
                                                class="inline-flex items-center px-3 text-sm text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50">
                                                wa.me/
                                            </span>
                                            <input type="text" name="whatsapp" id="whatsapp"
                                                value="{{ $info->where('key', 'whatsapp')->first()->value }}"
                                                class="flex-1 block w-full border-gray-300 rounded-none focus:ring-indigo-500 focus:border-indigo-500 rounded-r-md sm:text-sm @error('whatsapp') border-red-300 @enderror">
                                        </div>
                                        @error('whatsapp')
                                            <p class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6">
                                        <label for="instagram"
                                            class="block text-sm font-medium text-gray-700">Instagram</label>
                                        <div class="flex mt-1 rounded-md shadow-sm">
                                            <span
                                                class="inline-flex items-center px-3 text-sm text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50">
                                                instagram.com/
                                            </span>
                                            <input type="text" name="instagram" id="instagram"
                                                value="{{ $info->where('key', 'instagram')->first()->value }}"
                                                class="flex-1 block w-full border-gray-300 rounded-none focus:ring-indigo-500 focus:border-indigo-500 rounded-r-md sm:text-sm @error('instagram') border-red-300 @enderror">
                                        </div>
                                        @error('instagram')
                                            <p class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6">
                                        <label for="youtube" class="block text-sm font-medium text-gray-700">YouTube</label>
                                        <div class="flex mt-1 rounded-md shadow-sm">
                                            <span
                                                class="inline-flex items-center px-3 text-sm text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50">
                                                youtube.com/channel/
                                            </span>
                                            <input type="text" name="youtube" id="youtube"
                                                value="{{ $info->where('key', 'youtube')->first()->value }}"
                                                class="flex-1 block w-full border-gray-300 rounded-none focus:ring-indigo-500 focus:border-indigo-500 rounded-r-md sm:text-sm @error('youtube') border-red-300 @enderror">
                                        </div>
                                        @error('youtube')
                                            <p class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                        <select id="city" name="city" autocomplete="none"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @foreach ($province as $prow)
                                                <optgroup label="{{ $prow->name }}">
                                                    @foreach ($prow->city as $row)
                                                        <option value="{{ $row->city_id }}"
                                                            {{ $info->where('key', 'city')->first()->value == $row->city_id ? 'selected' : '' }}>
                                                            {{ $row->type . ' ' . $row->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="postal" class="block text-sm font-medium text-gray-700">ZIP /
                                            Postal</label>
                                        <input type="text" name="postal" id="postal" autocomplete="none"
                                            value="{{ $info->where('key', 'postal')->first()->value }}"
                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('postal') border-red-300 @enderror ">
                                        @error('postal')
                                            <p class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6">
                                        <label for="address" class="block text-sm font-medium text-gray-700">Street
                                            address</label>
                                        <input type="text" name="address" id="address" autocomplete="none"
                                            value="{{ $info->where('key', 'address')->first()->value }}"
                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('address') border-red-300 @enderror ">
                                        @error('address')
                                            <p class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                                <input type="submit" value="Save" name="contactSection"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm cursor-pointer hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function view() {
            const [file] = icon.files
            if (file) {
                image.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
