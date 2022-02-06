@extends('layout.app-admin')
@section('title', 'Add faq')

@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Add Frequently Asked Question
        </h2>
        <div class="container mx-auto">
            <form action="{{ route('admin.faq.store') }}" method="POST">
                @csrf
                <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Info
                </h4>
                <div class="px-4 py-3 mb-8 space-y-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div>
                        <label for="question" class="block text-sm font-medium text-gray-700">Question</label>
                        <input type="text" name="question" id="question" autocomplete="none" value="{{ old('question') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('question') border-red-500 @enderror">
                        @error('question')
                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="answer" class="block text-sm font-medium text-gray-700">
                            Answer
                        </label>
                        <div class="mt-1">
                            <textarea id="answer" name="answer" rows="3" autocomplete="none"
                                class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('answer') border-red-500 @enderror ">{{ old('answer') }}</textarea>
                            @error('answer')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit"
                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Add faq
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
