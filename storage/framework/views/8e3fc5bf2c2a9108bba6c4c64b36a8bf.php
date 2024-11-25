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
            <?php echo e(__('Inventory-category')); ?>

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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-3 flex">
            <div class=" bg-white overflow-hidden shadow-sm sm:rounded-lg" style="width: 30%;">
                <div class="p-6 text-gray-900 ">
                    <h1 class="font-semibold text-xl text-black leading-tight inline-flex ">ADD NEW CATEGORY</h1>
                    <form method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="flex">
                            <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'catname','class' => 'block mt-1 h-8 w-full text-sm','name' => 'catName','placeholder' => 'Category Name','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'catname','class' => 'block mt-1 h-8 w-full text-sm','name' => 'catName','placeholder' => 'Category Name','required' => true]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                            <input type="hidden" name="cat_id" id="cat-id">
                        </div>
                        <div class="py-2 flex gap-2">
                            <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['formaction' => ''.e(route('createCatInvent')).'','class' => 'flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700','style' => 'width: 80px;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['formaction' => ''.e(route('createCatInvent')).'','class' => 'flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700','style' => 'width: 80px;']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['formaction' => ''.e(route('editCatInvent')).'','class' => 'flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700','style' => 'width: 80px;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['formaction' => ''.e(route('editCatInvent')).'','class' => 'flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700','style' => 'width: 80px;']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['type' => 'button','dataBsToggle' => 'modal','dataBsTarget' => '#modalConfirmDelInventCat','class' => 'flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700','style' => 'width: 80px;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','data-bs-toggle' => 'modal','data-bs-target' => '#modalConfirmDelInventCat','class' => 'flex items-center justify-center h-8 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700','style' => 'width: 80px;']); ?>
                                <?php echo e(__('Delete')); ?>

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
                        <div id="confirmDelInventCat"></div>
                    </form>
                </div>
            </div>
            <div class="w-75">
                <div id="searchInputcat">
                </div>
            </div>
        </div>
        <div class="gap-10 flex max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="w-50 overflow-hidden ">

                <div class="shadow-sm sm:rounded-lg bg-white p-6 text-gray-900">
                    <h1 class="font-semibold text-xl text-black leading-tight inline-flex ">Category list</h1>
                    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
                    <?php echo app('Illuminate\Foundation\Vite')('resources/js/inventcat.js'); ?>
                    <div id="inventCat"></div>
                </div>
                <div class="py-2">
                    <div id="paginate"></div>
                </div>

            </div>
            <div class="w-50 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="prodtbl"></div>

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
<?php endif; ?><?php /**PATH C:\Users\Billy Villanueva\OneDrive\Desktop\CapstoneProject\project\resources\views/inventory/category.blade.php ENDPATH**/ ?>