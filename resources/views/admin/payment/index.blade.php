@extends('layout.app-admin')
@section('title', 'Payment')

@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Payments
        </h2>
        <div class="container mx-auto" x-data="loadItems()">
            <div class="flex justify-between mb-4">
                <div class="flex">
                    <div class="relative w-full max-w-sm focus-within:text-primary-500">
                        <div class="absolute inset-y-0 flex items-center pl-2">
                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input x-ref="searchField" x-model="search" x-on:click="viewPage(0)"
                            x-on:keydown.window.prevent.slash=" viewPage(0), $refs.searchField.focus()"
                            class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:ring-primary-300 focus:outline-none focus:shadow-outline-primary form-input"
                            type="text" placeholder="Search payments" aria-label="Search">
                    </div>
                </div>
                <div class="flex">
                    <a href="{{ route('admin.payment.add') }}"
                        class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg bg-primary-600 active:bg-primary-600 hover:bg-primary-700 focus:outline-none focus:shadow-outline-primary">
                        Add
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg>
                    </a>
                </div>
            </div>
            @if (count($payment) == null)
                <div class="w-full mt-8 overflow-hidden rounded-lg shadow-xs">
                    <div class="flex justify-center w-full py-3 bg-white">
                        <div class="text-xs font-medium tracking-wider text-black uppercase">
                            No payment method available
                        </div>
                    </div>
                </div>
            @else
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Payments
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Number
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <template x-for="item in filteredItems" :key="item">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900" x-text="item.company">
                                                    </div>
                                                    <div class="text-sm text-gray-500" x-text="item.type"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900" x-text="item.name"></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900" x-text="item.number"></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex space-x-4">
                                                <form action="{{ route('admin.payment.edit') }}">
                                                    <input type="hidden" name="id" :value="item.id">
                                                    <button type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.payment.delete') }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" :value="item.id">
                                                    <button type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-500"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex items-center justify-between w-full py-6 mx-auto md:w-1/2" x-show="pageCount() > 1">
                    <!--First Button-->
                    <button x-on:click="viewPage(0)" :disabled="pageNumber==0"
                        :class="{ 'disabled cursor-not-allowed text-gray-600' : pageNumber==0 }">
                        <svg class="w-5 h-5 text-primary-600" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="19 20 9 12 19 4 19 20"></polygon>
                            <line x1="5" y1="19" x2="5" y2="5"></line>
                        </svg>
                    </button>

                    <!--Previous Button-->
                    <button x-on:click="prevPage" :disabled="pageNumber==0"
                        :class="{ 'disabled cursor-not-allowed text-gray-600' : pageNumber==0 }">
                        <svg class="w-5 h-5 text-primary-600" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </button>

                    <!-- Display page numbers -->
                    <template x-for="(page,index) in pages()" :key="index">
                        <button class="px-4 rounded-full"
                            :class="{ 'bg-primary-600 text-white font-bold' : index === pageNumber }" type="button"
                            x-on:click="viewPage(index)">
                            <span x-text="index+1"></span>
                        </button>
                    </template>

                    <!--Next Button-->
                    <button x-on:click="nextPage" :disabled="pageNumber >= pageCount() -1"
                        :class="{ 'disabled cursor-not-allowed text-gray-600' : pageNumber >= pageCount() -1 }">
                        <svg class="w-5 h-5 text-primary-600" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>

                    <!--Last Button-->
                    <button x-on:click="viewPage(Math.ceil(total/size)-1)" :disabled="pageNumber >= pageCount() -1"
                        :class="{ 'disabled cursor-not-allowed text-gray-600' : pageNumber >= pageCount() -1 }">
                        <svg class="w-5 h-5 text-primary-600" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="5 4 15 12 5 20 5 4"></polygon>
                            <line x1="19" y1="5" x2="19" y2="19"></line>
                        </svg>
                    </button>
                </div>

                <div>
                    <div class="flex flex-wrap items-center justify-between mt-6 text-sm leading-5 text-gray-700">
                        <div class="w-full text-center sm:w-auto sm:text-left" x-show="pageCount() > 1">
                            Page <span x-text="pageNumber+1"> </span> of
                            <span x-text="pageCount()"></span> | Showing
                            <span x-text="startResults()"></span> to
                            <span x-text="endResults()"></span>
                        </div>

                        <div class="w-full text-center sm:w-auto sm:text-right" x-show="total > 0">
                            Total <span class="font-bold" x-text="total"></span> results
                        </div>

                        <!--Message to display when no results-->
                        <div class="flex items-center mx-auto text-red-500" x-show="total==0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            <span class="ml-4">No results.</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('script')
    <script>
        var sourceData = [
            @foreach ($payment as $row)
                {
                id: '{{ $row->id }}',
                name: '{{ $row->name }}',
                type: '{{ $row->type }}',
                company: '{{ $row->company }}',
                number: '{{ $row->number }}'
                },
            @endforeach
        ];

        function loadItems() {
            return {
                search: "",
                pageNumber: 0,
                size: 10,
                total: "",
                myForData: sourceData,

                get filteredItems() {
                    const start = this.pageNumber * this.size,
                        end = start + this.size;

                    if (this.search === "") {
                        this.total = this.myForData.length;
                        return this.myForData.slice(start, end);
                    }

                    //Return the total results of the filters
                    this.total = this.myForData.filter((item) => {
                        return item.company
                            .toLowerCase()
                            .includes(this.search.toLowerCase()) ||
                            item.type
                            .toLowerCase()
                            .includes(this.search.toLowerCase()) ||
                            item.name
                            .toLowerCase()
                            .includes(this.search.toLowerCase()) ||
                            item.number
                            .toLowerCase()
                            .includes(this.search.toLowerCase());
                    }).length;

                    //Return the filtered data
                    return this.myForData
                        .filter((item) => {
                            return item.company
                                .toLowerCase()
                                .includes(this.search.toLowerCase()) ||
                                item.type
                                .toLowerCase()
                                .includes(this.search.toLowerCase()) ||
                                item.name
                                .toLowerCase()
                                .includes(this.search.toLowerCase()) ||
                                item.number
                                .toLowerCase()
                                .includes(this.search.toLowerCase());
                        })
                        .slice(start, end);
                },

                //Create array of all pages (for loop to display page numbers)
                pages() {
                    return Array.from({
                        length: Math.ceil(this.total / this.size),
                    });
                },

                //Next Page
                nextPage() {
                    this.pageNumber++;
                },

                //Previous Page
                prevPage() {
                    this.pageNumber--;
                },

                //Total number of pages
                pageCount() {
                    return Math.ceil(this.total / this.size);
                },

                //Return the start range of the paginated results
                startResults() {
                    return this.pageNumber * this.size + 1;
                },

                //Return the end range of the paginated results
                endResults() {
                    let resultsOnPage = (this.pageNumber + 1) * this.size;

                    if (resultsOnPage <= this.total) {
                        return resultsOnPage;
                    }

                    return this.total;
                },

                //Link to navigate to page
                viewPage(index) {
                    this.pageNumber = index;
                },
            };
        }
    </script>
@endpush
