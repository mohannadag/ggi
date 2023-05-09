<?php

$languages = \Illuminate\Support\Facades\DB::table('languages')

           ->select('id','name','locale')

           // ->where('default','=',0)

           ->where('locale','!=',\Illuminate\Support\Facades\Session::get('currentLocal'))

           ->orderBy('name','ASC')

           ->get();

\Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

?>
<?php $__env->startSection('content'); ?>
   <?php echo $__env->make('frontend.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!--Hero section starts-->
    <?php echo $__env->make('frontend.includes.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.includes.stories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--Hero section ends-->
    <?php echo $__env->make('frontend.includes.popular-properties', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.includes.about-us', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.includes.featured-property', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.includes.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.includes.popular-city', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--News section starts-->
    <?php echo $__env->make('frontend.includes.testimontials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--Team section starts-->
    <?php echo $__env->make('frontend.includes.agents', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--Team section ends-->
    <?php echo $__env->make('frontend.includes.news', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--News section ends-->
    <!--Trending events starts-->

    <!--Trending events ends-->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
    $(document).on('change','#state',function(){
        var state = $(this).val();
        $.ajax({
            method:'post',
            url: '<?php echo e(route('state.city')); ?>',
            data: {state:state,"_token":"<?php echo e(csrf_token()); ?>"},
            dataType:'html',
            success:function(response){
                $('#city_id').html(response);
                $('#city_id').selectric('refresh');
            }
        });
    });
</script>

<script>
    var swiper = new Swiper(".agentSlide", {
      slidesPerView: 3,
      spaceBetween: 10,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>
    <script>
        $('#place-event').on('keyup', function() {
            var search = $(this).val();
            $.ajax({
                method: 'post',
                url: '<?php echo e(route('search.properties')); ?>',
                data: {
                    search: search,
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                dataType: 'html',
                success: function(response) {
                    $('.get-properties').html(response);
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

<?php echo $__env->make('frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/frontend/index.blade.php ENDPATH**/ ?>