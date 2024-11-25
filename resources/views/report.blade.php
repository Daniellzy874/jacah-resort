<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Resort - Report') }}
        </h2>
    </x-slot>

    <div class="">
        <div style=" overflow:auto; height:100vh; " class="py-12 mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @viteReactRefresh
                @vite('resources/js/report.js')
                <div id="generateReport">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>