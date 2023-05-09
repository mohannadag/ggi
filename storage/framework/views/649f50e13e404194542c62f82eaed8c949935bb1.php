        <!-- Explore Cities Start-->
        <section class="explore-cities-section pb-[50px] pt-[80px] lg:pt-[125px]">
            <div class="container">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="mb-[30px] lg:mb-[60px] text-center">
                            <span class="text-secondary text-tiny inline-block mb-2"><?php echo e(trans('file.explore_cities')); ?></span>
                            <h2 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium"><?php echo e(trans('file.find_your_neighborhood')); ?><span class="text-secondary">.</span></h2>
                        </div>
                        <div class="cities-slider">
                            <div class="swiper  -mx-[30px] -my-[60px] px-[30px] py-[60px]">
                                <div class="swiper-wrapper">
                                    <!-- swiper-slide start -->
                                    <?php $__currentLoopData = $states->where('status', '1'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide text-center">
                                        <div class="relative group">
                                            <a href="<?php echo e(route('property.state',$state)); ?>" class="block group-hover:shadow-[0_10px_15px_0px_rgba(0,0,0,0.1)] transition-all duration-300">
                                                <img src="<?php echo e(URL::asset('/images/states/'.$state->image)); ?>" class="w-full h-full block mx-auto rounded-[6px]" loading="lazy" width="270" height="370" alt="<?php echo e($state->stateTranslation->name); ?>">
                                                <div class="bg-[rgb(255,253,252,0.9)] rounded-[6px] px-[5px] py-[15px] absolute group-hover:bottom-[25px] group-hover:opacity-100 bottom-[0px] opacity-0 left-[25px] right-[25px] transition-all duration-500">
                                                    <span class="font-lora font-normal text-[18px] text-primary transition-all leading-none"><?php echo e($state->stateTranslation->name); ?></span>
                                                    <p class="font-light text-[14px] capitalize text-secondary transition-all leading-none"><?php echo e(trans('file.see_all_listings')); ?></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- swiper-slide end-->
                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Explore Cities End-->
<?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/frontend/includes/popular-city.blade.php ENDPATH**/ ?>