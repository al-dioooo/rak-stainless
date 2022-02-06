@extends('layout.no-nav')
@section('title', 'Confirm Password')

@section('content')
    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="w-auto h-12 mx-auto" src="{{ asset($icon) }}"
                    alt="{{ $store }}">
                <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900">
                    Confirm Password
                </h2>
                <p class="font-medium text-center text-primary-600 hover:text-primary-500">
                    Please confirm your password before continuing.
                </p>
            </div>
            <form class="mt-8 space-y-6" method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="new-password"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 @error('password') border-red-300  @enderror placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm"
                            placeholder="Password">
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}"
                                class="font-medium no-underline text-primary-600 hover:text-primary-500">
                                Forgot your password?
                            </a>
                        </div>
                    @endif
                </div>
                <div>
                    <button type="submit"
                        class="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md group bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500">
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
                        Confirm password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
