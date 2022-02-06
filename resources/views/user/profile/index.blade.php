@extends('layout.app')
@section('title', 'Profile')

@section('content')
    <div class="container p-8">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    Profile
                </h3>
                <p class="max-w-2xl mt-1 text-sm text-gray-500">
                    Personal details and address info.
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Full name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $user->name }}
                        </dd>
                    </div>
                    <div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Email address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $user->email }}
                        </dd>
                    </div>
                    <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Address
                        </dt>
                        @if (isset($address))
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <ul class="border border-gray-200 divide-y divide-gray-200 rounded-md">
                                    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                        <div class="flex items-center flex-1 w-0">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="flex-shrink-0 w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span class="flex-1 w-0 ml-2 truncate">
                                                {{ $address->address. ', ' . $address->postal_code }}
                                            </span>
                                        </div>
                                        <div class="flex-shrink-0 ml-4">
                                            <a href="{{ route('user.address.change', ['id' => $user->id]) }}"
                                                class="font-medium text-primary-600 hover:text-primary-500">
                                                Edit
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </dd>
                        @else
                            <dd class="flex flex-col mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                You haven't set an address.
                                <a href="{{ route('user.address.index') }}"
                                    class="font-medium text-primary-600 hover:text-primary-500">
                                    Set an address
                                </a>
                            </dd>
                        @endif
                    </div>
                    <div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Orders
                        </dt>
                        @if (count($order) != null)
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <ul class="border border-gray-200 divide-y divide-gray-200 rounded-md">
                                    @foreach ($order as $row)
                                        <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                            <div class="flex items-center flex-1 w-0">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="flex-shrink-0 w-5 h-5 text-gray-400" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                                </svg>
                                                <span class="flex-1 w-0 ml-2 font-semibold truncate">
                                                    {{ $row->invoice }}
                                                    <span
                                                        class="font-normal">{{ 'ordered at ' . Carbon\Carbon::parse($row->created_at)->format('D, d M Y') }}</span>
                                                </span>
                                            </div>
                                            <div class="flex-shrink-0 ml-4">
                                                <a href="{{ route('user.order.detail', ['invoice' => $row->invoice]) }}"
                                                    class="font-medium text-primary-600 hover:text-primary-500">
                                                    View
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </dd>
                        @else
                            <dd class="flex flex-col mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                You haven't placed any order.
                                <a href="{{ route('user.product.index') }}"
                                    class="font-medium text-primary-600 hover:text-primary-500">
                                    Place an order
                                </a>
                            </dd>
                        @endif
                    </div>
                </dl>
            </div>
        </div>
    </div>
@endsection
