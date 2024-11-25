<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">


</head>
<style>
    ul li ul {
        display: none;
        transition: all .1s;
    }

    ul li ul.active {
        display: block;
    }
</style>

<body>
    <!-- < div style="position: absolute; height:100%; width:20%; background-color:#4F6F52; overflow:auto;"> -->
    <div class="absolute w-[20%] h-[100vh] overflow-y-auto bg-white border-b border-gray-100 pb-16 shadow-md">
        <div class="flex justify-center items-center bg-cyan-300 " style="height:30vh;">
            <img src="{{asset('assets/image/logo.png')}}" class="h-[100px]">
        </div>
        <ul>
            <li>
                <a class="{{ Route::is(['dashboard','redirect']) ? 'bg-green-500 text-white' : ''}} px-4 py-2 w-full flex hover:text-white hover:bg-green-500 focus:bg-green-500" href="{{route('dashboard')}}">
                    <i class='bx bxs-dashboard pt-1'></i>
                    <h1 class="text-xl ml-4">Dashboard</h1>
                </a>
            </li>
            <li>
                <a class="{{ Route::is('customer') ? 'bg-green-500 text-white' : ''}} px-4 py-2 w-full flex hover:text-white hover:bg-green-500 focus:bg-green-500" href="{{route('customer')}}">
                    <i class='bx bxs-user'></i>
                    <h1 class="text-sm ml-4">Customer Reservation</h1>
                </a>
            </li>
            <li>
                <a onclick="document.getElementById('sub-manage').classList.toggle('active') " class="{{ Route::is(['roomlist','category','panorama']) ? 'bg-green-500 text-white' : ''}} flex block justify-between py-2 px-4 hover:text-white hover:bg-green-500 focus:bg-green-500 focus:text-white" href="#">
                    <div class="flex">
                        <i class='bx bxs-building-house pt-1'></i>
                        <h1 class="text-xl ml-4">Manage Resort</h1>
                    </div>

                    <svg class="fill-current h-4 w-4 m-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>


                </a>
                <ul id="sub-manage" class="{{ Route::is(['roomlist','category','panorama','promo'])  ? 'active' : ''}}">
                    <li><a class="{{ Route::is('roomlist') ? 'bg-green-700 text-white' : '' }} menu-item block py-1 px-4 hover:text-white hover:bg-green-700 active:bg-green-700 focus:bg-green focus:bg-green-500 focus:text-white" href="{{route('roomlist')}}">Room/Cottage</a></li>
                    <li><a class="{{ Route::is('category') ? 'bg-green-700 text-white' : '' }} menu-item block py-1 px-4 hover:text-white hover:bg-green-700 active:bg-green-700 focus:bg-green focus:bg-green-500 focus:text-white" href="{{route('category')}}">Category</a></li>
                    <li><a class="{{ Route::is('panorama') ? 'bg-green-700 text-white' : '' }} menu-item block py-1 px-4 hover:text-white hover:bg-green-700 active:bg-green-700 focus:bg-green focus:bg-green-500 focus:text-white" href="{{route('panorama')}}">Panorama gallery</a></li>
                    <li><a class="{{ Route::is('promo') ? 'bg-green-500 text-white' : '' }} menu-item block py-1 px-4 hover:text-white hover:bg-green-700 active:bg-green-700 focus:bg-green focus:bg-green-500 focus:text-white" href="{{route('promo')}}">Announcement</a></li>
                </ul>
            </li>
            <li>
                <a onclick="document.getElementById('sub-inventory').classList.toggle('active') " class="{{ Route::is(['inventProduct','inventCategory']) ? 'bg-green-500 text-white' : ''}} flex block justify-between py-2 px-4 hover:text-white hover:bg-green-500 focus:bg-green-500 focus:text-white" flex block justify-between py-2 px-4 hover:bg-green-500 focus:bg-green-500" href="#">
                    <div class="flex">
                        <i class='bx bx-list-check pt-1'></i>
                        <h1 class="text-xl ml-4">Inventory</h1>
                    </div>

                    <svg class="fill-current h-4 w-4 m-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>


                </a>
                <ul id="sub-inventory" class="{{ Route::is(['inventCategory','inventProduct'])  ? 'active' : ''}}">
                    <li><a class="{{ Route::is('inventProduct') ? 'bg-green-700 text-white' : '' }} menu-item block py-1 px-4 hover:text-white hover:bg-green-700 active:bg-green-700 focus:bg-green focus:bg-green-500 focus:text-white" href="{{route('inventProduct')}}">Product</a></li>
                    <li><a class="{{ Route::is('inventCategory') ? 'bg-green-700 text-white' : '' }} menu-item block py-1 px-4 hover:text-white hover:bg-green-700 active:bg-green-700 focus:bg-green focus:bg-green-500 focus:text-white" href="{{route('inventCategory')}}">Category</a></li>
                </ul>
            </li>
            <li>
                <a onclick="document.getElementById('sub-monitoring').classList.toggle('active') " class="flex block justify-between py-2 px-4 hover:text-white hover:bg-green-500 focus:bg-green-500 focus:text-white" href="#">
                    <div class="flex">
                        <i class='bx bxs-file-find pt-1'></i>
                        <h1 class="text-xl ml-4">Monitoring</h1>
                    </div>

                    <svg class="fill-current h-4 w-4 m-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>

                </a>
                <ul id="sub-monitoring" class="{{ Route::is(['monitor-item','monitor-cat'])  ? 'active' : ''}}">
                    <li><a class="{{ Route::is('monitor-item') ? 'bg-green-700 text-white' : '' }} menu-item block py-1 px-4 hover:text-white hover:bg-green-700 active:bg-green-700 focus:bg-green focus:bg-green-500 focus:text-white" href="{{route('monitor-item')}}">Customer</a></li>
                </ul>
            </li>
            <li>
                <a class="{{ Route::is('report') ? 'bg-green-500 text-white' : ''}} px-4 py-2 w-full flex hover:text-white hover:bg-green-500 focus:bg-green-500" href="{{route('report')}}">

                    <i class='bx bxs-report'></i>
                    <h1 class="text-xl ml-4">Report</h1>

                </a>

            </li>

        </ul>
    </div>

</body>

</html>