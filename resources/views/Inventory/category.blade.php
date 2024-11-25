<x-app-layout>
    <x-slot name="header" style=" display:flex;">
        <h2 class="font-semibold text-xl text-black leading-tight inline-flex ">
            {{ __('Inventory-category') }}
        </h2>
    </x-slot>

    <script>
        const navLinkEl = document.querySelectorAll('.sub-menu');

        navLinkEl.forEach(navLinkEll => {
            navLinkEll.addEventListener('click', () => {
                document.querySelector('.activel')?.classList.remove('activel');
                navLinkEll.classList.add('activel');
            });
        });
    </script>

    <div class="py-2">
        @if($message = Session::get('success'))
        <div id="alert" class="absolute flex justify-center items-center pr-4" style="width:80%; height:100%; transform:translateY(-100px)">
            <div class="flex flex-column alert alert-success h-25 w-25 border-1 border-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <div class="w-full flex justify-center">
                    <strong>{{$message}}</strong>
                </div>
            </div>
        </div>
        @elseif($errors->any())
        <div id="alert" class="absolute flex justify-center items-center pr-4" style="width:80%; height:100%; transform:translateY(-100px)">
            <div class="flex flex-column alert alert-danger h-25 w-25 border-1 border-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                    <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708" />
                </svg>
                <div class="w-full flex justify-center">
                    @foreach($errors->all() as $error)
                    <strong>{{$error}}</strong>
                    @endforeach
                </div>
            </div>
        </div>
        @else
        @endif
        <script>
            setTimeout(() => {
                document.getElementById('alert').style.display = "none";
            }, 2000);
        </script>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-3 flex">
            <div class=" bg-white overflow-hidden shadow-sm sm:rounded-lg" style="width: 30%;">
                <div class="p-6 text-gray-900 ">
                    <h1 class="font-semibold text-xl text-black leading-tight inline-flex ">ADD NEW CATEGORY</h1>
                    <form method="post">
                        {{ csrf_field() }}
                        <div class="flex">
                            <x-text-input id="catname" class="block mt-1 h-8 w-full text-sm" name="catName" placeholder="Category Name" required></x-text-input>
                            <input type="hidden" name="cat_id" id="cat-id">
                        </div>
                        <div class="py-2 flex gap-2">
                            <x-primary-button formaction="{{route('createCatInvent')}}" class="flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700" style="width: 80px;">
                                {{ __('Add') }}
                            </x-primary-button>
                            <x-primary-button formaction="{{route('editCatInvent')}}" class="flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700" style="width: 80px;">
                                {{ __('Edit') }}
                            </x-primary-button>
                            <x-primary-button type="button" data-bs-toggle="modal" data-bs-target="#modalConfirmDelInventCat" class="flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700" style="width: 80px;">
                                {{ __('Delete') }}
                            </x-primary-button>
                        </div>
                        <div id="confirmDelInventCat"></div>
                    </form>
                </div>
            </div>
            <div class="w-75">
                <div id="searchInputcat">
                </div>
            </div>
        </div>
        <div class="gap-10 flex max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="w-50 overflow-hidden ">

                <div class="shadow-sm sm:rounded-lg bg-white p-6 text-gray-900">
                    <h1 class="font-semibold text-xl text-black leading-tight inline-flex ">Category list</h1>
                    @viteReactRefresh
                    @vite('resources/js/inventcat.js')
                    <div id="inventCat"></div>
                </div>
                <div class="py-2">
                    <div id="paginate"></div>
                </div>

            </div>
            <div class="w-50 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="prodtbl"></div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>