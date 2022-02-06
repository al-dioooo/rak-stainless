@extends('layout.app')

@section('title', 'Categories')

@section('content')
    <div class="container">
        <section class="flex justify-center w-full p-12 bg-primary-100">
            <h2 class="text-3xl text-gray-800">
                Categories
            </h2>
        </section>
        @foreach ($category as $crow)
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
                        {{ $crow->name }}
                        <a class="mx-4 text-primary-500" href="{{ route('user.product.category', ['slug' => $crow->slug]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 md:gap-4">
                    @foreach ($crow->product as $row)
                        @if ($loop->index > 4)
                        @break
                    @endif
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
    @endforeach
    </div>
@endsection
