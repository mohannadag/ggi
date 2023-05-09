<?php $__env->startSection('content'); ?>
    <!--error  start-->
    <div class="ps-page--404">
        <div class="container">
            <div class="ps-block--404">
                <div class="ps-block__image"><img src="<?php echo e(asset('frontend/img/404.png')); ?>" alt=""></div>
                <div class="ps-block__content">
                    <h3><?php echo $__env->yieldContent('code'); ?> | <?php echo $__env->yieldContent('message'); ?></h3>
                    <p>Sorry, it seems we were unable to fetch what you are looking for!</p><a class="ps-btn" href="/">Back To Hompage</a>
                </div>
            </div>
        </div>
    </div>
    <!--error ends-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/errors/minimal.blade.php ENDPATH**/ ?>