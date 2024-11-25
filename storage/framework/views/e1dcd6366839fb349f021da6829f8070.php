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
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

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
        <nav class="nav bg-gradient-to-r from-cyan-200 to-blue-500 px-[100px]">
            <div class="flex justify-between h-100 w-full">
                <a href="#" class="nav__logo">
                    <h1 style="font-size: 30px; display:inline-block; font-family:monospace; font-weight:bolder; text-shadow: 1px; color:#00a8f3;">JACAH</h1>
                    <p style="font-size: 10px; display:inline-block; color:gray; ">Farm & Resort</p>
                </a>
                <div class="hidden sm:flex sm:items-center sm:ms-6 my-2">
                    <div class="hidden sm:flex sm:items-center">
                        <div id="nav-menu">
                            <?php echo $__env->make('CustomerUI.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </div>
                        <?php echo $__env->yieldContent('profile'); ?>
                    </div>
                </div>
            </div>
            </div>
        </nav>
        <!-- =========Header 3 ========== -->
        <?php echo $__env->yieldContent('header3'); ?>

    </header>

    <main class="l-main">
        <?php echo $__env->yieldContent('main'); ?>

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
    <script type="text/javascript" src="<?php echo e(asset ('assets/js/header.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset ('assets/js/main.js')); ?>"></script>
    <!-- Include jQuery if not already included -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://unpkg.com/scrollreveal"></script>

    <!--========== MAIN JS ==========-->
    <script src="assets/js/darkTheme.js"></script>

    <!-- ============== map ========== -->
    <script type="text/javascript" src="<?php echo e(asset ('assets/js/map.js')); ?>" defer></script>

</body>

</html><?php /**PATH C:\Users\Billy Villanueva\OneDrive\Desktop\CapstoneProject\project\resources\views/CustomerUI/app.blade.php ENDPATH**/ ?>