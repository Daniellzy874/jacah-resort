


// form view & unview
let slot = document.getElementById('slot');
var exitForm = document.getElementById('log_exit');
let log_btn = document.getElementById('login-btn');
let reg_btn = document.getElementById('register-btn');
let displayL = 0;
let displayR = 0;



function openLogin() {
    document.getElementById('login-blade').classList.add('open');
    displayL = 1;
}

document.addEventListener('click', function (e) {
    if (e.target == exitForm) {
        document.getElementById('login-blade').classList.remove('open');
        displayL = 0;
    }
});
document.addEventListener('click', function (e) {
    if (e.target == exitForm) {
        document.getElementById('register-blade').classList.remove('open');
        displayR = 0;
    }
});



log_btn.addEventListener('click', function () {
    if (displayL == 0) {
        document.getElementById('login-blade').classList.add('open');
        displayL = 1;

    }
});

reg_btn.addEventListener('click', function () {
    if (displayR == 0) {
        document.getElementById('register-blade').classList.add('open');
        displayR = 1;
    }

});
// end
window.document.onload = function () {
    console.log('hello')
}
window.onload = function () {
    sessionStorage.removeItem('reloadedagain');
}

