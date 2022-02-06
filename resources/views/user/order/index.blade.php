@extends('layout.app')
@section('title', 'Order list')

@section('content')
    <div class="container mx-auto">
        @if ($check != null)
            <div class="pending-order">
                <section class="flex flex-col w-full p-8 -mb-8">
                    <h3 class="inline-flex items-center pb-4 text-xl font-semibold text-gray-800">
                        <span class="mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                            </svg>
                        </span>
                        Pending
                    </h3>
                </section>
                <section class="container md:px-8">
                    @if (count($order) != null)
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Invoice
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Total
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Status
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach ($order as $row)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $row->invoice }}
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm text-gray-900">
                                                                {{ 'Rp ' . number_format($row->total_price) }}
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            @if ($row->status_id == 1)
                                                                <span
                                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                                    {{ $row->status }}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="w-1/12 px-6 py-4 space-x-1 text-sm font-medium whitespace-nowrap">
                                                            <a class="inline-flex items-center px-4 py-2 mt-2 text-sm font-semibold bg-transparent bg-gray-100 rounded-full dark:bg-transparent dark:hover:bg-white dark:hover:bg-opacity-20 dark:focus:bg-white dark:focus:bg-opacity-20 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                                                href="{{ route('user.order.payment', ['id' => $row->id]) }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="w-4 h-4 mr-1 transform translate-y-px"
                                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                                </svg>
                                                                Pay
                                                            </a>
                                                            <a class="inline-flex items-center px-4 py-2 mt-2 text-sm font-semibold text-red-600 bg-transparent bg-red-100 rounded-full dark:bg-transparent dark:hover:bg-white dark:hover:bg-opacity-20 dark:focus:bg-white dark:focus:bg-opacity-20 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:bg-red-200 focus:bg-red-200 focus:outline-none focus:shadow-outline"
                                                                href="{{ route('user.order.cancel', ['id' => $row->id]) }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="w-4 h-4 mr-1 transform translate-y-px"
                                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                                Cancel
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <h3 class="pb-4 text-xl">
                            You have no pending order.
                        </h3>
                    @endif
                </section>
            </div>
            <div class="on-process">
                <section class="flex flex-col w-full p-8 -mb-8">
                    <h3 class="inline-flex items-center pb-4 text-xl font-semibold text-gray-800">
                        <span class="mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                            </svg>
                        </span>
                        Process
                    </h3>
                </section>
                <section class="container md:px-8">
                    @if (count($process) != null)
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Invoice
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Total
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Status
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach ($process as $row)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $row->invoice }}
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm text-gray-900">
                                                                {{ 'Rp ' . number_format($row->total_price) }}
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            @if ($row->status_id == 2)
                                                                <span
                                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-accent-1-800 bg-accent-1-100 rounded-full">
                                                                    {{ $row->status }}
                                                                </span>
                                                            @elseif ($row->status_id == 3)
                                                                <span
                                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-accent-1-800 bg-accent-1-100 rounded-full">
                                                                    {{ $row->status }}
                                                                </span>
                                                            @elseif ($row->status_id == 4)
                                                                <span
                                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-primary-800 bg-primary-100 rounded-full">
                                                                    {{ $row->status }}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="w-1/12 px-6 py-4 space-x-1 text-sm font-medium whitespace-nowrap">
                                                            <a href="{{ route('user.order.detail', ['invoice' => $row->invoice]) }}"
                                                                class="inline-flex items-center px-4 py-2 mt-2 text-sm font-semibold bg-transparent bg-gray-100 rounded-full dark:bg-transparent dark:hover:bg-white dark:hover:bg-opacity-20 dark:focus:bg-white dark:focus:bg-opacity-20 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="w-4 h-4 mr-1 transform translate-y-px"
                                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                                                </svg>
                                                                Detail
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <h3 class="pb-4 text-xl">
                            You have no processed order.
                        </h3>
                    @endif
                </section>
            </div>
            <div class="pending-order">
                <section class="flex flex-col w-full p-8 -mb-8">
                    <h3 class="inline-flex items-center pb-4 text-xl font-semibold text-gray-800">
                        <span class="mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                            </svg>
                        </span>
                        History
                    </h3>
                </section>
                <section class="container md:px-8">
                    @if (count($history) != null)
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Invoice
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Total
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Status
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach ($history as $row)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $row->invoice }}
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm text-gray-900">
                                                                {{ 'Rp ' . number_format($row->total_price) }}
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            @if ($row->status_id == 5)
                                                                <span
                                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                                    {{ $row->status }}
                                                                </span>
                                                            @elseif ($row->status_id == 6)
                                                                <span
                                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                                    {{ $row->status }}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="w-1/12 px-6 py-4 space-x-1 text-sm font-medium whitespace-nowrap">
                                                            <a href="{{ route('user.order.detail', ['invoice' => $row->invoice]) }}"
                                                                class="inline-flex items-center px-4 py-2 mt-2 text-sm font-semibold bg-transparent bg-gray-100 rounded-full dark:bg-transparent dark:hover:bg-white dark:hover:bg-opacity-20 dark:focus:bg-white dark:focus:bg-opacity-20 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="w-4 h-4 mr-1 transform translate-y-px"
                                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                                                </svg>
                                                                Detail
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <h3 class="pb-4 text-xl">
                            You have no completed / cancelled order.
                        </h3>
                    @endif
                </section>
            </div>
        @else
            <section class="flex justify-center w-full p-12 bg-primary-100">
                <h2 class="text-3xl text-gray-800">
                    You didn't place any order yet
                </h2>
            </section>
        @endif
    </div>
@endsection
