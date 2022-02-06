@extends('layout.no-nav')
@section('title', 'Payment')

@section('content')
    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="w-auto h-12 mx-auto" src="{{ asset($icon) }}"
                   >
                <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 dark:text-gray-100">
                    Payment
                </h2>
                <p class="my-2 text-center">
                    Please transfer <b>{{ 'Rp ' . number_format($order->total_price) }}</b> into one of these payment method
                </p>
            </div>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                @foreach ($payment as $row)
                    <div class="max-w-md overflow-hidden rounded-lg bg-primary-600 md:max-w-sm">
                        <div class="md:flex">
                            <div class="w-full p-4">
                                <div class="flex items-center justify-between text-white"> <span
                                        class="text-xl font-bold">{{ $row->company }} <small
                                            class="text-xs font-light">{{ $row->type }}</small></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div class="flex items-center justify-between mt-10">
                                    <div class="flex flex-row text-lg font-bold tracking-widest text-white">
                                        {{ wordwrap($row->number, 4, ' ', true) }}
                                    </div>
                                </div>
                                <div class="flex items-center justify-between mt-8 text-white">
                                    <div class="flex flex-col"> <span class="text-xs font-light">Name</span>
                                        <span class="font-bold">{{ $row->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <form class="mt-8 space-y-6" method="POST" action="{{ route('user.order.proof', ['id' => $order->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="relative w-full h-32 mb-1 overflow-hidden bg-gray-100 border rounded-lg">
                    <img id="image" class="object-cover w-full h-32" src="https://placehold.co/300x300/e2e8f0/e2e8f0" />
                    <div class="absolute top-0 bottom-0 left-0 right-0 flex items-center justify-center block w-full cursor-pointer"
                        onClick="document.getElementById('fileInput').click()">
                        <button type="button" style="background-color: rgba(255, 255, 255, 0.65)"
                            class="px-4 py-2 text-sm font-semibold text-gray-700 border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>
                    <div>
                        <label for="email-address" class="sr-only">Email address</label>
                        <input name="proof" id="fileInput" accept="image/*" class="hidden" type="file" onChange="let file = this.files[0];
                                                                                    var reader = new FileReader();

                                                                                    reader.onload = function (e) {
                                                                                    document.getElementById('image').src = e.target.result;
                                                                                    };

                                                                                    reader.readAsDataURL(file);">
                    </div>
                </div>

                <div>
                    <button type="submit"
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
                        Send proof
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
