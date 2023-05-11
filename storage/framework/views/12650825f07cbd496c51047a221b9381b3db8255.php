<?php

$languages = \Illuminate\Support\Facades\DB::table('languages')

->select('id', 'name', 'locale')

// ->where('default','=',0)

->where('locale', '!=', \Illuminate\Support\Facades\Session::get('currentLocal'))

->orderBy('name', 'ASC')

->get();

\Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

?>

<style>

.swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      font-size: 18px;
      height: auto;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      padding: 30px;
    }
  </style>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.citizenship.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.citizenship.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('frontend.citizenship.intro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.citizenship.featured', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.citizenship.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>







<!-- contact form start -->
<section class="py-[80px] lg:py-[120px]">
    <div class="container">
        <div class="grid col-span-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-[30px] mb-[-30px]">

            <div class="flex hover:drop-shadow-[0px_16px_10px_rgba(0,0,0,0.1)] hover:bg-[#F5F9F8] transition-all p-[20px] xl:p-[35px] rounded-[8px] mb-[30px] group">
                <img class="self-center mr-[20px] sm:mr-[40px] lg:mr-[20px] xl:mr-[40px] sm:mb-[15px] lg:mb-0" src="<?php echo e(asset('frontend/images/icon/map.png')); ?>" width="40" height="55" loading="lazy" alt="image icon">
                <div class="flex-1">
                    <h4 class="font-lora group-hover:text-secondary group-hover:transition-all leading-none text-[28px] text-primary mb-[10px]">
                        <?php echo e(trans('file.our_address')); ?> <span class="text-secondary">.</span>
                    </h4>
                    <p class="font-light text-[18px] lg:max-w-[230px]"><?php echo e(isset($siteInfo->address) ? $siteInfo->address : 'address'); ?></p>
                </div>
            </div>

            <div class="flex hover:drop-shadow-[0px_16px_10px_rgba(0,0,0,0.1)] hover:bg-[#F5F9F8] transition-all p-[20px] xl:p-[35px] rounded-[8px] mb-[30px] group">
                <img class="self-center mr-[20px] sm:mr-[40px] lg:mr-[20px] xl:mr-[40px] sm:mb-[15px] lg:mb-0" src="<?php echo e(asset('frontend/images/icon/phone.png')); ?>" width="46" height="46" loading="lazy" alt="image icon">
                <div class="flex-1">
                    <h4 class="font-lora group-hover:text-secondary group-hover:transition-all leading-none text-[28px] text-primary mb-[10px]">
                        <?php echo e(trans('file.contact_us')); ?><span class="text-secondary">.</span>
                    </h4>
                    <p class="font-light text-[18px] lg:max-w-[230px]"><a href="tel:+9012345678">+9012345678</a></p>
                    <p class="font-light text-[18px] lg:max-w-[230px]"><a href="tel:+9012345678">+9012345678</a></p>
                </div>
            </div>

            <div class="flex hover:drop-shadow-[0px_16px_10px_rgba(0,0,0,0.1)] hover:bg-[#F5F9F8] transition-all p-[20px] xl:p-[35px] rounded-[8px] mb-[30px] xl:pl-[65px] group">
                <img class="self-center mr-[20px] sm:mr-[40px] lg:mr-[20px] xl:mr-[40px] sm:mb-[15px] lg:mb-0" src="<?php echo e(asset('frontend/images/icon/mail.png')); ?>" width="46" height="52" loading="lazy" alt="image icon">
                <div class="flex-1">
                    <h4 class="font-lora group-hover:text-secondary group-hover:transition-all leading-none text-[28px] text-primary mb-[10px]">
                        <?php echo e(trans('file.email_us')); ?> <span class="text-secondary">.</span>
                    </h4>
                    <p class="font-light text-[18px] lg:max-w-[230px]">
                        <a href="mailto:info@ggiturkey.com" class="hover:text-secondary">info@ggiturkey.com</a>
                        <a href="mailto:careers@ggiturkey.com" class="hover:text-secondary">careers@ggiturkey.com</a>
                    </p>
                </div>
            </div>

        </div>


    </div>
</section>
<!-- contact form end -->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".contentSlider", {
        direction: "vertical",
        slidesPerView: "auto",
        freeMode: true,
        scrollbar: {
            el: ".swiper-scrollbar",
        },
        mousewheel: true,
    });
</script>
<script>
    // Initialization for ES Users
    import {
        Tab,
        initTE,
    } from "tw-elements";

    initTE({
        Tab
    });
</script>
<script>
    var swiper = new Swiper(".mySwiper", {
        direction: "vertical",
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.citizenshipmain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/frontend/citizenship.blade.php ENDPATH**/ ?>