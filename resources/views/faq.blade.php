@extends('layout.app')
@section('title', 'FAQs')

@section('content')
    <div class="container">
        <section class="flex flex-col w-full p-8 px-2 md:px-8">
            <h3 class="inline-flex items-center pb-4 text-xl font-semibold text-gray-800">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                    </svg>
                </span>
                Frequently Asked Questions
            </h3>
            <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-3 md:gap-8">
                @foreach ($faq as $row)
                    <div class="flex flex-col p-4 overflow-hidden transition duration-300 bg-white rounded-lg shadow">
                        <h3 class="text-lg font-semibold">{{ $row->question }}</h3>
                        <p class="text-gray-800">{{ $row->answer }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
