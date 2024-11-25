<div class="chatbot-toggler">
    <div style=" background: #86A7FC; width:7%; height:50px; position:fixed; border-top-left-radius:50px; border-bottom-left-radius:50px; border-bottom-right-radius:50px;right: 0px; bottom: 35px;cursor:pointer; display:flex; justify-content:center; align-items:center;">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="30" height="30" class="text-xl font-bold text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
        </svg>
        <h1 class="nav__link text-xl mt-2 ">
            faq
        </h1>

    </div>

</div>

<div class="chatbot">
    <header class="bg-blue-100">
        <div class="w-full">
            <h1>Welcome to JACAH </h1>
            <h1> Helpdesk</h1>
        </div>
        <svg id="cloxs" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="color: white; cursor:pointer;" stroke-width="1.5" stroke="currentColor" width="30" height="30">
            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>

    </header>
    <div class="container-section" style="background-color: white; position:relative; margin:10px; top:-40px; z-index:100000; border-radius:10px;  ">
        <div class="chatbox">
            <main style="">
                <div class="Accordion" id="collapseOne">
                    <h1 class="Title"><a href="#collapseOne">Is there a refund?</a></h1>
                    <div class="Content">
                        <div class="Wrapper">
                            <p>
                                Sorry, but we have a no refund policy.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="Accordion" id="collapseTwo">
                    <h1 class="Title"><a href="#collapseTwo">Is liquor allowed?</a></h1>
                    <div class="Content">
                        <div class="Wrapper">
                            <p>
                                Yes, but drink moderately.
                            </p>
                        </div>
                    </div>
                </div>



            </main>
        </div>

    </div>

</div>
<style>
    :root {
        --size-header: 2rem;
        --size-accordion-title: 1rem;
        --size-accordion-content: 1rem;
        --animation-speed: 100;
        --slide-ease: cubic-bezier(0.86, 0, 0.07, 1);
        --slide-duration: calc(400ms * 100 / var(--animation-speed));
        --slide-delay: calc(450ms * 100 / var(--animation-speed));
        --circle-duration: calc(900ms * 100 / var(--animation-speed));
    }

    *::before,
    *::after {
        position: relative;
        left: 0;
        top: 0;
        box-sizing: border-box;
    }

    .Accordion {
        --circle-x: 1.8rem;
        --circle-y: 0;
        --circle-r: 200%;
        --circle-bg: #fff;

        max-width: 56ch;
        margin-bottom: 1rem;
        border-radius: min(8px, 0.5rem);

        display: grid;
        grid-template-rows: 0fr 0fr;
        transition-timing-function: var(--slide-ease);
        transition-duration: 200ms, 200ms, var(--slide-duration);
        transition-property: opacity, box-shadow, grid-template-rows;
        transition-delay: 0ms, 0ms, var(--slide-delay);
        box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
        opacity: 0.9;
    }

    .Accordion:not(:target):hover {
        box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.5);
    }

    .Accordion:not(:target):active {
        opacity: 1;
        box-shadow: 0 4px 7px 0 rgba(0, 0, 0, 0.3);
    }

    .Accordion,
    .Content {
        overflow: hidden;
    }

    .Accordion:target {
        --d: 90deg;
        grid-template-rows: 0fr 1fr;
        transition: grid-template-rows var(--slide-ease) var(--slide-duration) var(--slide-delay);
    }

    .Wrapper {
        padding-block: 0 1.05rem;
        padding-inline: 1.25rem;
    }

    .Content {
        font-size: var(--size-accordion-content);
        line-height: 140%;
    }


    .Content p {
        margin-bottom: 1rem;
    }

    .Content a {
        color: currentColor;
        font-weight: 800;
        text-decoration: underline;
    }

    main :last-child,
    .Content :last-child {
        margin-bottom: 0;
    }

    .Title a {
        padding: 1rem 1.25rem;
        font-size: var(--size-Accordion-title);
        font-weight: 800;
        color: currentColor;
        text-decoration: none;
        display: flex;
        flex-direction: row;
        place-items: center;
    }



    .Accordion::before,
    .Accordion::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;

        mix-blend-mode: difference;
        transform-style: preserve-3d;
        transition-timing-function: ease;
        transition-property: opacity, clip-path, visibility;
        pointer-events: none;
        clip-path: circle(var(--r) at var(--circle-x) var(--circle-y));
        border-radius: inherit;
        z-index: 4;
    }

    .Accordion::before {
        --r: 0%;
        transition-delay: var(--circle-duration), var(--circle-duration), 0ms;
        transition-duration: 0ms, var(--circle-duration), 0ms;
        opacity: 0;
    }

    .Accordion:target::before {
        --r: var(--circle-r);
        transition-delay: 0ms, 0ms, 0ms;
        transition-duration: 0ms, var(--circle-duration), 0ms;
        opacity: 1;
    }

    .Accordion::after {
        --r: var(--circle-r);
        transition-delay: 0ms, 0ms, var(--circle-duration);
        transition-duration: 0ms, var(--circle-duration), 0ms;
        visibility: hidden;
        opacity: 1;
    }

    .Accordion:target:after {
        --r: 0%;
        transition-delay: 0ms, 0ms, 0ms;
        transition-duration: 0ms, 0ms, 0ms;
        visibility: visible;
        opacity: 0;
    }

    .Title a:focus-visible {
        background-color: hsl(0, 100%, 90%);
        outline: none;
    }
</style><?php /**PATH C:\Users\Billy Villanueva\OneDrive\Desktop\CapstoneProject\project\resources\views/CustomerUI/chatbot.blade.php ENDPATH**/ ?>