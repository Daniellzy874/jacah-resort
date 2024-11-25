var hover = document.getElementById('hover');
var rotate = document.getElementById('arrow');
var menu = document.getElementById('menu');


// sticky header
window.addEventListener("scroll", function () {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);

    // sections.forEach(sec => {
    //     const top = window.scrollY;
    //     const offset = sec.offsetTop;
    //     const height = sec.offsetHeight;
    //     const id = sec.getAttribute('id');

    //     if (top >= offset && top < offset + height) {
    //         navLinks.forEach(links => {
    //             links.classList.remove('active');
    //             document.querySelector('header div nav ul li a[href*=' + id + ']').classList.add('active');


    //         });
    //     };
    // });
})
// 


