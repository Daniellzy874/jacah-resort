<x-app-layout>
    <x-slot name="header" style=" display:flex;">
        <h2 class="font-semibold text-xl text-black leading-tight inline-flex ">
            {{ __('Inventory-customer') }}
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

    <div class="py-2" style="padding-left:20%; overflow:auto; height:80vh;">
        <div class="flex gap-6 max-w-7xl mx-auto sm:px-6 lg:px-8 py-3">

            <div class="w-50 overflow-hidden sm:rounded-lg">
                <div class="shadow-sm sm:rounded-lg p-6 text-gray-900 bg-white ">
                    <h1 class="font-semibold text-xl text-black leading-tight inline-flex ">Manage</h1>
                    <form method="post">
                        <div class="gap-2">
                            <x-text-input class="block mt-1 w-full h-10" type="number" placeholder="ID"></x-text-input>
                            <x-text-input class="block mt-1 w-full h-10" placeholder="First Name"></x-text-input>
                            <x-text-input class="block mt-1 w-full h-10" placeholder="Last Name"></x-text-input>
                            <x-text-input class="block mt-1 w-full h-10" placeholder="Telephone"></x-text-input>
                            <x-text-input class="block mt-1 w-full h-10" placeholder="Email"></x-text-input>
                        </div>
                        <div class="py-2 flex">
                            <x-primary-button form-action="" class="flex items-center justify-center h-10 w-50 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700">
                                {{ __('Add') }}
                            </x-primary-button>
                            <x-primary-button form-action="" class="flex items-center justify-center h-10 w-50 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700">
                                {{ __('Edit') }}
                            </x-primary-button>
                            <x-primary-button form-action="" class="flex items-center justify-center h-10 w-50 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700">
                                {{ __('Remove') }}
                            </x-primary-button>

                        </div>
                    </form>
                </div>

            </div>
            <div class="w-full overflow-hidden mt-8">
                <div class="shadow-sm sm:rounded-lg bg-white p-6 text-gray-900 ">
                    <h1 class="font-semibold text-xl text-black leading-tight inline-flex ">Customer List</h1>
                    <table class="table">
                        <thead class="thead">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">FirstName</th>
                                <th scope="col">LastName</th>
                                <th scope="col">Tel.</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>24</td>
                                <td>Chlorine</td>
                                <td>Chlorine</td>
                                <td>Chlorine</td>
                                <td>Chlorine</td>
                                <td>Chlorine</td>
                            </tr>


                        </tbody>
                    </table>

                </div>

            </div>
        </div>

    </div>

</x-app-layout>