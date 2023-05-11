<?php $__env->startSection('title'); ?><?php echo e(isset($siteInfo->title) ? $siteInfo->title : 'GGI Turkey,'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta'); ?><?php echo e(isset($siteInfo->description) ? $siteInfo->description : 'description'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('image'); ?>https://ggiturkey.com/frontend/images/logo/logo.png
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', 'GGI Turkey, Properties'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.includes.header1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section
        class="bg-no-repeat bg-center bg-cover bg-[#E9F1FF] h-[350px] lg:h-[513px] flex flex-wrap items-center relative before:absolute before:inset-0 before:content-[''] before:bg-[#000000] before:opacity-[70%]"
        style="background-image: url('<?php echo e(url('frontend/images/breadcrumb/bread-12.jpeg')); ?>');">
        <div class="container">
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div class="max-w-[600px]  mx-auto text-center text-white relative z-[1]">
                        <div class="mb-5"><span class="text-base block"> Our Properties </span></div>
                        <h1 class="font-lora text-[36px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl font-medium"> Properties </h1>
                        <p class="text-base mt-5 max-w-[500px] mx-auto text-center">
                            Huge number of propreties availabe here for buy and sell also you can find here co-living property as you like
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
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-[30px]">
            <?php $__currentLoopData = $virtualrealitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $virtualreality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide">
                    <div class="overflow-hidden rounded-md drop-shadow-[0px_0px_5px_rgba(0,0,0,0.1)] bg-[#FFFDFC] text-center transition-all duration-300 hover:-translate-y-[10px]">
                        <div class="relative">
                            <?php if($virtualreality->frame_link == null): ?>
                            <div data-relative-input="true">
                                <img data-depth="0.1" src="<?php echo e(asset('/images/images/'.$virtualreality->file)); ?>" class="w-full" width="100%" height="300px" alt="video image">
                            </div>
                            <?php else: ?>
                            <div data-relative-input="true">
                                <iframe data-depth="0.1" src="<?php echo e($virtualreality->frame_link); ?>" class="w-full" width="100%" height="300px" alt="video image"></iframe>
                            </div>
                            <?php endif; ?>
                            <div class="promo-video">
                                <div class="waves-block">
                                  <div class="waves wave-1"></div>
                                  <div class="waves wave-2"></div>
                                  <div class="waves wave-3"></div>
                                </div>
                              </div>
                            <a href="<?php echo e($virtualreality->address); ?>"  class="bg-white text-white hover:text-primary absolute left-0 right-0 mx-auto top-2/2 -translate-y-1/2 hover:scale-105 hover:bg-virtual w-[55px] h-[55px] flex flex-wrap z-[1] items-center justify-center opacity-100 shadow-[0px 4px 4px rgba(0, 0, 0, 0.4)] transition-all rounded-full group before:block before:absolute  before:bg-white before:opacity-80 before:shadow-[0px 4px 4px rgba(0, 0, 0, 0.4)] hover:before:bg-primary hover:before:opacity-80 before:w-[70px] before:h-[70px] before:rounded-full before:z-[-1]" target="_blank" aria-label="play button">
                                <p style="color: black">360&#176;</p>
                            </a>
                        </div>
                        <div class="py-[20px] px-[20px] text-left relative">
                            <h3><a href="<?php echo e($virtualreality->address); ?>" class="font-lora leading-tight text-[22px] xl:text-[26px] text-primary hover:text-secondary transition-all font-medium"><?php echo e($virtualreality->name); ?></a></h3>
                            <br>
                            <ul>
                                <li class="flex flex-wrap items-center justify-between ">
                                    <span class="font-lora text-base text-primary leading-none font-medium"><a style="text-decoration: underline;" href="<?php echo e($virtualreality->link); ?>" target="_blank" >Details</a></span> <div style="align-content: flex-end"><?php if($virtualreality->first_link != 'NULL'): ?><span class="font-lora text-base text-primary leading-none font-medium"><a target="_blank" style="text-decoration: underline;" href="<?php echo e($virtualreality->first_link); ?>"><?php echo e($virtualreality->first_name); ?></a></span><?php endif; ?> <?php if($virtualreality->second_link != ''): ?> - <span class="font-lora text-base text-primary leading-none font-medium"><a target="_blank" style="text-decoration: underline;" href="<?php echo e($virtualreality->second_link); ?>"><?php echo e($virtualreality->second_name); ?></a></span><?php endif; ?> <?php if($virtualreality->third_link != ''): ?>- <span class="font-lora text-base text-primary leading-none font-medium"><a target="_blank" style="text-decoration: underline;" href="<?php echo e($virtualreality->third_link); ?>"><?php echo e($virtualreality->third_name); ?></a></span><?php endif; ?></div>
                                </li>
                            </ul>
                            <br>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
        </div>
    </section>
    <!-- Popular Properties end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).on('change', '#state', function() {
            var state = $(this).val();
            $.ajax({
                method: 'post',
                url: '<?php echo e(route('admin.get.city')); ?>',
                data: {
                    state: state,
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                dataType: 'html',
                success: function(response) {
                    $('#city_id').html(response);
                    $('#city_id').selectpicker('refresh');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $('#city_name').keyup(function() {
                var query = $(this).val();
                if (query != '') {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "<?php echo e(route('autocomplete.fetch')); ?>",
                        method: "POST",
                        data: {
                            query: query,
                            _token: _token
                        },
                        success: function(data) {
                            $('#cityList').fadeIn();
                            $('#cityList').html(data);
                        }
                    });
                }
            });

            $(document).on('click', 'li', function() {
                var text = $(this).text();
                var city = text.substring(0, text.indexOf(','));

                $('#city_name').val(city);
                $('#cityList').fadeOut();
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
            } else {
                $("#bed").hide();
                $("#bath").hide();
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/frontend/virtualreality.blade.php ENDPATH**/ ?>