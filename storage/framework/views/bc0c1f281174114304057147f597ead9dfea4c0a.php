<?php $__env->startSection('content'); ?>
    <?php

                     $languages = \Illuminate\Support\Facades\DB::table('languages')

                                ->select('id','name','locale')

                                // ->where('default','=',0)

                                ->where('locale','!=',\Illuminate\Support\Facades\Session::get('currentLocal'))

                                ->orderBy('name','ASC')

                                ->get();

                 \Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

                ?>

        <!-- contact form start -->
        <div class="py-[80px] lg:py-[120px]">
            <div class="container">
                <form action="<?php echo e(route('login')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="grid grid-cols-12 gap-x-[30px] mb-[-30px]">
                        <div class="col-span-12 lg:col-span-6 mb-[30px]">
                            <h2 class="font-lora text-primary text-[24px] sm:text-[30px] leading-[1.277] xl:text-xl mb-[15px] font-medium">
                                Login to GGI Turkey<span class="text-secondary">.</span></h2>

                            <p class="max-w-[465px] mb-[50px]">
                                Huge number of propreties availabe here for buy, sell and Rent.
                                Also you find here co-living property, lots opportunity you have to
                                choose here and enjoy huge discount you can get.
                            </p>
                            <div class="grid grid-cols-12 gap-x-[20px] gap-y-[35px]">

                                <div class="col-span-12">
                                    <input class="font-light w-full sm:w-[400px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="text" name="email" id="username" placeholder="Usename">
                                </div>


                                <div class="col-span-12">
                                    <input class="font-light w-full sm:w-[400px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="password" name="password" id="password" placeholder="Password">

                                    <div class="flex flex-wrap items-center justify-between w-full sm:w-[400px] mt-[15px]">
                                        <div class="flex flex-wrap items-center">
                                            <input type="checkbox" id="checkbox1" name="Remember me">
                                            <label for="checkbox1" class="ml-[5px] cursor-pointer text-[14px]"> Remember
                                                me</label><br>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-span-12">
                                    <div class="flex flex-wrap items-center">
                                        <button type="submit" class="before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:-z-[1] before:bg-secondary before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto before:transition-all leading-none px-[40px] py-[15px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:-z-[2] after:bg-primary after:rounded-md after:transition-all">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-12 lg:col-span-6 mb-[30px]">
                            <img src="<?php echo e(asset('frontend/images/contact/image.png')); ?>" class="w-full h-auto rounded-[10px]" width="546" height="478" alt="image">
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- Contact Form End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.authmain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/auth/login.blade.php ENDPATH**/ ?>