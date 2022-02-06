@extends('layout.app')
@section('title', 'Cart')

@section('content')
    <div class="container mx-auto">
        @if ($count != 0)
            <section class="flex flex-col w-full p-8">
                <h3 class="inline-flex items-center pb-4 text-xl font-semibold text-gray-800">
                    <span class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                        </svg>
                    </span>
                    Cart
                </h3>
            </section>
            <section class="container md:px-8">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Product
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Price
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Qty
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Total
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($cart as $row)
                                            @php
                                                if ($row->discount != null) {
                                                    $total = $row->discount * $row->quantity;
                                                } else {
                                                    $total = $row->price * $row->quantity;
                                                }
                                                $totalW = $row->weight * $row->quantity;
                                                $subtotalW += $totalW;
                                                $subtotal += $total;
                                            @endphp
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 w-20 h-20">
                                                            <img class="w-20 h-20 rounded-full"
                                                                src="{{ asset('image/products') . '/' . $row->pict }}"
                                                                alt="">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $row->product }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if ($row->discount != null)
                                                        <div class="text-sm text-gray-900">
                                                            {{ 'Rp ' . number_format($row->discount) }}</div>
                                                        <div class="text-sm text-gray-500 line-through">
                                                            {{ 'Rp ' . number_format($row->price) }}</div>
                                                    @else
                                                        <div class="text-sm text-gray-900">
                                                            {{ 'Rp ' . number_format($row->price) }}</div>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <select name="quantity" autocomplete="quantity"
                                                        data-id="{{ $row->id }}"
                                                        class="block w-2/3 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm quantity focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                                        @for ($i = 1; $i <= $row->stock; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ $i == $row->quantity ? 'selected' : '' }}>
                                                                {{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                    {{ 'Rp ' . number_format($total) }}
                                                </td>
                                                <td class="px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                                                    <a href="{{ route('user.cart.delete', ['id' => $row->id]) }}"
                                                        class="inline-flex items-center text-red-600 hover:text-red-900">
                                                        Delete
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex justify-between my-10">
                                <div class="flex h-1/2">
                                    <a x-on:mouseover="cartTooltip = true" x-on:mouseleave="cartTooltip = false"
                                        class="flex items-center px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-full text-primary-800 bg-primary-50 dark:bg-transparent dark:hover:bg-white dark:hover:bg-opacity-20 dark:focus:bg-white dark:focus:bg-opacity-20 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 md:ml-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="{{ route('user.product.index') }}">
                                        Keep Shopping
                                    </a>
                                </div>
                                <div class="flex flex-col w-1/3 p-8 text-right rounded-lg shadow-lg">
                                    <h5 class="mb-4 text-2xl font-bold text-center">
                                        Checkout
                                    </h5>
                                    <hr class="my-4">
                                    <div class="flex justify-between">
                                        <h5 class="text-lg font-semibold">
                                            Total ({{ $count }} item{{ $count > 1 ? 's' : '' }})
                                        </h5>
                                        <h5 class="text-lg font-semibold" id="subtotal">
                                            {{ 'Rp ' . number_format($subtotal) }}
                                        </h5>
                                    </div>
                                    <div class="flex flex-col mt-8 text-center">
                                        @if ($subtotalW < 30)
                                            @if ($address != null)
                                                <a class="p-2 text-lg font-semibold bg-gray-200 rounded-full hover:bg-primary-50 hover:text-primary-800" href="{{ route('user.checkout') }}">
                                                    Proceed to checkout
                                                </a>
                                                <small>Additional shipping cost may apply</small>
                                            @else
                                                <a class="p-2 text-lg font-semibold bg-gray-200 rounded-full hover:bg-primary-50 hover:text-primary-800" href="{{ route('user.address.index') }}">
                                                    Set Address
                                                </a>
                                                <small>You haven't set your address</small>
                                            @endif
                                        @else
                                            <a class="p-2 text-lg font-semibold bg-gray-200 rounded-full hover:bg-primary-50 hover:text-primary-800" href="{{ 'https://wa.me/' . $whatsapp }}" target="_blank">
                                                Chat on WhatsApp
                                            </a>
                                            <small>You'r order have more than 30 Kg of weight</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="flex justify-center w-full p-12 bg-primary-100">
                <h2 class="text-3xl text-gray-800">
                    Your cart is empty
                </h2>
            </section>
        @endif
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.quantity').each(function() {
                $(this).on('change', function() {
                    var id = $(this).attr('data-id');
                    var quantity = $(this).val();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        type: 'POST',
                        url: '{{ route('user.cart.update') }}',
                        data: {
                            id: id,
                            quantity: quantity
                        },
                        dataType: 'json',
                        success: function() {
                            window.location.reload();
                        }
                    })
                })
            })
        })
    </script>
@endpush
