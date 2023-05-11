<?php $__env->startSection('meta'); ?><?php echo e($property->description); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('image'); ?><?php echo e(URL::asset('/images/thumbnail/'.$property->thumbnail)); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.includes.header-ivr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php

        $languages = \Illuminate\Support\Facades\DB::table('languages')

            ->select('id', 'name', 'locale')

            // ->where('default','=',0)

            ->where('locale', '!=', \Illuminate\Support\Facades\Session::get('currentLocal'))

            ->orderBy('name', 'ASC')

            ->get();

        \Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

    ?>


    <!-- Hero section start -->
    <section class="bg-no-repeat bg-center bg-cover bg-[#FFF6F0] h-[350px] lg:h-[513px] flex flex-wrap items-center relative before:absolute before:inset-0 before:content-[''] before:bg-[#000000] before:opacity-[70%]" style="background-image: url('<?php echo e(URL::asset('/images/thumbnail/'.$property->thumbnail)); ?>');">
        <div class="container">
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div class="max-w-[600px]  mx-auto text-center text-white relative z-[1]">
                        <div class="mb-5"><span class="text-base block"><?php echo e(trans('file.ggi_listings')); ?></span></div>
                        <h1 class="font-lora text-[36px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl font-medium"><?php echo e($property->property_id ?? ($property->property_id ?? null)); ?></h1>
                        <p class="text-base mt-5 max-w-[500px] mx-auto text-center">
                            <?php echo e($property->country->countryTranslation->name ?? ($property->country->countryTranslationEnglish->name ?? null)); ?>,
                            <?php echo e($property->state->stateTranslation->name ?? ($property->state->stateTranslationEnglish->name ?? null)); ?>,
                            <?php echo e($property->city->cityTranslation->name ?? ($property->city->cityTranslationEnglish->name ?? null)); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section end -->

    <!-- Popular Properties start -->
    <section class="popular-properties py-[80px] lg:py-[120px]">
        <div class="container">
            <div class="grid grid-cols-1 mb-[-30px] gap-[30px] xl:gap-[50px]">
                <div class="col-span-12 md:col-span-6 lg:col-span-8 mb-[30px]">
                    <div class="col-span-12 flex flex-wrap flex-col md:flex-row items-start justify-between">
                        <div class="mb-5 lg:mb-0">
                            <h2 class="font-lora text-primary text-[24px] sm:text-[28px] leading-[1.277] capitalize lg font-medium"><?php echo e($property->title); ?><span class="text-secondary">.</span></h2>
                        </div>
                        <ul class="all-properties flex flex-wrap lg:pt-[10px]">
                            <li data-tab="gallery" class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><button class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px] ease-out"><?php echo e(trans('file.gallery')); ?></button></li>
                            <?php if($property->propertyDetails->plans_link !== NULL): ?>
                            <li class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><a href="<?php echo e($property->propertyDetails->plans_link ?? ($property->propertyDetails->plans_link ?? null)); ?>" class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px]">Plans</a></li>
                            <?php endif; ?>
                            <?php if($property->propertyDetails->video !== NULL): ?>
                            <li data-tab="video" class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><button class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px] ease-out"><?php echo e(trans('file.video')); ?></button></li>
                            <?php endif; ?>
                            <?php if($property->propertyDetails->ivr !== NULL): ?>
                            <li data-tab="ivr" class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><button class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px] ease-out"><img style="max-width: 31px; height: auto;" src="<?php echo e(URL::asset('/frontend/images/360-degrees.png')); ?>"></button></li>
                            <?php endif; ?>
                            <?php if($property->propertyDetails->presentation !== NULL): ?>
                            <li class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><a href="<?php echo e($property->propertyDetails->propertyDetailTranslation->presentation ?? ($property->propertyDetails->propertyDetailTranslationEnglish->presentation ?? null)); ?>" class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px]">PDF</a></li>
                            <?php endif; ?>
                            <?php if($property->propertyDetails->word_link !== NULL): ?>
                            <li class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><a href="<?php echo e($property->propertyDetails->word_link ?? ($property->propertyDetails->word_link ?? null)); ?>" class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px]">Word</a></li>
                            <?php endif; ?>
                            <?php if($property->propertyDetails->drive_link !== NULL): ?>
                            <li class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><a href="<?php echo e($property->propertyDetails->drive_link ?? ($property->propertyDetails->drive_link ?? null)); ?>" class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px]">Drive Link</a></li>
                            <?php endif; ?>
                            <?php if($property->propertyDetails->prices_link !== NULL): ?>
                            <li class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><a href="<?php echo e($property->propertyDetails->prices_link ?? ($property->propertyDetails->prices_link ?? null)); ?>" class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px]">Prices</a></li>
                            <?php endif; ?>
                            <?php if($property->propertyDetails->whatsapp_link !== NULL): ?>
                            <li class="mr-[30px] md:mr-[45px] mb-4 lg:mb-0 leading-none"><a href="<?php echo e($property->propertyDetails->whatsapp_link ?? ($property->propertyDetails->whatsapp_link ?? null)); ?>" class="leading-none capitalize text-primary hover:text-secondary transition-all text-[16px]">Whatsapp</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="gallery properties-tab-content active">
                        <div class="mt-[25px] mb-[35px]">
                        <?php
                        $pic = json_decode($property->image->name);
                        ?>
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                <a href="<?php echo e(URL::asset('/images/thumbnail/' . $property->thumbnail)); ?>" class="gallery-image">
                                    <img class="object-cover rounded-[8px] w-full h-full" src="<?php echo e(URL::asset('/images/thumbnail/' . $property->thumbnail)); ?>"  alt="gallery image" loading="lazy" ">
                                </a>
                            </div>
                                <?php if($pic): ?>
                            <?php $__currentLoopData = $pic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <a href="<?php echo e(URL::asset('images/gallery/' . $p)); ?>" class="gallery-image">
                                    <img class="object-cover rounded-[8px] w-full h-full" src="<?php echo e(URL::asset('images/gallery/' . $p)); ?>"  alt="gallery image" loading="lazy" ">
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                         </div>
                    </div>
                    <?php if($property->propertyDetails->video !== NULL): ?>
                    <div class="video properties-tab-content">
                        <div class="mt-[25px] mb-[35px]">
                            <div class="relative">
                                <div data-relative-input="true">
                                    <img data-depth="0.1" src="<?php echo e(URL::asset('images/thumbnail/' . $property->thumbnail)); ?>" class="object-cover rounded-[8px] w-full h-full" width="100%" height="300px" alt="video image">
                                </div>
                                <a href="<?php echo e($property->propertyDetails->video); ?>" target="_blank" class="play-button bg-white text-white hover:text-primary absolute left-0 right-0 mx-auto top-1/2 -translate-y-1/2 hover:scale-105 hover:bg-primary w-[120px] h-[120px] flex flex-wrap z-[1] items-center justify-center opacity-100 shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] transition-all rounded-full group before:block before:absolute  before:bg-white before:opacity-80 before:shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] hover:before:bg-primary hover:before:opacity-80 before:w-[70px] before:h-[70px] before:rounded-full before:z-[-1]" aria-label="play button">
                                    <svg width="35" height="35" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="stroke-primary group-hover:stroke-white" d="M1.63861 10.764V6.70324C1.63861 1.66145 5.20893 -0.403178 9.57772 2.11772L13.1024 4.14812L16.6271 6.17853C20.9959 8.69942 20.9959 12.8287 16.6271 15.3496L13.1024 17.38L9.57772 19.4104C5.20893 21.9313 1.63861 19.8666 1.63861 14.8249V10.764Z" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                         </div>
                    </div>
                    <?php endif; ?>
                    <?php if($property->propertyDetails->ivr !== NULL): ?>
                    <div class="ivr properties-tab-content">
                        <div class="mt-[25px] mb-[35px]">
                            <div class="relative">
                                <div data-relative-input="true">
                                    <img data-depth="0.1" src="<?php echo e(URL::asset('images/thumbnail/' . $property->thumbnail)); ?>" class="w-full rounded-[8px]" width="100%" height="300px" alt="video image">
                                </div>
                                <a href="<?php echo e($property->propertyDetails->ivr); ?>" target="_blank" class="bg-white text-white hover:text-primary absolute left-0 right-0 mx-auto top-1/2 -translate-y-1/2 hover:scale-105 hover:bg-primary w-[120px] h-[120px] flex flex-wrap z-[1] items-center justify-center opacity-100 shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] transition-all rounded-full group before:block before:absolute  before:bg-white before:opacity-80 before:shadow-[0px 4px 4px rgba(0, 0, 0, 0.25)] hover:before:bg-primary hover:before:opacity-80 before:w-[70px] before:h-[70px] before:rounded-full before:z-[-1]">
                                    <img style="max-width: 70px;height: auto;" src="<?php echo e(URL::asset('/frontend/images/360-degrees.png')); ?>">
                                </a>
                            </div>
                         </div>
                    </div>
                    <?php endif; ?>
                    <div class="mt-[45px] mb-[35px]">
                        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 px-[15px] mx-[-15px] mt-[40px]">
                            <li class="flex flex-wrap items-center mb-[25px]">
                                <?php if($property->price !== ''): ?>
                                <h2 class="font-lora text-primary text-[24px] sm:text-[28px] leading-[1.277] capitalize lg font-medium"><?php echo e(trans('file.starts_from')); ?>: <span class="text-secondary"> <?php echo e(currencyConvert($property->price)); ?></span></h2>
                                <?php else: ?>
                                <h2 class="font-lora text-primary text-[24px] sm:text-[28px] leading-[1.277] capitalize lg font-medium"><?php echo e(trans('file.starts_from')); ?>: <span class="text-secondary">No Price Given</span></h2>
                                <?php endif; ?>
                            </li>
                        </ul>
                        <h3 class="font-light text-[18px] text-secondary mb-[20px]"> <?php echo e($property->country->countryTranslation->name ?? ($property->country->countryTranslationEnglish->name ?? null)); ?>, <?php echo e($property->state->stateTranslation->name ?? ($property->state->stateTranslationEnglish->name ?? null)); ?>, <?php echo e($property->city->cityTranslation->name ?? ($property->city->cityTranslationEnglish->name ?? null)); ?></h3>

                        <h5 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium"><?php echo e(trans('file.property_details')); ?><span class="text-secondary">.</span></h5>
                        <p><?php echo $property->propertyDetails->propertyDetailTranslation->content ?? ($property->propertyDetails->propertyDetailTranslationEnglish->content ?? null); ?></p>
                    </div>
                    <?php if($property->propertyDetails->first_floor_title !== NULL): ?>
                <h5 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium"><?php echo e(trans('file.available_units')); ?><span class="text-secondary">.</span></h5>
                <li class="flex flex-wrap items-center mb-[25px]">
                    <h2 class="font-lora text-primary leading-[1.277] capitalize lg font-medium"><?php echo e(trans('file.payment_options')); ?>: <span class="text-secondary"><?php if($property->propertyDetails->cash == 2): ?> <?php echo e(trans('file.cash')); ?> <?php endif; ?> <?php if($property->propertyDetails->installments == 2): ?> ,<?php echo e(trans('file.installments')); ?> <?php endif; ?> </span></h2>
                </li>
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead class="border-b">
                                        <tr>
                                            <th scope="col" class="text-base <?php echo e(App::isLocale('ar') ? 'rounded-r' : 'rounded-l'); ?> bg-primary font-medium text-white px-6 py-4 text-<?php echo e(App::isLocale('ar') ? 'right' : 'left'); ?>">
                                                <?php echo e(trans('file.type')); ?>

                                            </th>
                                            <th scope="col" class="text-base font-medium bg-primary text-white px-6 py-4 text-<?php echo e(App::isLocale('ar') ? 'right' : 'left'); ?>">
                                                <?php echo e(trans('file.min_size')); ?>

                                            </th>
                                            <th scope="col" class="text-base font-medium bg-primary text-white px-6 py-4 text-<?php echo e(App::isLocale('ar') ? 'right' : 'left'); ?>">
                                                <?php echo e(trans('file.max_size')); ?>

                                            </th>
                                            <th scope="col" class="text-base font-medium bg-primary text-white px-6 py-4 text-<?php echo e(App::isLocale('ar') ? 'right' : 'left'); ?>">
                                                <?php echo e(trans('file.min_price')); ?>

                                            </th>
                                            <th scope="col" class="text-base <?php echo e(App::isLocale('ar') ? 'rounded-l' : 'rounded-r'); ?> font-medium bg-primary text-white px-6 py-4 text-<?php echo e(App::isLocale('ar') ? 'right' : 'left'); ?>">
                                                <?php echo e(trans('file.max_price')); ?>

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($property->propertyDetails->first_floor_price !== '0.00'): ?>
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-large text-gray-900"><?php echo e($property->propertyDetails->first_floor_title); ?></td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->first_floor_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->first_floor_max_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->first_floor_price)); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->first_floor_max_price)); ?>

                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php if($property->propertyDetails->second_floor_price !== '0.00'): ?>
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900"><?php echo e($property->propertyDetails->second_floor_title); ?></td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->second_floor_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->second_floor_max_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->second_floor_price)); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->second_floor_max_price)); ?>

                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php if($property->propertyDetails->third_floor_price !== '0.00'): ?>
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900"><?php echo e($property->propertyDetails->third_floor_title); ?></td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->third_floor_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->third_floor_max_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->third_floor_price)); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->third_floor_max_price)); ?>

                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php if($property->propertyDetails->fourth_floor_price !== '0.00'): ?>
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900"><?php echo e($property->propertyDetails->fourth_floor_title); ?></td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->fourth_floor_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->fourth_floor_max_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->fourth_floor_price)); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->fourth_floor_max_price)); ?>

                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php if($property->propertyDetails->fifth_floor_price !== '0.00'): ?>
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900"><?php echo e($property->propertyDetails->fifth_floor_title); ?></td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->fifth_floor_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->fifth_floor_max_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->fifth_floor_price)); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->fifth_floor_max_price)); ?>

                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php if($property->propertyDetails->sixth_floor_price !== '0.00'): ?>
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900"><?php echo e($property->propertyDetails->sixth_floor_title); ?></td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->sixth_floor_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->sixth_floor_max_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->sixth_floor_price)); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->sixth_floor_max_price)); ?>

                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php if($property->propertyDetails->seventh_floor_price !== '0.00'): ?>
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900"><?php echo e($property->propertyDetails->seventh_floor_title); ?></td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->seventh_floor_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->seventh_floor_max_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->seventh_floor_price)); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->seventh_floor_max_price)); ?>

                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php if($property->propertyDetails->eighth_floor_price !== '0.00'): ?>
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900"><?php echo e($property->propertyDetails->eighth_floor_title); ?></td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->eighth_floor_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->eighth_floor_max_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->eighth_floor_price)); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->eighth_floor_max_price)); ?>

                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php if($property->propertyDetails->ninth_floor_price !== '0.00'): ?>
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900"><?php echo e($property->propertyDetails->ninth_floor_title); ?></td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->ninth_floor_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->ninth_floor_max_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->ninth_floor_price)); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->ninth_floor_max_price)); ?>

                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php if($property->propertyDetails->tenth_floor_price !== '0.00'): ?>
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900"><?php echo e($property->propertyDetails->tenth_floor_title); ?></td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->tenth_floor_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->tenth_floor_max_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->tenth_floor_price)); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->tenth_floor_max_price)); ?>

                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php if($property->propertyDetails->eleventh_floor_price !== '0.00'): ?>
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900"><?php echo e($property->propertyDetails->eleventh_floor_title); ?></td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->eleventh_floor_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->eleventh_floor_max_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->eleventh_floor_price)); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->eleventh_floor_max_price)); ?>

                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php if($property->propertyDetails->twelfth_floor_price !== '0.00'): ?>
                                        <tr class="border-b bg-[#E9F1FF]">
                                            <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900"><?php echo e($property->propertyDetails->twelfth_floor_title); ?></td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->twelfth_floor_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e($property->propertyDetails->twelfth_floor_max_size); ?> <?php echo e(trans('file.sq-ft')); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->twelfth_floor_price)); ?>

                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php echo e(currencyConvert($property->propertyDetails->twelfth_floor_max_price)); ?>

                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if($property->facilities->count() > 0 ): ?>
                <h4 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium"> <?php echo e(trans('file.amenities')); ?><span class="text-secondary">.</span>
                </h4>
                <?php endif; ?>

                <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 px-[15px] mx-[-15px] mt-[40px]">
                    <?php $__currentLoopData = $property->facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="flex flex-wrap items-center mb-[25px]">
                        <img class="mr-[15px]" src="<?php echo e(url('frontend/images/about/check.png')); ?>" loading="lazy" alt="icon" width="20" height="20">
                        &nbsp;<span><?php echo e($facility->facilityTranslation->name ?? ($facility->facilityTranslationEnglish->name ?? null)); ?></span>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                    <h5 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium"><?php echo e(trans('file.floor_plans')); ?><span class="text-secondary">.</span></h5>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-[30px]">
                        <?php if($property->propertyDetails->first_floor_picture !== 'default.png' && $property->propertyDetails->first_floor_picture !== ''): ?>

                        <div class="text-center">
                            <a href="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->first_floor_picture)); ?>" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->first_floor_picture)); ?>"  alt="<?php echo e($property->propertyDetails->first_floor_picture); ?>" loading="lazy">
                            </a>
                            <p><?php echo e($property->propertyDetails->first_floor_title); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if($property->propertyDetails->second_floor_picture !== 'default.png' && $property->propertyDetails->second_floor_picture !== ''): ?>
                        <div class="text-center">
                            <a href="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->second_floor_picture)); ?>" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->second_floor_picture)); ?>"  alt="<?php echo e($property->propertyDetails->second_floor_title); ?>" loading="lazy" ">
                            </a>
                            <p><?php echo e($property->propertyDetails->second_floor_title); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if($property->propertyDetails->third_floor_picture !== 'default.png' && $property->propertyDetails->third_floor_picture !== ''): ?>
                        <div class="text-center">
                            <a href="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->third_floor_picture)); ?>" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->third_floor_picture)); ?>"  alt="<?php echo e($property->propertyDetails->third_floor_title); ?>" loading="lazy" ">
                            </a>
                            <p><?php echo e($property->propertyDetails->third_floor_title); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if($property->propertyDetails->fourth_floor_picture !== 'default.png' && $property->propertyDetails->fourth_floor_picture !== ''): ?>
                        <div class="text-center">
                            <a href="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->fourth_floor_picture)); ?>" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->fourth_floor_picture)); ?>"  alt="<?php echo e($property->propertyDetails->fourth_floor_title); ?>" loading="lazy" ">
                            </a>
                            <p><?php echo e($property->propertyDetails->fourth_floor_title); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if($property->propertyDetails->fifth_floor_picture !== 'default.png' && $property->propertyDetails->fifth_floor_picture !== ''): ?>
                        <div class="text-center">
                            <a href="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->fifth_floor_picture)); ?>" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->fifth_floor_picture)); ?>"  alt="<?php echo e($property->propertyDetails->fifth_floor_title); ?>" loading="lazy" ">
                            </a>
                            <p><?php echo e($property->propertyDetails->fifth_floor_title); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if($property->propertyDetails->sixth_floor_picture !== 'default.png' && $property->propertyDetails->sixth_floor_picture !== ''): ?>
                        <div class="text-center">
                            <a href="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->sixth_floor_picture)); ?>" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->sixth_floor_picture)); ?>"  alt="<?php echo e($property->propertyDetails->sixth_floor_title); ?>" loading="lazy" ">
                            </a>
                            <p><?php echo e($property->propertyDetails->sixth_floor_title); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if($property->propertyDetails->seventh_floor_picture !== 'default.png' && $property->propertyDetails->seventh_floor_picture !== ''): ?>
                        <div class="text-center">
                            <a href="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->seventh_floor_picture)); ?>" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->seventh_floor_picture)); ?>"  alt="<?php echo e($property->propertyDetails->seventh_floor_title); ?>" loading="lazy" ">
                            </a>
                            <p><?php echo e($property->propertyDetails->seventh_floor_title); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if($property->propertyDetails->eighth_floor_picture !== 'default.png' && $property->propertyDetails->eighth_floor_picture !== ''): ?>
                        <div class="text-center">
                            <a href="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->eighth_floor_picture)); ?>" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->eighth_floor_picture)); ?>"  alt="<?php echo e($property->propertyDetails->eighth_floor_title); ?>" loading="lazy" ">
                            </a>
                            <p><?php echo e($property->propertyDetails->eighth_floor_title); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if($property->propertyDetails->ninth_floor_picture !== 'default.png' && $property->propertyDetails->ninth_floor_picture !== ''): ?>
                        <div class="text-center">
                            <a href="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->ninth_floor_picture)); ?>" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->ninth_floor_picture)); ?>"  alt="<?php echo e($property->propertyDetails->ninth_floor_title); ?>" loading="lazy" ">
                            </a>
                            <p><?php echo e($property->propertyDetails->ninth_floor_title); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if($property->propertyDetails->tenth_floor_picture !== 'default.png' && $property->propertyDetails->tenth_floor_picture !== ''): ?>
                        <div class="text-center">
                            <a href="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->tenth_floor_picture)); ?>" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->tenth_floor_picture)); ?>"  alt="<?php echo e($property->propertyDetails->tenth_floor_title); ?>" loading="lazy" ">
                            </a>
                            <p><?php echo e($property->propertyDetails->tenth_floor_title); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if($property->propertyDetails->eleventh_floor_picture !== 'default.png' && $property->propertyDetails->eleventh_floor_picture !== ''): ?>
                        <div class="text-center">
                            <a href="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->eleventh_floor_picture)); ?>" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->eleventh_floor_picture)); ?>"  alt="<?php echo e($property->propertyDetails->eleventh_floor_title); ?>" loading="lazy" ">
                            </a>
                            <p><?php echo e($property->propertyDetails->eleventh_floor_title); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if($property->propertyDetails->twelfth_floor_picture !== 'default.png' && $property->propertyDetails->twelfth_floor_picture !== ''): ?>
                        <div class="text-center">
                            <a href="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->twelfth_floor_picture)); ?>" class="floor-image">
                                <img class="object-cover rounded-[8px] w-full h-full" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->twelfth_floor_picture)); ?>"  alt="<?php echo e($property->propertyDetails->twelfth_floor_title); ?>" loading="lazy" ">
                            </a>
                            <p><?php echo e($property->propertyDetails->twelfth_floor_title); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>

