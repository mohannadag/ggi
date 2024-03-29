<!DOCTYPE html>

<html dir="<?php echo e(App::isLocale('ar') ? 'rtl' : 'ltr'); ?>" lang="en-US">

<head>

    <!-- Metas -->

    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="GGI Turkey," />
    <!--open graph metas-->
    <meta property="og:site_name" content="GGI Turkey, Your real estate solution" />
    <meta property=“og:title” content="<?php echo $__env->yieldContent('title'); ?>" />
    <meta property="og:description" content="<?php echo $__env->yieldContent('meta'); ?>" />
    <meta property="og:url" content="http://ggiturkey.com" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo $__env->yieldContent('image'); ?>" />
    <meta property="twitter:card" content="GGI Turkey," />
    <meta property="twitter:image" content="https://ggiturkey.com/frontend/images/logo/logo.png" />
    <!-- Links -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <?php if(isset($siteInfo->favicon)): ?>
        <?php if(file_exists(public_path() . '/images/images/' . $siteInfo->favicon)): ?>
            <link rel="icon" type="image/png" href="<?php echo e(URL::asset('/images/images/' . $siteInfo->favicon)); ?>" />
        <?php else: ?>
            <link rel="icon" type="image/png" href="<?php echo e(asset('images/favicon.png')); ?>" />
        <?php endif; ?>
    <?php else: ?>
        <link rel="icon" type="image/png" href="<?php echo e(asset('images/favicon.png')); ?>" />
    <?php endif; ?>


    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/plugins/swiper-bundle.min.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/plugins/magnific-popup.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/plugins/nice-select.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('frontend/js/plugins/custom_slider/customSliderStyle.css')); ?>">



<link rel="stylesheet" href="<?php echo e(asset('frontend/css/zuck.min.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('frontend/css/snapgram.css')); ?>">
<link rel='stylesheet' href='//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />

    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/stories.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>" />
    <title><?php echo $__env->yieldContent('title', isset($siteInfo->title) ? $siteInfo->title : 'GGI Turkey,'); ?></title>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-V3NFNKHZHT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-V3NFNKHZHT');
</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-263288171-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-263288171-1');
</script>

</head>
<?php

$languages = \Illuminate\Support\Facades\DB::table('languages')

           ->select('id','name','locale')

           // ->where('default','=',0)

           ->where('locale','!=',\Illuminate\Support\Facades\Session::get('currentLocal'))

           ->orderBy('name','ASC')

           ->get();

\Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

