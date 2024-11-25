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
                <a href="<?php echo e(route('monitor-item')); ?>"> <i class='bx bxs-chevron-left text-[50px] inline-flex p-20px bg-gray-200 cursor-pointer'></i></a>
            </div>
            <div class="flex gap-1">
                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg h-[60vh] w-[30%]">
                    <div class="text-gray-900">
                        <div class="flex pb-6 flex-column justify-center items-center relative">
                            <div class="absolute top-0 bg-gradient-to-r from-cyan-300 to-blue-400 h-[30%] w-[100%]"></div>
                            <div class="flex flex-column justify-center items-center mt-[50px] gap-2">
                                <div class="z-1 flex flex-column items-center mb-4">
                                    <img src="<?php echo e(asset('assets/image/pofile_pic_default/PROF-PIC.png')); ?>" class="h-[100px] z-1 " alt="">
                                    <h1 class="text-gray-500 text-sm"><?php echo e(Carbon\Carbon::parse($data->last_activity)->diffForHumans()); ?></h1>

                                    <span class="px-2 <?php echo e($data->isActive === 'online' ? 'bg-green-500' : 'bg-red-500'); ?> text-white rounded-md text-sm"><?php echo e($data->isActive === 'online' ? 'online' : 'offline'); ?></span>
                                </div>

                                <div class="text-center">
                                    <h1 class="capitalize font-bold text-[20px] text-gray-500"><?php echo e($data->name); ?></h1>
                                    <h1 class="text-gray-500 text-sm"><?php echo e($data->email); ?></h1>
                                    <h1 class="text-gray-500 text-sm"><?php echo e($data->mobile_number); ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="grid items-center">
                            <button data-bs-toggle="modal" data-bs-target="#modalMonitorCheckout" class="btn btn-danger mx-4">Check-out</button>

                        </div>
                    </div>
                </div>
                <!-- modal -->
                <div class="modal fade" id="modalMonitorCheckout" tab-index="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style=" position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">
                        <div class="modal-content">
                            <form id="myForm">
                                <div id="alert-container">

                                </div>
                                <div class="modal-body">
                                    <div class='flex gap-[100px]'>
                                        <div class=''>
                                            <img src="<?php echo e(asset('assets/image/pofile_pic_default/PROF-PIC.png')); ?>" class='w-[100px]' alt="" />
                                            <h1 class='font-bold capitalize'><?php echo e($data->name); ?></h1>

                                            <h1 class='text-xs'><?php echo e($data->email); ?></h1>
                                            <input type="hidden" name='number' />
                                            <h1 class='text-xs'><?php echo e($data->mobile_number); ?></h1>
                                            <input type="hidden" name='email' />
                                            <input type="hidden" name='room' />
                                            <input type="hidden" name='category' />
                                        </div>
                                        <div class='text-end'>
                                            <h1 class='font-bold'>JACAH Farm & Resort</h1>
                                            <h1 class='text-xs'>777-7777-77</h1>
                                            <h1 class='text-xs'>jacah@gmail.com</h1>
                                            <h1 class='text-xs'>alfonso,cavite</h1>
                                        </div>
                                    </div>
                                    <div class=''>
                                        <table class="table table-bordered mt-4">
                                            <thead class='thead-dark'>
                                                <tr>
                                                    <th scope="col">Description</th>
                                                    <th scope="col"></th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td class='text-center' scope="row">Date:</td>
                                                    <td><input type="date" name="date_out" class='w-[100%] border-none' id='date_out' /></td>

                                                </tr>
                                                <tr>
                                                    <td class='text-center' scope="row">Time in:</td>
                                                    <td><input type="text" name="time_out" value="" placeholder='--:--:--' class='border-none' id='time_out' required readOnly /><button type='button' onclick='Monitor()' class='btn btn-primary bg-blue-500 absolute left-[83%]'>set</button></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class='pt-[5px] flex flex-column gap-2'>
                                        <button type='submit' class="inline-flex items-center px-4 py-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex items-center justify-center h-8 bg-red-500 hover:bg-red-700 active:bg-red-700 focus:bg-red-700">
                                            <svg id='spin' class="animate-spin hidden border-solid border-[4px] border-black-200 h-6 w-6 mr-3 bg-transparent border-t-[4px] border-t-white rounded-full" viewBox="0 0 24 24"></svg>
                                            Check out
                                        </button>
                                        <button type='button' data-bs-dismiss="modal" aria-label="Close" class="inline-flex items-centerm px-4 py-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 flex items-center justify-center h-8 bg-gray-500 hover:bg-gray-700 active:bg-gray-700 focus:bg-gray-700">Cancel</button>
                                    </div>
                                </div>
                            </form>
                            <script>
                                function Monitor() {
                                    let currentDate = new Date();
                                    // Get the current time as a string (in local time)
                                    let timeString = currentDate.toLocaleTimeString(); // e.g. "10:45:22 AM"
                                    document.getElementById('time_out').value = timeString;

                                }
                            </script>
                            <script>
                                const form = document.getElementById('myForm');
                                form.addEventListener('submit', function(event) {
                                    document.getElementById('spin').classList.remove('hidden')
                                    setInterval(function() {
                                        document.getElementById('spin').classList.add('hidden')
                                    }, 5000);
                                    var inputTime = document.getElementById('time_out').value;
                                    var inputDate = document.getElementById('date_out').value;
                                    let id = sessionStorage.getItem('cus-id');

                                    const data = {
                                        'id': id,
                                        'time_out': inputTime,
                                        'date_out': inputDate,
                                    };


                                    try {
                                        if (inputTime === "" || inputDate === "") {
                                            // Custom validation message or handling
                                            document.getElementById('alert-container').innerHTML = `
                                            <div class="flex items-center justify-center bg-green-50">
                                                <i class='bx bxs-error text-red-500 text-[30px]'></i>
                                                <div class="">
                                                  <h1 class="text-[30px] font-bold ">Error</h1>
                                                  <p class="">Failed to checkout, try again!</p>
                                                </div>
                                              
                                            </div>
                                            `;
                                            setInterval(function() {
                                                document.getElementById('alert-container').innerHTML = "";
                                            }, 7000);
                                            event.preventDefault(); // Prevent form submission
                                        } else {
                                            axios.post('/saveCheckOut', data)
                                                .then((response) => {
                                                    console.log(response.data);
                                                })
                                                .catch((error) => {
                                                    console.error('There was an error!', error);
                                                });

                                        }
                                    } catch (error) {

                                        // setMessage('Error: ' + error.message);  // Handle error
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!-- alert modal -->

                    <!-- end allert modal -->
                </div>

                <!-- modal end -->
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
                                        <h1 class="text-gray-500">
                                            Check-in:
                                        </h1>
                                    </td>
                                    <td>
                                        <h1 class="text-green-500"><i class='bx bx-calendar-check text-[20px] mx-4'></i><?php echo e($data->Date_in); ?></h1>
                                        <h1 class="text-green-500"><i class='bx bx-time-five text-[20px] mx-4'></i><?php echo e($data->Time_in); ?></h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Check-out:</h1>
                                    </td>
                                    <td>
                                        <h1 class="text-red-500"><i class='bx bx-calendar-check text-[20px] mx-4'></i><?php echo e($data->Date_out); ?></h1>
                                        <h1 class="text-red-500"><i class='bx bx-time-five text-[20px] mx-4'></i><?php echo e($data->Time_out); ?></h1>
                                    </td>
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
                                    <td class="w-[50%]"><?php echo e($data->price); ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Entrance fee:</h1>
                                    </td>
                                    <td class="w-[50%]"><?php echo e($data->entrance_fee); ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h1 class="text-gray-500">Peson count:</h1>
                                    </td>
                                    <td class="w-[50%]">x <?php echo e($data->personCount); ?></td>
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
<?php endif; ?><?php /**PATH C:\Users\Billy Villanueva\OneDrive\Desktop\CapstoneProject\project\resources\views/Monitoring/monitor.blade.php ENDPATH**/ ?>