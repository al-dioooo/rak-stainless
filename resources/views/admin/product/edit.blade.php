@extends('layout.app-admin')
@section('title', 'Edit product')

@section('content')
    @push('before-script')
        <script src="https://cdn.tiny.cloud/1/4h71yxnbr7nen409y3t8fpota3b64vj809bska42glt8lxhh/tinymce/5/tinymce.min.js"
                referrerpolicy="origin"></script>
    @endpush

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Product
        </h2>
        <div class="container mx-auto">
            <form action="{{ route('admin.product.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Product Info
                </h4>
                <div class="px-4 py-3 mb-8 space-y-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="flex flex-col space-y-4 md:space-y-0 md:space-x-4 md:flex-row">
                        <div class="md:w-2/5">
                            <label class="block mb-1 text-sm font-medium text-gray-700">Product
                                picture</label>
                            <div class="relative aspect-w-1 aspect-h-1">
                                <img id="image" class="object-cover w-full h-full rounded-md"
                                    src="{{ asset('image/products') . '/' . $product->pict }}" />
                                <label for="pict"
                                    class="absolute top-0 bottom-0 left-0 right-0 flex items-center justify-center block w-full cursor-pointer">
                                    <div style="background-color: rgba(255, 255, 255, 0.65)"
                                        class="px-4 py-2 text-sm font-semibold text-gray-700 border border-gray-300 rounded-lg shadow-sm pointer-events-none hover:bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                </label>
                                <input type="file" name="pict" id="pict" class="hidden" accept="image/*"
                                    x-on:change="view()">
                            </div>
                        </div>

                        <div class="flex flex-col space-y-4 md:w-3/5">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Product name</label>
                                <input type="text" name="name" id="name" autocomplete="none" value="{{ $product->name }}"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('name') border-red-500 @enderror">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                <div class="flex items-end mt-1 space-x-4">
                                    <div class="w-5/6">
                                        <select id="category" name="category"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                            @foreach ($categories as $row)
                                                <option value="{{ $row->id }}"
                                                    {{ $product->category_id == $row->id ? 'selected' : '' }}>
                                                    {{ $row->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-1/6">
                                        <a href="{{ route('admin.category.add') }}"
                                            class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-md bg-primary-600 active:bg-primary-600 hover:bg-primary-700 focus:outline-none focus:shadow-outline-primary">
                                            Add
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">
                                                Rp
                                            </span>
                                        </div>
                                        <input type="text" name="price" id="price" value="{{ $product->price }}"
                                            autocomplete="none"
                                            class="block w-full pr-2 border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500 pl-9 sm:text-sm @error('price') border-red-500 @enderror">
                                    </div>
                                    @error('price')
                                        <p class="mt-2 text-sm text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="discount" class="block text-sm font-medium text-gray-700">Discount</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">
                                                Rp
                                            </span>
                                        </div>
                                        <input type="text" name="discount" id="discount" value="{{ $product->discount }}"
                                            autocomplete="none"
                                            class="block w-full pr-2 border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500 pl-9 sm:text-sm @error('discount') border-red-500 @enderror">
                                    </div>
                                </div>

                                <div>
                                    <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">
                                                Kg
                                            </span>
                                        </div>
                                        <input type="text" name="weight" id="weight" value="{{ $product->weight }}"
                                            autocomplete="none"
                                            class="block w-full pl-2 border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500 pr-9 sm:text-sm @error('weight') border-red-500 @enderror">
                                    </div>
                                    @error('weight')
                                        <p class="mt-2 text-sm text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <input type="text" name="stock" id="stock" value="{{ $product->stock }}"
                                            autocomplete="none"
                                            class="block w-full px-2 border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('stock') border-red-500 @enderror">
                                    </div>
                                    @error('stock')
                                        <p class="mt-2 text-sm text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Description
                            </label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="8" autocomplete="none"
                                    class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('description') border-red-500 @enderror">{{ $product->description }}</textarea>
                            </div>
                            @error('description')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @else
                                <p class="mt-2 text-sm text-gray-500">
                                    Product description is showing on the product detail page.
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                        Product Behaviour
                    </h4>

                    <div class="px-4 py-3 mb-8 space-y-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        @if ($product->is_featured != null || $featured < 3)
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="featured" name="featured" type="checkbox" value="1"
                                        {{ $product->is_featured != null ? 'checked' : '' }}
                                        class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                </div>
                                <label for="featured" class="ml-3 text-sm">
                                    <p class="font-medium text-gray-700">Featured</p>
                                    <p class="text-gray-500">Show product on featured carousel.</p>
                                </label>
                            </div>
                        @endif

                        @if ($product->is_best != null || $best < 5)
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="best" name="best" type="checkbox" value="1"
                                        {{ $product->is_best != null ? 'checked' : '' }}
                                        class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                </div>
                                <label for="best" class="ml-3 text-sm">
                                    <p class="font-medium text-gray-700">Best Seller</p>
                                    <p class="text-gray-500">Show product on best seller section.</p>
                                </label>
                            </div>
                        @endif

                        @if ($product->is_promo != null || $promo < 5)
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="promo" name="promo" type="checkbox" value="1"
                                        {{ $product->is_promo != null ? 'checked' : '' }}
                                        class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                </div>
                                <label for="promo" class="ml-3 text-sm">
                                    <p class="font-medium text-gray-700">Promo</p>
                                    <p class="text-gray-500">Show product on today's promo section.</p>
                                </label>
                            </div>
                        @endif

                    </div>
                </div>

                <div>
                    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                        Search Engine Optimization
                    </h4>

                    <div class="px-4 py-3 mb-8 space-y-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <div>
                            <label for="key" class="block text-sm font-medium text-gray-700">Focus Keyphrase</label>
                            <input type="text" name="key" id="key" value="{{ $product->key }}" autocomplete="none"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('key') border-red-500 @enderror">
                            @error('key')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ $product->slug }}" autocomplete="none"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('slug') border-red-500 @enderror">
                            @error('slug')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label for="meta_desc" class="block text-sm font-medium text-gray-700">
                                Meta description
                            </label>
                            <div class="mt-1">
                                <textarea id="meta_description" name="meta_description" rows="3" autocomplete="none"
                                    class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('meta_description') border-red-500 @enderror">{{ $product->meta_desc }}</textarea>
                            </div>
                            @error('meta_description')
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
                        Update product
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('script')
        <script>
            function view() {
                const [file] = pict.files
                if (file) {
                    image.src = URL.createObjectURL(file)
                }
            }

            tinymce.init({
                selector: 'textarea#description',
                skin: 'snow',
                icons: 'thin',
                plugins: 'quickbars image lists code table codesample importcss',
                body_class: 'prose p-4',
                menubar: false,
                toolbar: 'formatselect | forecolor backcolor | bold italic underline strikethrough | link image blockquote codesample | align bullist numlist | code ',
                height: 400,
                branding: false,
            })
        </script>
    @endpush

@endsection
