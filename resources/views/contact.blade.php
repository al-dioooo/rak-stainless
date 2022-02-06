@extends('layout.app')
@section('title', 'Contact')

@section('floating')
    <x-floating></x-floating>
@endsection

@section('content')
    <div class="container p-8">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    Contact
                </h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Sales
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $info->where('key', 'sales')->first()->value }}
                        </dd>
                    </div>
                    <div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Email
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <a class="font-medium text-indigo-600 hover:text-indigo-500" href="{{ 'mailto:' . $info->where('key', 'email')->first()->value }}">{{ $info->where('key', 'email')->first()->value }}</a>
                        </dd>
                    </div>
                    <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Contact
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <a class="font-medium text-indigo-600 hover:text-indigo-500" href="{{ 'tel:62' . $info->where('key', 'contact')->first()->value }}">{{ '+62' . $info->where('key', 'contact')->first()->value }}</a>
                        </dd>
                    </div>
                    <div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            WhatsApp
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <a class="font-medium text-indigo-600 hover:text-indigo-500" target="_blank" href="{{ 'https://wa.me/' . $whatsapp }}">Chat on WhatsApp</a>
                        </dd>
                    </div>
                    <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Store Address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $info->where('key', 'address')->first()->value }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
@endsection
