<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="antialiased sans-serif bg-gray-200 h-screen">
    
    <div class="container mx-auto py-6 px-4" x-data="datatables()" x-cloak>

        <!-- <div x-show="selectedRows.length" class="bg-teal-200 fixed top-0 left-0 right-0 z-40 w-full shadow">
            <div class="container mx-auto px-4 py-4">
                <div class="flex md:items-center">
                    <div class="mr-4 flex-shrink-0">
                        <svg class="h-8 w-8 text-teal-600"  viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                    </div>
                    <div x-html="selectedRows.length + ' rows are selected'" class="text-teal-800 text-lg"></div>
                </div>
            </div>
        </div> -->

        <div class="mb-4 flex justify-between items-center">
            <div class="flex-1 pr-4">
                <div class="relative md:w-1/3">
                    <input type="search"
                        class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                        placeholder="Search...">
                    <div class="absolute top-0 left-0 inline-flex items-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                            <circle cx="10" cy="10" r="7" />
                            <line x1="21" y1="21" x2="15" y2="15" />
                        </svg>
                    </div>
                </div>
            </div>
            <div>
                <div class="shadow rounded-lg flex">
                    <div class="relative">
                        <button @click.prevent="open = !open"
                            class="rounded-lg inline-flex items-center bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline text-gray-500 font-semibold py-2 px-2 md:px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:hidden" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                <path
                                    d="M5.5 5h13a1 1 0 0 1 0.5 1.5L14 12L14 19L10 16L10 12L5 6.5a1 1 0 0 1 0.5 -1.5" />
                            </svg>
                            <span class="hidden md:block">Display</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false"
                            class="z-40 absolute top-0 right-0 w-40 bg-white rounded-lg shadow-lg mt-12 -mr-1 block py-1 overflow-hidden">
                            <template x-for="heading in headings">
                                <label
                                    class="flex justify-start items-center text-truncate hover:bg-gray-100 px-4 py-2">
                                    <div class="text-teal-600 mr-3">
                                        <input type="checkbox" class="form-checkbox focus:outline-none focus:shadow-outline" checked @click="toggleColumn(heading.key)">
                                    </div>
                                    <div class="select-none text-gray-700" x-text="heading.value"></div>
                                </label>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative"
            style="height: 500px;">
            <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                <thead>
                    <tr class="text-left">
                        <!-- <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                            <label
                                class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                <input type="checkbox" class="form-checkbox focus:outline-none focus:shadow-outline" @click="selectAllCheckbox($event);">
                            </label>
                        </th> -->
                        <template x-for="heading in headings">
                            <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs"
                                x-text="heading.value" :x-ref="heading.key" :class="{ [heading.key]: true }"></th>
                        </template>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="activity in activities" :key="activity.id">
                        <tr>
                            <!-- <td class="border-dashed border-t border-gray-200 px-3">
                                <label
                                    class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                    <input type="checkbox" class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline" :name="user.userId"
                                            @click="getRowDetail($event, user.userId)">
                                </label>
                            </td> -->
                            <td class="border-dashed border-t border-gray-200 userId">
                                <span class="text-gray-700 px-6 py-3 flex items-center" x-text="activity.id"></span>
                            </td>
                            <td class="border-dashed border-t border-gray-200 firstName">
                                <span class="text-gray-700 px-6 py-3 flex items-center" x-text="activity.action"></span>
                            </td>
                            <td class="border-dashed border-t border-gray-200 lastName">
                                <span class="text-gray-700 px-6 py-3 flex items-center" x-text="activity.time"></span>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function datatables() {
            return {
                headings: [
                    {
                        'key': 'id',
                        'value': 'ID'
                    },
                    {
                        'key': 'action',
                        'value': 'Action'
                    },
                    {
                        'key': 'time',
                        'value': 'Time'
                    },
                ],
                activities: {!! $activitiesJson !!},
                selectedRows: [],

                open: false,
                responsive: true,
                
                toggleColumn(key) {
                    // Note: All td must have the same class name as the headings key! 
                    let columns = document.querySelectorAll('.' + key);

                    if (this.$refs[key].classList.contains('hidden') && this.$refs[key].classList.contains(key)) {
                        columns.forEach(column => {
                            column.classList.remove('hidden');
                        });
                    } else {
                        columns.forEach(column => {
                            column.classList.add('hidden');
                        });
                    }
                },

                getRowDetail($event, id) {
                    let rows = this.selectedRows;

                    if (rows.includes(id)) {
                        let index = rows.indexOf(id);
                        rows.splice(index, 1);
                    } else {
                        rows.push(id);
                    }
                },

                selectAllCheckbox($event) {
                    let columns = document.querySelectorAll('.rowCheckbox');

                    this.selectedRows = [];

                    if ($event.target.checked == true) {
                        columns.forEach(column => {
                            column.checked = true
                            this.selectedRows.push(parseInt(column.name))
                        });
                    } else {
                        columns.forEach(column => {
                            column.checked = false
                        });
                        this.selectedRows = [];
                    }
                }
            }
        }
    </script>
</div>


<!-- component -->
<div class="container bg-gray-200 mx-auto w-full h-full">
  <div class="relative wrap overflow-hidden p-10 h-full">
    <div class="border-2-2 absolute border-opacity-20 border-gray-700 h-full border" style="left: 50%"></div>

    @foreach ($activities as $activity)

        <!-- right timeline -->
        @if ($loop->even)
            <div class="mb-8 flex justify-between items-center w-full right-timeline">
              <div class="order-1 w-5/12"></div>
              <div class="z-20 flex items-center order-1 bg-gray-800 shadow-xl w-8 h-8 rounded-full">
                <h1 class="mx-auto font-semibold text-lg text-white">{{ ++$loop->index }}</h1>
              </div>
              <div class="order-1 bg-green-400 rounded-lg shadow-xl w-5/12 px-6 py-4">
                <h3 class="mb-3 font-bold text-gray-800 text-xl">{{ $activity['action'] }}</h3>
                <p class="text-sm leading-snug tracking-wide text-gray-900 text-opacity-100">{{ $activity['time'] }}</p>
              </div>
            </div>
        @else
            <!-- left timeline -->
            <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
              <div class="order-1 w-5/12"></div>
              <div class="z-20 flex items-center order-1 bg-gray-800 shadow-xl w-8 h-8 rounded-full">
                <h1 class="mx-auto text-white font-semibold text-lg">{{ ++$loop->index }}</h1>
              </div>
              <div class="order-1 bg-red-400 rounded-lg shadow-xl w-5/12 px-6 py-4">
                <h3 class="mb-3 font-bold text-white text-xl">{{ $activity['action'] }}</h3>
                <p class="text-sm font-medium leading-snug tracking-wide text-white text-opacity-100">{{ $activity['time'] }}</p>
              </div>
            </div>
        @endif


    @endforeach
  </div>
</div>


</x-app-layout>

