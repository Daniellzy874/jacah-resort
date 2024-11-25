<style>
    section#room_section {
        width: 100%;
        height: 100%;
        background-color: #B7E5B4;
        display: grid;

    }

    section .full_container {
        place-self: center;
        width: 90%;
        height: 80%;
        background-color: transparent;

    }

    section .full_container .top_con {
        background-color: red;
        width: 100%;
        height: 10%;
    }

    section .full_container .content_con {
        width: 100%;
        height: 100%;
        display: flex;
    }

    section .full_container .content_con .left_con {

        height: 100%;
        width: 30%;

    }

    section .full_container .content_con .main_content_list {

        width: 75%;
        height: 100dvh;
    }

    section .full_container .content_con .right_con {

        height: 100%;
        width: 25%;
        background-color: purple;
    }

    /* left content */
    section .full_container .content_con .left_con .view_tour_photo {
        width: 100%;
        height: 35%;

        display: grid;
    }

    section .full_container .content_con .left_con .view_tour_photo .view_tour_content {
        width: 80%;
        height: 100%;

        place-self: center;
    }

    section .full_container .content_con .left_con .view_tour_photo .view_tour_content .tour_photo {
        background-image: url(assets/image/cottage.jpg);
        background-repeat: no-repeat;
        background-position: center;
        height: 80%;
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;

    }

    section .full_container .content_con .left_con .view_tour_photo .view_tour_content .tour_text {
        background-color: green;
        width: 100%;
        height: 40x;
        display: flex;
        justify-content: center;
        align-items: center;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;

    }

    section .full_container .content_con .left_con .view_tour_photo .view_tour_content .tour_text a {
        display: block;
        text-decoration: none;
        font-family: monospace;
        font-size: 20px;
        color: #fff;
        width: 100%;
        text-align: center;

    }

    section .full_container .content_con .left_con .amenities {
        width: 100%;
        height: 30%;
        background-color: transparent;
        padding-left: 40px;
        padding-top: 30px;

    }

    /* end */
    /* main side */
    section .full_container .content_con .main_content_list .list_content {
        width: 100%;
        height: 31dvh;
        background-color: transparent;
        margin-top: 50px;
        border-radius: 20px;
        display: flex;

    }

    section .full_container .content_con .main_content_list .list_content .content_photo img {
        height: 100%;
        width: 100%;
        background-color: black;
        border-bottom-left-radius: 20px;
        border-top-left-radius: 20px;


    }

    section .full_container .content_con .main_content_list .list_content .content_text {
        width: 100%;
        height: 100%;
        background-color: white;
        border-bottom-right-radius: 20px;
        border-top-right-radius: 20px;

    }

    section .full_container .content_con .main_content_list .list_content .content_text .room_name {
        width: 100%;
        height: 20%;
    }

    section .full_container .content_con .main_content_list .list_content .content_text .room_description {
        width: 100%;
        height: 35%;
    }

    section .full_container .content_con .main_content_list .list_content .content_text .room_price {
        width: 100%;
        height: 40%;
        display: flex;
    }

    section .full_container .content_con .main_content_list .list_content .content_text .room_price .reserve_btn {
        width: 50%;
        height: 100%;
        padding-left: 30px;
        padding-top: 50px;

    }

    section .full_container .content_con .main_content_list .list_content .content_text .room_price .reserve_price {
        width: 50%;
        height: 100%;
        padding-left: 130px;
        padding-top: 40px;
    }

    /* end */
</style>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jacah | Farm & Resort</title>
    <link rel="stylesheet" href="{{asset ('assets/css/home.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/css/header.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

</head>

