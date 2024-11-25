<style>
    section#payment_section {
        width: 100%;
        height: 100%;
        background-color: #f3f4f6;
        display: grid;

    }

    section .full_container {
        place-self: center;
        width: 90%;
        height: 80%;
        background-color: transparent;

    }

    section .full_container .top_con {
        padding-top: 10px;
        padding-left: 30px;
        display: flex;
        width: 100%;
        height: fit-content;
    }



    section .full_container .content_con {
        width: 100%;
        height: 100%;
        display: flex;
    }

    section .full_container .content_con .content_list {

        width: 65%;
        height: 100%;

    }

    section .full_container .content_con .content_list .main_content_list {

        height: fit-content;
        margin-bottom: 20px;
    }


    section .full_container .content_con .content_list .promo_con {
        width: 100%;
        height: 20%;
        background-color: transparent;
    }

    section .full_container .content_con .right_con {
        width: 30%;
        height: 100dvh;
        display: grid;
    }

    section .full_container .content_con .right_con #date {
        margin-top: 10px;
        padding: 10px;
    }

    section .full_container .content_con .right_con #date .daterange {
        padding: 10px;

        border-radius: 5px;
    }

    section .full_container .content_con .right_con .datecon {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    section .full_container .content_con .right_con .datecon p {
        font-size: 10px;

    }

    section .full_container .content_con .right_con .startdate {
        text-align: end;
        border: none;
        background-color: none;
        outline: none;
        background-color: transparent;
        font-weight: bolder;
    }

    section .full_container .content_con .right_con .enddate {
        text-align: end;
        border: none;
        background-color: transparent;
        outline: none;
        font-weight: bolder;
    }
</style>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jacah | Farm & Resort</title>
    <link rel="stylesheet" href="{{asset ('assets/css/home.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/css/header.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>


<body style="background-color: #f3f4f6;">


    <section id="payment_section">

        <div class="full_container">
            <div class="top_con">
                <h1 style="font-size:30px;">{{$data->category}}</h1>
            </div>
            <div class="content_con">
                <div class="content_list">
                    <div class="promo_con">
                        <div style="width:100%; height:80%; background-color:white;">
                            <h1>promo here</h1>


                        </div>
                    </div>
                    <div class="main_content_list">
                        <div id="ProfilePage" class="reload" style="width:100%; height:10%; background-color:white; display:flex;  border-bottom: 1px solid rgb(223, 224, 228); cursor:pointer;">
                            <h1 style="font-size: 25px;  padding-top: 10px; padding-left: 30px; width:100%;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                                Your Personal details:
                            </h1>
                            <div style=" width:67%; display:flex; justify-content:right; align-items:center;">
                                <svg style="margin-right:40px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                </svg>
                            </div>

                        </div>
                        <form action="{{route('pay')}}" method="get">
                            {{ csrf_field() }}
                            <div id="profile_Field" style="width: 100%; height:100%; background-color:white; padding-bottom:25px; display:block; transition:0.2s;">
                                <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                    <p style="font-size: 13px;">
                                        Reminder that the name of the guest staying at the hotel will be the name on the ID that they’ll present at check-in. Thank You!

                                    </p>
                                </div>
                                <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                    <h1 style="font-size: 20px;">First name<span style="color: red; font-size: 15px; ">*</span></h1>
                                    <input type="text" name="firstname" id="" style="width: 35%; outline-color:rgb(13,133,254);" required>
                                </div>
                                <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                    <h1 style="font-size: 20px;">Last name<span style="color: red; font-size: 15px; ">*</span></h1>
                                    <input type="text" name="lastname" id="" style="width: 35%; outline-color:rgb(13,133,254);" required>
                                </div>
                                <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                    <h1 style="font-size: 20px;">Email<span style="color: red; font-size: 15px; ">*</span></h1>
                                    <p style="font-size: 15px;">Your email confirmation goes here.</p>
                                    <input type="email" name="email" id="" style="width: 35%; outline-color:rgb(13,133,254);" required>
                                </div>
                                <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px; padding-bottom: 10px;">
                                    <h1 style="font-size: 20px;">Mobile number<span style="color: red; font-size: 15px; ">*</span></h1>
                                    <p style="font-size: 15px;">Please provide your phone contact number.</p>
                                    <input type="text" name="mobile" id="" style="width: 35%; outline-color:rgb(13,133,254);" required>
                                </div>
                                <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px; display:grid;">
                                    <div style="background-color: green; width:90%; justify-self:center; height:100%;">


                                    </div>
                                </div>
                                <!-- date -->
                                <div id="reload" style="padding-top: 10px; padding-left: 30px; padding-right: 30px; padding-bottom: 10px; display:none;">
                                    <input type="text" name="reserve_for" id="reserve" style="width: 35%; outline-color:rgb(13,133,254);" value="{{$data->category}}">
                                    <input type="text" name="startDate" id="startdate" style="width: 35%; outline-color:rgb(13,133,254);" value="">
                                    <input type="text" name="endDate" id="enddate" style="width: 35%; outline-color:rgb(13,133,254);" value="">
                                </div>
                                <!-- enddate -->

                            </div>
                    </div>
                    <div class="main_content_list">
                        <div style="width:100%; height:10%; background-color:white; display:flex;  border-bottom: 1px solid rgb(223, 224, 228);">
                            <h1 style="font-size: 25px;  padding-top: 10px; padding-left: 30px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-lock2" viewBox="0 0 16 16">
                                    <path d="M8 5a1 1 0 0 1 1 1v1H7V6a1 1 0 0 1 1-1m2 2.076V6a2 2 0 1 0-4 0v1.076c-.54.166-1 .597-1 1.224v2.4c0 .816.781 1.3 1.5 1.3h3c.719 0 1.5-.484 1.5-1.3V8.3c0-.627-.46-1.058-1-1.224" />
                                    <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1" />
                                </svg>
                                Reservation fee
                            </h1>
                            <div style=" width:61%; display:flex; justify-content:right; align-items:center;">
                                <svg style="margin-right:40px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                </svg>
                            </div>
                        </div>
                        <div style="width: 100%; height:100%; background-color:white; padding-bottom:25px;">
                            <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                <h1 style="font-size: 20px;">Cancellation policy</h1>
                            </div>
                            <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                <h1 style="font-size: 15px;">Non-refundable rate</span></h1>
                                <ul>
                                    <li>
                                        <p style="font-size: 15px;">If you change or cancel your booking you will not get a refund or credit to use for a future stay.</p>
                                    </li>
                                </ul>
                            </div>
                            <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                <p style="font-size: 15px;">You'll be asked to pay the following fees for reservation:</p>
                                <ul>
                                    <li>P2,000 per room</li>
                                </ul>
                                <div>
                                    <h1 style="font-size: 15px;">Pay Via</h1>
                                    <a style="background-color: red; border:2px solid black; display:inline-flex;"><img src="{{asset('assets/image/gcash.png')}}" style="height:50px;"></a>
                                </div>
                            </div>
                            <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">

                                <div class="submit-btn">

                                    <button style="height: 50px; width:150px; margin-left:80%; border-radius:20px; background-color:green; color:white;" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="white"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                                        </svg>
                                        Reserve
                                    </button>



                                </div>

                            </div>
                            <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">

                            </div>

                        </div>
                    </div>

                    <!-- <div class="main_content_list">

                        <div style="width: 100%; height:100%; background-color:white; padding-bottom:25px;">
                            <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                <h1 style="font-size: 20px;">Cancellation policy</h1>
                            </div>
                            <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                <h1 style="font-size: 15px;">Non-refundable rate</span></h1>
                                <ul>
                                    <li>
                                        <p style="font-size: 15px;">If you change or cancel your booking you will not get a refund or credit to use for a future stay.</p>
                                    </li>
                                </ul>
                            </div>
                            <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">
                                <p style="font-size: 15px;">You'll be asked to pay the following fees for reservation:</p>
                                <ul>
                                    <li>P2,000 per room</li>
                                </ul>
                            </div>
                            <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">

                            </div>
                            <div style="padding-top: 10px; padding-left: 30px; padding-right: 30px;">

                            </div>

                        </div>
                    </div>
 -->


                </div>
                <div class="right_con">
                    <div style="width: 90%; height: 100%; background-color:white; justify-self:center;">
                        <h1 style="font-size:20px; margin:0">Reservation Summary</h1>
                        <div style="width:100%; height:70%; display:grid;">
                            <div style="width: 90%; height:90%; background-color: #DBE7C9; justify-self:center; align-self:center;">
                                <div style="background-color: green; height:45%; width:100%;">

                                </div>
                                <div style="height:12%; width:100%; padding-left:10px;">
                                    <h1 style="font-size:25px;">{{$data->category}}</h1>
                                </div>
                                <div style="height:15%; width:100%;">


                                    @viteReactRefresh
                                    @vite('resources/js/app1.js')
                                    <div id="date">

                                    </div>
                                    <div class="px-4">
                                        <x-input-label>Time/Rate:</x-input-label>
                                        <input name="rate" id="rate" type="text" readonly value="" style="  text-align: end;
                                                                                                    border: none;
                                                                                                    background-color: none;
                                                                                                    outline: none;
                                                                                                    background-color: transparent;
                                                                                                    font-weight: bolder;" size="25" />
                                    </div>

                                </div>
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
                                    const trgtend = JSON.parse(sessionStorage.getItem('endPetsa'));
                                    const trgtrate = JSON.parse(sessionStorage.getItem('choseRate'));
                                    const startField = document.getElementById('startdate').value = trgtstart;
                                    const endField = document.getElementById('enddate').value = trgtend;
                                    const daterate = document.getElementById('rate').value = trgtrate;
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



                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        </form>
    </section>



</body>


<script type="text/javascript" src="{{asset ('assets/js/header.js')}}"></script>


</html>