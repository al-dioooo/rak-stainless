<footer id="footer" class="relative pt-24 bg-gray-100">
    <div class="py-16 mx-4 border-t border-b border-gray-300 border-opacity-50">
        <div class="container px-4 mx-auto xl:px-12 2xl:px-4">
            <div class="lg:flex">
                <div class="flex w-full mb-16 lg:w-1/2 lg:mb-0">
                    <div class="w-full px-6 lg:w-1/2">
                        <ul>
                            <li>
                                <a class="text-xs leading-none text-gray-800 lg:text-sm hover:text-primary-700"
                                    href="{{ route('user.faq') }}">
                                    FAQ
                                </a>
                            </li>
                            <li class="mt-6">
                                <a class="text-xs leading-none text-gray-800 lg:text-sm hover:text-primary-700"
                                    href="{{ route('user.product.index') }}">
                                    Product
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full px-6 lg:w-1/2">
                        <ul>
                            <li>
                                <a class="text-xs leading-none text-gray-800 lg:text-sm hover:text-primary-700"
                                    href="https://blog.karyamitra.co.id" target="_blank">
                                    Blog
                                </a>
                            </li>
                            <li class="mt-6">
                                <a class="text-xs leading-none text-gray-800 lg:text-sm hover:text-primary-700"
                                    href="{{ route('user.contact') }}">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex w-full lg:w-1/2">
                    @auth
                        <div class="w-full px-6 lg:w-1/2">
                            <ul>
                                <li>
                                    <a class="text-xs leading-none text-gray-800 lg:text-sm hover:text-primary-700"
                                        href="{{ route('user.profile.index') }}">
                                        Account
                                    </a>
                                </li>
                                <li class="mt-6">
                                    <a class="text-xs leading-none text-gray-800 lg:text-sm hover:text-primary-700"
                                        href="{{ route('user.order.index') }}">
                                        Order
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endauth
                    <div class="flex flex-col justify-between w-full px-6 lg:w-1/2">
                        <div class="flex items-center mb-6 space-x-4">
                            <a href="{{ 'https://wa.me/' . $whatsapp }}" aria-label="WhatsApp Link" target="_blank">
                                <div
                                    class="text-gray-800 cursor-pointer hover:text-primary-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
                                        <path
                                            d="M9 10a0.5 .5 0 0 0 1 0v-1a0.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a0.5 .5 0 0 0 0 -1h-1a0.5 .5 0 0 0 0 1">
                                        </path>
                                    </svg>
                                </div>
                            </a>
                            <a href="{{ 'https://instagram.com/' . $info->where('key', 'instagram')->first()->value }}" target="_blank" aria-label="Instagram Link">
                                <div
                                    class="text-gray-800 cursor-pointer hover:text-primary-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="4" y="4" width="16" height="16" rx="4"></rect>
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <line x1="16.5" y1="7.5" x2="16.5" y2="7.501"></line>
                                    </svg>
                                </div>
                            </a>
                            <a href="{{ 'https://www.youtube.com/channel/' . $info->where('key', 'youtube')->first()->value }}" target="_blank"
                                aria-label="YouTube Link">
                                <div
                                    class="text-gray-800 cursor-pointer hover:text-primary-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="3" y="5" width="18" height="14" rx="4"></rect>
                                        <path d="M10 9l5 3l-5 3z"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-row items-center justify-center">
        <p class="my-6 text-xs leading-none text-gray-900 md:my-5 lg:text-sm">
            &copy; <span x-data="{ year: (new Date()).getFullYear() }" x-text="year"></span> {{ $store }}. All rights
            reserved.
        </p>
    </div>
</footer>
