@extends('layout.no-nav')
@section('title', 'Set Address')

@section('content')
    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="w-auto h-12 mx-auto" src="{{ asset($icon) }}"
                   >
                <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 dark:text-gray-100">
                    Your address
                </h2>
            </div>
            <div class="flex flex-col p-8 space-y-4 bg-white shadow rounded-xl">
                <div class="flex justify-between">
                    <h5 class="font-semibold">Address</h5>
                    <h5>{{ $address->address }}</h5>
                </div>
                <hr>
                <div class="flex justify-between">
                    <h5 class="font-semibold">Postal Code</h5>
                    <h5>{{ $address->postal_code }}</h5>
                </div>
            </div>
            <a href="{{ route('user.address.change', ['id' => $address->id]) }}"
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
                Change address
            </a>
        </div>
    </div>
@endsection
