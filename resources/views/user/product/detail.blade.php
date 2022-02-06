@extends('layout.app')

@section('title', 'Product Detail')

@section('floating')
    <x-floating></x-floating>
@endsection

@section('content')
    <div class="container">
        <section class="flex flex-col w-full p-8">
            <h3 class="items-center hidden pb-4 text-xl font-semibold text-gray-800 md:inline-flex">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                    </svg>
                </span>
                Product Detail
            </h3>
            <div class="flex flex-col my-4 md:my-10 md:flex-row md:mx-20">
                <div class="flex md:w-1/3 md:h-1/3">
                    <figure class="w-full aspect-w-1 aspect-h-1">
                        <img class="object-cover w-full rounded-lg" src="{{ asset('image/products') . '/' . $product->pict }}"
                            alt="{{ $product->name . ' Image' }}">
                    </figure>
                </div>
                <div class="flex flex-col md:w-2/3 md:mx-8">
                    <div class="mt-4 md:mt-0 md:mb-10">
                        <h1 class="text-4xl font-semibold">
                            {{ $product->name }}
                        </h1>
                        @if ($product->is_best != null)
                            <span
                                class="inline-flex items-center px-2 text-xs font-semibold leading-5 rounded-full text-accent-1-800 bg-accent-1-100">
                                Best
                            </span>
                        @endif
                        @if ($product->is_featured != null)
                            <span
                                class="inline-flex items-center px-2 text-xs font-semibold leading-5 rounded-full text-primary-800 bg-primary-100">
                                Featured
                            </span>
                        @endif
                        @if ($product->is_promo != null)
                            <span
                                class="inline-flex items-center px-2 text-xs font-semibold leading-5 rounded-full text-accent-3-800 bg-accent-3-100">
                                Sale
                            </span>
                        @endif
                    </div>
                    <div class="flex items-baseline my-2 text-xl font-semibold">
                        @if ($product->discount != null)
                            <span>{{ 'Rp ' . number_format($product->discount) }}</span>
                            <span
                                class="mx-2 text-base font-normal text-gray-400 line-through">{{ 'Rp ' . number_format($product->price) }}</span>
                        @else
                            <span>{{ 'Rp ' . number_format($product->price) }}</span>
                        @endif
                    </div>
                    <div class="my-2 mb-8 prose">
                        {!! $product->description !!}
                    </div>
                    @if ($product->weight > 30 || $product->price == null)
                        <div class="flex">
                            <a href="https://wa.me/message/ICGR7QQSEFFXF1"
                                class="p-4 font-semibold leading-5 rounded-full text-accent-1-800 bg-accent-1-100">
                                Message on WhatsApp to Order
                            </a>
                        </div>
                    @elseif ($product->stock > 0)
                        <form action="{{ route('user.cart.save') }}" method="POST">
                            @csrf
                            @auth
                                <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                            @endauth
                            <input type="hidden" name="product" value="{{ $product->id }}">
                            <input type="hidden" name="stock" value="{{ $product->stock }}">
                            <div class="flex md:w-1/2">
                                <div class="relative w-1/3 mr-1">
                                    <div class="absolute top-0 left-0 transform -translate-y-6">
                                        {{ $product->stock }} in stock{{ $product->stock > 1 ? 's' : '' }}
                                    </div>
                                    <input
                                        class="text-center transition border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                        type="number" name="quantity" id="quantity" min="1" max="{{ $product->stock }}"
                                        value="1">
                                </div>
                                @auth
                                    <button class="w-2/3 ml-1 bg-gray-100 rounded-lg hover:bg-gray-200" type="submit">Add to
                                        cart</button>
                                @endauth
                                @guest
                                    <a class="flex items-center justify-center w-2/3 ml-1 bg-gray-100 rounded-lg hover:bg-gray-200"
                                        href="{{ route('login') }}">Login</a>
                                @endguest
                            </div>
                        </form>
                    @else
                        <div class="flex">
                            <span class="p-4 font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                Product not available
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <section class="flex flex-col w-full p-8 px-2 md:px-8">
            <h3 class="inline-flex items-center pb-4 text-xl font-semibold text-gray-800">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                    </svg>
                </span>
                Related Product
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 md:gap-4">
                @foreach ($related as $row)
                    <a href="{{ route('user.product.detail', ['slug' => $row->slug]) }}"
                        class="flex flex-col p-4 transition duration-300 rounded-lg group hover:shadow-lg">
                        <figure class="overflow-hidden rounded-lg aspect-w-1 aspect-h-1">
                            <img class="object-cover w-full" src="{{ asset('image/products') . '/' . $row->pict }}"
                                alt="{{ $row->slug }}">
                        </figure>
                        <p class="overflow-hidden font-semibold whitespace-nowrap overflow-ellipsis">{{ $row->name }}
                        </p>
                        <div class="flex items-baseline">
                            @if ($row->discount != null)
                                <span>{{ 'Rp ' . number_format($row->discount) }}</span>
                                <span
                                    class="mx-2 text-xs text-gray-400 line-through">{{ 'Rp ' . number_format($row->price) }}</span>
                            @else
                                <span>{{ 'Rp ' . number_format($row->price) }}</span>
                            @endif
                        </div>
                        <div class="flex mt-1 space-x-2">
                            @if ($row->is_best != null)
                                <span
                                    class="inline-flex items-center px-2 text-xs font-semibold leading-5 rounded-full text-accent-1-800 bg-accent-1-100">
                                    Best
                                </span>
                            @endif
                            @if ($row->is_featured != null)
                                <span
                                    class="inline-flex items-center px-2 text-xs font-semibold leading-5 rounded-full text-primary-800 bg-primary-100">
                                    Featured
                                </span>
                            @endif
                            @if ($row->is_promo != null)
                                <span
                                    class="inline-flex items-center px-2 text-xs font-semibold leading-5 rounded-full text-accent-3-800 bg-accent-3-100">
                                    Sale
                                </span>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    </div>
@endsection
