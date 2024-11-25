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
    <link rel="stylesheet" href="{{asset ('assets/css/modal.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/css/room.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/css/card.css')}}">

    <link rel="stylesheet" href="{{asset ('assets/css/header.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />
    <!-- ======= leaflet map ========== -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <link rel="stylesheet" href="{{asset ('assets/css/cb-style.css')}}">
    <script type="text/javascript" src="{{asset ('assets/js/cb-js.js')}}" defer></script>

    <title>JACAH | Farm & Resort</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    @include('CustomerUI/page/modals')
    @include('CustomerUI/chatbot')
    @include('CustomerUI/announcement')
    <div id="roommodal"></div>
    <div id="modalPriceDetails"></div>


    <!--========== SCROLL TOP ==========-->
    @include('CustomerUI/back2top')

    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
        <nav class="nav bg-gradient-to-r from-cyan-200 to-blue-500 px-[100px]">
            <div class="flex justify-between h-100 w-full">
                <a href="#" class="nav__logo">
                    <h1 style="font-size: 30px; display:inline-block; font-family:monospace; font-weight:bolder; text-shadow: 1px; color:#00a8f3;">JACAH</h1>
                    <p style="font-size: 10px; display:inline-block; color:gray; ">Farm & Resort</p>
                </a>
                <div class="hidden sm:flex sm:items-center sm:ms-6 my-2">
                    <div class="hidden sm:flex sm:items-center">
                        <div id="nav-menu">
                            @include('CustomerUI/header')

                        </div>
                        @yield('profile')
                    </div>
                </div>
            </div>
            </div>
        </nav>
        <!-- =========Header 3 ========== -->
        @include('CustomerUI/header3')

    </header>

    <main class="l-main">
        <!--========== HOME ==========-->
        <!-- modal Price Details -->
        <div id="modalPriceDetails"></div>
        <!-- end price details -->

        <section class="home section__home" id="home">
            <div class="home__container bd-container">
                <div class="home__data">
                    @viteReactRefresh
                    @vite('resources/js/theme.js')
                    <div style="height: 80vh; " id="theme"></div>

                    <div data-bs-toggle="modal" data-bs-target="#myModalGallery" style=" gap:10px; cursor:pointer; display:flex; justify-content:center; align-items:center; position:absolute; left:85%; border-radius:50px; height:8%; width:10%; margin:20px; background-color:transparent; transform:translateY(-100px); ">
                        <svg xmlns=" http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-images" viewBox="0 0 16 16">
                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                            <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z" />
                        </svg>

                    </div>
                    <div id="side" class="side">
                        <div id="item-hide" style="background-color:transparent; height:40%; width:80%;">
                            <h1 style="font-family: Georgia, 'Times New Roman', Times, serif; color:white; font-size:25px;">Welcome!</h1>
                            <p style="position: absolute; margin-left:100px; font-family: Georgia, 'Times New Roman', Times, serif; color:white;">to</p>
                            <h1 style="font-family: Fantasy; font-size:100px; letter-spacing:5px; display:flex; margin-left:50px; margin-bottom:15px; color:white;">JACAH<span style="font-size: 10px; position:absolute; top:60%;">| Farm and Resort</span></h1>
                            @if (Route::has('login'))
                            @auth
                            <a href="#services"><button id="login-btn" type="button" class="animate-bounce btn btn-success" style="float: right; margin-right:18%; background-color: #28a745; ">Book now</button></a>
                            @else
                            <a href="{{route('login')}}" id="login-btn" type="button" class="animate-bounce btn btn-success" style="float: right; margin-right:18%; background-color: #28a745; ">
                                Sign in
                            </a>
                            @endauth
                            @endif
                        </div>
                    </div>
                    <style>
                        .side {
                            transition: all .2s;
                            width: 50%;
                            height: 80vh;
                            background-color: #0000008a;
                            position: absolute;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            transform: translateY(-100%);
                        }

                        .side.hoverhide {
                            width: 0%;
                        }
                    </style>
                    <script>
                        const hoverTohide = document.getElementById('side');
                        document.getElementById('theme').addEventListener('mouseover', function() {
                            hoverTohide.classList.add('hoverhide');
                            document.getElementById('item-hide').style.display = "none";
                        });
                        document.getElementById('theme').addEventListener('mouseout', function() {
                            hoverTohide.classList.remove('hoverhide');
                            document.getElementById('item-hide').style.display = "block";
                        });
                    </script>
                    <!--========== HEADER 2 ==========-->
                    <!-- ======= about spacer ======= -->
                    <div id="about"></div>
                    @include('CustomerUI/header2')

                </div>


            </div>
        </section>

        <!--========== ABOUT ==========-->
        <section id="about" class="about section__amenities bd-container py-12">
            <div class="about__container  bd-grid">
                <div class="about__data">
                    <span class="section-subtitle about__initial">Special</span>
                    <h2 class="section-title about__initial">Amenities</h2>
                    <div class="about__description">
                        <div>
                            <ul>
                                <li class="">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 640 512">
                                            <path d="M480 80a80 80 0 1 1 160 0A80 80 0 1 1 480 80zM412.7 281.7l48.2-79C465 196.1 472.2 192 480 192s15 4.1 19.1 10.7l132 216.3c5.8 9.6 8.9 20.6 8.9 31.8c0 33.8-27.4 61.1-61.1 61.1H456.1h0H55.9C25 512 0 487 0 456.1c0-10.5 3-20.8 8.6-29.7L225.2 81c6.6-10.6 18.3-17 30.8-17s24.1 6.4 30.8 17l126 200.7zm28.5 45.4l62.2 99.2c5.6 8.9 8.6 19.2 8.6 29.7c0 2.7-.2 5.3-.6 7.9h67.4c7.2 0 13.1-5.9 13.1-13.1c0-2.4-.7-4.8-1.9-6.8L480 263.6l-38.8 63.6zM456.1 464c4.4 0 7.9-3.5 7.9-7.9c0-1.5-.4-2.9-1.2-4.2L256 122.3 49.2 451.9c-.8 1.3-1.2 2.7-1.2 4.2c0 4.4 3.5 7.9 7.9 7.9H456.1z" />
                                        </svg>
                                        <h1 class="mx-2">Nature View</h1>
                                    </div>
                                    <p class="text-sm font-thin ml-8">Feel/relax through the beauty of nature and escape from the city.</p>
                                </li>
                                <li class="">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 576 512">
                                            <path d="M377 52c11-13.8 8.8-33.9-5-45s-33.9-8.8-45 5L288 60.8 249 12c-11-13.8-31.2-16-45-5s-16 31.2-5 45l48 60L12.3 405.4C4.3 415.4 0 427.7 0 440.4V464c0 26.5 21.5 48 48 48H288 528c26.5 0 48-21.5 48-48V440.4c0-12.7-4.3-25.1-12.3-35L329 112l48-60zM288 448H168.5L288 291.7 407.5 448H288z" />
                                        </svg>
                                        <h1 class="mx-2">Camp Site</h1>
                                    </div>
                                    <p class="text-sm font-thin ml-8">Feel/relax through the beauty of nature and escape from the city.</p>
                                </li>
                                <li class="">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 448 512">
                                            <path d="M210.6 5.9L62 169.4c-3.9 4.2-6 9.8-6 15.5C56 197.7 66.3 208 79.1 208H104L30.6 281.4c-4.2 4.2-6.6 10-6.6 16C24 309.9 34.1 320 46.6 320H80L5.4 409.5C1.9 413.7 0 419 0 424.5c0 13 10.5 23.5 23.5 23.5H192v32c0 17.7 14.3 32 32 32s32-14.3 32-32V448H424.5c13 0 23.5-10.5 23.5-23.5c0-5.5-1.9-10.8-5.4-15L368 320h33.4c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16L344 208h24.9c12.7 0 23.1-10.3 23.1-23.1c0-5.7-2.1-11.3-6-15.5L237.4 5.9C234 2.1 229.1 0 224 0s-10 2.1-13.4 5.9z" />
                                        </svg>
                                        <h1 class="mx-2">Farm View</h1>
                                    </div>
                                    <p class="text-sm font-thin ml-8">Feel/relax through the beauty of nature and escape from the city.</p>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- <a href="#" class="button">Explore history</a> -->
                </div>

                <!-- <img src="assets/img/about.jpg" alt="" class="about__img"> -->
                <!-- =========== map =========== -->
                <div class="about__img">
                    <div>
                        <div id="map" class="map border border-gray-500" style="height: 250px; width: 300px; border-top-left-radius:10px;border-top-right-radius:10px;"></div>
                        <div class="menu__content nav__link" style="border:1px solid gray; border-top:none; display:inline-block; padding:10px; width:300px; border-top-left-radius:0px;border-top-right-radius:0px; font-weight:lighter; box-shadow:none;">
                            <p>Balubad Road, Marahan 2, Alfonso, Cavite, Philippines</p>
                            <a href="https://www.openstreetmap.org/directions?from=&to=Mangas%20I%2C%20Alfonso%2C%20Cavite%2C%20Calabarzon%2C%204123%2C%20Philippines&route=%3B14.1183811%2C120.8549657#map=18/14.11877/120.85445" class="text-blue-500 font-bold">view in a map</a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- ====== services spacer ======= -->
            <div id="services"></div>
        </section>

        <!--========== SERVICES ==========-->
        <section class="services section__service bd-container" id="services">
            <div>
                <h2 class="section-title about__initial" style="font-size: 25px;">Choose your room</h2>
            </div>
            <div class="" style="width: 100%;  border-top-left-radius:20px; background-color:#069C54;">
                @include('CustomerUI/reservation')
            </div>
            <div id="search">
            </div>

            <div class="services__container">
                <div id="content-sec" class="hidden">
                    @include('CustomerUI/reservation2')
                </div>
                <!-- loading plate -->
                <div id="loading-sec" class="flex">
                    <div class="border border-blue-300 opacity-25 shadow rounded-md p-4 max-w-sm h-[80vh] w-[30%] mx-auto">
                        <div class="animate-pulse space-x-4">
                            <div class="rounded-md bg-slate-700 h-[150px] w-full"></div>
                            <div class="space-y-6 py-1">
                                <div class="h-2 bg-slate-700 rounded w-[60%]"></div>
                                <div class="space-y-3">
                                    <div class="gap-2">
                                        <div class="h-2 bg-slate-700 rounded col-span-2 w-[50%] mb-2"></div>
                                        <div class="h-2 bg-slate-700 rounded col-span-2 w-[47%] mb-2"></div>
                                        <div class="h-2 bg-slate-700 rounded col-span-2 w-[45%] mb-2"></div>
                                        <div class="h-2 bg-slate-700 rounded col-span-2 w-[50%] mb-2"></div>
                                    </div>
                                    <div class="h-2 bg-slate-700 rounded"></div>
                                    <div class="space-y-3">
                                        <div class="gap-2">
                                            <div class="flex">
                                                <div class="h-6 w-6 bg-slate-700 rounded-full col-span-2  mb-2"></div>
                                                <div class="h-2 bg-slate-700 rounded col-span-2 w-[47%] mt-2 ml-1"></div>
                                            </div>
                                            <div class="flex">
                                                <div class="h-6 w-6 bg-slate-700 rounded-full col-span-2  mb-2"></div>
                                                <div class="h-2 bg-slate-700 rounded col-span-2 w-[47%] mt-2 ml-1"></div>
                                            </div>
                                        </div>
                                        <div class="gap-2 py-4">
                                            <div class="h-2 bg-slate-700 rounded col-span-2 w-[50%] mb-2"></div>
                                            <div class="h-2 bg-slate-700 rounded col-span-2 w-[47%] mb-2"></div>
                                            <div class="h-2 bg-slate-700 rounded col-span-2 w-[45%] mb-2"></div>
                                            <div class="h-2 bg-slate-700 rounded col-span-2 w-[50%] mb-2"></div>
                                        </div>
                                        <div class=" h-8 w-full rounded-full bg-slate-700 rounded"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border border-blue-300 opacity-25 shadow rounded-md p-4 max-w-sm h-[80vh] w-[30%] mx-auto">
                        <div class="animate-pulse space-x-4">
                            <div class="rounded-md bg-slate-700 h-[150px] w-full"></div>
                            <div class="space-y-6 py-1">
                                <div class="h-2 bg-slate-700 rounded w-[60%]"></div>
                                <div class="space-y-3">
                                    <div class="gap-2">
                                        <div class="h-2 bg-slate-700 rounded col-span-2 w-[50%] mb-2"></div>
                                        <div class="h-2 bg-slate-700 rounded col-span-2 w-[47%] mb-2"></div>
                                        <div class="h-2 bg-slate-700 rounded col-span-2 w-[45%] mb-2"></div>
                                        <div class="h-2 bg-slate-700 rounded col-span-2 w-[50%] mb-2"></div>
                                    </div>
                                    <div class="h-2 bg-slate-700 rounded"></div>
                                    <div class="space-y-3">
                                        <div class="gap-2">
                                            <div class="flex">
                                                <div class="h-6 w-6 bg-slate-700 rounded-full col-span-2  mb-2"></div>
                                                <div class="h-2 bg-slate-700 rounded col-span-2 w-[47%] mt-2 ml-1"></div>
                                            </div>
                                            <div class="flex">
                                                <div class="h-6 w-6 bg-slate-700 rounded-full col-span-2  mb-2"></div>
                                                <div class="h-2 bg-slate-700 rounded col-span-2 w-[47%] mt-2 ml-1"></div>
                                            </div>
                                        </div>
                                        <div class="gap-2 py-4">
                                            <div class="h-2 bg-slate-700 rounded col-span-2 w-[50%] mb-2"></div>
                                            <div class="h-2 bg-slate-700 rounded col-span-2 w-[47%] mb-2"></div>
                                            <div class="h-2 bg-slate-700 rounded col-span-2 w-[45%] mb-2"></div>
                                            <div class="h-2 bg-slate-700 rounded col-span-2 w-[50%] mb-2"></div>
                                        </div>
                                        <div class=" h-8 w-full rounded-full bg-slate-700 rounded"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border border-blue-300 opacity-25 shadow rounded-md p-4 max-w-sm h-[80vh] w-[30%] mx-auto">
                        <div class="animate-pulse space-x-4">
                            <div class="rounded-md bg-slate-700 h-[150px] w-full"></div>
                            <div class="space-y-6 py-1">
                                <div class="h-2 bg-slate-700 rounded w-[60%]"></div>
                                <div class="space-y-3">
                                    <div class="gap-2">
                                        <div class="h-2 bg-slate-700 rounded col-span-2 w-[50%] mb-2"></div>
                                        <div class="h-2 bg-slate-700 rounded col-span-2 w-[47%] mb-2"></div>
                                        <div class="h-2 bg-slate-700 rounded col-span-2 w-[45%] mb-2"></div>
                                        <div class="h-2 bg-slate-700 rounded col-span-2 w-[50%] mb-2"></div>
                                    </div>
                                    <div class="h-2 bg-slate-700 rounded"></div>
                                    <div class="space-y-3">
                                        <div class="gap-2">
                                            <div class="flex">
                                                <div class="h-6 w-6 bg-slate-700 rounded-full col-span-2  mb-2"></div>
                                                <div class="h-2 bg-slate-700 rounded col-span-2 w-[47%] mt-2 ml-1"></div>
                                            </div>
                                            <div class="flex">
                                                <div class="h-6 w-6 bg-slate-700 rounded-full col-span-2  mb-2"></div>
                                                <div class="h-2 bg-slate-700 rounded col-span-2 w-[47%] mt-2 ml-1"></div>
                                            </div>
                                        </div>
                                        <div class="gap-2 py-4">
                                            <div class="h-2 bg-slate-700 rounded col-span-2 w-[50%] mb-2"></div>
                                            <div class="h-2 bg-slate-700 rounded col-span-2 w-[47%] mb-2"></div>
                                            <div class="h-2 bg-slate-700 rounded col-span-2 w-[45%] mb-2"></div>
                                            <div class="h-2 bg-slate-700 rounded col-span-2 w-[50%] mb-2"></div>
                                        </div>
                                        <div class=" h-8 w-full rounded-full bg-slate-700 rounded"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    setInterval(() => {
                        document.getElementById('loading-sec').classList.add('hidden');
                        document.getElementById('content-sec').classList.remove('hidden');
                    }, 2000);
                </script>
                <!-- end loading plate -->





            </div>
        </section>
        <!--===== APP =======-->
        <section id="menu" class="menu section bd-container">
            <div class="app__container bd-grid">
                <div class="app__data">
                    <span class="section-subtitle app__initial">About us</span>
                    <h2 class="section-title app__initial">JACAH</h2>
                    <p class="app__description menu__name" style="font-weight: lighter;">JACAH offers serenity by experiencing the beauty of nature and having recreational
                        bonding with your family and friends.</p>
                    <div class="app__stores">

                    </div>
                </div>

                <div id="carouselPicture" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselPicture" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselPicture" data-slide-to="1"></li>
                        <li data-target="#carouselPicture" data-slide-to="2"></li>
                        <li data-target="#carouselPicture" data-slide-to="3"></li>

                        <li data-target="#carouselPicture" data-slide-to="5"></li>
                        <li data-target="#carouselPicture" data-slide-to="6"></li>
                        <li data-target="#carouselPicture" data-slide-to="7"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('assets/image/amenity_pic/pic1.png')}}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('assets/image/amenity_pic/pic2.png')}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('assets/image/amenity_pic/pic3.png')}}" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('assets/image/amenity_pic/pic5.png')}}" alt="Fifth slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('assets/image/amenity_pic/pic6.png')}}" alt="Sixth slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('assets/image/amenity_pic/pic7.png')}}" alt="Seven slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('assets/image/amenity_pic/pic8.png')}}" alt="Eight slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselPicture" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselPicture" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>

        <!--========== MENU ==========-->
        <section class="menu section bd-container" id="menu">
            <span class="section-subtitle"></span>
            <h2 class="section-title">Policies</h2>

            <div class="menu__container menu__content">
                <h1 class="menu__name" style="font-size: 20px;">Jacah Farm swimming pools and regulations</h1>
                <ol class="menu__name">
                    <li>
                        <p style="font-weight: lighter;">The rules and regulations of JACAH Personnel must always be followed.</p>
                    </li>
                    <li>
                        <p style="font-weight: lighter;">Walk, don't run in and around the pool facility.</p>
                    </li>
                    <li>
                        <p style="font-weight: lighter;">Children who under 7 years old or less than 4 feet tall must be accompanied
                            by parents or responsible adult at all times.</p>
                    </li>
                    <li>
                        <p style="font-weight: lighter;">Proper swim suit attire must be worn by all guest.(Colored shirt and maong
                            short are not allowed).</p>
                    </li>
                    <li>
                        <p style="font-weight: lighter;">Persons who appear to be under the influence of alcohol or narcotics will be
                            denied admission.</p>
                    </li>
                    <li>
                        <p style="font-weight: lighter;">Any other form of foods or beverages are not allowed in the pool area. Use
                            the designated area for eating and drinking. Glass items, chewing gum and
                            smoking in and around pool area are prohibited.</p>
                    </li>
                    <li>
                        <p style="font-weight: lighter;">All guest must take a shower before entering the pool area.</p>
                    </li>
                    <li>
                        <p style="font-weight: lighter;">Persons with open cuts, sores, bandages, cold, cough, or infected eyes are
                            not permitted in the pool.</p>
                    </li>
                    <li>
                        <p style="font-weight: lighter;">Diving and other unsafe activities are not permitted in the pool.</p>
                    </li>
                    <li>
                        <p style="font-weight: lighter;">Any Personnel of JACAH is not liable for any accident that will occur during
                            the whole stay of guest in the area.</p>
                    </li>
                </ol>
                <p class="menu__name">Please follow the Rules and Regulations to avoid untoward accidents.</p>
            </div>
        </section>


        <!--========== TESTIMONIALS ==========-->
        <section class="contact section bd-container pt-[5%]" id="contact">
            <div>
                <h2 class="section-title">Testimonials</h2>
            </div>
            @viteReactRefresh
            @vite('resources/js/testimony.js')
            <div class="contact__container">
                @if (Route::has('login'))
                @auth
                <form id="rating-form">
                    <div class="flex">
                        <div>
                            <textarea name="testimony" id="textarea" class="text-black" rows="4" cols="50"></textarea><br>
                            <small id="word-count-info">Word Limit: 25 words</small><br>
                            <small id="word-count-feedback" style="color: red;"></small>
                        </div>
                        <div class="px-8">
                            <h1>Rate:</h1>
                            <div>

                                <i data-index="1" class='star bx bxs-star'></i>
                                <i data-index="2" class='star bx bxs-star'></i>
                                <i data-index="3" class='star bx bxs-star'></i>
                                <i data-index="4" class='star bx bxs-star'></i>
                                <i data-index="5" class='star bx bxs-star'></i>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="bg-green-500 rounded-md py-4 px-8 text-white">Submit</button>
                    </div>
                </form>
                @else
                <!-- testimony.jsx -->
                <div id="testimonial"></div>
                @endauth
                @endif
            </div>
        </section>
    </main>
    <style>
        .star {
            font-size: 2rem;
            color: gray;
            /* Default unfilled color */
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .star.filled {
            color: gold;
            /* Color when the star is filled (active) */
        }
    </style>
    <script>
        // Set the word limit
        const wordLimit = 25;

        const textarea = document.getElementById('textarea');
        const wordCountInfo = document.getElementById('word-count-info');
        const wordCountFeedback = document.getElementById('word-count-feedback');

        // Function to count words
        function countWords(text) {
            const words = text.trim().split(/\s+/); // Split by any whitespace
            return words.filter(Boolean).length; // Filter out empty strings from the array
        }

        // Event listener for typing in the textarea
        textarea.addEventListener('input', function() {
            const text = textarea.value;
            const wordCount = countWords(text);

            // Update feedback on the word count
            if (wordCount > wordLimit) {
                wordCountFeedback.textContent = `You have exceeded the word limit by ${wordCount - wordLimit} words.`;
            } else {
                wordCountFeedback.textContent = `${wordCount} / ${wordLimit} words used.`;
            }

            // Disable further typing if the limit is reached
            if (wordCount > wordLimit) {
                textarea.value = text.split(/\s+/).slice(0, wordLimit).join(' '); // Trim to word limit
            }
        });
    </script>
    <script>
        const form = document.getElementById('rating-form');
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // var productId = $(this).data('product-id');
            var rating = $('#textarea').val();

            // Send data via AJAX (Fetch API)
            $.ajax({
                url: '{{route("testimony")}}', // The URL to your route
                type: 'POST',
                data: {
                    rating: rating,
                    _token: '{{ csrf_token() }}', // CSRF Token for Laravel protection
                },
                // success: function(response) {
                //     if (response.success) {
                //         $('#rating-message').text(response.message);  // Display success message
                //         // Optionally update the page with the new rating
                //     } else {
                //         $('#rating-message').text('There was an error submitting your rating.');
                //     }
                // },
                // error: function() {
                //     $('#rating-message').text('An error occurred while submitting your rating.');
                // }
            });

        });
    </script>
    <script>
        const stars = document.querySelectorAll('.star');

        stars.forEach(star => {
            star.addEventListener('mouseover', () => {
                const index = parseInt(star.getAttribute('data-index'));

                // Fill all stars up to the hovered one
                stars.forEach((s, i) => {
                    if (i < index) {
                        s.classList.add('filled');
                    } else {
                        s.classList.remove('filled');
                    }
                });
            });

            // Remove fill on mouseout
            star.addEventListener('mouseout', () => {
                stars.forEach(s => {
                    s.classList.remove('filled');
                });
            });

            // Optionally, keep the fill when the star is clicked (for rating)
            star.addEventListener('click', () => {
                const index = parseInt(star.getAttribute('data-index'));
                stars.forEach((s, i) => {
                    if (i < index) {
                        s.classList.add('filled');
                    } else {
                        s.classList.remove('filled');
                    }
                });
            });
        });
    </script>

    <!--========== FOOTER ==========-->
    <footer class="footer section bd-container">
        <div class="footer__container bd-grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">JACAH</a>
                <span class="footer__description">Farm and Resort</span>
                <div>
                    <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-instagram'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                </div>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Services</h3>
                <ul>
                    <li><a href="#" class="footer__link">Delivery</a></li>
                    <li><a href="#" class="footer__link">Pricing</a></li>
                    <li><a href="#" class="footer__link">Fast food</a></li>
                    <li><a href="#" class="footer__link">Reserve your spot</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Information</h3>
                <ul>
                    <li><a href="#" class="footer__link">Event</a></li>
                    <li><a href="#" class="footer__link">Contact us</a></li>
                    <li><a href="#" class="footer__link">Privacy policy</a></li>
                    <li><a href="#" class="footer__link">Terms of services</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Adress</h3>
                <ul>
                    <li>Alfonso Cavite</li>
                    <li></li>
                    <li>777 - 777 - 777</li>
                    <li>jacah@email.com</li>
                </ul>
            </div>
        </div>

        <p class="footer__copy">&#169; 2024 Jacah_Farm_Resort. All right reserved</p>
    </footer>

    <div id="modal">

    </div>
    <script>
        setInterval(function() {
            window.history.pushState(null, null, window.location.href);
        }, 1000); // Every second, push the current URL again

        // Intercept the popstate event (which occurs when the user tries to go back)
        window.onpopstate = function() {
            window.history.go(1); // Prevent back navigation by going forward
        };
    </script>

    <!--========== SCROLL REVEAL ==========-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <script type="text/javascript" src="{{asset ('assets/js/header.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/js/main.js')}}"></script>
    <!-- Include jQuery if not already included -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://unpkg.com/scrollreveal"></script>

    <!--========== MAIN JS ==========-->
    <script src="assets/js/darkTheme.js"></script>

    <!-- ============== map ========== -->
    <script type="text/javascript" src="{{asset ('assets/js/map.js')}}" defer></script>

</body>

</html>