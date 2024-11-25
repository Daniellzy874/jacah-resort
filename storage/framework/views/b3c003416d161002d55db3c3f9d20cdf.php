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
     <?php $__env->slot('header', null, ['style' => ' display:flex;']); ?> 
        <h2 class="font-semibold text-xl text-black inline-flex ">
            <?php echo e(__('Reservation')); ?>

        </h2>

     <?php $__env->endSlot(); ?>

    <script>
        const navLinkEl = document.querySelectorAll('.sub-menu');

        navLinkEl.forEach(navLinkEll => {
            navLinkEll.addEventListener('click', () => {
                document.querySelector('.activel')?.classList.remove('activel');
                navLinkEll.classList.add('activel');
            });
        });
    </script>
    <div style="padding-right:50px;">
        <div class="flex justify-end pr-3">
            <div id="searchInputbox" class="w-100 mt-4"></div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style=" height:75vh;  overflow:auto;">
            <div class="w-[50%] flex pl-[150px]">
                <div class="flex">
                    <span class="w-[15px] h-[15px] bg-yellow-500 inline-flex"></span>
                    <h1 class="mx-4">Unverified</h1>
                </div>
                <!-- <div class="flex">
                    <span class="w-[15px] h-[15px] bg-red-500 inline-flex"></span>
                    <h1 class="mx-4">SSR</h1>
                </div> -->
                <div class="flex">
                    <span class="w-[15px] h-[15px] bg-blue-500 inline-flex"></span>
                    <h1 class="mx-4">Verified</h1>
                </div>
            </div>

            <div class="bg-white mt-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900">
                    <div class="flex mb-2">
                        <img src="<?php echo e(asset('assets/image/list.png')); ?>" style="width: 20px; height:20px; margin-right:5px;">
                        <h1 class="font-semibold text-xl text-black leading-tight inline-flex">Customer Reservation List</h1>
                    </div>
                    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
                    <?php echo app('Illuminate\Foundation\Vite')('resources/js/appcount.js'); ?>
                    <div id="SearchCustomer"></div>
                </div>
            </div>
            <div class="float-right">
                <div id="paginate" style="margin-top: 5px;"></div>
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
<?php endif; ?><?php /**PATH C:\Users\Billy Villanueva\OneDrive\Desktop\CapstoneProject\project\resources\views/customer.blade.php ENDPATH**/ ?>