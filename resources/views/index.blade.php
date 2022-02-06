@extends('layout.app')

@section('title', 'Home')

@section('floating')
    <x-floating></x-floating>
@endsection

@section('content')
    <section x-data="{ slideActive: 2 }" x-cloak
        class="flex flex-col items-center justify-between w-full px-10 py-10 overflow-hidden bg-primary-100 lg:py-20 lg:flex-row">
        <div class="w-full lg:w-2/5">
            <h1 class="mb-2 font-light text-white lg:leading-10 md:mb-5">
                <div class="text-2xl md:text-5xl">
                    <div class="inline-block font-bold tracking-tight text-transparent bg-primary-500 bg-clip-text">
                        {{ $title }}
                    </div>
                </div>
                <div class="hidden text-sm md:block md:text-lg">
                    <div class="mt-2 font-normal prose prose-xl lg:mt-10">
                        <p>
                            {{ $subtitle }}
                        </p>
                    </div>
                </div>
            </h1>
        </div>
        <div class="relative w-full lg:w-2/5">
            @if (count($featured) == null)
                <div class="relative py-3 sm:max-w-xl lg:max-h-full sm:mx-auto">
                    <div
                        class="absolute inset-0 hidden transform -skew-y-6 bg-primary-500 lg:block sm:skew-y-0 sm:-rotate-12 sm:rounded-3xl">
                    </div>
                    <div
                        class="absolute inset-0 hidden transform -skew-y-6 shadow-lg bg-primary-400 lg:block sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
                    </div>
                    <div class="transform bg-transparent lg:bg-white lg:shadow-lg sm:rounded-3xl sm:p-6">
                        <a href="{{ route('user.index') }}" class="group">
                            <div class="w-full lg:aspect-w-1 aspect-w-16 aspect-h-9 lg:aspect-h-1">
                                <img class="object-cover w-full transition duration-300 pointer-events-none rounded-xl group-hover:opacity-80"
                                    src="https://placehold.co/300x300/818cf8/ffffff?text=No+featured+product+available"
                                    alt="">
                            </div>
                        </a>
                    </div>
                </div>
            @else
                <div class="relative py-3 sm:max-w-xl lg:max-h-full sm:mx-auto">
                    <div
                        class="absolute inset-0 hidden transform -skew-y-6 bg-primary-500 lg:block sm:skew-y-0 sm:-rotate-12 sm:rounded-3xl">
                    </div>
                    <div
                        class="absolute inset-0 hidden transform -skew-y-6 shadow-lg bg-primary-300 lg:block sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
                    </div>
                    <div class="transform bg-transparent lg:bg-white lg:shadow-lg sm:rounded-3xl sm:p-6">
                        @php
                            if (count($featured) != 1) {
                                $index = 0;
                            } else if (count($featured) == 1) {
                                $index = 1;
                            }
                        @endphp
                        @foreach ($featured as $row)
                            @php
                                $index++;
                            @endphp
                            <a x-show.immediate="slideActive === {{ $index }}" class="group"
                                href="{{ route('user.product.detail', ['slug' => $row->slug]) }}">
                                <div x-show.transition="slideActive === {{ $index }}"
                                    class="w-full lg:aspect-w-1 aspect-w-16 aspect-h-9 lg:aspect-h-1">
                                    <img class="object-cover w-full transition duration-300 rounded-xl group-hover:opacity-80"
                                        src="{{ asset('image/products') . '/' . $row->pict }}" alt="{{ $row->slug }}">
                                </div>
                                <div class="flex items-center mt-3 space-x-4 text-xs">
                                    <span class="block font-semibold text-gray-900 rounded-full">
                                        <span class="text-orange-500">{{ $row->category->name }}</span>
                                    </span>
                                </div>
                                <h1 class="font-semibold text-gray-900 capitalize lg:text-2xl md:my-2">
                                    {{ $row->name }}</h1>
                            </a>
                        @endforeach
                    </div>
                </div>
                @if (count($featured) != 1)
                    <div class="absolute flex justify-between w-full mb-4 mr-4 pointer-events-none bottom-1/2">
                        <button
                            class="flex items-center justify-center w-8 h-8 font-bold text-white transform -translate-x-4 rounded-full pointer-events-auto bg-primary-400 md:-translate-x-6 md:w-12 md:h-12 focus:outline-none hover:bg-primary-500"
                            x-on:click="slideActive = slideActive === 1 ? {{ $index }} : slideActive - 1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button
                            class="flex items-center justify-center w-8 h-8 font-bold text-white transform translate-x-4 rounded-full pointer-events-auto bg-primary-400 md:translate-x-6 md:w-12 md:h-12 h-112 focus:outline-none hover:bg-primary-500"
                            x-on:click="slideActive = slideActive >= {{ $index }} ? 1 : slideActive + 1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                @endif
            @endif
        </div>
    </section>
    @if (count($best) != null)
        <section class="flex flex-col w-full p-8 px-2 md:px-8">
            <h3 class="inline-flex items-center pb-4 text-xl font-semibold text-gray-800">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                    </svg>
                </span>
                <div class="flex items-center">
                    Best Seller
                    <a class="mx-4 text-primary-500" href="{{ route('user.product.best') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 md:gap-4">
                @foreach ($best as $row)
                    <a href="{{ route('user.product.detail', ['slug' => $row->slug]) }}"
                        class="flex flex-col p-4 transition duration-300 rounded-lg group hover:shadow-lg">
                        <figure class="overflow-hidden rounded-lg aspect-w-1 aspect-h-1">
                            <img class="object-cover w-full" src="{{ asset('image/products') . '/' . $row->pict }}" alt="{{ $row->slug }}">
                        </figure>
                        <p class="font-semibold">{{ $row->name }}</p>
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
    @endif

    @if (count($promo) != null)
        <section class="flex flex-col w-full p-8 px-2 md:px-8">
            <h3 class="inline-flex items-center pb-4 text-xl font-semibold text-gray-800">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                    </svg>
                </span>
                <div class="flex items-center">
                    Today's Promo
                    <a class="mx-4 text-primary-500" href="{{ route('user.product.promo') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 md:gap-4">
                @foreach ($promo as $row)
                    <a href="{{ route('user.product.detail', ['slug' => $row->slug]) }}"
                        class="flex flex-col p-4 transition duration-300 rounded-lg group hover:shadow-lg">
                        <figure class="overflow-hidden rounded-lg aspect-w-1 aspect-h-1">
                            <img class="object-cover w-full" src="{{ asset('image/products') . '/' . $row->pict }}" alt="{{ $row->slug }}">
                        </figure>
                        <p class="font-semibold">{{ $row->name }}</p>
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
    @endif

    @if (count($product) != null)
        <section class="flex flex-col w-full p-8 px-2 md:px-8">
            <h3 class="inline-flex items-center pb-4 text-xl font-semibold text-gray-800">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                    </svg>
                </span>
                <div class="flex items-center">
                    Latest Product
                    <a class="mx-4 text-primary-500" href="{{ route('user.product.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 md:gap-4">
                @foreach ($product as $row)
                    <a href="{{ route('user.product.detail', ['slug' => $row->slug]) }}"
                        class="flex flex-col p-4 transition duration-300 rounded-lg group hover:shadow-lg">
                        <figure class="overflow-hidden rounded-lg aspect-w-1 aspect-h-1">
                            <img class="object-cover w-full" src="{{ asset('image/products') . '/' . $row->pict }}" alt="{{ $row->slug }}">
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
    @endif

    @if (count($category) != null)
        <section class="flex flex-col w-full p-8 px-2 md:px-8">
            <h3 class="inline-flex items-center pb-4 text-xl font-semibold text-gray-800">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                    </svg>
                </span>
                <div class="flex items-center">
                    Categories
                    <a class="mx-4 text-primary-500" href="{{ route('user.category.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4">
                @foreach ($category as $row)
                    <a href="{{ route('user.product.category', ['slug' => $row->slug]) }}"
                        class="flex flex-col p-4 transition duration-300 rounded-lg group hover:shadow-lg">
                        <figure class="overflow-hidden rounded-lg aspect-w-21 aspect-h-9">
                            <img class="object-cover w-full" src="{{ asset('image/categories') . '/' . $row->pict }}" alt="{{ $row->slug }}">
                        </figure>
                        <p class="overflow-hidden font-semibold whitespace-nowrap overflow-ellipsis">{{ $row->name }}
                        </p>
                    </a>
                @endforeach
            </div>
        </section>
    @endif
@endsection
