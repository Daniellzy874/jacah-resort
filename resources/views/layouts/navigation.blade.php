<nav x-data="{ open: false }" class=" bg-gradient-to-l from-blue-500 to-cyan-300 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class=" mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-100">
            <div class="flex">


            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 my-2">
                <div class="hidden sm:flex sm:items-center">
                    <x-notification align="right">
                        <x-slot name="content">
                        </x-slot>
                    </x-notification>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger" class="border-none">
                            <button class="px-16 flex pt-2">
                                <div class="flex items-center justify-center">
                                    @if(Auth::user()->picture)
                                    <img src="{{asset(Auth::user()->picture)}}" alt="" class="w-8 h-8 rounded-full object-cover mb-2">
                                    @else
                                    <img src="{{asset(asset('assets/image/pofile_pic_default/PROF-PIC.png'))}}" alt="" class="w-8 h-8 rounded-full object-cover mb-2">
                                    @endif
                                </div>
                                <div class="text-white ms-1 flex">
                                    {{ Auth::user()->name }}
                                    <svg class="fill-current h-4 w-4 mt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="no-underline">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="no-underline">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
<script>
    // Fetch data from the API
    fetch('http://127.0.0.1:8000/notifCatch')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the response as JSON
        })

        .then(data => {
            let datas = Object.values(data);
            if (Object.values(datas).length > 1) {
                const userList = document.getElementById('notif_content');
                datas.map((data) => {
                    let created = datas.created_at;
                    const div = document.createElement('div');
                    div.innerHTML = `
                <a href="{{route('customer')}}" class="z-0">
                <div class="bg-gray-200 shadow-md p-2 flex hover:bg-gray-300">
                <img src="{{asset('assets/image/pofile_pic_default/PROF-PIC.png')}}" class="h-[50px] w-[50px]"/>
                <div class="flex items-center ml-1 flex-column">
                 <h1 class="text-gray-500"><p class="font-bold">${data.name}</p>booked for a room, take a look.</h1>
                <h1 id="log" class="text-sm inline-flex w-[100%] text-end">{{Carbon\Carbon::parse()->diffForHumans()}}</h1>
                </div>
                </div> 
                </a>
                `;
                    userList.appendChild(div); // Add the user info to the list
                });
            } else {
                let datas = [Object.values(data)];
                console.log(datas)
                const userList = document.getElementById('notif_content');
                datas.map((data) => {
                    const div = document.createElement('div');
                    div.innerHTML = `
                <a href="{{route('customer')}}" class="z-0">
                <div class="bg-gray-200 shadow-md p-2 flex hover:bg-gray-300">
                <img src="{{asset('assets/image/pofile_pic_default/PROF-PIC.png')}}" class="h-[50px] w-[50px]"/>
                <div class="flex items-center ml-1 flex-column"">
                 <h1 class="text-gray-500"><p class="font-bold">${data.name}</p>booked for a room, take a look.</h1>
                 <h1 class="text-sm inline-flex w-[100%] text-end">1 hr ago</h1>
                </div>
                </div> 
                </a>
                `;
                    userList.appendChild(div); // Add the user info to the list
                })
            }

        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
</script>
<script>
    // Fetch data from the API
    fetch('http://127.0.0.1:8000/notifCatch')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the response as JSON
        })

        .then(data => {
            const num = Object.keys(data).length;
            if (num > 0) {
                document.getElementById('notif').innerText = num;
            } else {
                document.getElementById('notif').style.display = 'none';
            }

        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
</script>