</div>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script type="text/javascript">
        $('#SubmitFormAgent').on('submit', function(e) {
            e.preventDefault();

            let id = $('#Id').val();
            let name = $('#Name').val();
            let email = $('#Email').val();
            let phone = $('#Phone').val();
            let message = $('#send-message').val();

            $.ajax({
                url: "<?php echo e(route('messages.store')); ?>",
                type: "POST",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    id: id,
                    name: name,
                    email: email,
                    phone: phone,
                    message: message,
                },
                success: function(response) {
                    // $('#successMsg').show();
                    // alert(response.errors);
                    let html = '';
                    if (response.errors) {
                        html = '<div class="alert alert-danger">';
                        for (let count = 0; count < response.errors.length; count++) {
                            html += '<p>' + response.errors[count] + '</p>';
                        }
                        html += '</div>';
                        $('#alert_message').fadeIn("slow");
                        $('#alert_message').html(html);
                        setTimeout(function() {
                            $('#alert_message').fadeOut("slow");
                        }, 3000);
                    } else if (response.success) {
                        // alert('submitted');
                        $('#InputName').val("");
                        $('#InputEmail').val("");
                        $('#InputPhone').val("");
                        $('#message').val("");

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Message Sent!',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        console.log(response);
                    }

                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.ivr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/frontend/project.blade.php ENDPATH**/ ?>