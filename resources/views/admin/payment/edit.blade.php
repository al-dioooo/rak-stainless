@extends('layout.app-admin')
@section('title', 'Edit payment')

@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Payment
        </h2>
        <div class="container mx-auto">
            <form action="{{ route('admin.payment.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $payment->id }}">
                <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Payment Info
                </h4>
                <div class="px-4 py-3 mb-8 space-y-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-3 lg:grid-cols-4">
                        <div>
                            <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                            <input type="text" name="company" id="company" autocomplete="none"
                                value="{{ old('company') ?: $payment->company }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('company') border-red-500 @enderror">
                            @error('company')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                            <select id="type" name="type"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                <option value="Bank" {{ $payment->type == 'Bank' ? 'selected' : '' }}>Bank</option>
                                <option value="Digital" {{ $payment->type == 'Digital' ? 'selected' : '' }}>Digital
                                </option>
                            </select>
                        </div>

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" autocomplete="none"
                                value="{{ old('name') ?: $payment->name }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label for="number" class="block text-sm font-medium text-gray-700">Number</label>
                            <input type="text" name="number" id="number" autocomplete="none"
                                value="{{ old('number') ?: $payment->number }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('number') border-red-500 @enderror">
                            @error('number')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Edit payment
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
