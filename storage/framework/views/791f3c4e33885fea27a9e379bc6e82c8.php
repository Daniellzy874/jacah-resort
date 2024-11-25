<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="<?php echo e(asset ('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset ('assets/css/home.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset ('assets/css/modal.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset ('assets/css/room.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset ('assets/css/card.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset ('assets/css/header.css')); ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />
    <!-- ======= leaflet map ========== -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <link rel="stylesheet" href="<?php echo e(asset ('assets/css/cb-style.css')); ?>">
    <script type="text/javascript" src="<?php echo e(asset ('assets/js/cb-js.js')); ?>" defer></script>

    <title>JACAH | Farm & Resort</title>

</head>

<body>
    <?php echo $__env->make('CustomerUI/page/modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('CustomerUI/chatbot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="roommodal">

    </div>




    <!--========== SCROLL TOP ==========-->
    <?php echo $__env->make('CustomerUI/back2top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="#" class="nav__logo">
                <h1 style="font-size: 30px; display:inline-block; font-family:monospace; font-weight:bolder; text-shadow: 1px;">JACAH</h1>
                <p style="font-size: 10px; display:inline-block; ">Farm & Resort</p>
            </a>
            <div class="flex">
                <div class="nav__menu mt-2 mr-6" id="nav-menu">
                    <?php echo $__env->make('CustomerUI/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
                <?php echo $__env->yieldContent('profile'); ?>
            </div>

        </nav>
        <!-- =========Header 3 ========== -->
        <?php echo $__env->make('CustomerUI/header3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </header>

    <main class="l-main">
        <!--========== HOME ==========-->

        <section class="home section__home" id="home">
            <div class="home__container bd-container">
                <div class="home__data">
                    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
                    <?php echo app('Illuminate\Foundation\Vite')('resources/js/gallery.js'); ?>
                    <div class="clipHover" id="clipImage1" style="height:80%;"></div>

                    <div data-bs-toggle="modal" data-bs-target="#myModalGallery" style=" gap:10px; cursor:pointer; display:flex; justify-content:center; align-items:center; position:absolute; left:85%; border-radius:50px; height:8%; width:10%; margin:20px; background-color:transparent; transform:translateY(-100px); ">
                        <svg xmlns=" http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-images" viewBox="0 0 16 16">
                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                            <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z" />
                        </svg>

                    </div>
                    <div id="side" class="side">
                        <div id="item-hide" style="background-color:transparent; height:40%; width:80%;">
                            <h1 class="text-white" style="font-family: Georgia, 'Times New Roman', Times, serif;">Welcome!</h1>
                            <h1 class="text-white" style="font-family: Fantasy; font-size:100px; letter-spacing:5px; display:flex; margin-left:50px; margin-bottom:15px;">JACAH<span style="font-size: 10px; position:absolute; top:60%;">| Farm and Resort</span></h1>
                            <?php if(Route::has('login')): ?>
                            <?php if(auth()->guard()->check()): ?>
                            <a href="#services"><button id="login-btn" type="button" class="btn btn-success" style="float: right; margin-right:18%;">Book now</button></a>
                            <?php else: ?>
                            <button data-bs-toggle="modal" data-bs-target="#myLoginModalLabel" id="login-btn" type="button" class="btn btn-success" style="float: right; margin-right:18%;">Sign in</button>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <style>
                        .side {
                            transition: all .2s;
                            width: 50%;
                            height: 80%;
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
                        document.getElementById('clipImage1').addEventListener('mouseover', function() {
                            hoverTohide.classList.add('hoverhide');
                            document.getElementById('item-hide').style.display = "none";
                        });
                        document.getElementById('clipImage1').addEventListener('mouseout', function() {
                            hoverTohide.classList.remove('hoverhide');
                            document.getElementById('item-hide').style.display = "block";
                        });
                    </script>
                    <!--========== HEADER 2 ==========-->
                    <!-- ======= about spacer ======= -->
                    <div id="about"></div>
                    <?php echo $__env->make('CustomerUI/header2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>


            </div>
        </section>

        <!--========== ABOUT ==========-->
        <section id="about" class="about section__amenities bd-container">
            <div class="about__container  bd-grid">
                <div class="about__data">
                    <span class="section-subtitle about__initial">Special</span>
                    <h2 class="section-title about__initial">Amenities</h2>
                    <p class="about__description">We cook the best food in the entire city, with excellent customer
                        service, the best meals and at the best price, visit us.</p>
                    <a href="#" class="button">Explore history</a>
                </div>

                <!-- <img src="assets/img/about.jpg" alt="" class="about__img"> -->
                <!-- =========== map =========== -->
                <div class="about__img">
                    <div>
                        <div id="map" class="map" style="height: 250px; width: 300px; border-top-left-radius:10px;border-top-right-radius:10px;"></div>
                        <a class="menu__content nav__link" href="https://www.openstreetmap.org/directions?from=&to=Mangas%20I%2C%20Alfonso%2C%20Cavite%2C%20Calabarzon%2C%204123%2C%20Philippines&route=%3B14.1183811%2C120.8549657#map=18/14.11877/120.85445" style="display:inline-block; text-align:center; padding:10px; width:300px; border-top-left-radius:0px;border-top-right-radius:0px;">View in a map</a>
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
                <?php echo $__env->make('CustomerUI/reservation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div id="search">
            </div>
            <div class="services__container ">

                <?php echo $__env->make('CustomerUI/reservation2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>


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
                        <a href="#"><img src="assets/img/app1.png" alt="" class="app__store"></a>
                        <a href="#"><img src="assets/img/app2.png" alt="" class="app__store"></a>
                    </div>
                </div>

                <img src="assets/img/movil-app.png" alt="" class="app__img">
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
                        <p class="menu__name" style="font-weight: lighter;">The rules and regulations of JACAH Personnel must always be followed.</p>
                    </li>
                    <li>
                        <p class="menu__name" style="font-weight: lighter;">Walk, don't run in and around the pool facility.</p>
                    </li>
                    <li>
                        <p class="menu__name" style="font-weight: lighter;">Children who under 7 years old or less than 4 feet tall must be accompanied
                            by parents or responsible adult at all times.</p>
                    </li>
                    <li>
                        <p class="menu__name" style="font-weight: lighter;">Proper swim suit attire must be worn by all guest.(Colored shirt and maong
                            short are not allowed).</p>
                    </li>
                    <li>
                        <p class="menu__name" style="font-weight: lighter;">Persons who appear to be under the influence of alcohol or narcotics will be
                            denied admission.</p>
                    </li>
                    <li>
                        <p class="menu__name" style="font-weight: lighter;">Any other form of foods or beverages are not allowed in the pool area. Use
                            the designated area for eating and drinking. Glass items, chewing gum and
                            smoking in and around pool area are prohibited.</p>
                    </li>
                    <li>
                        <p class="menu__name" style="font-weight: lighter;">All guest must take a shower before entering the pool area.</p>
                    </li>
                    <li>
                        <p class="menu__name" style="font-weight: lighter;">Persons with open cuts, sores, bandages, cold, cough, or infected eyes are
                            not permitted in the pool.</p>
                    </li>
                    <li>
                        <p class="menu__name" style="font-weight: lighter;">Diving and other unsafe activities are not permitted in the pool.</p>
                    </li>
                    <li>
                        <p class="menu__name" style="font-weight: lighter;">Any Personnel of JACAH is not liable for any accident that will occur during
                            the whole stay of guest in the area.</p>
                    </li>
                </ol>
                <p class="menu__name">Please follow the Rules and Regulations to avoid untoward accidents.</p>
            </div>
        </section>


        <!--========== CONTACT US ==========-->
        <section class="contact section bd-container" id="contact">
            <div class="contact__container bd-grid">
                <div class="contact__data">
                    <span class="section-subtitle contact__initial">Let's talk</span>
                    <h2 class="section-title contact__initial">Contact us</h2>
                    <p class="contact__description">If you want to reserve a table in our restaurant, contact us and we
                        will attend you quickly, with our 24/7 chat service.</p>
                </div>

                <div class="contact__button">
                    <a href="#" class="button">Contact us now</a>
                </div>
            </div>
        </section>
    </main>

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

    <!--========== SCROLL REVEAL ==========-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <script type="text/javascript" src="<?php echo e(asset ('assets/js/header.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset ('assets/js/main.js')); ?>"></script>

    <script src="https://unpkg.com/scrollreveal"></script>

    <!--========== MAIN JS ==========-->
    <script src="assets/js/darkTheme.js"></script>

    <!-- ============== map ========== -->
    <script type="text/javascript" src="<?php echo e(asset ('assets/js/map.js')); ?>" defer></script>

</body>

</html><?php /**PATH C:\Users\Billy Villanueva\OneDrive\Desktop\CapstoneProject\project\resources\views/CustomerUI/page/room.blade.php ENDPATH**/ ?>