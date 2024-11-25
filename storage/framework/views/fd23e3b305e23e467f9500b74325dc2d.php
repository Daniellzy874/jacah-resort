<div class="items-center" x-data="photoPreview()">

    <div>
        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['xOn:click' => 'document.getElementById(\'photo\').click()','class' => 'relative']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => 'document.getElementById(\'photo\').click()','class' => 'relative']); ?>
            <div class="flex items-center text-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                </svg>
                Upload picture
            </div>
            <input @change="showPreview(event)" type="file" id="photo" name="image[]" multiple class="absolute inset-0 -z-10 opacity-0">
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $attributes = $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $component = $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
        <div class="bg-white mr-2 mt-2 w-full flex gap-1 pt-2 " style="border-top: 1px solid gray; overflow:auto;">
            <img id="room-preview" class="object-cover" style=" height:50px;">
            <img id="room-preview1" class="object-cover" style=" height:50px;" />
            <img id="room-preview2" class="object-cover" style=" height:50px;" />
        </div>

    </div>
    <script>
        function photoPreview() {
            return {
                showPreview: (event) => {
                    if (event.target.files.length > 0) {
                        var src_pic = URL.createObjectURL(event.target.files[0]);
                        document.getElementById('room-preview').src = src_pic;
                        var src_pic1 = URL.createObjectURL(event.target.files[1]);
                        document.getElementById('room-preview1').src = src_pic1;
                        var src_pic2 = URL.createObjectURL(event.target.files[2]);
                        document.getElementById('room-preview2').src = src_pic2;
                    }
                }
            }
        }
    </script>
</div><?php /**PATH C:\Users\Billy Villanueva\OneDrive\Desktop\CapstoneProject\project\resources\views/components/room-photo.blade.php ENDPATH**/ ?>