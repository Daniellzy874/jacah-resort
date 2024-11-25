<x-app-layout>
    <x-slot name="header" style=" display:flex;">
        <h2 class="font-semibold text-xl text-black leading-tight inline-flex ">
            {{ __('Manage Resort - Gallery') }}
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
        <div class="flex gap-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg" style="width: 400px; height: 500px;">
                <div style="height:80px;">
                    <h1 class="p-2 absolute">You're here: <span class="opacity-50">Manage Resort / Panorama Gallery</span></h1>
                </div>
                <div class="shadow-sm sm:rounded-lg p-6 text-gray-900 bg-white ">
                    <div class="flex mb-2">
                        <img src="{{asset('assets/image/manage.png')}}" style="width: 30px; height:30px; margin-right:5px;">
                        <h1 class="font-semibold text-xl text-black leading-tight inline-flex ">Manage</h1>
                    </div>
                    <form method="post" enctype='multipart/form-data'>
                        {{ csrf_field() }}
                        <div id="formPanorama"></div>
                        <div class="py-2 flex gap-1">
                            <x-primary-button formaction="{{route('savePanorama')}}" class="flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700" style="width: 80px;">
                                Add
                            </x-primary-button>
                            <x-primary-button formaction="{{route('editPanorama')}}" class="flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700" style="width: 80px;">
                                Edit
                            </x-primary-button>
                            <x-primary-button id="deletebtn" type="button" data-bs-toggle="modal" data-bs-target="#modalConfirmDelPano" class="flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700" style="width: 80px;">
                                Remove
                            </x-primary-button>
                        </div>
                        <div id="confirmDelPanorama"></div>
                    </form>
                </div>
            </div>

            <div class="w-full overflow-hidden sm:rounded-lg">

                <div class="flex justify-end pr-3">
                    <div id="searchPanorama" class="w-100 mt-2"></div>
                </div>

                <div class="bg-white shadow-sm mt-4 mb-2 p-6 text-gray-900">
                    <div class="flex">
                        <img src="{{asset('assets/image/list.png')}}" style="width: 20px; height:20px; margin-right:5px;">
                        <h1 class="font-semibold text-xl text-black leading-tight inline-flex">Panorama List</h1>
                    </div>
                    @viteReactRefresh
                    @vite('resources/js/panorama.js')
                    <div id="panoramaGallery">

                    </div>


                </div>

                <div id="paginateCategory" class="w-full flex justify-end pr-3"></div>

            </div>

        </div>
    </div>
</x-app-layout>

<script>

</script>