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

    <div class="py-2" style="transform: translateY(20%);">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style=" height:75vh;  overflow:auto;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900">
                    <h1>
                        Notifications
                    </h1>
                </div>
            </div>
            <div class="float-right">
                <div id="paginate" style="margin-top: 5px;"></div>
            </div>

        </div>
    </div>


    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <script type="text/javascript" src="{{asset ('assets/js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/js/header.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/js/datetime.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>
@include('CustomerUI/back2top')

</html>


<script>
    var extend = document.getElementById('extendAmenities');
    var btn_more = document.getElementById('extend_btn');
    var btn_less = document.getElementById('less_btn');


    let display = 0;
    btn_more.addEventListener("click", function() {
        if (display == 0) {
            extend.style.display = "block";
            btn_more.style.display = "none";
            btn_less.style.display = "block";
            display = 1;
        }


    });
    btn_less.addEventListener("click", function() {
        extend.style.display = "none";
        btn_more.style.display = "block";
        btn_less.style.display = "none";
        display = 0;

    });
</script>