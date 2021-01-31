<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activity Logs') }}
        </h2>
    </x-slot>


<style>
  #journal-scroll::-webkit-scrollbar {
            width: 4px;
            cursor: pointer;
            /*background-color: rgba(229, 231, 235, var(--bg-opacity));*/

        }
        #journal-scroll::-webkit-scrollbar-track {
            background-color: rgba(229, 231, 235, var(--bg-opacity));
            cursor: pointer;
            /*background: red;*/
        }
        #journal-scroll::-webkit-scrollbar-thumb {
            cursor: pointer;
            background-color: #a0aec0;
            /*outline: 1px solid slategrey;*/
        }
</style>

<div class="container mx-auto py-10 flex justify-center h-screen">
    <div class="w-full  h-full flex flex-col">
                    <div class="bg-white text-sm text-gray-500 font-bold px-5 py-2 shadow border-b border-gray-300">
                        {{  __('Current User Activity Logs')}}
                    </div>
                    
                    <div class="w-full h-full overflow-auto shadow bg-white" id="journal-scroll">

                    <table class="w-full">


                        <tbody class="">
                            @if ($activities)
                                @foreach ($activities as $activity)
                                <tr class="relative transform scale-100 text-xs py-1 border-b-2 border-blue-100 cursor-default

                                    bg-blue-500 bg-opacity-25">
                                    <td class="pl-5 pr-3 whitespace-no-wrap">
                                        <div class="text-gray-400">Date</div>
                                        <div>{{ $activity['time'] }}</div>
                                    </td>

                                    <td class="px-2 py-2 whitespace-no-wrap">
                                        <div class="leading-5 text-gray-500 font-medium">{{ Auth::user()->email }}</div>
                                        <div class="leading-5 text-gray-900">{{ Str::upper($activity['action']) }}</div>
                                        <div class="leading-5 text-gray-800">{{ ucfirst($activity['msg']) }} performed at, <a>{{ $activity['time'] }}</a></div>
                                    </td>

                                </tr>
                                @endforeach
                            @else
                                <tr class="relative transform scale-100 text-medium py-1 border-b-2 border-blue-100 cursor-default bg-red-300 bg-opacity-25">

                                    <td class="pl-5 pr-3 whitespace-no-wrap">
                                        <div class="text-gray-400">No Activity Available</div>
                                    </td>
                                </tr>
                            @endif
                                                    
                        </tbody>
                    </table>
                    </div>
                    
            </div>
    </div>


</x-app-layout>

