
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <!-- component -->
    <div class="flex items-center h-screen w-full justify-center">

    <div class="max-w-xs">
        <div class="bg-white shadow-xl rounded-lg py-3">
            <div class="photo-wrapper p-2">
                <img class="w-32 h-32 rounded-full mx-auto" src="https://miro.medium.com/max/280/1*MccriYX-ciBniUzRKAUsAw.png" alt="John Doe">
                
            </div>
            <div class="p-2">
                <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{ Auth::user()->firstname }}</h3>
                <div class="text-center text-gray-400 text-xs font-semibold">
                </div>
                <table class="text-xs my-3">
                    <tbody><tr>
                        <td class="px-2 py-2 text-gray-500 font-semibold">Full Name</td>
                        <td class="px-2 py-2">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }} </td>
                    </tr>
                    <tr>
                        <td class="px-2 py-2 text-gray-500 font-semibold">Username</td>
                        <td class="px-2 py-2">{{ Auth::user()->username }} </td>
                    </tr>
                    <tr>
                        <td class="px-2 py-2 text-gray-500 font-semibold">Email</td>
                        <td class="px-2 py-2">{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <td class="px-2 py-2 text-gray-500 font-semibold">Registered</td>
                        <td class="px-2 py-2">{{ Auth::user()->created_at }}</td>
                    </tr>
                </tbody></table>

            </div>
        </div>
    </div>

    </div>
</x-app-layout>