<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden h-96 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class=" flex space-x-2">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class=" grid grid-cols-3">
                        @for ($i = 0; $i < 3; $i++)
                            <a href="#"
                                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">

                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Noteworthy technology
                                    acquisitions 2021</h5>
                                <p class="font-normal text-gray-700">Here are the biggest enterprise technology
                                    acquisitions
                                    of 2021 so far, in reverse chronological order.</p>
                            </a>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
