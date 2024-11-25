<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jacah | Farm & Resort</title>

    <link rel="stylesheet" href="{{asset ('assets/css/home.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/css/header.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18. 1/moment.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/room.css')}}">

</head>

<body>

    @include('CustomerUI/header')
    <div id="login-blade" class="login-blade">
        @include('auth/login')
    </div>
    <div id="register-blade" class="register-blade">
        @include('auth/register')
    </div>
    <div class="headerTop">
        <nav>
            <ul>
                <li><a class="navLink" href="{{route('booking')}}">Booking</a></li>
                <li><a class="navLink activeNav" href="{{route('transaction')}}">Payment</a></li>

            </ul>
        </nav>
    </div>

    <style>
        .headerTop {
            margin: 0;
            background-color: #fff;
            width: 100%;
            height: 8%;
            margin-top: 55px;
            padding-left: 7%;
            position: fixed;
            z-index: 100;


        }

        .headerTop nav {
            height: 100%;
        }

        .headerTop nav ul {
            height: 100%;
        }

        .headerTop nav ul li a {
            height: 100%;
        }

        .headerTop nav ul li a.activeNav {
            border-bottom: 5px solid green;
        }

        .activeHead {
            opacity: 1;
        }

        nav ul {
            display: flex;
            gap: 10px;
        }

        nav ul li {
            list-style: none;

        }

        nav ul li a {
            width: 100px;
            height: 50px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            background-color: transparent;
            color: #000;
            font-weight: bolder;
            text-decoration: none;
            transition: 0.10s;
            box-sizing: border-box;
        }

        nav ul li a:hover {
            border-bottom: 3px solid green;
        }

        nav a.activeNav {
            border-bottom: 5px solid green;
        }
    </style>

    <div class="py-2" style="transform: translateY(30%);">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style=" height:75vh;  overflow:auto;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900">


                </div>
                <div id="" class="p-2 text-gray-900">
                    <h1>
                        All Transaction
                    </h1>
                    @viteReactRefresh
                    @vite('resources/js/paymenthistory.js')
                    <div id="payment-history">
                    </div>

                </div>

            </div>
            <div class="float-right">
                <div id="paginate" style="margin-top: 5px;"></div>
            </div>

        </div>
    </div>



    <script type="text/javascript" src="{{asset ('assets/js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/js/header.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>
@include('CustomerUI/back2top')

</html>
<script>
    var formatNum = document.getElementById('amnt');
    console.log(formatNum);
</script>