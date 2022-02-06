@extends('layout.app-admin')
@section('title', 'Edit category')

@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Category
        </h2>
        <div class="container mx-auto">
            <form action="{{ route('admin.category.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $category->id }}">
                <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Category Info
                </h4>
                <div class="px-4 py-3 mb-8 space-y-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div>
                        <label for="banner" class="block mb-1 text-sm font-medium text-gray-700">Category
                            banner</label>
                        <div class="relative aspect-w-21 aspect-h-9">
                            <img id="image" class="object-cover w-full h-full rounded-md" src="{{ asset('image/categories') . '/' . $category->pict }}" />
                            <label for="pict"
                                class="absolute top-0 bottom-0 left-0 right-0 flex items-center justify-center block w-full cursor-pointer">
                                <div style="background-color: rgba(255, 255, 255, 0.65)"
                                    class="px-4 py-2 text-sm font-semibold text-gray-700 border border-gray-300 rounded-lg shadow-sm pointer-events-none hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </label>
                            <input type="file" name="pict" id="pict" class="hidden" accept="image/*" x-on:change="view()">
                        </div>
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Category name</label>
                        <input type="text" name="name" id="name" autocomplete="none" value="{{ $category->name }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div>
                    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                        Search Engine Optimization
                    </h4>

                    <div class="px-4 py-3 mb-8 space-y-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ $category->slug }}"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('slug') border-red-500 @enderror">
                            @error('slug')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Update category
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function view() {
            const [file] = pict.files
            if (file) {
                image.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
