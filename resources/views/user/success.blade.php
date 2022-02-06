@extends('layout.no-nav')

@section('title')
    @if (Cookie::get('invoice') != null)
        Order success
    @else
        Sorry!
    @endif
@endsection

@section('content')
    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="w-auto h-12 mx-auto" src="{{ asset($icon) }}">
                @if (Cookie::get('invoice') != null)
                    <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 dark:text-gray-100">
                        Thanks!
                    </h2>
                    <p class="mt-2 text-center">
                        Your order has been successfully placed.
                    </p>
                    <p class="flex flex-col text-sm text-center text-red-600">
                        Please confirm your payment before
                        <span class="mt-4 text-base font-semibold">
                            {{ $due }}
                        </span>
                    </p>
                @else
                    <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 dark:text-gray-100">
                        Sorry!
                    </h2>
                    <p class="my-2 text-center">
                        You must place an order to access this page
                    </p>
                @endisset
        </div>
        @if (Cookie::get('invoice') != null)
            <div class="flex flex-col p-8 bg-white shadow rounded-xl">
                <div class="flex justify-between">
                    <h5 class="font-semibold">Invoice</h5>
                    <h5>{{ Cookie::get('invoice') }}</h5>
                </div>
            </div>
            <div class="flex justify-center">
                <a href="{{ route('user.order.index') }}"
                    class="inline-flex items-center font-semibold text-primary-700 hover:text-primary-600">
                    See detail
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
