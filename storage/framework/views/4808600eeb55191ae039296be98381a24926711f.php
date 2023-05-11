<style>
    .price-slider {
      margin-bottom: 15px;
      font-size: 16px;
    }
    .price-slider-input {
      width: 80px;
      margin-top: 10px;
      font-size: 13px;
    }
    </style>
<section class="hero-section bg-white">
    <div class="hero-slider2 overflow-hidden">
        <div class="swiper">
            <div class="swiper-wrapper">
                <!-- swiper-slide start -->
                <?php $__currentLoopData = $sliders->sortBy('order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide bg-cover bg-center bg-sky-100 z-[1] relative before:absolute before:w-full before:h-full before:inset-0 before:content-[''] before:z-[-1] py-[80px] lg:py-[200px]" style="background-image: url('<?php echo e(URL::asset('/images/images/'.$slider->sliderTranslation->file)); ?>')">
                    <div class="container">
                        <div class="grid grid-cols-12">
                            <div class="col-span-12">
                                <div class="slider-content">
                                    <div class="relative mb-5 sub_title">
                                        <span class="text-base text-white block mt-[80px] mb-[150px]"><?php echo $slider->sliderTranslation->name; ?></span>
                                    </div>
                                    <h1 class="font-lora text-white text-[36px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl title">
                                        <span><?php echo $slider->sliderTranslation->description; ?></span>
                                    </h1>

                                    <p class="text-base text-white mt-8 mb-12 text max-w-[570px]">
                                        <?php echo $slider->sliderTranslation->address; ?>

                                    </p>
                                    

                                </div>
                            </div>


                            <div class="col-span-12 xl:col-span-10">
                                
                                <?php if($slider->link == 'NULL' || $slider->link == ''): ?>
                                <?php else: ?>
                                <div class="inline-block hero_btn">
                                <a href="<?php echo e($slider->link); ?>" class="before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:-z-[1] before:bg-white before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto hover:text-primary before:transition-all leading-none px-[20px] py-[15px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:-z-[2] after:bg-secondary after:rounded-md after:transition-all block" style="z-index:1;"><?php echo e($slider->button_text); ?></a>
                                </div>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- swiper-slide end-->


            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination home-pagination-six hidden lg:flex flex-wrap flex-col items-end"></div>
        </div>
    </div>
</section>

<section class="mobile-section bg-white">
    <div class="hero-slider2 overflow-hidden">
        <div class="swiper">
            <div class="swiper-wrapper">
                <!-- swiper-slide start -->
                <?php $__currentLoopData = $sliders->sortBy('order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide bg-cover bg-center bg-sky-100 z-[1] relative before:absolute before:w-full before:h-full before:inset-0 before:content-[''] before:z-[-1] py-[80px] lg:py-[200px]" style="background-image: url('<?php echo e(URL::asset('/images/images/'.$slider->sliderTranslation->mobile_file)); ?>')">
                    <div class="container">
                        <div class="grid grid-cols-12">
                            <div class="col-span-12">
                                <div class="slider-content">
                                    <div class="relative mb-5 sub_title">
                                        <span class="text-base text-white block mt-[80px] mb-[150px]"><?php echo $slider->sliderTranslation->name; ?></span>
                                    </div>
                                    <h1 class="font-lora text-white text-[36px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl title">
                                        <span><?php echo $slider->sliderTranslation->description; ?></span>
                                    </h1>

                                    <p class="text-base text-white mt-8 mb-12 text max-w-[570px]">
                                        <?php echo $slider->sliderTranslation->address; ?>

                                    </p>
                                    

                                </div>
                            </div>


                            <div class="col-span-12 xl:col-span-10">
                                
                                <?php if($slider->link == 'NULL' || $slider->link == ''): ?>
                                <?php else: ?>
                                <div class="inline-block hero_btn">
                                <a href="<?php echo e($slider->link); ?>" class="before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:-z-[1] before:bg-white before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto hover:text-primary before:transition-all leading-none px-[20px] py-[15px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:-z-[2] after:bg-secondary after:rounded-md after:transition-all block" style="z-index:1;"><?php echo e($slider->button_text); ?></a>
                                </div>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- swiper-slide end-->


            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination home-pagination-six hidden lg:flex flex-wrap flex-col items-end"></div>
        </div>
    </div>
</section>

<!-- Addvanced search tab start -->
<div class="mt-[-45px] lg:mt-[-70px] xl:mt-[-70px] relative z-[2] pl-[40px] lg:pl-[50px] xl:pl-[0px]">
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12 relative">
                <button class="tab-toggle-btn px-[10px] py-[15px] absolute bottom-[-56px] left-[-45px] border-l border-t border-b border-solid border-[#016450] bg-white text-primary border-opacity-25 rounded-tl-[10px] rounded-bl-[10px]" aria-label="svg icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 22V11" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M19 7V2" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 22V17" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 13V2" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M5 22V11" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M5 7V2" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3 11H7" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M17 11H21" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10 13H14" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="col-span-12 selectricc-border-none">
                <div class="tab-content bg-white border border-solid border-[#016450] border-opacity-25 rounded-bl-[15px] rounded-br-[15px] rounded-tr-[15px] px-[15px] sm:px-[30px] py-[40px] active">
                    <form action="<?php echo e(route('search.property')); ?>" method="GET">
                        <?php echo csrf_field(); ?>
                        <div class="advanced-searrch flex flex-wrap items-center -mb-[45px]">
                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px]">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="<?php echo e(asset('frontend/images/icon/location.svg')); ?>" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="state" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1"><?php echo e(trans('file.select_state')); ?></label>
                                    <select name="state" id="state" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option value=""><?php echo e(trans('file.select')); ?></option>
                                        <?php $__currentLoopData = $states->where('status', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($state->id); ?>">
                                                <?php echo e($state->stateTranslation->name ?? ($state->stateTranslationEnglish->name ?? null)); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px]">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="<?php echo e(asset('frontend/images/icon/location.svg')); ?>" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="city_id" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1"><?php echo e(trans('file.select_city')); ?></label>
                                    <select name="city_id" id="city_id" class="select nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer ">
                                        <option value=""><?php echo e(trans('file.select')); ?></option>
                                        <?php $__currentLoopData = $city->where('status',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($city->id); ?>">
                                                <?php echo e($city->cityTranslation->name ?? ($city->cityTranslationEnglish->name ?? null)); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div id="cityList">
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px]">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="<?php echo e(asset('frontend/images/icon/property.svg')); ?>" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="property" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1"><?php echo e(trans('file.property_type')); ?></label>
                                    <select id="category_id" name="category_id" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option value=""><?php echo e(trans('file.select')); ?></option>
                                        <?php $__currentLoopData = $categories->where('status', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>">
                                                <?php echo e($category->categoryTranslation->name ?? ($category->categoryTranslationEnglish->name ?? null)); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] relative">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="<?php echo e(asset('frontend/images/icon/dollar-circle.svg')); ?>" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="price" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1"><?php echo e(trans('file.price_range')); ?></label>
                                    <div class="price-slider">
                                        <div class="price-slider" id="price-slider"></div>
                                        <input id="minPrice" name="minPrice" class="price-slider-input font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)]" type="number">
                                        <input id="maxPrice" name="maxPrice" class="price-slider-input font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)]" type="number">
                                    </div>
                                </div>

                                <button class="search-btn absolute  <?php echo e(App::isLocale('ar') ? 'right-225 lg:right-[245px] xl:right-[245px]' : 'right-0 lg:right-[-60px] xl:right-[-70px]'); ?>">
                                    <img src="<?php echo e(asset('frontend/images/icon/search-outline.svg')); ?>" class="max-w-[30px] xl:w-auto" width="40" height="40" alt="svg icon">
                                    <span class="hidden"><?php echo e(trans('file.search')); ?></span>
                                </button>
                            </div>

                        </div>


                        <div class="advanced-searrch-hidden flex flex-wrap items-center mt-[45px] -mb-[45px]">
                            <div id="bedroom" class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] search-list">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="<?php echo e(asset('frontend/images/icon/location.svg')); ?>" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="bed" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1"><?php echo e(trans('file.bedrooms')); ?></label>
                                    <select name="bed" id="bed" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option value=""><?php echo e(trans('file.select')); ?></option>
                                        <option value="[1]" >0+1</option>
                                        <option value="[2]" >1+1</option>
                                        <option value="[3]" >1+2</option>
                                        <option value="[4]" >1+3</option>
                                        <option value="[5]" >1+4</option>
                                        <option value="[6]" >1+5</option>
                                        <option value="[7]" >1+6</option>
                                        <option value="[8]" >1+7</option>
                                        <option value="[9]" >1+8</option>
                                    </select>
                                </div>
                            </div>

                            <div id="bathroom" class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] search-list">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="<?php echo e(asset('frontend/images/icon/property.svg')); ?>" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="bath" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1"><?php echo e(trans('file.bath')); ?></label>
                                    <select name="bath" id="bath" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option value=""><?php echo e(trans('file.select')); ?></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                            </div>

                            <div id="garage" class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] search-list">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="<?php echo e(asset('frontend/images/icon/dollar-circle.svg')); ?>" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="garage" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1"><?php echo e(trans('file.garage')); ?></label>
                                    <select name="garage" id="garage" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option value=""><?php echo e(trans('file.select')); ?></option>
                                        <option value="1">1 <?php echo e(trans('file.garage')); ?></option>
                                        <option value="2">2 <?php echo e(trans('file.garage')); ?></option>
                                        <option value="3">3 <?php echo e(trans('file.garage')); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] search-list">
                                <button class="search-properties-btn">
                                    Search Properties
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="rent" class="tab-content bg-white border border-solid border-[#016450] border-opacity-25 rounded-bl-[15px] rounded-br-[15px] rounded-tr-[15px] px-[15px] sm:px-[30px] py-[40px]">
                    <form action="<?php echo e(route('search.rent')); ?>" method="GET">
                        <?php echo csrf_field(); ?>
                        <div class="advanced-searrch flex flex-wrap items-center -mb-[45px]">
                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px]">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="<?php echo e(asset('frontend/images/icon/location.svg')); ?>" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="location7" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Location</label>
                                    <input name="title" id="city_name" type="text" placeholder="Choose location" class="text-tiny placeholder:text-body leading-none font-light pr-3 focus:outline-none w-full">
                                </div>
                                <div id="cityList">
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px]">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="<?php echo e(asset('frontend/images/icon/property.svg')); ?>" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="property8" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Property Type</label>
                                    <select name="property" id="property8" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option value=""><?php echo e(trans('file.property_type')); ?></option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>">
                                                        <?php echo e($category->categoryTranslation->name ?? ($category->categoryTranslationEnglish->name ?? null)); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px]">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="<?php echo e(asset('frontend/images/icon/dollar-circle.svg')); ?>" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="price7" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Price Range</label>
                                    <select name="price" id="price7" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option selected value="0">1500 USD</option>
                                        <option value="1">1600 USD</option>
                                        <option value="2">1700 USD</option>
                                        <option value="3">1800 USD</option>
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] relative">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="<?php echo e(asset('frontend/images/icon/area.svg')); ?>" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="property-size9" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Property Size</label>
                                    <select name="property-size" id="property-size9" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option selected value="0">2500 Sqft</option>
                                        <option value="1">2600 Sqft</option>
                                        <option value="2">2700 Sqft</option>
                                        <option value="3">2800 Sqft</option>
                                    </select>
                                </div>
                                <button class="search-btn absolute right-0 lg:right-[-60px] xl:right-[-70px]">
                                    <img src="<?php echo e(asset('frontend/images/icon/search-outline.svg')); ?>" class="max-w-[30px] xl:w-auto" width="40" height="40" alt="svg icon">
                                    <span class="hidden">Search Properties</span>
                                </button>
                            </div>
                        </div>


                        <div class="advanced-searrch-hidden flex flex-wrap items-center mt-[45px] -mb-[45px]">
                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] search-list">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="<?php echo e(asset('frontend/images/icon/location.svg')); ?>" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="bedrooms6" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Bedrooms</label>
                                    <select name="property" id="bedrooms6" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option selected value="0">Bedrooms</option>
                                        <option value="1">kitchen</option>
                                        <option value="2">dinning rooms</option>
                                        <option value="3">Duplex House 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] search-list">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="<?php echo e(asset('frontend/images/icon/property.svg')); ?>" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="property7" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Bathrooms</label>
                                    <select name="property" id="property7" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option selected value="0">Duplex House</option>
                                        <option value="1">Duplex House 1</option>
                                        <option value="2">Duplex House 2</option>
                                        <option value="3">Duplex House 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] search-list">
                                <div class="mr-4 self-start shrink-0">
                                    <img src="<?php echo e(asset('frontend/images/icon/dollar-circle.svg')); ?>" width="24" height="24" alt="svg icon">
                                </div>
                                <div class="flex-1">
                                    <label for="garage20" class="font-lora block capitalize text-primary text-[17px] xl:text-[24px] leading-none mb-1">Garage</label>
                                    <select name="garage" id="garage20" class="nice-select appearance-none bg-transparent text-tiny font-light cursor-pointer">
                                        <option selected value="0">2 Garage</option>
                                        <option value="1">2 Garage</option>
                                        <option value="2">3 Garage</option>
                                        <option value="3">4 Garage</option>
                                    </select>
                                </div>
                            </div>

                            <div class="advanced-searrch-list flex items-center lg:border-r lg:border-[#D6D4D4] lg:mr-[40px] xl:mr-[50px] last:mr-0 last:border-r-0 mb-[45px] search-list">
                                <button class="search-properties-btn">Search Properties </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Addvanced search tab end -->
<?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/frontend/includes/hero.blade.php ENDPATH**/ ?>