?>
<body class="font-karla text-body text-tiny">

    <ul class="social-media-container" dir="ltr">
      <li class="social-media blog">
        <i class="fab fa-whatsapp wp-shake"></i>
        <a href="https://api.whatsapp.com/send/?phone=905373539567&text" target="_blank"><?php echo e(App::isLocale('ar') ? 'واتساب' : 'Whatsapp'); ?></a>
    </li>
    <li class="social-media twitter">
        <i class="fab fa-twitter"></i>
        <a href="<?php echo e(isset($siteInfo->twitter) ? $siteInfo->twitter : '#'); ?>" target="_blank"><?php echo e(App::isLocale('ar') ? 'تويتر' : 'Twitter'); ?></a>
    </li>
    <li class="social-media instagram">
        <i class="fab fa-instagram"></i>
        <a href="<?php echo e(App::isLocale('ar') ? 'https://www.instagram.com/ggiturkey' : 'https://www.instagram.com/ggiturkey.global'); ?>" target="_blank"><?php echo e(App::isLocale('ar') ? 'انستغرام' : 'Instagram'); ?></a>
    </li>
    <li class="social-media facebook">
        <i class="fab fa-facebook-f"></i>
        <a href="<?php echo e(App::isLocale('ar') ? 'https://www.facebook.com/GGITurkey' : 'https://www.facebook.com/profile.php?id=100063781434306'); ?>" target="_blank"><?php echo e(App::isLocale('ar') ? 'فيسبوك' : 'Facebook'); ?></a>
    </li>
    <li class="social-media linkedin">
        <i class="fab fa-linkedin-in"></i>
        <a href="<?php echo e(url('https://www.linkedin.com/company/golden-groupltd')); ?>" target="_blank"><?php echo e(App::isLocale('ar') ? 'لينكدان' : 'LinkedIn'); ?></a>
    </li>
    <li class="social-media tiktok">
        <i class="fab fa-tiktok"></i>
        <a href="https://www.tiktok.com/@ggiturkey" target="_blank"><?php echo e(App::isLocale('ar') ? 'تيكتوك' : 'Tiktok'); ?></a>
    </li>

    <li class="social-media youtube">
        <i class="fab fa-youtube"></i>
        <a href="https://www.youtube.com/@goldengroupinvestment" target="_blank"><?php echo e(App::isLocale('ar') ? 'يوتيوب' : 'Youtube'); ?></a>
    </li>
    </ul>

  <div class="overflow-hidden">

  <?php echo $__env->make('frontend.includes.popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('frontend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<a id="scrollUp" class="w-12 h-12 rounded-full bg-primary text-white fixed right-5 bottom-16 flex flex-wrap items-center justify-center transition-all duration-300 z-10" href="#" aria-label="scroll up">
  <svg width="25" height="25" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
      <path d="M6.101 261.899L25.9 281.698c4.686 4.686 12.284 4.686 16.971 0L198 126.568V468c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12V126.568l155.13 155.13c4.686 4.686 12.284 4.686 16.971 0l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L232.485 35.515c-4.686-4.686-12.284-4.686-16.971 0L6.101 244.929c-4.687 4.686-4.687 12.284 0 16.97z" />
  </svg>
</a>
</div>




 <!-- JS Vendor, Plugins & Activation Script Files -->

 <script src="<?php echo e(asset('js/plugin.js')); ?>"></script>
    <!-- Vendors JS -->
    <script src="<?php echo e(asset('frontend/js/vendor/modernizr-3.11.7.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/vendor/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/vendor/jquery-migrate-3.3.2.min.js')); ?>"></script>
    <!-- Plugins JS -->

    <script src="<?php echo e(asset('js/sweetalert2@11.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <script src="<?php echo e(asset('frontend/js/plugins/swiper-bundle.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.0/umd/popper.min.js"></script>
    <script src="<?php echo e(asset('frontend/js/plugins/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/plugins/jquery.ajaxchimp.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/plugins/parallax.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/plugins/nice-select/js/jquery.nice-select.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/plugins/jquery.nice-select.min.js')); ?>"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
	<script src="<?php echo e(asset('frontend/js/plugins/script.js')); ?>"></script>
    <!-- Activation JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/script.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/plugins/custom_slider/customSlider.js')); ?>"></script>
</body>
<?php echo $__env->yieldPushContent('script'); ?>


<script>
    $(document).ready( function() {
    var swiperH = new Swiper('.mySwiper', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        spaceBetween: 50
    });
});
  </script>

<script>
    $(document).on('change', '#category_id', function() {
        var propertyType = $(this).val();
        // alert(propertyType);
        if (propertyType == 1) {
            $("#bed").show();
            $("#bath").show();
            $("#area").show();
        } else {
            $("#bath").hide();
            $("#garage").hide();
            $("#area").hide();
        }
    });



    var values = [<?php $__currentLoopData = $properties->sortBy('price'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> ["<?php echo e($property->price); ?>"], <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>];
    var slider = $('#price-slider').slider({
        range: true,
        steps: values,
        create: function(e, ui) {
            $('#price-slider').slider('values', 1, values.length - 1);
            $('#minPrice').val(values[0]);
            $('#maxPrice').val(values[values.length - 1]);
        },
        slide: function(event, ui) {
            $('#minPrice').val(ui.stepValue[0]);
            $('#maxPrice').val(ui.stepValue[1]);
        }
    });


    var values = [<?php $__currentLoopData = $properties->sortBy('price'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> ["<?php echo e($property->price); ?>"], <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>];
    var slider = $('#price-sliderr').slider({
        range: true,
        steps: values,
        create: function(e, ui) {
            $('#price-sliderr').slider('values', 1, values.length - 1);
            $('#minPricee').val(values[0]);
            $('#maxPricee').val(values[values.length - 1]);
        },
        slide: function(event, ui) {
            $('#minPricee').val(ui.stepValue[0]);
            $('#maxPricee').val(ui.stepValue[1]);
        }
    });

  var values = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 1600, 1700, 1800, 1900, 2000, 2100, 2200, 2300, 2400, 2500, 2600, 2700, 2800, 2900, 3000, 3100, 3200, 3300, 3400, 3500, 3600, 3700, 3800, 3900, 4000, 4100, 4200, 4300, 4400, 4500, 4600, 4700, 4800, 4900, 5000 ];
    var slider = $('#area-slider').slider({
      range: true,
      steps: values,
      create: function(e, ui){
      $('#area-slider').slider('values', 1, values.length - 1);
      $('#minArea').val(values[0]);
      $('#maxArea').val(values[values.length - 1]);
      },
     slide: function(event, ui){
       $('#minArea').val(ui.stepValue[0]);
       $('#maxArea').val(ui.stepValue[1]);
     }
  });

</script>


</html>
<?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/frontend/projectsmain.blade.php ENDPATH**/ ?>