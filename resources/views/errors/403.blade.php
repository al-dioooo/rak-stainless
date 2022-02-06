@extends('layout.no-nav')
@section('title', 'Access forbidden')

@section('content')
    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="w-auto h-12 mx-auto" src="{{ asset($icon) }}"
                    alt="{{ $store }}">
                <p class="mt-6 font-semibold text-center uppercase text-primary-600">
                    403 Error
                </p>
                <h2 class="text-3xl font-extrabold text-center text-gray-900 dark:text-gray-100">
                    Access forbidden
                </h2>
            </div>
        </div>
    </div>
@endsection
