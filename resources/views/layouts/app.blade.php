<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>JACAH | admin</title>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Box Icons -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

</head>

<body class="font-sans antialiased" style="overflow:hidden;">
    <div class="min-h-screen bg-gray-100">

        @include('layouts.navigation')



        @include('layouts.side')
        <!-- Page Content -->
        <main style="padding-left:20%; height:100vh; overflow:auto;">
            {{ $slot }}
        </main>

        <!-- Page Heading -->
        <!-- @if (isset($header))
        <header class="border-b-4 border-green-500" style="margin-left:20%; background-color:white;">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex"> -->
        <!-- Hamburger -->
        <!-- <div class="-me-2 flex items-center sm:hidden mr-12">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <a href="#" class="nav__logo ml-8">
                    <h1 style="font-size: 25px; display:inline-block; font-family:monospace; font-weight:bolder; text-shadow: 1px; color:#00a8f3;">JACAH</h1>
                    <p style="font-size: 10px; display:inline-block; ">Farm & Resort</p>
                </a>
            </div>
        </header>
        @endif -->



    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>