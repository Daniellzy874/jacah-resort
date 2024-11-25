<div>
    @if (Route::has('login'))
    @auth
    <ul class="nav__list">
        <li class="pt-2 pr-4"><a class="text-white {{ Route::is('redirect') ? 'bg-green-400 p-[10px] text-white rounded-md' : ''}}" href="{{route('room')}}">Home</a></li>
        <li class="pt-2 pr-4"><a class="text-white {{ Route::is('booking') ? 'bg-green-400 p-[10px] text-white rounded-md' : ''}}" href="{{route('booking')}}">Booking</a></li>
        <li>
            <x-notification align="right">
                <x-slot name="content">
                </x-slot>
            </x-notification>
        </li>
    </ul>
    @section('profile')
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class=" cursor-pointer ml-4 inline-flex items-center border-none text-sm leading-4 font-medium rounded-md text-white bg-transparent hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                <div class="flex items-center justify-center mr-1">
                    @if(Auth::user()->picture)
                    <img src="{{asset(Auth::user()->picture)}}" alt="" class="w-8 h-8 rounded-full object-cover mb-2">
                    @else
                    <img src="{{asset(asset('assets/image/pofile_pic_default/PROF-PIC.png'))}}" alt="" class="w-8 h-8 rounded-full object-cover mb-2">
                    @endif
                </div>

                <a class="text-white flex">
                    {{ Auth::user()->name }}
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>


            </button>
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link :href="route('profile')" class="no-underline">
                {{ __('Profile') }}
            </x-dropdown-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="no-underline">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
    <li data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-trigger="hover" title="Switch Day/Night" class="nav__item bg-green-100/50 rounded-full text-white flex justify-center items-center ">
        <i style="margin: 0%; padding:10px;" class='bx bx-moon change-theme text-white' id="theme-button"></i>
    </li>
    <script>
        // Initialize all tooltips on page load
        var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    </script>
    @endsection
    @else
    <ul class="nav__list">
        <li class="nav__item" style="padding-top:5px;"> <a href="{{ route('login') }}" class="nav__link cursor-pointer">Sign in</a></li>
        @if (Route::has('register'))
        <li class="nav__item"> <a style="background-color: #28a745; display:inline-flex; align-items:center; padding:5px 8px 5px 8px; color:white; border-radius:4px;" href="{{ route('register') }}">Sign up</a></li>
        @endif
        <li data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-trigger="hover" title="Switch Day/Night" class="nav__item bg-green-100/50 rounded-full text-white flex justify-center items-center ">
            <i style="margin: 0%; padding:10px;" class='bx bx-moon change-theme text-white' id="theme-button"></i>
        </li>
        @endauth
    </ul>
    @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
    // Initialize all tooltips on page load
    var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
</script>

<!-- <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="left" title="Tooltip on left">
  Tooltip on left
</button> -->
<script>
    // Fetch data from the API
    fetch('')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the response as JSON
        })

        .then(data => {
            if (Object.keys(data).length > 1) {
                const userList = document.getElementById('notif_content');
                data.map((datas) => {
                    let created = datas.created_at;
                    const div = document.createElement('div');
                    div.innerHTML = `
                <a href="{{route('customer')}}" class="z-0">
                <div class="bg-gray-200 shadow-md p-2 flex hover:bg-gray-300">
                <img src="{{asset('assets/image/pofile_pic_default/PROF-PIC.png')}}" class="h-[50px] w-[50px]"/>
                <div class="flex items-center ml-1 flex-column">
                 <h1 class="text-gray-500"><p class="font-bold">${datas.name}</p>booked for a room, take a look.</h1>
                <h1 class="text-sm inline-flex w-[100%] text-end">{{Carbon\Carbon::parse()->diffForHumans()}}</h1>
                </div>
                </div> 
                </a>
                `;
                    userList.appendChild(div); // Add the user info to the list
                });
            } else if (Object.keys(data).length === 0 || data === null) {
                const userList = document.getElementById('notif_content');

                const div = document.createElement('div');
                div.innerHTML = `
                <div class="bg-gray-200 shadow-md p-2 flex hover:bg-gray-300">
                    <img src="{{asset('assets/image/empty-notif.png')}}" />
                </div> 
                `;
                userList.appendChild(div); // Add the user info to the list


            } else {
                let datas = Object.values(data);
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
    // COUNT NOTIF
    // Fetch data from the API
    fetch('')
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