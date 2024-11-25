<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="../../../assets/image/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../assets/image/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../assets/image/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets/image/logo.png">
    <link rel="manifest" href="../../../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../../../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="../../../vendors/simplebar/simplebar.min.js"></script>
    <script src="../../../assets/js/config.js"></script>

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="{{asset ('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/css/home.css')}}">

    <link rel="stylesheet" href="{{asset ('assets/css/card.css')}}">


    <link rel="stylesheet" href="{{asset ('assets/css/header.css')}}">

    <link rel="stylesheet" href="{{asset ('assets/css/modal.css')}}">




    <title>JACAH | Farm & Resort</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>


    <!--========== SCROLL TOP ==========-->
    <!-- @include('CustomerUI/back2top') -->

    <!--========== HEADER ==========-->
    <!-- <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="#" class="nav__logo">
                <h1 style="font-size: 30px; display:inline-block; font-family:monospace; font-weight:bolder; text-shadow: 1px;">JACAH</h1>
                <p style="font-size: 10px; display:inline-block; ">Farm & Resort</p>
            </a>


        </nav>


    </header> -->
    @if(Route::has('login'))
    @auth
    <main class="l-main">
        <!--========== HOME ==========-->

        <section class="home section__home" id="home">
            <div class="home__container bd-container">
                <div class="home__data">
                    <div id="arrow_back">
                        <a data-bs-toggle="modal" data-bs-target="#modalConfirmCancellBooking" style="display: inline-flex; gap:10px;" href="{{route('room')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" style="height:30px;" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />

                            </svg>
                            <h1 style="font-size:20px;">Cancell Booking</h1>
                        </a>
                    </div>
                    <div class="modal" id="modalConfirmCancellBooking" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="card" style="width:100%;">
                                        <div class="card-body">
                                            <h5 class="card-title font-bold text-black">Are you sure you want to cancel this reservation?</h5>
                                            <!-- <p class="card-text text-muted">Once you delete this category, all of it's data will permanently deleted.</p> -->
                                            <div style=" padding-top: 5px; float:right">
                                                <button type='button' data-bs-dismiss="modal" aria-label="Close" class="inline-flex items-centerm mr-2 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex items-center justify-center h-8 bg-gray-500 hover:bg-gray-700 active:bg-gray-700 focus:bg-gray-700" style=" width: 80px">No</button>
                                                <button onclick="cancel()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex items-center justify-center h-8 bg-red-500 hover:bg-red-700 active:bg-red-700 focus:bg-red-700" style=" width: 80px">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function cancel() {
                            // Redirect to a Laravel route programmatically
                            window.location.href = '{{ route("redirect") }}';

                        }
                    </script>

                    <form action="{{route('pay')}}" method="POST">
                        @csrf
                        <div style="display: flex; gap:5px;">
                            <div class="full_container menu__content">
                                <div class="top_con">
                                    <h1 style="font-size:30px;">{{$data->category}}</h1>
                                </div>
                                <div class="content_con">
                                    <div class="content_list">
                                        <div class="promo_con">
                                            <div class="overflow-hidden shadow-sm sm:rounded-lg"
                                                style="width:100%; height:80%; background-color:white;">
                                                <!-- <h1>promo here</h1> -->


                                            </div>
                                        </div>
                                        <div class="overflow-hidden shadow-sm sm:rounded-lg">
                                            <div id="ProfilePage" class="reload"
                                                style="width:100%; height:10%;display:flex;  border-bottom: 1px solid rgb(223, 224, 228); cursor:pointer;">
                                                <h1 class="pt-4 w-full flex font-bold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                                        class="bi bi-person-fill flex mr-4 mb-2" viewBox="0 0 16 16">
                                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                    </svg>
                                                    Your Personal details:
                                                </h1>
                                                <div style=" width:67%; display:flex; justify-content:right; align-items:center;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                    </svg>
                                                </div>

                                            </div>

                                            <!-- input fields -->
                                            <div class="hidden">
                                                <input type="text" class="" name="name" id="" value="{{ Auth::user()->name }}" readonly required>
                                                <input type="numbers" name="cus_id" id="" value="{{ Auth::user()->id }}" readonly required>
                                                <input type="email" class="" name="email" id="email" value="{{ Auth::user()->email }}" readonly required>
                                                <input type="text" class="" name="mobile" id="" value="{{ Auth::user()->phone }}" readonly required>
                                                <!-- date -->
                                                <div id="reload"
                                                    style="padding-top: 10px; padding-left: 30px; padding-right: 30px; padding-bottom: 10px; ">
                                                    <input type="text" name="reserve_for" id="reserve" value="{{$data->category}}">
                                                    <input type="text" name="room_num" id="room_num" value="">
                                                    <input type="text" name="startDate" id="startdate" value="">
                                                    <input type="text" name="endDate" id="enddate" value="">
                                                </div>
                                                <!-- enddate -->
                                                <input name="pax" id="pax" type="number" readonly value="" />
                                                <input name="rate" id="rate" type="text" readonly value="" />
                                                <input type="text" id="status" name="status" value="">
                                                <input type="numbers" id="ttl-amount" name="amount" value="">
                                            </div>
                                            <!-- input fields end -->

                                            <div id="profile_Field"
                                                style="width: 100%; padding-bottom:25px; display:block; transition:0.2s;">
                                                <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                                    <p style="font-size: 13px;">
                                                        Reminder that the name of the guest staying at the hotel will be the name on the
                                                        ID that they’ll present at check-in. Thank You!

                                                    </p>
                                                </div>
                                                <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                                    <h1 style="font-size: 20px;">Full Name<span
                                                            style="color: red; font-size: 15px; ">*</span></h1>

                                                    <div>
                                                        <h1 class="text-xl font-bold capitalize">{{ Auth::user()->name }}</h1>

                                                    </div>

                                                </div>

                                                <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                                    <h1 style="font-size: 20px;">Email<span
                                                            style="color: red; font-size: 15px; ">*</span></h1>
                                                    <h1 style="font-size: 15px;">Your email confirmation goes here.</h1>
                                                    <h1 class="text-xl font-bold">{{ Auth::user()->email }}</h1>
                                                </div>
                                                <div
                                                    style="padding-top: 10px; padding-left: 30px; padding-right: 30px; padding-bottom: 10px;">
                                                    <h1 style="font-size: 20px;">Mobile number<span
                                                            style="color: red; font-size: 15px; ">*</span></h1>
                                                    <h1 class="text-xl font-bold">{{ Auth::user()->phone }}</h1>
                                                </div>
                                                <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px; display:grid;">
                                                    <div style="background-color: green; width:90%; justify-self:center; height:100%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" overflow-hidden shadow-sm sm:rounded-lg mt-6" class="main_content_list">
                                            <div
                                                style="width:100%; height:10%;  display:flex;  border-bottom: 1px solid rgb(223, 224, 228);">
                                                <h1 class="flex w-full font-bold">
                                                    <i class='bx bxs-purchase-tag w-[35px] h-[35px] text-[25px]'></i>
                                                    Price Details
                                                </h1>
                                                <div style=" width:67%; display:flex; justify-content:right; align-items:center;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div style="width: 100%; padding-bottom:25px;">
                                                <table class="w-[100%]">
                                                    <thead class="bg-green-500 ">
                                                        <tr>
                                                            <th>Description</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Room price</td>
                                                            <td id="roomprice"></td>
                                                            <input name="roomprice" type="hidden" id="input_roomprice">
                                                        </tr>
                                                        <tr class="border-b border-gray-500">
                                                            <td>Entrance Fee</td>
                                                            <td id="entrancefee"></td>
                                                            <input name="entrancefee" type="hidden" id="input_entrancefee">
                                                        </tr>
                                                        <tr class="border-b border-gray-500">
                                                            <td>Total amount</td>
                                                            <td id="totalamount"></td>
                                                            <input name="totalamount" type="hidden" id="input_totalamount">
                                                        </tr>
                                                        <tr>
                                                            <td>Downpayment</td>
                                                            <td id="downpayment"></td>
                                                            <!-- <input name="downpayment" type="hidden" id="input_downpayment"> -->
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <div class=" overflow-hidden shadow-sm sm:rounded-lg mt-6" class="main_content_list">
                                            <div
                                                style="width:100%; height:10%;  display:flex;  border-bottom: 1px solid rgb(223, 224, 228);">
                                                <h1 class="flex w-full font-bold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                                        class="bi bi-file-lock2 mr-4 mb-2" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 5a1 1 0 0 1 1 1v1H7V6a1 1 0 0 1 1-1m2 2.076V6a2 2 0 1 0-4 0v1.076c-.54.166-1 .597-1 1.224v2.4c0 .816.781 1.3 1.5 1.3h3c.719 0 1.5-.484 1.5-1.3V8.3c0-.627-.46-1.058-1-1.224" />
                                                        <path
                                                            d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1" />
                                                    </svg>
                                                    Reservation fee
                                                </h1>
                                                <div style=" width:67%; display:flex; justify-content:right; align-items:center;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div style="width: 100%; padding-bottom:25px;">
                                                <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                                    <h1 style="font-size: 20px;">Cancellation policy</h1>

                                                </div>
                                                <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                                    <h1 style="font-size: 15px;">Non-refundable rate</span></h1>
                                                    <ul>
                                                        <li>
                                                            <p style="font-size: 15px;" class="text-center">**********If you change or cancel your booking you will not
                                                                get a refund or credit to use for a future stay.**********</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                                    <p style="font-size: 15px;" class="text-center">**********You'll be asked to pay the following fees for reservation: <span class="font-bold">50% </span>of your total amount**********
                                                    </p>
                                                    <div class="flex">
                                                        <h1 style="font-size: 15px;">Pay Via</h1>
                                                        <a data-bs-target="#myQRcode" data-bs-toggle="modal" style="background-color: red; border:2px solid black; display:inline-flex;" class="ml-2 cursor-pointer"><img
                                                                src="{{asset('assets/image/gcash.png')}}" style="height:50px;"></a>
                                                        <div class="justify-center items-center inline-flex">
                                                            <i class='bx bxs-hand-left'></i>
                                                            <p>click here to pay</p>
                                                        </div>
                                                    </div>
                                                    <div class="p-[30px]">
                                                        <div class="flex flex-col items-center">
                                                            <p>Type your reference # here from your GCash receipt:</p>
                                                            <input name="ref_number" type="text" class="text-black py-[20px] px-[30px] text-[30px] rounded-md" placeholder="############">
                                                        </div>
                                                        <div class="py-[20px] flex flex-col justify-center items-center w-[100%]">
                                                            <p>Enter the amount you paid</p>
                                                            <div class="w-[100%] pl-[30px]">
                                                                <div>
                                                                    <input id="input1" name="downpayment" oninput="syncInput()" type="text" placeholder="0.00" class="text-black pl-[50px] py-[20px] pr-[10px] text-[30px] rounded-md absolute">
                                                                    <h1 class="relative inline-flex py-[20px] px-[15px] text-center text-black text-[30px]">₱</h1>
                                                                </div>
                                                                <input id="input2" type="hidden" name="rem_balance">
                                                            </div>
                                                        </div>
                                                        <script>
                                                            function syncInput() {
                                                                const input1Value = document.getElementById('input1').value;
                                                                const trgttotalamount = JSON.parse(localStorage.getItem('TA'));

                                                                // Set the value of the second input to match the first input
                                                                document.getElementById('input2').value = trgttotalamount - input1Value;
                                                            }
                                                        </script>


                                                    </div>
                                                </div>
                                                <!-- QR code modal -->
                                                <div id='myQRcode' class="modal" tab-index="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="bg-white rounded-md">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Payment</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div id="modal-QR-body" class="modal-body">
                                                                <img src="{{asset('assets/image/GCash-MyQR.png')}}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end QR code modal -->
                                                <!-- bookdate.jsx -->
                                                <div id="checkbox__mate"></div>
                                                <!-- <div class="spinner animate-spin"></div>
                                            <style>
                                                .spinner {
                                                    border: 8px solid #f3f3f3;
                                                    /* Light grey */
                                                    border-top: 8px solid #3498db;
                                                    /* Blue */
                                                    border-radius: 50%;
                                                    width: 50px;
                                                    height: 50px;
                                                    /* animation: spin 1s linear infinite; */
                                                    margin: auto;
                                                }
                                            </style> -->
                                                <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="menu__content" style="width: 45%; height:70vh; position:relative; padding:10px;">
                                <div style="width: 100%; height:50%; background-color:transparent; border-radius:5px;">
                                    <div style="width: 100%; height:80%;">
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="height: 100%; width:100%;">
                                            <div class="carousel-inner" style="height: 100%;">
                                                @foreach($imageCarousel as $ewan)
                                                <div class="carousel-item @if($loop->first) active @endif" style="height:100%;">
                                                    <img src="{{asset($ewan->image)}}" class="d-block w-100 h-100"
                                                        alt="..." style="height:100%;" />
                                                </div>
                                                @endforeach
                                            </div>
                                            <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                            data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                            data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a> -->
                                        </div>
                                    </div>
                                    <h1 class="menu__name">{{$data->category}}</h1>
                                </div>
                                <div style="height:15%; width:100%;">


                                    @viteReactRefresh
                                    @vite('resources/js/app1.js')
                                    <div id="date">

                                    </div>

                                    <div class="mt-4">
                                        <h1>Time/Rate:</h1>
                                        <div>
                                            <div class="flex">
                                                <i class='bx bx-group px-4 text-lg'></i>
                                                <div class="flex gap-4">
                                                    <h1 id="person-count" class="font-bold"></h1>
                                                    <h1 class="font-bold">Person/Head Count</h1>
                                                </div>
                                            </div>

                                            <div class="flex">
                                                <i class='bx bxs-time px-4 text-lg'></i>
                                                <h1 id="time-book" class="font-bold"></h1>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </section>

    </main>
    @else


    <x-custom-form></x-custom-form>


    @endauth
    @endif
    <script>
        setInterval(function() {
            window.history.pushState(null, null, window.location.href);
        }, 1000); // Every second, push the current URL again

        // Intercept the popstate event (which occurs when the user tries to go back)
        window.onpopstate = function() {
            window.history.go(1); // Prevent back navigation by going forward
        };
    </script>
    <!--========== MAIN JS ==========-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    <script src="{{asset('assets/js/darkTheme.js')}}"></script>
