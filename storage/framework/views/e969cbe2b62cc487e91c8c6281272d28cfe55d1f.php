<!-- About Us Sectin Start -->
<section class="about-section bg-neutral-50 px-6 py-12 md:px-12">
    <div class="container">
        <div class="grid grid-cols-12 gap-6 items-center">
            <div class="col-span-12 lg:pb-12 lg:col-span-6">
                <h2 class="font-lora text-primary text-[24px] sm:text-[30px] leading-[1.277] xl:text-xl capitalize font-medium max-w-[500px]"><?php echo e($citizenship->citizenshiptranslation->overview_title); ?><span class="text-secondary">.</span></h2>
                <p class="max-w-[448px]  mb-5 lg:mb-16"><?php echo e($citizenship->citizenshiptranslation->overview_desc); ?></p>
            </div>
            <div class="col-span-12 lg:col-span-6 lg:pl-[70px]">
                <div class="-mb-10 mt-12 xl:mt-[70px] 2xl:mt-[100px]">
                    <div class="flex flex-wrap mb-5 lg:mb-10">
                        <img src="<?php echo e(asset('frontend/images/icon/investment.svg')); ?>" class="self-start mr-3" loading="lazy" width="50" height="50" alt="about Image">
                        <div class="flex-1">
                            <h3 class="font-lora text-primary text-[22px] xl:text-lg capitalize mb-2"><?php echo e($citizenship->citizenshiptranslation->overview_first_title); ?></h3>
                            <p><?php echo e($citizenship->citizenshiptranslation->overview_first_desc); ?></p>
                        </div>

                    </div>
                    <div class="flex flex-wrap mb-5 lg:mb-10">
                        <img src="<?php echo e(asset('frontend/images/icon/time.svg')); ?>" class="self-start mr-3" loading="lazy" width="50" height="50" alt="about Image">
                        <div class="flex-1">
                            <h3 class="font-lora text-primary text-[22px] xl:text-lg capitalize mb-2"><?php echo e($citizenship->citizenshiptranslation->overview_second_title); ?></h3>
                            <p><?php echo e($citizenship->citizenshiptranslation->overview_second_desc); ?></p>
                        </div>

                    </div>
                    <div class="flex flex-wrap mb-5 lg:mb-10">
                        <img src="<?php echo e(asset('frontend/images/icon/benefit.svg')); ?>" class="self-start mr-3" loading="lazy" width="50" height="50" alt="about Image">
                        <div class="flex-1">
                            <h3 class="font-lora text-primary text-[22px] xl:text-lg capitalize mb-2"><?php echo e($citizenship->citizenshiptranslation->overview_third_title); ?></h3>
                            <p><?php echo e($citizenship->citizenshiptranslation->overview_third_desc); ?></p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- About Us Sectin End -->
<?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/frontend/citizenship/intro.blade.php ENDPATH**/ ?>