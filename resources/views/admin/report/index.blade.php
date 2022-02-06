@extends('layout.app-admin')
@section('title', 'Report')

@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Report
        </h2>

        @if (count($reports) == null)
            <div class="w-full mt-8 overflow-hidden rounded-lg shadow-xs">
                <div class="flex justify-center w-full py-3 bg-white">
                    <div class="text-xs font-medium tracking-wider text-black uppercase">
                        No report available
                    </div>
                </div>
            </div>
        @else
            <div class="flex justify-between mt-2 mb-8">
                <a href="{{ route('admin.report.multiExport') }}"
                    class="inline-flex items-center w-full px-4 py-2 text-base font-medium border border-transparent rounded-md shadow-sm text-primary-500 bg-primary-100 hover:bg-primary-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-100 sm:w-auto sm:text-sm">
                    Download data
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </a>
            </div>

            @foreach ($reports as $report)
                @foreach ($report as $row)
                    @php
                        $price = $row->status_id == 5 ? $row->total_price : 0;
                        $monthly_income += $price;
                    @endphp
                @endforeach
                @php
                    $year = Carbon\Carbon::parse($report->first()->created_at)->format('Y');
                    $month = Carbon\Carbon::parse($report->first()->created_at)->format('m');
                    $monthName = Carbon\Carbon::parse($report->first()->created_at)->format('F');
                @endphp
                <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    {{ $monthName . ' ' . $year }}
                </h4>
                <!-- Cards -->
                <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                    <!-- Card -->
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div
                            class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Income
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{ 'Rp ' . number_format($monthly_income) }}
                            </p>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div
                            class="relative p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                </path>
                            </svg>
                            <span
                                class="absolute flex items-center justify-center w-5 h-5 text-xs text-blue-100 bg-blue-500 rounded-full -top-1 -right-1">
                                {{ count($report) }}
                            </span>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Transaction{{ count($report) > 1 ? 's' : '' }}
                            </p>
                            <div class="flex items-center space-x-4" x-data="{show: false}">
                                {{-- <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{ count($report) }}
                            </p> --}}
                                <div class="relative inline-block text-left">
                                    <div>
                                        <button type="button" x-on:click="show = !show"
                                            class="inline-flex items-center w-full px-4 py-2 text-sm font-medium text-blue-500 bg-blue-100 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-100"
                                            id="menu-button" aria-expanded="true" aria-haspopup="true">
                                            Details
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div x-show="show" x-on:click.away="show = false"
                                        x-on:keydown.escape.window="show = false"
                                        x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="opacity-0 transform scale-95"
                                        x-transition:enter-end="opacity-100 transform scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="opacity-100 transform scale-100"
                                        x-transition:leave-end="opacity-0 transform scale-95"
                                        class="absolute left-0 z-10 w-56 mt-2 origin-top-left bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                        <div class="py-1" role="none">
                                            <!-- Active: "bg-gray-100 text-gray-900", Inactive: "text-gray-700" -->
                                            <div class="flex justify-between px-4 py-2 text-sm text-gray-700">
                                                <div>
                                                    Pending
                                                </div>
                                                <div>
                                                    {{ count($report->where('status_id', 1)) }}
                                                </div>
                                            </div>
                                            <div class="flex justify-between px-4 py-2 text-sm text-gray-700">
                                                <div>
                                                    Proccess
                                                </div>
                                                <div>
                                                    {{ count($report->where('status_id', 2)) }}
                                                </div>
                                            </div>
                                            <div class="flex justify-between px-4 py-2 text-sm text-gray-700">
                                                <div>
                                                    Send
                                                </div>
                                                <div>
                                                    {{ count($report->where('status_id', 3)) }}
                                                </div>
                                            </div>
                                            <div class="flex justify-between px-4 py-2 text-sm text-gray-700">
                                                <div>
                                                    Sent
                                                </div>
                                                <div>
                                                    {{ count($report->where('status_id', 4)) }}
                                                </div>
                                            </div>
                                            <div class="flex justify-between px-4 py-2 text-sm text-gray-700">
                                                <div>
                                                    Success
                                                </div>
                                                <div>
                                                    {{ count($report->where('status_id', 5)) }}
                                                </div>
                                            </div>
                                            <div class="flex justify-between px-4 py-2 text-sm text-gray-700">
                                                <div>
                                                    Cancelled
                                                </div>
                                                <div>
                                                    {{ count($report->where('status_id', 6)) }}
                                                </div>
                                            </div>
                                            <div
                                                class="flex justify-between px-4 py-2 text-sm font-bold text-gray-700 uppercase">
                                                <div>
                                                    Total
                                                </div>
                                                <div>
                                                    {{ count($report) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div
                            class="p-3 mr-4 rounded-full text-primary-500 bg-primary-100 dark:text-blue-100 dark:bg-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Action
                            </p>
                            <div>
                                <a href="{{ route('admin.report.export', ['year' => $year, 'month' => $month, 'monthName' => $monthName]) }}"
                                    class="inline-flex items-center w-full px-4 py-2 text-base font-medium border border-transparent rounded-md shadow-sm text-primary-500 bg-primary-100 hover:bg-primary-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-100 sm:w-auto sm:text-sm">
                                    Download data
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $monthly_income = 0;
                @endphp
            @endforeach
        @endif
    </div>
@endsection
