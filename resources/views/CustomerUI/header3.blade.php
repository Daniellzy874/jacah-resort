<div id="head__scroll" class="hidden ease-out duration-300">
    <nav class="nav px-[100px]">
        <a href="#" class="nav__logo"></a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item"><a href="#home" class="nav__link active-link">360°</a></li>
                <li class="nav__item"><a href="#about" class="nav__link">Amenities</a></li>
                <li class="nav__item"><a href="#services" class="nav__link">Reservation</a></li>
                <li class="nav__item"><a href="#menu" class="nav__link">About</a></li>
                <li class="nav__item"><a href="#contact" class="nav__link">Contact us</a></li>

                <!-- <li class="nav__item"><i class='bx bx-moon change-theme' id="theme-button"></i></li> -->
            </ul>
        </div>

        <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-menu'></i>
        </div>
    </nav>

</div>
<script>
    const toTopheader = document.getElementById('head__scroll');
    window.addEventListener("scroll", () => {
        if (window.pageYOffset > 550) {
            toTopheader.classList.remove('hidden');
        } else {
            toTopheader.classList.add('hidden');
        }


    });
</script>