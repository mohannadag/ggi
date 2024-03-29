<?php $__env->startSection('title'); ?> GGI Turkey Blog
<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta'); ?> All recent news and updates about your real
<?php $__env->stopSection(); ?>
<?php $__env->startSection('image'); ?>
    https://ggiturkey.com/frontend/frontend/img/brands/logo.webp
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.includes.header1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <!-- Hero section start -->
        <section class="bg-no-repeat bg-center bg-cover bg-[#FFF6F0] h-[350px] lg:h-[513px] flex flex-wrap items-center relative before:absolute before:inset-0 before:content-['']" style="background-image: url('<?php echo e(asset('frontend/images/breadcrumb/blog.jpg')); ?>');">
            <div class="container">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="text-center text-primary relative">
                            <div class="mb-5"><span class="text-base block"><?php echo e(trans('file.news')); ?></span></div>
                            <h1 class="font-lora text-[32px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl font-medium">
                                <?php echo e(trans('file.latest_posts')); ?>

                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero section end -->

        <!-- Popular Properties start -->
        <section class="popular-properties py-[80px] lg:py-[120px]">
            <div class="container">

                <div class="grid grid-cols-12 mb-[-30px] gap-[30px] xl:gap-[50px]">
                    <div class="col-span-12 md:col-span-6 lg:col-span-8 mb-[30px] get-blog">

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

                    <div class="col-span-12 md:col-span-6 lg:col-span-4 mb-[30px]">
                        <aside class="mb-[-40px]">
                            <div class="mb-[40px]">
                                <h3 class="text-primary leading-none text-[24px] font-lora underline mb-[30px] font-medium"><?php echo e(trans('file.search')); ?><span class="text-secondary">.</span></h3>
                                <form class="relative blog-search">
                                    <input id="search-blog" class="form-control font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] pr-[45px] pl-[20px] py-[10px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] bg-white" type="text" placeholder="<?php echo e(trans('file.keyword')); ?>...">
                                    <button class="absolute top-1/2 -translate-y-1/2 z-[1] right-[20px]">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.19559 0C8.06048 0 10.3913 2.33078 10.3913 5.19568C10.3913 6.18406 10.1138 7.10865 9.63257 7.89615C12.3593 10.0392 12.6608 10.3403 12.7621 10.442L13.5201 11.2C14.16 11.8398 14.16 12.8807 13.5201 13.5202C13.2004 13.8399 12.78 14 12.36 14C11.94 14 11.5196 13.8399 11.1999 13.5202L10.4419 12.7622C10.341 12.6612 10.0391 12.3594 7.90845 9.625C7.1184 10.1106 6.18908 10.3914 5.19559 10.3914C4.41501 10.3914 3.66434 10.2222 2.96434 9.88896C2.69163 9.75917 2.57569 9.4325 2.70585 9.15979C2.83564 8.88708 3.16231 8.77114 3.43465 8.9013C3.98663 9.16417 4.57908 9.2976 5.19559 9.2976C7.45746 9.2976 9.29751 7.45755 9.29751 5.19568C9.29751 2.9338 7.4571 1.09375 5.19559 1.09375C2.93408 1.09375 1.09366 2.9338 1.09366 5.19568C1.09366 5.93651 1.29309 6.6624 1.67043 7.29458C1.82538 7.5538 1.74043 7.88958 1.48121 8.04453C1.22163 8.19948 0.886212 8.11453 0.731265 7.85531C0.252932 7.05359 -8.96454e-05 6.13411 -8.96454e-05 5.19604C-8.96454e-05 2.33078 2.33069 0 5.19559 0ZM11.2152 11.989L11.9728 12.7469C12.1861 12.9602 12.5332 12.9602 12.7465 12.7469C12.9598 12.5336 12.9598 12.1869 12.7465 11.9736L11.9885 11.2157C11.8532 11.0801 11.2765 10.5798 8.96757 8.76495C8.90522 8.83094 8.84106 8.89547 8.77507 8.95818C10.5845 11.2795 11.0811 11.8544 11.2152 11.989ZM2.43496 3.99911C2.31465 4.2762 2.44189 4.59812 2.71897 4.71844C2.7897 4.74906 2.86371 4.76401 2.93626 4.76401C3.14736 4.76401 3.34861 4.64078 3.4383 4.43479C3.74236 3.73406 4.43215 3.28125 5.19559 3.28125C5.49783 3.28125 5.74246 3.03661 5.74246 2.73438C5.74246 2.43214 5.49783 2.1875 5.19559 2.1875C3.99611 2.1875 2.91257 2.8988 2.43496 3.99911Z" fill="#0b2c3d" />
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            <div class="mb-[40px] flex flex-col">
                                <h3 class="text-primary leading-none text-[24px] font-lora underline mb-[30px] font-medium"><?php echo e(trans('file.categories')); ?><span class="text-secondary">.</span></h3>
                                <div class="block mb-[-25px]">
                                    <?php $__currentLoopData = $popularTopics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popularTopic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('news.popular-topic',$popularTopic->name)); ?>" class="font-light leading-[1.75] border border-primary border-opacity-60 rounded-[8px] pr-[20px] pl-[20px] py-[10px] hover:border-[#FD6400] hover:border-opacity-60  hover:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] bg-white flex flex-wrap items-center justify-between mb-[25px]"><span><?php echo e($popularTopic->blogCategoryTranslation->name ?? $popularTopic->blogCategoryTranslationEnglish->name  ?? null); ?></span> <span><?php echo e($popularTopic->blogs->count()); ?></span></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <div class="mb-[40px]">
                                <h3 class="text-primary leading-none text-[24px] font-lora underline mb-[30px] font-medium"><?php echo e(trans('file.latest_posts')); ?><span class="text-secondary">.</span></h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-x-[30px] md:gap-x-[0px] relative">
                                    <?php $__currentLoopData = $newses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentlyAddedPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                        $createdAt = \Carbon\Carbon::parse($news->created_at);
                                    ?>
                                    <div class="flex items-center mb-[20px]">
                                        <div class="relative w-[127px]">
                                            <a href="<?php echo e(route('news.show',$recentlyAddedPost)); ?>" class="block w-full">
                                                <img src="<?php echo e(URL::asset('/images/thumbnail/'.$recentlyAddedPost->image)); ?>" class="w-full" alt="<?php echo e($recentlyAddedPost->blogTranslation->title ?? $recentlyAddedPost->blogTranslationEnglish->title  ?? 'title'); ?>">
                                            </a>
                                        </div>

                                        <div class="text-<?php echo e(App::isLocale('ar') ? 'right mr-1' : 'left'); ?> w-[calc(100%-151px)] ml-6">
                                            <span class="block leading-none font-light text-[12px] text-secondary mb-[8px]"><?php echo e($createdAt->toFormattedDateString()); ?></span>
                                            <h3>
                                                <a href="<?php echo e(route('news.show',$recentlyAddedPost)); ?>" class="font-lora text-[16px] leading-[1.285] text-primary hover:text-secondary transition-all"><?php echo e($recentlyAddedPost->blogTranslation->title ?? $recentlyAddedPost->blogTranslationEnglish->title  ?? 'title'); ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>


                            
                        </aside>
                    </div>
                </div>

            </div>
        </section>
        <!-- Popular Properties end -->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
    $('#search-blog').on('keyup', function() {
        var search = $(this).val();
        //        alert(search);
        $.ajax({
            method: 'post',
            url: '<?php echo e(route('search.blogs')); ?>',
            data: {
                search: search,
                "_token": "<?php echo e(csrf_token()); ?>"
            },
            dataType: 'html',
            success: function(response) {
                $('.get-blog').html(response);
            }
        });
    });

    // Add remove loading class on body element based on Ajax request status
    $(document).on({
        ajaxStart: function() {
            $("body").addClass("loading");
        },
        ajaxStop: function() {
            $("body").removeClass("loading");
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/frontend/news.blade.php ENDPATH**/ ?>