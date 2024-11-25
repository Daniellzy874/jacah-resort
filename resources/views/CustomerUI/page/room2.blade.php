<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset ('assets/css/home.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/css/header.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18. 1/moment.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/room.css')}}">
</head>

<body>
    @include('CustomerUI/header')
    @include('CustomerUI/header2')
    <main>
        <section id="pictures">

            <div>
                <div style=" height: 90%; background-color:white; display:flex; gap:3px;">
                    <div style="height:100%; width:50%; overflow:hidden ">
                        @viteReactRefresh
                        @vite('resources/js/gallery.js')
                        <div id="clipImage1">
                        </div>
                        <!-- <img src="{{asset ('assets/image/jacah.jpg')}}" style="height: 100%;"> -->
                        <div data-bs-toggle="modal" data-bs-target="#myModalGallery" style="gap:10px; cursor:pointer; display:flex; justify-content:center; align-items:center; position:absolute; border-radius:50px; height:8%; width:10%; margin:20px; background-color:#0000008e; transform:translateY(-120px); ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-images" viewBox="0 0 16 16">
                                <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z" />
                            </svg>
                            <h1 style="font-size: 30px; color:#fff;">{{$panoCount}}+</h1>
                        </div>
                    </div>
                    <div style="height:100%; width:50%; background-color:#fff; ">

                        <div id="clipImage2" style="height:50%; width:100%; ">
                        </div>


                        <div id="clipImage3" style="margin-top:3px; height:50%; width:100%; ">
                        </div>

                    </div>
                </div>

                <div id="reservation" style="height:10%;">
                    <nav>
                        <ul>
                            <li><a class="activeNav" href="#">Pictures</a></li>
                            <li><a href="#reservation">Reservation</a></li>
                            <li><a href="#amenities">Amenities</a></li>
                            <li><a href="#policies">Policies</a></li>
                        </ul>
                    </nav>

                </div>


            </div>
            <div style="background-color: #000; width:100%; height:20%; ">
                <h1>hello</h1>
            </div>

        </section>
        <section id="reservation">
            <h1>sdssds</h1>
        </section>
        <section id="amenities">
            <h1>sdsfsdfs</h1>
        </section>
        <section id="policies">
            <h1>sdsfsdfs</h1>
        </section>
    </main>
</body>

</html>
<style>
    body {
        padding: 0%;
        margin: 0%;
    }

    main {
        width: 100%;
        height: 100%;
        background-color: green;
    }

    main section {
        height: 100%;
        width: 100%;

    }
</style>