<body style="background-color: #B7E5B4;">
    @include('CustomerUI/header')


    <section id="room_section">
        <div class="full_container">
            <div class="top_con">

            </div>
            <div class="content_con">
                <div class="left_con">
                    <div class="view_tour_photo">
                        <div class="view_tour_content">
                            <div class="tour_photo">
                                <!-- <img src="{{asset ('assets/image/jacah.jpg')}}" style="height: 183px;"> -->
                            </div>
                            <div class="tour_text">
                                <a href="">view in a 360°</a>
                            </div>
                        </div>
                    </div>
                    <div class="amenities">
                        <h1 style="font-size: 20px;">Amenities</h1>
                        <ul>
                            <li>wifi included</li>
                            <li>air Conditioned</li>
                            <li>Parking</li>
                            <li>Pool</li>
                            <li>Garden</li>
                        </ul>
                    </div>
                    <div class="amenities">
                        <h1 style="font-size: 20px;">Meal Available</h1>
                        <ul>
                            <li>Dinner included</li>
                            <li>Lunch included</li>
                            <li>Breakfast included</li>

                        </ul>
                    </div>
                    <div class="amenities">
                        <h1 style="font-size: 20px;">Accessibility</h1>
                        <ul>
                            <li></li>

                        </ul>
                    </div>

                </div>
                <div class="main_content_list">
                    <div class="list_content">
                        <div class="content_photo">
                            <img src="{{asset ('assets/image/cottage.jpg')}}" alt="">
                        </div>
                        <div class="content_text">
                            <div class="room_name">
                                <h1 style="font-size: 30px; margin:10px;  margin-left:30px;">Open Cottage</h1>
                            </div>
                            <div class="room_description">
                                <h1 style="font-size: 15px; margin-left:10px;">The joy of staying in our room</h1>
                                <p style="font-size: 12px; margin-left:15px;">Single rooms, are modern decorated,<br> can accommodate up to 2 persons, <br>
                                    totally soundproofed and equipped<br> with high tech comforts such as high speed internet.</p>
                            </div>
                            <div class="room_price">
                                <div class="reserve_btn">
                                    <a href="" style="text-decoration: none;">Reserve now</a>
                                </div>
                                <div class="reserve_price">
                                    <h1 style="font-size: 20px;">P3,999</h1>
                                    <p style="font-size: 10px;">include taxes and fees</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list_content">
                        <div class="content_photo">
                            <img src="{{asset ('assets/image/cottage.jpg')}}" alt="">
                        </div>
                        <div class="content_text">
                            <div class="room_name">
                                <h1 style="font-size: 30px; margin:10px;  margin-left:30px;">Kubo</h1>
                            </div>
                            <div class="room_description">
                                <h1 style="font-size: 15px; margin-left:10px;">The joy of staying in our room</h1>
                                <p style="font-size: 12px; margin-left:15px;">Single rooms, are modern decorated,<br> can accommodate up to 2 persons, <br>
                                    totally soundproofed and equipped<br> with high tech comforts such as high speed internet.</p>
                            </div>
                            <div class="room_price">
                                <div class="reserve_btn">
                                    <a href="" style="text-decoration: none;">Reserve now</a>
                                </div>
                                <div class="reserve_price">
                                    <h1 style="font-size: 20px;">P3,999</h1>
                                    <p style="font-size: 10px;">include taxes and fees</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list_content">
                        <div class="content_photo">
                            <img src="{{asset ('assets/image/cottage.jpg')}}" alt="">
                        </div>
                        <div class="content_text">
                            <div class="room_name">
                                <h1 style="font-size: 30px; margin:10px;  margin-left:30px;">Single Room</h1>
                            </div>
                            <div class="room_description">
                                <h1 style="font-size: 15px; margin-left:10px;">The joy of staying in our room</h1>
                                <p style="font-size: 12px; margin-left:15px;">Single rooms, are modern decorated,<br> can accommodate up to 2 persons, <br>
                                    totally soundproofed and equipped<br> with high tech comforts such as high speed internet.</p>
                            </div>
                            <div class="room_price">
                                <div class="reserve_btn">
                                    <a href="" style="text-decoration: none;">Reserve now</a>
                                </div>
                                <div class="reserve_price">
                                    <h1 style="font-size: 20px;">P3,999</h1>
                                    <p style="font-size: 10px;">include taxes and fees</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list_content">
                        <div class="content_photo">
                            <img src="{{asset ('assets/image/cottage.jpg')}}" alt="">
                        </div>
                        <div class="content_text">
                            <div class="room_name">
                                <h1 style="font-size: 30px; margin:10px;  margin-left:30px;">Single Room</h1>
                            </div>
                            <div class="room_description">
                                <h1 style="font-size: 15px; margin-left:10px;">The joy of staying in our room</h1>
                                <p style="font-size: 12px; margin-left:15px;">Single rooms, are modern decorated,<br> can accommodate up to 2 persons, <br>
                                    totally soundproofed and equipped<br> with high tech comforts such as high speed internet.</p>
                            </div>
                            <div class="room_price">
                                <div class="reserve_btn">
                                    <a href="" style="text-decoration: none;">Reserve now</a>
                                </div>
                                <div class="reserve_price">
                                    <h1 style="font-size: 20px;">P3,999</h1>
                                    <p style="font-size: 10px;">include taxes and fees</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="right_con">

                </div>
            </div>
        </div>
    </section>


</body>



<script type="text/javascript" src="{{asset ('assets/js/header.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</html>