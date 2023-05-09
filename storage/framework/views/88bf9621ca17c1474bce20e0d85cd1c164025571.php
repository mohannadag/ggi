<!-- Team Section Etart-->



  <section class="team-section pb-[80px] lg:pb-[125px] overflow-hidden">
            <div class="container">
                <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-x-5 md:gap-x-[30px] mb-[-30px]">
                    <div class="xl:pr-[20px] self-center mb-[30px] sm:col-span-3 lg:col-span-1 max-w-[500px]">
                        <span class="text-secondary text-tiny capitalize inline-block mb-[15px]"><?php echo e(trans('file.agents')); ?></span>
                        <h2 class="font-lora text-primary text-[24px] sm:text-[30px] leading-[1.277] xl:text-xl capitalize mb-[15px] font-medium">
                        <?php echo e(trans('file.experts')); ?><span class="text-secondary">.</span></h2>

                        <!-- <p>Huge number propreties availabe
                            here for buy, sell and Rent, you a
                            find here co-living property lots
                            to choose here and enjoy huge. </p> -->
                        <a href="<?php echo e(url('/agents')); ?>" class="flex flex-wrap items-center text-secondary text-tiny mt-[20px]"><?php echo e(trans('file.view_agents')); ?>

                            <svg class="ml-[10px]" width="26" height="11" viewBox="0 0 26 11" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.0877 0.69303L24.2075 5.00849H0V5.99151H24.2075L20.0877 10.307L20.7493 11L26 5.5L20.7493 0L20.0877 0.69303Z" fill="currentColor"></path>
                            </svg>
                        </a>

                    </div>
                    <!-- single team start -->
                    <?php $__currentLoopData = $agents->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="text-center group mb-[30px]">
                        <div class="relative rounded-[6px_6px_0px_0px]">
                        <a href="<?php echo e(url('/agents/'.$agent->id)); ?>">
                        <img src="<?php echo $agent->photo(); ?>" class="w-auto h-auto block mx-auto" loading="lazy" width="215" height="310" alt="<?php echo e($agent->f_name); ?> <?php echo e($agent->l_name); ?>">
                    </a>
                    <ul class="flex flex-col absolute w-full top-[30px] left-0 overflow-hidden">
                        <li class="translate-x-[0px] group-hover:translate-x-[30px] opacity-0 group-hover:opacity-100 transition-all duration-300 mb-[15px]">
                            <a href="tel:<?php echo e(str_replace(' ','',$agent->mobile)); ?>" aria-label="svg" class="w-[26px] h-[26px] transition-all rounded-full bg-[#FFF6F0] flex items-center justify-center hover:drop-shadow-[0px_4px_10px_rgba(0,0,0,0.25)] text-[#494949] hover:text-[#3B5998]">
                                <img width="16px" src="<?php echo e(asset('/images/phone.png')); ?>">
                            </a>
                        </li>
                        <li class="translate-x-[0px] group-hover:translate-x-[30px] opacity-0 group-hover:opacity-100 transition-all duration-500 mb-[15px]">
                            <a href="mailto:<?php echo e($agent->email); ?>" aria-label="svg" class="w-[26px] h-[26px] transition-all rounded-full bg-[#FFF6F0] flex items-center justify-center hover:drop-shadow-[0px_4px_10px_rgba(0,0,0,0.25)] text-[#494949] hover:text-[#3B5998]">
                                <img width="16px" src="<?php echo e(asset('/images/email.png')); ?>">
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bg-[#FFFDFC] z-[1] drop-shadow-[0px_2px_15px_rgba(0,0,0,0.1)] rounded-[0px_0px_6px_6px] px-3 md:px-[15px] py-[20px] border-b-[6px] border-primary transition-all duration-500 before:transition-all before:duration-300 group-hover:border-secondary relative">
                    <h3><a href="<?php echo e(url('/agents/'.$agent->id)); ?>" class="font-lora font-normal text-base text-primary group-hover:text-secondary"><?php echo e($agent->f_name); ?> <?php echo e($agent->l_name); ?></a></h3>
                    <p class="font-normal text-[14px] leading-none capitalize mt-[5px] group-hover:text-body"><?php echo e($agent->title); ?></p>
                </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- single team end-->
                </div>
            </div>
        </section>

<?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/frontend/includes/agents.blade.php ENDPATH**/ ?>