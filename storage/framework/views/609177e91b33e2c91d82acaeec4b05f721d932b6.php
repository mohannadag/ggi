<?php $__env->startSection('title'); ?>
GGI Turkey Blog
<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta'); ?>
All recent news and updates about your real
<?php $__env->stopSection(); ?>
<?php $__env->startSection('image'); ?>
https://ggiturkey.com/frontend/frontend/img/brands/logo.webp
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.includes.header1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Hero section start -->
<section class="bg-no-repeat bg-center bg-cover bg-[#FFF6F0] h-[350px] lg:h-[513px] flex flex-wrap items-center relative before:absolute before:inset-0 before:content-[''] before:bg-[#000000] before:opacity-[70%]" style="background-image: url('<?php echo e(asset('frontend/images/breadcrumb/bg-1.png')); ?>');">
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="text-center text-white relative z-10">
                    <div class="mb-5"><span class="text-base block"><?php echo e(trans('file.news')); ?></span></div>
                    <h1 class="font-lora text-[32px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl font-medium">
                    </h1>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero section end -->
<div class="ps-page ps-page--blog">
    <div class="ps-page__header">
        <div class="container">
            <h1 class="ps-page__heading" style="<?php echo e((App::isLocale('ar') ? 'text-align: right' : 'text-align: left')); ?>"> <?php echo e($popularTopic->blogCategoryTranslation->name ?? $popularTopic->blogCategoryTranslationEnglish->name  ?? null); ?></h1>
        </div>
    </div>

    <!-- Popular Properties start -->
    <section class="popular-properties py-[80px] lg:py-[120px]">
        <div class="container">

            <div class="grid grid-cols-12 mb-[-30px] gap-[30px] xl:gap-[50px]">
                <div class="col-span-12 md:col-span-6 lg:col-span-8 mb-[30px]">

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 gap-x-[30px] gap-y-[40px]">
                        <?php $__currentLoopData = $newses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $createdAt = \Carbon\Carbon::parse($news->created_at);
                        ?>
                        <div class="post-item">
                            <a href="<?php echo e(route('news.show', $news)); ?>" class="block overflow-hidden rounded-[6px] mb-[35px]">
                                <img class="w-full h-full" src="<?php echo e(URL::asset('images/thumbnail/'.$news->image)); ?>" width="370" height="270" loading="lazy" alt="<?php echo e($news->blogTranslation->title ?? $news->blogTranslationEnglish->title  ?? null); ?>">
                            </a>
                            <div>
                                <span class="block leading-none font-normal text-[14px] text-secondary mb-[10px]"><?php echo e($news->user->f_name); ?> on <?php echo e($createdAt->toFormattedDateString()); ?></span>
                                <h3><a href="<?php echo e(route('news.show', $news)); ?>" class="font-lora text-[22px] xl:text-[24px] leading-[1.285] text-primary block mb-[10px] hover:text-secondary transition-all font-medium"><?php echo e($news->blogTranslation->title ?? $news->blogTranslationEnglish->title  ?? null); ?></a></h3>
                                <p class="font-light text-[#494949] text-[16px] leading-[1.75]"><?php echo substr($news->blogTranslation->body ?? ($news->blogTranslationEnglish->body ?? null),0,150 ); ?>..</p>
                            </div>
                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <?php echo e($newses->links('vendor.pagination.custom')); ?>

                </div>

            </div>

        </div>
    </section>
    <!-- Popular Properties end -->

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/frontend/tags.blade.php ENDPATH**/ ?>