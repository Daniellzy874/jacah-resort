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
            <?php echo e(__('Monitoring')); ?>

        </h2>
        <div class="navigation-menu" style="height: 100%; width:50%; margin-left:40%;">

        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4">
                <a href="<?php echo e(route('customer')); ?>"> <i class='bx bxs-chevron-left text-[50px] inline-flex p-20px bg-gray-200 cursor-pointer'></i></a>
            </div>
            <div class="flex gap-1">
                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg h-[60vh] w-[30%]">
                    <div class="text-gray-900">
                        <div class="flex pb-6 flex-column justify-center items-center relative">
                            <div class="absolute top-0 bg-gradient-to-r from-cyan-300 to-blue-400 h-[30%] w-[100%]"></div>
                            <div class="flex flex-column justify-center items-center mt-[50px] gap-2">
                                <div class="z-1 flex flex-column items-center mb-4">
                                    <img src="<?php echo e(asset('assets/image/pofile_pic_default/PROF-PIC.png')); ?>" class="h-[100px] z-1 " alt="">
                                    <h1 class="text-gray-500 text-sm"><?php echo e(Carbon\Carbon::parse($posts->last_activity)->diffForHumans()); ?></h1>

                                    <span class="px-2 <?php echo e($posts->isActive === 'online' ? 'bg-green-500' : 'bg-red-500'); ?> text-white rounded-md text-sm"><?php echo e($posts->isActive === 'online' ? 'online' : 'offline'); ?></span>
                                </div>

                                <div class="text-center">
                                    <h1 class="capitalize font-bold text-[20px] text-gray-500"><?php echo e($data->name); ?></h1>
                                    <h1 class="text-gray-500 text-sm"><?php echo e($data->email); ?></h1>
                                    <h1 class="text-gray-500 text-sm"><?php echo e($data->mobile_number); ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="grid items-center">
                            <?php if($data->status === "Pending"): ?>
                            <button data-bs-toggle="modal" data-bs-target="#modalAcceptReservation" class="btn btn-info mx-4 text-white">Verify </button>
                            <?php else: ?>
                            <button data-bs-toggle="modal" data-bs-target="#modalAcceptReservation" class="btn btn-success mx-4">Check in </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- modal  -->
                <div id="modalAcceptReservation" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Verify again</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="w-[full] flex flex-col justify-center items-center">
                                    <p class="text-[20px]">Gcash Ref#:</p>
                                    <h1 class="text-[50px] font-bold tracking-wide"><?php echo e($data->gcash_ref); ?></h1>
                                </div>
                                <div class="w-[full] flex flex-col justify-center items-center">
                                    <p class="text-[20px]">Amount:</p>
                                    <h1 class="text-[50px] font-bold tracking-wide">₱<?php echo e($data->down_payment); ?>.00</h1>
                                </div>
                            </div>

                            <div id="remarks_container" class="modal-footer flex justify-center items-center">
                                <a href="<?php echo e(url('/verify/'.$data->gcash_ref)); ?>" class="btn btn-success bg-green-500">Accept</a>
                                <a onclick="Remarks()" href="#" class="btn btn-danger bg-red-500">Decline</a>
                                <!-- <?php echo e(url('/decline/'.$data->gcash_ref)); ?> -->
                            </div>
                            <script>
                                function Remarks() {
                                    document.getElementById('remarks_container').innerHTML =
                                        `
                                        <div class="w-[100%]"><i onclick="closeRemarks()" class='bx bx-left-arrow-alt text-[30px] cursor-pointer'></i></div>
                                        <div class="flex flex-col justify-center items-center gap-2">
                                        <h1>Remarks</h1>
                                        <select class="w-[50vh] p-[20px] rounded-md">
                                            <option>Wrong reference number!</option>
                                            <option>Does not match the record!</option>
                                            <option>Sorry, but you have no records, try again!</option>
                                        </select>
                                        <a href="<?php echo e(url('/decline/'.$data->gcash_ref)); ?>" class="btn btn-danger bg-red-500">Decline</a>
                                        </div>

                                        `;
                                }

                                function closeRemarks() {
                                    document.getElementById('remarks_container').innerHTML =
                                        `
                                     <a href="<?php echo e(url('/verify/'.$data->gcash_ref)); ?>" class="btn btn-success bg-green-500">Accept</a>
                                     <a onclick="Remarks()" href="#" class="btn btn-danger bg-red-500">Decline</a>
                                    `;
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <!-- end modal -->
                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg w-[70%] mb-[100px]">
                    <div class="p-6 text-gray-900">
                        <div class="mb-8">
                            <h1 class="text-[30px] font-bold">Customer Details</h1>
                        </div>
                        <div class="mb-8">
                            <h4 class="line" style=" width: 100%;padding-left:30px;border-bottom: 1px solid #4e4c4c91;line-height: 0.1em;margin: 10px 0 20px;"><span style="background: #fff; padding: 0 10px;" class="font-bold">Room</span></h4>

                            <table class="table">
                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Room #</h1>
                                    </td>
                                    <td class="w-[50%]"><?php echo e($data->reserve_for); ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Category:</h1>
                                    </td>
                                    <td><?php echo e($data->category); ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Rate:</h1>
                                    </td>
                                    <td>
                                        <h1><?php echo e($data->time); ?></h1>

                                    </td>
                                </tr>
                                <tr>

                            </table>
                        </div>
                        <div class="mb-8">
                            <h4 class="line" style=" width: 100%;padding-left:30px;border-bottom: 1px solid #4e4c4c91;line-height: 0.1em;margin: 10px 0 20px;"><span style="background: #fff; padding: 0 10px;" class="font-bold">Reservation</span></h4>
                            <table class="table">
                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Head #</h1>
                                    </td>
                                    <td class="w-[50%]"><?php echo e($data->personCount); ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Booked Date:</h1>
                                    </td>
                                    <td class="w-[50%]"><?php echo e($data->check_in); ?>-<?php echo e($data->check_out); ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Time in:</h1>
                                    </td>
                                    <td class="w-[50%]">-------------</td>
                                </tr>
                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Time out:</h1>
                                    </td>
                                    <td class="w-[50%]">-------------</td>
                                </tr>

                            </table>
                        </div>
                        <div class="mb-8">
                            <h4 class="line" style=" width: 100%;padding-left:30px;border-bottom: 1px solid #4e4c4c91;line-height: 0.1em;margin: 10px 0 20px;"><span style="background: #fff; padding: 0 10px;" class="font-bold">Payment</span></h4>
                            <table class="table">
                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Room price:</h1>
                                    </td>
                                    <td><?php echo e($data->price); ?></td>
                                </tr>

                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Entrance fee:</h1>
                                    </td>
                                    <td><?php echo e($data->entrance_fee); ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Person count:</h1>
                                    </td>
                                    <td>x <?php echo e($data->personCount); ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Total amount:</h1>
                                    </td>
                                    <td><?php echo e($data->total_amount); ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Downpayment:</h1>
                                    </td>
                                    <td class="w-[50%]"><?php echo e($data->down_payment); ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Gcash ref#:</h1>
                                    </td>
                                    <td class="w-[50%]"><?php echo e($data->gcash_ref); ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Remaining balance:</h1>
                                    </td>
                                    <td><?php echo e($data->rem_balance); ?></td>
                                </tr>

                            </table>
                        </div>
                    </div>
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
<?php endif; ?><?php /**PATH C:\Users\Billy Villanueva\OneDrive\Desktop\CapstoneProject\project\resources\views/verify-customer.blade.php ENDPATH**/ ?>