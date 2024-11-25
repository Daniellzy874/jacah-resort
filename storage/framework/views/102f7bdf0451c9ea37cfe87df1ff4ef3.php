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
        <h2 class="font-semibold text-xl text-black leading-tight inline-flex ">
            <?php echo e(__('Inventory-product')); ?>

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

    <div class="py-2">
        <?php if($message = Session::get('success')): ?>
        <div id="alert" class="absolute flex justify-center items-center pr-4" style="width:80%; height:100%; transform:translateY(-100px)">
            <div class="flex flex-column alert alert-success h-25 w-25 border-1 border-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <div class="w-full flex justify-center">
                    <strong><?php echo e($message); ?></strong>
                </div>
            </div>
        </div>
        <?php elseif($errors->any()): ?>
        <div id="alert" class="absolute flex justify-center items-center pr-4" style="width:80%; height:100%; transform:translateY(-100px)">
            <div class="flex flex-column alert alert-danger h-25 w-25 border-1 border-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                    <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708" />
                </svg>
                <div class="w-full flex justify-center">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong><?php echo e($error); ?></strong>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <?php else: ?>
        <?php endif; ?>
        <script>
            setTimeout(() => {
                document.getElementById('alert').style.display = "none";
            }, 2000);
        </script>
        <div class="flex gap-2 max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4" style=" overflow:auto;">
            <div class="overflow-hidden sm:rounded-lg" style="width: 400px; height: 500px;">
                <div style="height:80px;">
                    <h1 class="p-2 absolute">You're here: <span class="opacity-50">Inventory / Product list</span></h1>
                </div>
                <div class="shadow-sm sm:rounded-lg p-6 text-gray-900 bg-white ">
                    <div class="flex mb-2">
                        <img src="<?php echo e(asset('assets/image/manage.png')); ?>" style="width: 30px; height:30px; margin-right:5px;">
                        <h1 class="font-semibold text-xl text-black leading-tight inline-flex ">Manage</h1>
                    </div>
                    <form method="post" enctype='multipart/form-data'>
                        <?php echo e(csrf_field()); ?>

                        <div class="gap-2">
                            <div id="formProduct"></div>
                            <div classe="w-full mt-2">
                                <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['class' => 'text-2xl font-bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-2xl font-bold']); ?>Photo <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginal8ade7077032b24941796dbbac58d4219 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8ade7077032b24941796dbbac58d4219 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.room-photo','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('room-photo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8ade7077032b24941796dbbac58d4219)): ?>
<?php $attributes = $__attributesOriginal8ade7077032b24941796dbbac58d4219; ?>
<?php unset($__attributesOriginal8ade7077032b24941796dbbac58d4219); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8ade7077032b24941796dbbac58d4219)): ?>
<?php $component = $__componentOriginal8ade7077032b24941796dbbac58d4219; ?>
<?php unset($__componentOriginal8ade7077032b24941796dbbac58d4219); ?>
<?php endif; ?>
                            </div>
                        </div>
                        <div class="py-2 flex gap-1">
                            <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['formaction' => ''.e(route('saveProduct')).'','class' => 'flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700','style' => 'width: 80px;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['formaction' => ''.e(route('saveProduct')).'','class' => 'flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700','style' => 'width: 80px;']); ?>
                                <?php echo e(__('Add')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['formaction' => ''.e(route('editProduct')).'','class' => 'flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700','style' => 'width: 80px;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['formaction' => ''.e(route('editProduct')).'','class' => 'flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700','style' => 'width: 80px;']); ?>
                                <?php echo e(__('Edit')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['type' => 'button','dataBsToggle' => 'modal','dataBsTarget' => '#modalConfirmDelProd','class' => 'flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700','style' => 'width:80px;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','data-bs-toggle' => 'modal','data-bs-target' => '#modalConfirmDelProd','class' => 'flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700','style' => 'width:80px;']); ?>
                                <?php echo e(__('Remove')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>

                        </div>
                        <div id="confirmDelProduct"></div>
                    </form>
                </div>
            </div>

            <div class="w-full overflow-hidden sm:rounded-lg" style="overflow:auto;">

                <div class="flex justify-end pr-3">
                    <div id="searchInputcat" class="w-100 mt-2"></div>
                </div>

                <div class="bg-white shadow-sm mt-2 mb-2 p-6 text-gray-900">
                    <div class="flex">
                        <img src="<?php echo e(asset('assets/image/list.png')); ?>" style="width: 20px; height:20px; margin-right:5px;">
                        <h1 class="font-semibold text-xl text-black leading-tight inline-flex">Product List</h1>
                    </div>
                    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
                    <?php echo app('Illuminate\Foundation\Vite')('resources/js/InventoryJS/inventprod.js'); ?>
                    <div id="inventProduct"></div>
                </div>

                <div id="paginate" class="w-full flex justify-end pr-3"></div>

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
<?php endif; ?><?php /**PATH C:\Users\Billy Villanueva\OneDrive\Desktop\CapstoneProject\project\resources\views/inventory/product.blade.php ENDPATH**/ ?>