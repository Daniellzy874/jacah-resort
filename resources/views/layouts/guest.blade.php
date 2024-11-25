<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

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

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Box Icons -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased" style="margin: 0%; padding:0%;">
    <div class="min-h-screen flex  pt-6 sm:pt-0 bg-gray-100">
        <div class="flex items-center justify-center" style="width:50%; background-image:url('../assets/image/jacah_pic.png'); background-size:cover; background-position:center; background-repeat:no-repeat;">
            <div style="width:50%; height:100%;">
                <div class="absolute translate-x-[-28%] w-[100vh]">
                    <a href="{{route('room')}}">
                        <i class='bx bx-left-arrow-alt text-[30px] p-[20px] bg-gray-200 rounded-full'></i>
                    </a>
                </div>
                <div style="height:30%;" class="mt-[40%]">
                    @yield('mess')


                </div>
                <div class="text-center text-white mt-[80%]">
                    <p>&#169; JACAH Farm Resort</p>
                </div>


            </div>
        </div>

        <div class="flex items-center justify-center" style="width:50%;">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

    </div>
</body>

</html>