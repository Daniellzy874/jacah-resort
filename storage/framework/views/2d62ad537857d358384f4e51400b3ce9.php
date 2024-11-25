<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-black leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-auto">
                    <div>
                        <h1 class="border-1 border-blue-500 inline-flex py-2 px-4 rounded-md">User</h1>
                    </div>
                    <div class='main-cards'>
                        <div id='card'>
                            <div class='card-inner'>
                                <div></div>
                                <div class="text-end gap-6">
                                    <h1 class="font-bold text-[30px]"><?php echo e($countRoomList); ?></h1>
                                    <h3 class='opacity-75'>Active</h3>
                                </div>

                            </div>
                            <div class="flex justify-between">
                                <div class="flex">
                                    <i class='bx bxs-check-circle absolute text-[30px] opacity-35'></i>
                                    <i class='bx bxs-user h-[100px] w-[100px] text-[100px] opacity-35 relative'></i>
                                </div>

                                <a href="#" class="bg-white inline-flex h-[30px] w-[100px] text-gray-500 rounded-md items-center justify-center shadow-md mt-[15px] ">view all</a>
                            </div>
                        </div>
                        <div id='card'>
                            <div class='card-inner'>
                                <div></div>
                                <div class="text-end gap-6">
                                    <h1 class="font-bold text-[30px]"><?php echo e($countCategories); ?></h1>
                                    <h3 class='opacity-75'>Customer</h3>
                                </div>

                            </div>
                            <div class="flex justify-between">
                                <div class="flex">
                                    <i class='bx bxs-user h-[100px] w-[100px] text-[100px] text-gray-200/75 absolute z-10'></i>
                                    <i class='bx bxs-user h-[100px] scale-50 w-[100px] text-[100px] opacity-45 relative translate-x-[40px]'></i>
                                </div>
                                <a href="#" class="bg-white inline-flex h-[30px] w-[100px] text-gray-500 rounded-md items-center justify-center shadow-md mt-[15px] ">view all</a>
                            </div>
                        </div>
                        <div id='card'>
                            <div class='card-inner'>
                                <div></div>
                                <div class="text-end gap-6">
                                    <h1 class="font-bold text-[30px]"><?php echo e($countCustomer); ?></h1>
                                    <h3 class='opacity-75'>Booking</h3>
                                </div>

                            </div>
                            <div class="flex justify-between">
                                <div class="flex">
                                    <i class='bx bx-dots-horizontal-rounded absolute bg-white opacity-35 p-1 rounded-full text-gray-500 '></i>
                                    <i class='bx bxs-user h-[100px] w-[100px] text-[100px] opacity-45 relative'></i>
                                </div>
                                <a href="#" class="bg-white inline-flex h-[30px] w-[100px] text-gray-500 rounded-md items-center justify-center shadow-md mt-[15px] ">view all</a>
                            </div>

                        </div>
                        <div id='card'>
                            <div class='card-inner'>
                                <div></div>
                                <div class="text-end gap-6">
                                    <h1 class="font-bold text-[30px]"><?php echo e($countCustomer); ?></h1>
                                    <h3 class='opacity-75'>Customer</h3>
                                </div>

                            </div>
                            <div class="flex justify-between">
                                <i class='bx bxs-user h-[100px] w-[100px] text-[100px] opacity-45'></i>
                                <a href="#" class="bg-white inline-flex h-[30px] w-[100px] text-gray-500 rounded-md items-center justify-center shadow-md mt-[15px] ">view all</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h1 class="border-1 border-blue-500 inline-flex py-2 px-4 rounded-md">Room</h1>
                    </div>
                    <div class='main-cards'>
                        <div id='card'>
                            <div class='card-inner'>
                                <div></div>
                                <div class="text-end gap-6">
                                    <h1 class="font-bold text-[30px]"><?php echo e($countRoomList); ?></h1>
                                    <h3 class='opacity-75'>Available</h3>
                                </div>

                            </div>
                            <div class="flex justify-between">
                                <div class="flex">
                                    <i class='bx bx-home-alt w-[100px] h-[100px] text-[100px] opacity-35'></i>
                                </div>

                                <a href="#" class="bg-white inline-flex h-[30px] w-[100px] text-gray-500 rounded-md items-center justify-center shadow-md mt-[15px] ">view all</a>
                            </div>
                        </div>
                        <div id='card'>
                            <div class='card-inner'>
                                <div></div>
                                <div class="text-end gap-6">
                                    <h1 class="font-bold text-[30px]"><?php echo e($countCategories); ?></h1>
                                    <h3 class='opacity-75'>Occupied</h3>
                                </div>

                            </div>
                            <div class="flex justify-between">
                                <div class="flex">
                                    <i class='bx bxs-user h-[100px] scale-50 translate-x-[60%] translate-y-[20%] w-[100px] text-[100px] opacity-45 absolute translate-x-[40px] '></i>
                                    <i class='bx bx-home-alt w-[100px] h-[100px] text-[100px] relative opacity-35'></i>
                                </div>
                                <a href="#" class="bg-white inline-flex h-[30px] w-[100px] text-gray-500 rounded-md items-center justify-center shadow-md mt-[15px] ">view all</a>
                            </div>
                        </div>

                    </div>
                    <!-- <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
                    <?php echo app('Illuminate\Foundation\Vite')('resources/js/dashboard.js'); ?>
                    <div id="dashboard">

                    </div> -->
                </div>
            </div>
        </div>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<style>
    .main-container {
        grid-area: main;
        overflow-y: auto;
        padding: 20px 20px;
        color: rgba(255, 255, 255, 0.95);
    }

    .main-cards {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 20px;
        margin: 15px 0;
    }

    #card {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        padding: 8px 15px;
        border-radius: 5px;
        color: white;
    }

    #card:first-child {
        background-color: #2962ff;
    }

    #card:nth-child(2) {
        background-color: #ff6d00;
    }

    #card:nth-child(3) {
        background-color: #2e7d32;
    }

    #card:nth-child(4) {
        background-color: #d50000;
    }

    .card-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .card-inner>.card_icon {
        font-size: 25px;
    }

    .charts {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-top: 60px;
        height: 300px;
    }
</style><?php /**PATH C:\Users\Billy Villanueva\OneDrive\Desktop\CapstoneProject\project\resources\views/dashboard.blade.php ENDPATH**/ ?>