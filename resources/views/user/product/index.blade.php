@extends('layout.app')

@section('title', 'All Product')

@section('floating')
    <x-floating></x-floating>
@endsection

@section('content')
    <div class="container">
        <section class="flex justify-center w-full p-12 bg-primary-100">
            <h2 class="text-3xl text-gray-800">
                All Product
            </h2>
        </section>
        <section class="flex flex-col w-full p-8 px-2 md:px-8">
            @if (count($product) == null)
                <h3 class="inline-flex items-center pb-4 text-xl font-semibold text-gray-800">
                    No product available
                </h3>
            @else
                <h3 class="inline-flex items-center pb-4 text-xl font-semibold text-gray-800">
                    <span class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                        </svg>
                    </span>
                    Product List
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 md:gap-4">
                    @foreach ($product as $row)
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
                {{ $product->appends(Request::all())->links() }}
            @endif
        </section>
    </div>
@endsection
