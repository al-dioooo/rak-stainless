@auth
    @php
    $userId = Auth::user()->id;
    $cartCount = \DB::table('cart')
        ->where('user_id', $userId)
        ->count();
    @endphp
@endauth

<nav x-data="{ open: false, cartTooltip: false, accountTooltip: false }"
    class="z-40 justify-between w-full text-gray-700 bg-white">

    <div x-show="open" x-transition class="fixed z-50 flex w-full h-screen bg-black md:hidden bg-opacity-80">
        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-x-10"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform -translate-x-10"
            class="flex w-full max-w-xs p-4 overflow-y-auto origin-left transform bg-white"
            x-on:click.away="open = false">
            <ul class="flex flex-col w-full space-y-2">
                <li>
                    <div class="relative w-full">
                        <form action="{{ route('user.product.search') }}"
                            class="flex items-center w-full">
                            <input
                                class="w-full pr-8 mx-4 transition rounded-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                type="search" name="q" placeholder="Search everything" value="{{ request()->q }}"
                                required>
                            <button type="submit"
                                class="absolute px-2 py-2 rounded-full right-5 focus:outline-none focus:bg-gray-200 hover:bg-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </li>
                <li>
                    <span class="flex px-4 mt-4 text-sm font-medium text-gray-400 uppercase">Pages</span>
                </li>
                <li>
                    <a href="{{ route('user.index') }}"
                        class="flex flex-row items-center h-12 px-4 text-gray-600 rounded-lg hover:bg-gray-100">
                        <span class="flex items-center justify-center text-lg text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </span>
                        <span class="ml-3">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.product.index') }}"
                        class="flex flex-row items-center h-12 px-4 text-gray-600 rounded-lg hover:bg-gray-100">
                        <span class="flex items-center justify-center text-lg text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </span>
                        <span class="ml-3">Product</span>
                    </a>
                </li>
                <li @click.away="category = false" class="relative" x-data="{ category: false }">
                    <button x-on:click="category = !category"
                        class="flex flex-row items-center h-12 px-4 text-gray-600 rounded-lg hover:bg-gray-100">
                        <span class="flex items-center justify-center text-lg text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                            </svg>
                        </span>
                        <span class="ml-3">Categories</span>
                        <svg fill="currentColor" viewBox="0 0 20 20"
                            :class="{'rotate-180': category, 'rotate-0': !category}"
                            class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="category" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 z-40 w-full mt-2 origin-top rounded-md shadow-lg md:w-48">
                        <div
                            class="px-2 py-2 overflow-y-auto bg-white rounded-md shadow max-h-64">
                            @foreach ($categories as $row)
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    href="{{ route('user.product.category', ['slug' => $row->slug]) }}">{{ $row->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                <li>
                    <a href="https://blog.karyamitra.co.id" target="_blank"
                        class="flex flex-row items-center h-12 px-4 text-gray-600 rounded-lg hover:bg-gray-100">
                        <span class="flex items-center justify-center text-lg text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </span>
                        <span class="ml-3">Blog</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.contact') }}"
                        class="flex flex-row items-center h-12 px-4 text-gray-600 rounded-lg hover:bg-gray-100">
                        <span class="flex items-center justify-center text-lg text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </span>
                        <span class="ml-3">Contact</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.cart.index') }}"
                        class="flex flex-row items-center h-12 px-4 text-gray-600 rounded-lg hover:bg-gray-100">
                        <span class="flex items-center justify-center text-lg text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                        <span class="ml-3">Cart</span>
                    </a>
                </li>
                <li>
                    <span class="flex px-4 mt-4 text-sm font-medium text-gray-400 uppercase">Account</span>
                </li>
                @auth
                    <li>
                        <a href="{{ route('user.profile.index') }}"
                            class="flex flex-row items-center h-12 px-4 text-gray-600 rounded-lg hover:bg-gray-100">
                            <span class="flex items-center justify-center text-lg text-gray-400">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </span>
                            <div class="flex flex-col ml-3">
                                <span>{{ Auth::user()->name }}</span>
                                <span class="text-xs">View your profile</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.order.index') }}"
                            class="flex flex-row items-center h-12 px-4 text-gray-600 rounded-lg hover:bg-gray-100">
                            <span class="flex items-center justify-center text-lg text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                </svg>
                            </span>
                            <span class="ml-3">Order List</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.address.index') }}"
                            class="flex flex-row items-center h-12 px-4 text-gray-600 rounded-lg hover:bg-gray-100">
                            <span class="flex items-center justify-center text-lg text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>
                            <span class="ml-3">Address</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" x-on:click.prevent="logout()"
                            class="flex flex-row items-center h-12 px-4 text-gray-600 rounded-lg hover:bg-gray-100">
                            <span class="flex items-center justify-center text-lg text-red-400">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                    <path
                                        d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-3">Logout</span>
                        </a>
                    </li>
                @endauth
                @guest
                    <li>
                        <a href="{{ route('login') }}"
                            class="flex flex-row items-center h-12 px-4 text-gray-600 rounded-lg hover:bg-gray-100">
                            <span class="flex items-center justify-center text-lg text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                            </span>
                            <span class="ml-3">Login</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}"
                            class="flex flex-row items-center h-12 px-4 text-gray-600 rounded-lg hover:bg-gray-100">
                            <span class="flex items-center justify-center text-lg text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                            </span>
                            <span class="ml-3">Register</span>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>

    <div class="flex flex-col px-4 md:items-center md:flex-row md:px-6 lg:px-8">
        <div class="flex items-center justify-between p-4 whitespace-nowrap">
            <a href="{{ route('user.index') }}"
                class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">{{ $store }}</a>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="relative hidden w-full md:flex">
            <form action="{{ route('user.product.search') }}" method="get" class="flex items-center w-full">
                <input
                    class="w-full pr-8 mx-4 transition rounded-full focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                    type="search" name="q" placeholder="Search everything" value="{{ request()->q }}" required>
                <button type="submit"
                    class="absolute px-2 py-2 rounded-full right-5 focus:outline-none focus:bg-gray-200 hover:bg-gray-200 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>
        </div>
        <nav class="z-40 flex-col hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
            @guest
                <a class="flex items-center px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-full md:mt-0 md:ml-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="{{ route('login') }}">Login</a>
                <a class="flex items-center px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-full md:mt-0 md:ml-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="{{ route('register') }}">Register</a>
            @endguest
            @auth
                <div @click.away="open = false" class="relative" x-data="{ open: false, accountTooltip: false }">
                    <button @click="open = !open" x-on:mouseover="accountTooltip = true"
                        x-on:mouseleave="accountTooltip = false"
                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-full md:w-auto md:inline-flex md:mt-0 md:ml-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                            class="inline w-4 h-4 ml-1 transition-transform duration-200 transform">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div class="relative">
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="px-2 py-2 bg-white rounded-md shadow">
                                @if (Auth::user()->role == 'customer')
                                    <a class="flex px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="{{ route('user.profile.index') }}">
                                        <div class="flex-col">
                                            {{ Auth::user()->name }}
                                            <div class="text-xs font-normal text-gray-600 ">View your profile</div>
                                        </div>
                                    </a>
                                    <a class="flex items-center px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="{{ route('user.order.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                        </svg>
                                        Order List
                                    </a>
                                    <a class="flex items-center px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="{{ route('user.address.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        Address
                                    </a>
                                @elseif (Auth::user()->role == 'admin')
                                    <a class="flex px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="{{ route('admin.user.index') }}">
                                        <div class="flex-col">
                                            {{ Auth::user()->name }}
                                            <div class="text-xs font-normal text-gray-600 ">Administrator</div>
                                        </div>
                                    </a>
                                    <a class="flex items-center px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="{{ route('admin.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                        </svg>
                                        Dashboard
                                    </a>
                                @endif
                                <a class="flex items-center px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    href="{{ route('logout') }}" x-on:click.prevent="logout()">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Logout
                                </a>
                            </div>
                        </div>
                    </div>
                    <div x-cloak x-show="accountTooltip" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95" class="relative">
                        <div
                            class="absolute top-0 right-0 z-10 p-2 mt-3 text-sm leading-tight text-white origin-top transform -translate-x-1 bg-black bg-orange-500 rounded-lg shadow-lg bg-opacity-80">
                            Account
                        </div>
                    </div>
                </div>
                <form id="logout" action="{{ route('logout') }}" method="post" class="sr-only">@csrf</form>
            @endauth
            <div class="relative">
                <a x-on:mouseover="cartTooltip = true" x-on:mouseleave="cartTooltip = false"
                    class="flex items-center px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-full md:mt-0 md:ml-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="{{ route('user.cart.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    @auth
                        @if ($cartCount > 0)
                            <span
                                class="absolute right-0 inline-flex px-2 text-xs font-semibold leading-5 text-black border-2 border-white rounded-full bg-primary-200 -top-2">
                                {{ $cartCount }}
                            </span>
                        @endif
                    @endauth
                </a>
                <div x-cloak x-show="cartTooltip" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95" class="relative">
                    <div
                        class="absolute top-0 right-0 -translate-x-1.5 mt-3 z-10 p-2 text-sm leading-tight bg-black bg-opacity-80 text-white origin-top transform bg-orange-500 rounded-lg shadow-lg">
                        Cart
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <nav class="flex flex-grow hidden pb-4 mx-4 border-b md:pb-2 md:flex md:justify-center">
        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-full md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            href="{{ route('user.index') }}">Home</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-full md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            href="{{ route('user.product.index') }}">Product</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-full md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            href="https://blog.karyamitra.co.id" target="_blank">Blog</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-full md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            href="{{ route('user.contact') }}">Contact</a>
        <div @click.away="open = false" class="relative" x-data="{ open: false }">
            <button @click="open = !open"
                class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-full md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <span>Categories</span>
                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                    class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 z-40 w-full mt-2 origin-top rounded-md shadow-lg md:w-48">
                <div
                    class="px-2 py-2 overflow-y-auto bg-white rounded-md shadow max-h-64">
                    @if (count($categories) == null)
                        <div
                            class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 focus:outline-none focus:shadow-outline">
                            No category</div>
                    @else
                        @foreach ($categories as $row)
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="{{ route('user.product.category', ['slug' => $row->slug]) }}">{{ $row->name }}</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </nav>
</nav>
