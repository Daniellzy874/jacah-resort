<x-app-layout>
    <x-slot name="header" style=" display:flex;"></x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style=" overflow:auto; height:75vh; overflow:auto;">
            <div class="p-2 flex">
                <div class="w-[50%]">
                    <h1 class="p-2">You're here: <span class="opacity-50">Monitoring / Check-in Customer</span></h1>
                </div>
                <div class="w-[50%]">
                    <div id="searchItemActive"></div>
                </div>
            </div>
            <div class="bg-white mt-6 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @viteReactRefresh
                    @vite('resources/js/MonitoringJS/item.js')
                    <div id="itemMonitoring"></div>
                </div>
            </div>
            <div id="paginate"></div>
        </div>
    </div>


</x-app-layout>