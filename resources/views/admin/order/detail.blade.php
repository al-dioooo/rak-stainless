@extends('layout.app-admin')
@section('title', 'Order list')

@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Order Detail
        </h2>

        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            {{ $order->user . '`s order' }}
        </h4>

        <div class="container mx-auto">
            <div id="js-print-template" x-ref="printTemplate">
                <div class="flex flex-col md:flex-row md:justify-between">
                    <div>
                        <div class="flex items-center mb-1">
                            <label class="block w-32 text-xs font-bold tracking-wide text-gray-800 uppercase">Invoice
                                No.</label>
                            <span class="inline-block mr-4">:</span>
                            <div class="font-semibold">{{ $order->invoice }}</div>
                        </div>

                        <div class="flex items-center mb-1">
                            <label class="block w-32 text-xs font-bold tracking-wide text-gray-800 uppercase">Invoice
                                Date</label>
                            <span class="inline-block mr-4">:</span>
                            <div>{{ date('D, d M Y', strtotime($order->created_at)) }}</div>
                        </div>

                        <div class="flex items-center mb-1">
                            <label class="block w-32 text-xs font-bold tracking-wide text-gray-800 uppercase">Due
                                date</label>
                            <span class="inline-block mr-4">:</span>
                            <div>{{ date('D, d M Y', strtotime($order->due_at)) }}</div>
                        </div>

                        <div class="flex items-center mb-1">
                            <label class="block w-32 text-xs font-bold tracking-wide text-gray-800 uppercase">
                                Order status
                            </label>
                            <span class="inline-block mr-4">:</span>
                            <div>{{ $order->status }}</div>
                        </div>

                        <div class="flex items-center mb-1">
                            <label class="block w-32 text-xs font-bold tracking-wide text-gray-800 uppercase">
                                Courier
                            </label>
                            <span class="inline-block mr-4">:</span>
                            <div class="uppercase">{{ $order->courier }}</div>
                        </div>

                        <div class="flex items-center mb-1">
                            <label class="block w-32 text-xs font-bold tracking-wide text-gray-800 uppercase">
                                Service
                            </label>
                            <span class="inline-block mr-4">:</span>
                            <div>{{ $order->service }}</div>
                        </div>

                        <div class="flex items-center mb-1">
                            <label class="block w-32 text-xs font-bold tracking-wide text-gray-800 uppercase">
                                Shipping
                            </label>
                            <span class="inline-block mr-4">:</span>
                            <div>{{ 'Rp ' . number_format($order->shipping) }}</div>
                        </div>

                        <div class="flex items-center mb-1">
                            <label class="block w-32 text-xs font-bold tracking-wide text-gray-800 uppercase">
                                Total
                            </label>
                            <span class="inline-block mr-4">:</span>
                            <div>{{ 'Rp ' . number_format($order->total_price) }}</div>
                        </div>

                        <div class="flex items-center mb-1">
                            <label class="block w-32 text-xs font-bold tracking-wide text-gray-800 uppercase">
                                Contact
                            </label>
                            <span class="inline-block mr-4">:</span>
                            <div>{{ $order->contact }}</div>
                        </div>

                        <div class="flex items-center mb-1">
                            <label class="block w-32 text-xs font-bold tracking-wide text-gray-800 uppercase">
                                Note
                            </label>
                            <span class="inline-block mr-4">:</span>
                            <div>{{ $order->note }}</div>
                        </div>
                    </div>
                    @if ($order->status_id == 2)
                        <div>
                            <div class="flex items-center mb-1">
                                <label class="block w-32 text-xs font-bold tracking-wide text-gray-800 uppercase">
                                    Payment Proof
                                </label>
                                <span class="inline-block mr-4">:</span>
                                <div>
                                    <button x-on:click="openModal"
                                        class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg bg-primary-600 active:bg-primary-600 hover:bg-primary-700 focus:outline-none focus:shadow-outline-primary">
                                        Open image
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($order->status_id >= 3 && $order->status_id != 6)
                        <div>
                            <div class="flex items-center mb-1">
                                <label class="block w-32 text-xs font-bold tracking-wide text-gray-800 uppercase">
                                    Receipt
                                </label>
                                <span class="inline-block mr-4">:</span>
                                @if ($order->receipt == null)
                                    <div>
                                        <button x-on:click="openModal"
                                            class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg bg-primary-600 active:bg-primary-600 hover:bg-primary-700 focus:outline-none focus:shadow-outline-primary">
                                            Input Receipt
                                        </button>
                                    </div>
                                @endif
                                <div>{{ $order->receipt }}</div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="flex items-start py-2 -mx-1 border-b">
                    <div class="flex-1 hidden px-1 md:flex">
                        <p class="text-xs font-bold tracking-wide text-gray-600 uppercase">Image</p>
                    </div>

                    <div class="flex-1 px-1">
                        <p class="text-xs font-bold tracking-wide text-gray-600 uppercase">Description</p>
                    </div>

                    <div class="w-32 px-1 text-right">
                        <p class="text-xs font-bold tracking-wide text-gray-600 uppercase">Units</p>
                    </div>

                    <div class="w-32 px-1 text-right">
                        <p class="leading-none">
                            <span class="block text-xs font-bold tracking-wide text-gray-600 uppercase">Price</span>
                        </p>
                    </div>
                </div>
                @foreach ($detail as $row)
                    <div class="flex flex-wrap py-2 -mx-1 border-b">
                        <div class="flex-1 hidden px-1 md:flex">
                            <img class="w-20 h-20 rounded-full" src="{{ asset('image/products') . '/' . $row->pict }}"
                                alt="{{ $row->product . ' Image' }}">
                        </div>

                        <div class="flex-1 px-1">
                            <p class="text-gray-800">{{ $row->product }}</p>
                        </div>

                        <div class="w-32 px-1 text-right">
                            <p class="text-gray-800">{{ $row->quantity }}</p>
                        </div>

                        <div class="w-32 px-1 text-right">
                            <p class="text-gray-800">
                                {{ $row->discount != null ? 'Rp ' . number_format($row->discount) : 'Rp ' . number_format($row->price) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('modal')
    @if ($order->status_id == 2)
        <x-modal>
            <x-slot name="title">
                Payment Proof
            </x-slot>
            <x-slot name="modalIcon">
                <div
                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto rounded-full bg-primary-100 sm:mx-0 sm:h-10 sm:w-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary-700" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </x-slot>
            <x-slot name="content">
                <figure>
                    <img class="w-full rounded-lg md:w-3/4" src="{{ asset('image/payment-proofs') . '/' . $order->proof }}"
                        alt="Payment Proof">
                </figure>
            </x-slot>
            <x-slot name="action">
                <a href="{{ route('admin.order.confirm', ['id' => $order->id]) }}"
                    class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Accept Payment
                </a>
            </x-slot>
        </x-modal>
    @elseif ($order->status_id == 3)
        <x-modal>
            <x-slot name="title">
                Input Receipt
            </x-slot>
            <x-slot name="modalIcon">
                <div
                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto rounded-full bg-primary-100 sm:mx-0 sm:h-10 sm:w-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary-700" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
            </x-slot>
            <x-slot name="content">
                <form action="{{ route('admin.order.receipt') }}" method="POST" id="inputReceipt">
                    @csrf
                    <input type="hidden" name="id" value="{{ $order->id }}">
                    <input
                        class="w-full px-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-primary-300 focus:outline-none focus:shadow-outline-primary form-input"
                        type="text" name="receipt" placeholder="Receipt">
                </form>
            </x-slot>
            <x-slot name="action">
                <button x-on:click="sendReceipt()"
                    class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Input
                </button>
            </x-slot>
        </x-modal>
    @endif
@endsection
