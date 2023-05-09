
 <!-- Blog Section Start  -->
 <section class="blog-section relative pb-[60px] md:pb-[80px] lg:pb-[120px]">
    <div class="container">
        <div class="">
            <div class="">
                <div class="mb-[60px] text-center">
                    <span class="text-secondary text-tiny inline-block mb-2"><?php echo e(trans('file.news')); ?></span>
                    <h2 class="font-lora text-primary text-[24px] sm:text-[30px] xl:text-xl capitalize font-medium"><?php echo e(trans('file.news_and_updates')); ?><span class="text-secondary">.</span></h2>
                </div>
            </div>
            <div class="">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-x-[30px] mb-[-30px]">
                    <?php $__currentLoopData = $newses->shuffle()->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $createdAt = \Carbon\Carbon::parse($news->created_at);
                    ?>
                    <div class="mb-[30px]">
                        <a href="<?php echo e(route('news.show', $news)); ?>" class="block overflow-hidden rounded-[6px] mb-[30px]">
                            <img class="w-full h-full" src="<?php echo e(URL::asset('images/thumbnail/'.$news->image)); ?>" width="370" height="270" loading="lazy" alt="<?php echo e($news->blogTranslation->title ?? $news->blogTranslationEnglish->title  ?? null); ?>">
                        </a>
                        <div>
                            <span class="block leading-none font-normal text-[14px] text-secondary mb-[10px] relative before:absolute before:left-0 before:top-1/2 -translate-y-1/2"><?php echo e($news->user->f_name); ?> <?php echo e($news->user->l_name); ?>,  <?php echo e($createdAt->format('l jS \o\f F Y')); ?></span>
                            <h3><a href="<?php echo e(route('news.show', $news)); ?>" class="font-lora text-[22px] xl:text-[24px] leading-[1.285] text-primary block mb-[10px] hover:text-secondary transition-all font-medium"><?php echo e($news->blogTranslation->title ?? $news->blogTranslationEnglish->title  ?? null); ?></a></h3>
                            <p class="font-light text-[#494949] text-[16px] leading-[1.75]"> </p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End  -->
<?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/frontend/includes/news.blade.php ENDPATH**/ ?>