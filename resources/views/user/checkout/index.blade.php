@extends('layout.no-nav')
@section('title', 'Checkout')

@section('content')
    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full space-y-8">
            <div>
                <img class="w-auto h-12 mx-auto" src="{{ asset($icon) }}" alt="{{ $store }}">
                <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 dark:text-gray-100">
                    Checkout
                </h2>
            </div>
            <form action="{{ route('user.order.save') }}" method="POST" class="grid grid-cols-2 gap-8" x-data="forms()">
                @csrf
                <div>
                    <h3 class="my-4 text-2xl font-semibold leading-6 text-gray-800">Shipping</h3>
                    <div class="overflow-hidden shadow rounded-xl">
                        <div class="px-4 bg-white sm:p-6">
                            <h3 class="mb-4 text-lg font-medium leading-6 text-gray-600">Dropshipper</h3>

                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Full
                                        name <span class="text-red-500">*</span></label>
                                    <input type="text" name="name" id="name" autocomplete="none" x-model="name"
                                        value="{{ Auth::user()->name }}"
                                        class="block w-full mt-1 border-gray-300 rounded-md @error('name') border-red-500 @enderror shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                    @error('name')
                                        <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email
                                        address <span class="text-red-500">*</span></label>
                                    <input type="text" name="email" id="email" autocomplete="email" x-model="email"
                                        class="block w-full mt-1 border-gray-300 rounded-md @error('email') border-red-500 @enderror shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                    @error('email')
                                        <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="contact" class="block text-sm font-medium text-gray-700">Contact <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" name="contact" id="contact" autocomplete="contact" x-model="contact"
                                        class="block w-full mt-1 border-gray-300 rounded-md @error('contact') border-red-500 @enderror shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                    @error('contact')
                                        <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address <span
                                            class="text-red-500">*</span></label>
                                    <textarea id="address" name="address" rows="3"
                                        class="block w-full mt-1 border border-gray-300 rounded-md @error('address') border-red-500 @enderror shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                        placeholder="Street Address" x-model="address"></textarea>
                                    @error('address')
                                        <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <label for="postal" class="block text-sm font-medium text-gray-700">ZIP /
                                        Postal <span class="text-red-500">*</span></label>
                                    <input type="text" name="postal" id="postal" autocomplete="postal" x-model="postal"
                                        class="block w-full mt-1 border-gray-300 rounded-md @error('postal') border-red-500 @enderror shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                    @error('postal')
                                        <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <h3 class="col-span-6 mt-4 text-lg font-medium leading-6 text-gray-600">Delivery</h3>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="province" class="block text-sm font-medium text-gray-700">Province <span
                                            class="text-red-500">*</span></label>
                                    <select id="province" name="province" autocomplete="province"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md @error('province') border-red-500 @enderror shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                        <option disabled selected class="hidden">Select Province</option>
                                        @foreach ($province as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('province')
                                        <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="city" class="block text-sm font-medium text-gray-700">City <span
                                            class="text-red-500">*</span></label>
                                    <select id="city" name="city" autocomplete="city"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md @error('city') border-red-500 @enderror shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                    </select>
                                    @error('city')
                                        <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="courier" class="block text-sm font-medium text-gray-700">Courier <span
                                            class="text-red-500">*</span></label>
                                    <select id="courier" name="courier" autocomplete="courier"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md @error('courier') border-red-500 @enderror shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                    </select>
                                    @error('courier')
                                        <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-4">
                                    <label for="service" class="block text-sm font-medium text-gray-700">Service <span
                                            class="text-red-500">*</span></label>
                                    <select id="service" name="service" autocomplete="service"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md @error('service') border-red-500 @enderror shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                    </select>
                                    @error('service')
                                        <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                                    <textarea id="note" name="note" rows="3"
                                        class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                        placeholder="Order Note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="my-4 text-2xl font-semibold leading-6 text-gray-800">Review</h3>
                    <div class="flex flex-col p-8 bg-white shadow rounded-xl">
                        <div class="flex justify-between mb-4">
                            <h3 class="text-lg font-medium leading-6 text-gray-800">Product</h3>
                            <h3 class="text-lg font-medium leading-6 text-gray-800">Price</h3>
                        </div>
                        <hr>
                        @foreach ($cart as $row)
                            @php
                                if ($row->discount != null) {
                                    $total = $row->discount * $row->quantity;
                                } else {
                                    $total = $row->price * $row->quantity;
                                }
                                $totalP += $total;
                                $weight = $row->weight * $row->quantity;
                                $totalW += $weight;
                            @endphp
                            <div class="flex justify-between my-4">
                                <div class="flex flex-col">
                                    <h5>{{ $row->product . ' × ' . $row->quantity }}</h5>
                                    <h6 class="text-xs">{{ $row->weight . ' Kg × ' . $row->quantity }}</h6>
                                </div>
                                <h5>{{ 'Rp ' . number_format($total) }}
                                </h5>
                            </div>
                            <hr>
                        @endforeach
                        <div class="flex justify-between my-4">
                            <h5 class="font-semibold">Total Weight</h5>
                            <h5>{{ $totalW . ' Kg' }}</h5>
                        </div>
                        <hr>
                        <div class="flex justify-between my-4">
                            <h5 class="font-semibold">Tax</h5>
                            <h5>{{ $tax . '%' }}</h5>
                        </div>
                        <hr>
                        <div class="flex justify-between my-4">
                            <h5 class="font-semibold">Shipping</h5>
                            <h5 id="shipping"></h5>
                        </div>
                        <hr>
                        <div class="flex justify-between my-4">
                            <h5 class="font-bold">Total Price <span class="text-xs font-normal">(Incl. tax)</span></h5>
                            <h5 class="font-bold" id="total_price"></h5>
                        </div>
                        <div class="flex flex-col mt-12">
                            <h3 class="mb-4 text-lg font-medium leading-6 text-gray-800">Dropshipper</h3>
                            <div class="flex flex-col">
                                <h5 class="font-semibold" x-text="name"></h5>
                                <h6 class="text-xs" x-text="email"></h6>
                                <h6 class="text-xs" x-text="contact"></h6>
                                <h6 class="text-xs" x-text="address + ', ' + postal"></h6>
                            </div>
                        </div>
                    </div>

                    @if ($totalW < 30)
                        <button type="submit"
                            class="relative flex justify-center w-full col-span-2 px-4 py-2 mt-8 text-sm font-medium text-white transition border border-transparent rounded-md bg-primary-600 group hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500">
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
                            Place order
                        </button>
                    @else
                        <a href="{{ 'https://wa.me/' . $whatsapp }}" target="_blank"
                            class="relative flex justify-center w-full col-span-2 px-4 py-2 mt-8 text-sm font-medium text-white transition border border-transparent rounded-md bg-primary-600 group hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500">
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
                            Chat on WhatsApp
                        </a>
                    @endif
                </div>
                <input type="hidden" id="total_price_hidden" name="total_price">
                <input type="hidden" name="total_weight" value="{{ $totalW }}">
                <input type="hidden" id="shipping_hidden" name="shipping">
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script>
        function forms() {
            return {
                name: '{{ old('name') ? old('name') : Auth::user()->name }}',
                email: '{{ old('email') ? old('email') : Auth::user()->email }}',
                address: '{{ old('address') ? old('address') : $address->address }}',
                contact: '{{ old('contact') }}',
                postal: '{{ old('postal') ? old('postal') : $address->postal_code }}'
            };
        }

        var toHtml = (tag, value) => {
            $(tag).html(value);
        }

        $(document).ready(function() {
            $('#province').on('change', function() {
                var id = $('#province').val();
                var url = window.location.href;
                var addressUrl = url.substring(0, url.lastIndexOf('/address/'));
                $.ajax({
                    type: 'GET',
                    url: '{{ route('user.address.city') }}',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        var op =
                            '<option class="hidden" disabled selected>Select City</option>';
                        if (data.length > 0) {
                            var i = 0;
                            for (i = 0; i < data.length; i++) {
                                if (data[i].type == "Kota") {
                                    op +=
                                        `<option value="${data[i].city_id}">${data[i].name} [City]</option>`
                                } else {
                                    op +=
                                        `<option value="${data[i].city_id}">${data[i].name}</option>`
                                }
                            }
                        }
                        toHtml('[name="city"]', op);
                    }
                })
            });

            $('#city').on('change', function() {
                var op = '<option class="hidden" disabled selected>Select Courier</option>';
                @foreach ($courier as $row)
                    op += '<option value="{{ $row->slug }}">{{ $row->name }}</option>';
                @endforeach
                toHtml('#courier', op);
            });

            $('#courier').on('change', function() {
                var courier = $('#courier').val();
                var city = $('#city').val();
                var weight = '{{ $totalW }}';
                var url = window.location.href;
                var addressUrl = url.substring(0, url.lastIndexOf('/address/'));
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.get('{{ route('user.address.service') }}', {
                    'courier': courier,
                    'city': city,
                    'weight': weight
                }).done(function(data) {
                    var result = data[0]['costs'];
                    var op =
                        '<option class="hidden" disabled selected>Select Service</option>';
                    if (result.length > 0) {
                        var i = 0;
                        for (i = 0; i < result.length; i++) {
                            if (data[0]['code'] == "pos") {
                                op +=
                                    `<option value="${result[i]['description']} [ ${result[i]['service']} ]" data-shipping="${result[i]['cost'][0]['value']}">${result[i]['service']} [ ${result[i]['cost'][0]['etd']} ]</option>`
                            } else {
                                if (result[i]['service'] > 1) {

                                } else {
                                    op +=
                                        `<option value="${result[i]['description']} [ ${result[i]['service']} ]" data-shipping="${result[i]['cost'][0]['value']}">${result[i]['description']} [ ${result[i]['service']} ] ${result[i]['cost'][0]['etd']} day(s)</option>`
                                }
                            }
                        }
                        // for (var value of result) {
                        //     op += '<option value="' +
                        //         value['cost'][0]['value'] + '">' +
                        //         value['service'] + ' ' + value['cost'][0]['etd'] + ' day' +
                        //         '</option>'
                        // }
                    }
                    toHtml('#service', op);
                })
            });

            $('#service').on('change', function() {
                $('#shipping_hidden').val($('#service').find(':selected').attr('data-shipping'));
                $('#shipping').html('Rp ' + new Intl.NumberFormat('en-US').format($('#service').find(
                    ':selected').attr('data-shipping')));

                $('#total_price_hidden').val(parseInt($('#shipping_hidden').val()) + (parseInt(
                    '{{ $totalP }}') + (parseInt('{{ $totalP }}') * parseInt(
                    '{{ $tax }}') / 100)));
                $('#total_price').html('Rp ' + new Intl.NumberFormat('en-US').format(parseInt($(
                    '#shipping_hidden').val()) + (parseInt('{{ $totalP }}') + (parseInt(
                    '{{ $totalP }}') * parseInt('{{ $tax }}') / 100))));
            })
        });
    </script>
@endpush
