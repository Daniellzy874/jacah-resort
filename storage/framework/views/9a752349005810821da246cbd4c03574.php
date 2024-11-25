<div class="w-[100%] top-[95%] left-[50%] translate-x-[-50%] translate-y-[-50%] pointer-none fixed ">
    <h1 class="nav__link text-xl mt-2 ">
        <img id="content_toggler" src="<?php echo e(asset('assets/image/announce.png')); ?>" class="h-[100px] w-[100px] rounded-full shadow-md absolute bottom-[0] cursor-pointer" alt="">
        <span class="inline-flex w-[20px] h-[20px] bg-red-500 rounded-full relative left-[70px] border-4 border-white "></span>
    </h1>
</div>
<div id="content_container" class="content_container">
    <div class="container-section" style="border-radius:10px; padding:10px; height:100%;">
        <main id="promo-content" class="h-[100%] flex">
            <img id="promo-image" src="<?php echo e(asset('assets/image/announcement/announcement.png')); ?>" class="w-[50%]" alt="">
            <div class="w-[50%] flex flex-col items-center justify-center gap-4">
                <h1 id="promo-name" class="text-[80px] font-bold ">Announcement</h1>
                <p id="promo-description" class="text-[20px] text-justify">Stay tuned for an important announcement coming your way. Keep your eyes peeled.</p>
                <?php if(Route::has('login')): ?>
                <?php if(auth()->guard()->check()): ?>
                <a class="bg-green-400 hover:bg-green-500 py-4 px-8 text-white text-[30px] rounded-md cursor-pointer">Book</a>
                <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="bg-green-400 hover:bg-green-500 py-4 px-8 text-white text-[30px] rounded-md cursor-pointer">Sign in</a>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </main>
    </div>

</div>
<style>
    .content_container {
        background: white;
        position: fixed;
        left: 8%;
        bottom: 100px;
        overflow: hidden;
        height: 150%;
        width: 150%;
        transform: scale(0.2);
        z-index: 1000;
        opacity: 0;
        pointer-events: none;
        border-radius: 10px;
        transform-origin: bottom left;
        box-shadow: 0 0 120px 0 rgba(0, 0, 0, 0.1),
            0 32px 64px -48px rgba(0, 0, 0, 0.5);
        transition: all 0.1s ease;
    }

    .show-content {
        transform: scale(0.5);
        opacity: 1;
        pointer-events: auto;
    }
</style>
<script>
    const contentToggler = document.getElementById("content_toggler");
    contentToggler.addEventListener("click", () => document.getElementById('content_container').classList.toggle("show-content"));
</script>
<script>
    // Fetch data from the API
    fetch('http://127.0.0.1:8000/promo_json')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the response as JSON
        })
        .then(data => {
            data.map((datas) => {
                document.getElementById('promo-image').src = `<?php echo e(asset('assets/image/announcement/${datas.photo}')); ?>`;
                document.getElementById('promo-name').textContent = `${datas.name}`;
                document.getElementById('promo-description').textContent = `${datas.description}`;

            })




        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
</script><?php /**PATH C:\Users\Billy Villanueva\OneDrive\Desktop\CapstoneProject\project\resources\views/CustomerUI/announcement.blade.php ENDPATH**/ ?>