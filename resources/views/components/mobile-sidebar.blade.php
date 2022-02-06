<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
    x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu">
    <div class="py-4 space-y-6 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline"
            href="{{ route('admin.index') }}">
            {{ $store }}
        </a>
        <ul>
            <li class="relative px-6 py-3">
                @if (request()->is('dashboard'))
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-primary-600"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold {{ request()->is('dashboard') ? 'text-gray-800' : '' }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                    href="{{ route('admin.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>


        </ul>

        <ul>
            <li class="relative px-6 py-3">
                @if (request()->is('dashboard/user'))
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-primary-600"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->is('dashboard/user') ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.user.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="ml-4">User</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                @if (request()->is('dashboard/category*'))
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-primary-600"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->is('dashboard/category*') ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.category.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                    </svg>
                    <span class="ml-4">Category</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                @if (request()->is('dashboard/product*'))
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-primary-600"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->is('dashboard/product*') ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.product.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span class="ml-4">Product</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                @if (request()->is('dashboard/payment*'))
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-primary-600"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->is('dashboard/payment*') ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.payment.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="ml-4">Payment</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                @if (request()->is('dashboard/faq*'))
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-primary-600"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->is('dashboard/faq*') ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.faq.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-4">FAQs</span>
                </a>
            </li>
        </ul>

        <ul>
            <li class="relative px-6 py-3">
                @if (request()->is('dashboard/order*'))
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-primary-600"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->is('dashboard/order*') ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.order.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    <span class="ml-4">Order</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                @if (request()->is('dashboard/report*'))
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-primary-600"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->is('dashboard/report*') ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.report.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span class="ml-4">Report</span>
                </a>
            </li>
        </ul>

        <ul>
            <li class="relative px-6 py-3">
                @if (request()->is('dashboard/settings*'))
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-primary-600"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->is('dashboard/settings*') ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.settings.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="ml-4">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
