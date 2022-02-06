@extends('layout.no-nav')
@section('title', 'Order detail')

@section('content')
    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8" x-data="invoice()">
        <div class="w-full max-w-2xl space-y-8">
            <div>
                <img class="w-auto h-12 mx-auto" src="{{ asset($icon) }}">
                <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 dark:text-gray-100">
                    Order detail
                </h2>
                @if ($order->status_id == 4)
                    <p class="my-2 text-center">
                        Please confirm product arrival below.
                    </p>
                @endif
            </div>
            <div>
                <div class="flex justify-between mb-8">
                    <div>
                        <div class="flex items-center mb-1">
                            <label class="block w-32 text-xs font-bold tracking-wide text-gray-800 uppercase">Invoice
                                No.</label>
                            <span class="inline-block mr-4">:</span>
                            <div>{{ $order->invoice }}</div>
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
                    </div>
                    <div>
                        <div class="inline-flex items-center justify-center w-10 h-10 text-gray-500 bg-gray-100 rounded-full cursor-pointer hover:bg-gray-300"
                            x-on:click="printInvoice()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                <rect x="7" y="13" width="10" height="8" rx="2" />
                            </svg>
                        </div>
                    </div>
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
                @if ($order->status_id == 4)
                    <div class="flex flex-col justify-center">
                        <a href="{{ route('user.order.accept', ['id' => $order->id]) }}"
                            class="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition border border-transparent rounded-md bg-primary-600 group hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500">
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
                            Confirm product
                        </a>
                        <small class="text-center">
                            Please don't confirm until product has arrived
                        </small>
                    </div>
                @endif
            </div>

            <!-- Print Template -->
            <template id="js-print-template" x-ref="printable" class="hidden">
                <div class="flex justify-between mb-8">
                    <div>
                        <h2 class="pb-2 mb-6 text-3xl font-bold tracking-wider uppercase">Invoice</h2>

                        <div class="flex items-center mb-1">
                            <label class="block w-32 text-xs font-bold tracking-wide text-gray-800 uppercase">Invoice
                                No.</label>
                            <span class="inline-block mr-4">:</span>
                            <div>{{ $order->invoice }}</div>
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
                    </div>
                    <div class="pr-5">
                        <div class="flex items-center mb-1">
                            <img src="{{ asset($icon) }}" class="w-10 h-10" />
                            <p
                                class="ml-2 text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">{{ $store }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between mb-10">
                    <div class="w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-800 uppercase">payment/Ship
                            To:</label>
                        <div>
                            <div class="font-medium">{{ config('app.name') }} </div>
                            <div>{{ $storeAddress }}</div>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-800 uppercase">From:</label>
                        <div>
                            <div class="font-medium">{{ Auth::user()->name }}</div>
                            <div>{{ $userAddress->address }}</div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap items-start py-2 -mx-1 border-b">
                    <div class="flex-1 px-1">
                        <p class="text-xs font-bold tracking-wide text-gray-600 uppercase">Description</p>
                    </div>

                    <div class="w-32 px-1 text-right">
                        <p class="text-xs font-bold tracking-wide text-gray-600 uppercase">Units</p>
                    </div>

                    <div class="w-32 px-1 text-right">
                        <p class="leading-none">
                            <span class="block text-xs font-bold tracking-wide text-gray-600 uppercase">Unit Price</span>
                        </p>
                    </div>

                    <div class="w-32 px-1 text-right">
                        <p class="leading-none">
                            <span class="block text-xs font-bold tracking-wide text-gray-600 uppercase">Shipping</span>
                        </p>
                    </div>

                    <div class="w-16 px-1 text-right">
                        <p class="leading-none">
                            <span class="block text-xs font-bold tracking-wide text-gray-600 uppercase">Tax</span>
                        </p>
                    </div>

                    <div class="w-32 px-1 text-right">
                        <p class="leading-none">
                            <span class="block text-xs font-bold tracking-wide text-gray-600 uppercase">Amount</span>
                        </p>
                    </div>
                </div>
                @foreach ($detail as $row)
                    <div class="flex flex-wrap py-2 -mx-1 border-b">
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

                        <div class="w-32 px-1 text-right">
                            <p class="text-gray-800">{{ 'Rp ' . number_format($row->shipping) }}</p>
                        </div>

                        <div class="w-16 px-1 text-right">
                            <p class="text-gray-800">10%</p>
                        </div>

                        <div class="w-32 px-1 text-right">
                            <p class="text-gray-800">{{ 'Rp ' . number_format($row->total_price) }}</p>
                        </div>
                    </div>
                @endforeach

                <div class="py-2 mt-20 ml-auto" style="width: 320px">
                    <div class="flex justify-between mb-3">
                        <div class="flex-1 text-right text-gray-800">Total incl. tax</div>
                        <div class="w-40 text-right">
                            <div class="font-medium text-gray-800">{{ 'Rp ' . number_format($row->total_price) }}</div>
                        </div>
                    </div>

                    <div class="py-2 border-t border-b">
                        <div class="flex justify-between">
                            <div class="flex-1 text-xl text-right text-gray-600">Amount due</div>
                            <div class="w-40 text-right">
                                <div class="text-xl font-bold text-gray-800">{{ 'Rp ' . number_format($row->total_price) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <!-- /Print Template -->
    @endsection

    @push('script')
        <script>
            function invoice() {
                return {

                    printInvoice() {
                        var printContents = this.$refs.printable.innerHTML;
                        var originalContents = document.body.innerHTML;

                        document.body.innerHTML = printContents;
                        window.print();
                        document.body.innerHTML = originalContents;
                    }
                }
            }
        </script>
    @endpush
