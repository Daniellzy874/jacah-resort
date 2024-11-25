var map = L.map('map').setView([14.118114900454339, 120.85446834575694], 10);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var pop = L.popup({
    closeOnClick: true
}).setContent(`<h4>JACAH Farm & Resort</h4><img src="assets/image/jacah.jpg" style="height:100px">`);
var marker = L.marker([14.118114900454339, 120.85446834575694]).addTo(map).bindPopup(pop);

