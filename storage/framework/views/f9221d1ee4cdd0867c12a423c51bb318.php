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
     <?php $__env->slot('header', null, ['style' => ' display:flex;']); ?>  <?php $__env->endSlot(); ?>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style=" overflow:auto; height:75vh; overflow:auto;">
            <div class="p-2 flex">
                <div class="w-[50%]">
                    <h1 class="p-2">You're here: <span class="opacity-50">Monitoring / Check-in Customer</span></h1>
                </div>
                <div class="w-[50%]">
                    <div id="searchItemActive"></div>
                </div>
            </div>
            <div class="bg-white mt-6 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
                    <?php echo app('Illuminate\Foundation\Vite')('resources/js/MonitoringJS/item.js'); ?>
                    <div id="itemMonitoring"></div>
                </div>
            </div>
            <div id="paginate"></div>
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
<?php endif; ?><?php /**PATH C:\Users\Billy Villanueva\OneDrive\Desktop\CapstoneProject\project\resources\views/Monitoring/item.blade.php ENDPATH**/ ?>