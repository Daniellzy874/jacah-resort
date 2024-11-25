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
        <h2 class="font-semibold text-xl text-white leading-tight ">
            <?php echo e(__('Promo Offer')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="<?php echo e(route('composePromo')); ?>" method="post" enctype='multipart/form-data'>
                <?php echo csrf_field(); ?>
                <div class="bg-white mb-8 flex overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 h-[100%] border-4 border-dashed text-gray-900 w-[50%]">
                        <img src="<?php echo e(asset('assets/image/announcement/announcement.png')); ?>" id="imagePreview" alt="" class="h-[100%]">
                        <input name="promoImage" type="file" accept="image/*" id="fileInput">
                    </div>
                    <div class="flex flex-col p-6 text-gray-900 w-[50%] gap-4">
                        <input type="text" name="promoHeader" class="border-2 border-gray-400 rounded-md" placeholder="ex.(20% PROMO) ">
                        <textarea name="promoDescription" id="textarea" placeholder="type the description" class="border-2 border-gray-400 rounded-md h-[50%]"></textarea>
                        <div class="flex justify-between">
                            <small id="word-count-info">Word Limit: 25 words</small>
                            <small id="word-count-feedback" style="color: red;"></small>
                        </div>
                        <div>
                            <button class="btn btn-success">COMPOSE</button>
                        </div>

                    </div>
                </div>
            </form>
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
<script>
    // Set the word limit
    const wordLimit = 25;

    const textarea = document.getElementById('textarea');
    const wordCountInfo = document.getElementById('word-count-info');
    const wordCountFeedback = document.getElementById('word-count-feedback');

    // Function to count words
    function countWords(text) {
        const words = text.trim().split(/\s+/); // Split by any whitespace
        return words.filter(Boolean).length; // Filter out empty strings from the array
    }

    // Event listener for typing in the textarea
    textarea.addEventListener('input', function() {
        const text = textarea.value;
        const wordCount = countWords(text);

        // Update feedback on the word count
        if (wordCount > wordLimit) {
            wordCountFeedback.textContent = `You have exceeded the word limit by ${wordCount - wordLimit} words.`;
        } else {
            wordCountFeedback.textContent = `${wordCount} / ${wordLimit} words used.`;
        }

        // Disable further typing if the limit is reached
        if (wordCount > wordLimit) {
            textarea.value = text.split(/\s+/).slice(0, wordLimit).join(' '); // Trim to word limit
        }
    });
</script>
<script>
    document.getElementById("fileInput").addEventListener("change", function(event) {
        const file = event.target.files[0]; // Get the selected file
        const preview = document.getElementById("imagePreview"); // Get the image element

        if (file) {
            // Create a URL for the selected file
            const reader = new FileReader();

            reader.onload = function(e) {
                // Set the preview image source to the loaded file data
                preview.src = e.target.result;
                preview.style.display = "block"; // Show the image
            };

            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            preview.style.display = "none"; // Hide the image if no file is selected
        }
    });
</script><?php /**PATH C:\Users\Billy Villanueva\OneDrive\Desktop\CapstoneProject\project\resources\views/promo.blade.php ENDPATH**/ ?>