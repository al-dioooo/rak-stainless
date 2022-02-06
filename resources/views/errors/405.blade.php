@extends('layout.no-nav')
@section('title', 'Method not allowed')

@section('content')
    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="w-auto h-12 mx-auto" src="{{ asset($icon) }}"
                    alt="{{ $store }}">
                <p class="mt-6 font-semibold text-center uppercase text-primary-600">
                    405 Error
                </p>
                <h2 class="text-3xl font-extrabold text-center text-gray-900 dark:text-gray-100">
                    Method not allowed
                </h2>
                <p class="my-2 text-center">
                    The <span class="font-semibold text-primary-700">GET</span> method is not allowed for this route
                </p>
            </div>
        </div>
    </div>
@endsection