</body>

</html>

<script type="text/javascript">
    window.onload = function() {
        if (!sessionStorage.getItem('reloadedagain')) {
            // Reload the page
            window.location.reload();
            // Set a flag in sessionStorage to indicate that the page has been reloaded
            sessionStorage.setItem('reloadedagain', 'true');
        }
    };

    // for date
    const trgtstart = JSON.parse(sessionStorage.getItem('startPetsa'));
    document.getElementById('startdate').value = trgtstart;
    const trgtend = JSON.parse(sessionStorage.getItem('endPetsa'));
    document.getElementById('enddate').value = trgtend;
    const trgtrate = JSON.parse(sessionStorage.getItem('choseRate'));
    document.getElementById('rate').value = trgtrate;
    const trgtpax = JSON.parse(sessionStorage.getItem('personCount'));
    document.getElementById('pax').value = trgtpax;
    const trgtstatus = JSON.parse(sessionStorage.getItem('roomstatus'));
    document.getElementById('status').value = trgtstatus;
    const trgtroomnum = JSON.parse(sessionStorage.getItem('roomnum'));
    document.getElementById('room_num').value = trgtroomnum;
    const trgtcatcat = JSON.parse(localStorage.getItem('catcat'));
    const trgtcatrate = JSON.parse(localStorage.getItem('Rate'));
    const trgtttlamount = JSON.parse(localStorage.getItem('ttl-amount'));
    const trgtroomprice = JSON.parse(localStorage.getItem('Rate'));
    const trgtentrancefee = JSON.parse(localStorage.getItem('EF'));
    const trgttotalamount = JSON.parse(localStorage.getItem('TA'));
    const trgtdownpayment = JSON.parse(localStorage.getItem('DP'));
    var downPayment = trgtttlamount * 0.1;


    document.getElementById('ttl-amount').value = downPayment + '00';
    document.getElementById('time-book').innerText = trgtrate;
    document.getElementById('person-count').innerText = trgtpax;

    document.getElementById('roomprice').innerText = trgtroomprice;
    document.getElementById('input_roomprice').value = trgtroomprice;
    document.getElementById('entrancefee').innerText = trgtentrancefee + " x " + trgtpax;
    document.getElementById('input_entrancefee').value = trgtentrancefee;
    document.getElementById('totalamount').innerText = trgttotalamount;
    document.getElementById('input_totalamount').value = trgttotalamount;
    document.getElementById('downpayment').innerText = trgtdownpayment + "(50% of room price)";
    document.getElementById('input_downpayment').value = trgtdownpayment;








    if (trgtcatcat === 'Open Cottage' || trgtcatcat === 'Cottage(Large)') {
        document.getElementById('catamnt').value = trgtcatrate;
    } else {
        document.getElementById('catamnt').value = 2000;
    }





    // end

    // var prf = document.getElementById('profile_Field');
    // var onClick = document.getElementById('ProfilePage');
    // var display = 0;

    // onClick.addEventListener('click', function() {

    //     if (display === 0) {
    //         prf.style.display = 'block';
    //         display = 1;
    //     } else {
    //         prf.style.display = 'none';
    //         display = 0;
    //     }
    // });
</script>