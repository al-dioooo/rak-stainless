@extends('layout.no-nav')
@section('title', 'Set Address')

@section('content')
    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="w-auto h-12 mx-auto" src="{{ asset($icon) }}"
                   >
                <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 dark:text-gray-100">
                    @isset($id)
                        Set your new address
                    @else
                        Set your address
                    @endisset
                </h2>
            </div>
            <form class="mt-8 space-y-6" method="POST" action="{{ isset($id) ? route('user.address.update', ['id' => $id]) : route('user.address.save') }}">
                @csrf
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="address" class="sr-only">Address</label>
                        <input id="address" name="address" type="text"
                            class="transition appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 @error('address') border-red-300  @enderror placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm"
                            placeholder="Address">
                    </div>
                    <div>
                        <label for="postal" class="sr-only">Postal Code</label>
                        <input id="postal" name="postal" type="text"
                            class="transition appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 @error('postal') border-red-300  @enderror placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm"
                            placeholder="Postal Code">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition border border-transparent rounded-md bg-primary-600 group hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <!-- Heroicon name: solid/lock-closed -->
                            <svg class="w-5 h-5 text-primary-500 group-hover:text-primary-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        Set address
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
