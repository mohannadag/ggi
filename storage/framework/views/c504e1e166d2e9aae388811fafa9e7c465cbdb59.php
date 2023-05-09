<!-- Video Section Start -->
<div class="hero-slider overflow-hidden">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide flex flex-wrap items-center">
                <div class="container">
                    <div class="grid grid-cols-12 gap-3 sm:gap-[30px] items-center bg-primary z-[-2] lg:pl-[60px] lg:pr-0 lg:py-0 sm:pl-10 sm:pr-10 pl-5 pr-5 py-5 sm:py-12 rounded-[7px]">
                        <div class="col-span-12 lg:col-span-6 relative">
                            <div class="mb-5 lg:mb-0 <?php echo e(App::isLocale('ar') ? 'mr-5' : ''); ?> max-w-[450px]">
                                <span class="text-secondary text-tiny inline-block mb-2"><?php echo e(trans('file.recent_videos')); ?></span>
                                <h2 class="font-lora text-white text-[24px] sm:text-[30px] leading-[1.277] xl:text-xl mb-[10px] font-medium"><?php echo e($video->videoTranslation->description); ?><span class="text-secondary">.</span>
                                </h2>
                                <p class="flex flex-wrap items-center text-secondary text-tiny mt-[20px]"><?php echo e(trans('file.watch_video')); ?>

                                    <svg style="<?php echo e(App::isLocale('ar') ? '-webkit-transform: scaleX(-1); transform: scaleX(-1);' : ''); ?>" class="ml-[10px]" width="26" height="11" viewBox="0 0 26 11" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.0877 0.69303L24.2075 5.00849H0V5.99151H24.2075L20.0877 10.307L20.7493 11L26 5.5L20.7493 0L20.0877 0.69303Z" fill="currentColor"></path>
                                    </svg>
                                </p>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-6 text-center">
                            <div class="relative rounded-[24px] lg:pt-[45px] lg:pr-[45px] z-[1] lg:inline-block">
                                <div class="">
                                    <img src="<?php echo e(asset('frontend/images/video/shape-3.png')); ?>" class="absolute top-[30px] right-[30px] z-[-1]" loading="lazy" width="50" height="60" alt="<?php echo e($video->videoTranslation->name); ?>">
                                    <img dir="<?php echo e((App::isLocale('ar') ? 'ltr' : 'ltr')); ?>" src="<?php echo e(asset('frontend/images/video/shape-2.png')); ?>" class="absolute <?php echo e((App::isLocale('ar') ? 'right' : 'left')); ?>-1/2 hidden lg:block lg:bottom-5 lg:-<?php echo e((App::isLocale('ar') ? 'right' : 'left')); ?>-[160px]" loading="lazy" width="128" height="56" alt="Shape" style="<?php echo e(App::isLocale('ar') ? '-webkit-transform; scaleX(-1); transform: scaleX(-1); margin-right: -159px;' : ''); ?>">
                                </div>
                                <div class="relative lg:-mb-16">
                                    <div class="scene" data-relative-input="true">
                                        <img data-depth="0.1" src="<?php echo e(asset('/images/images/'.$video->file)); ?>" class="rounded-[24px] max-w-full" loading="lazy" width="507" height="349" alt="<?php echo e($video->videoTranslation->name); ?>">
                                    </div>
                                    <a href="<?php echo e($video->address); ?>" class="play-button bg-white text-white hover:text-primary absolute left-0 right-0 mx-auto top-1/2 -translate-y-1/2 hover:scale-105 hover:bg-primary w-[55px] h-[55px] flex flex-wrap z-[1] items-center justify-center opacity-100 shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] transition-all rounded-full group before:block before:absolute  before:bg-white before:opacity-80 before:shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] hover:before:bg-primary hover:before:opacity-80 before:w-[70px] before:h-[70px] before:rounded-full before:z-[-1]" aria-label="play button">
                                        <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="stroke-primary group-hover:stroke-white" d="M1.63861 10.764V6.70324C1.63861 1.66145 5.20893 -0.403178 9.57772 2.11772L13.1024 4.14812L16.6271 6.17853C20.9959 8.69942 20.9959 12.8287 16.6271 15.3496L13.1024 17.38L9.57772 19.4104C5.20893 21.9313 1.63861 19.8666 1.63861 14.8249V10.764Z" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row items-baseline gap-2 mt-10 leading-[1]">
                        <span class="text-secondary text-[16px] sm:text-[20px]  font-lora font-normal" dir="<?php echo e((App::isLocale('ar') ? 'ltr' : 'ltr')); ?>"><?php echo e(trans('file.questionmark')); ?></span>
                        <a class="text-primary text-[22px] sm:text-[28px] font-lora font-medium" dir="<?php echo e((App::isLocale('ar') ? 'ltr' : 'ltr')); ?>" href="tel:+905373539567">+90 537 353 95 67</a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<!-- Video Section End -->
<?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/frontend/includes/faq.blade.php ENDPATH**/ ?>