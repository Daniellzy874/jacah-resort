<a href="#" class="to-top">
    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-arrow-up" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5" />
    </svg>
</a>

<style>
    .to-top {
        background: #86A7FC;
        width: 50px;
        height: 50px;
        position: fixed;
        border-radius: 100%;
        right: 45px;
        bottom: 35px;
        height: 50px;
        cursor: pointer;
        display: flex;
        opacity: 0;
        justify-content: center;
        align-items: center;
        transition: all .4s;


    }

    .to-top.active {
        bottom: 32px;
        transform: translate(-60px);
        pointer-events: auto;
        opacity: 1;
    }
</style>

<script>
    const toTop = document.querySelector('.to-top');

    window.addEventListener("scroll", () => {
        if (window.pageYOffset > 500) {
            toTop.classList.add('active');
        } else {
            toTop.classList.remove('active');
        }
    });
</script><?php /**PATH C:\Users\Billy Villanueva\OneDrive\Desktop\CapstoneProject\project\resources\views/CustomerUI/back2top.blade.php ENDPATH**/ ?>