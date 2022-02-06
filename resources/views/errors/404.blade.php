@extends('layout.no-nav')
@section('title', 'Page not found')

@section('content')
    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="w-auto h-12 mx-auto" src="{{ asset($icon) }}"
                    alt="{{ $store }}">
                <p class="mt-6 font-semibold text-center uppercase text-primary-600">
                    404 Error
                </p>
                <h2 class="text-3xl font-extrabold text-center text-gray-900 dark:text-gray-100">
                    Page not found
                </h2>
                <p class="my-2 text-center">
                    It's look like the page you're looking doesn't exist.
                </p>
            </div>
        </div>
    </div>
@endsection
