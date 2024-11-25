<div style="width: 100%; height:100%; display:flex; border:1px solid #767676; border-bottom:5px solid #4F6F52;">
    <div style="width:35%; height:100%; border-right: 1px solid #000;  border-top-left-radius:10px;">

        <div id="reactmain">
        </div>
    </div>
    @viteReactRefresh
    @vite('resources/js/app.js')
    <div id="react" style="position:absolute; z-index:10;">
    </div>
    <div style="width:35%; height:100%;">

        <div id="port"></div>

        <div id="count" style="z-index:10;">

        </div>

    </div>
    <div class="menu__content" style="border-radius:0%; width:30%; line-height:100%; position:relative; display:flex; justify-content:center; align-items:center;">
        <h1 class="nav__link" style=" text-transform:uppercase; font-weight:bold; font-size:18px;">check availability</h1>
    </div>
</div>