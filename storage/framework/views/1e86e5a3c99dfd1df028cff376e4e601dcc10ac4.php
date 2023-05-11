<?php

    $languages = \Illuminate\Support\Facades\DB::table('languages')

        ->select('id', 'name', 'locale')

        // ->where('default','=',0)

        ->where('locale', '!=', \Illuminate\Support\Facades\Session::get('currentLocal'))

        ->orderBy('name', 'ASC')

        ->get();

    \Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

?>


<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.includes.header1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Hero section start -->

        <section class="bg-no-repeat bg-center bg-cover bg-[#E9F1FF] h-[350px] lg:h-[513px] flex flex-wrap items-center relative before:absolute before:inset-0 before:content-['']" style="background-image: url('<?php echo e(asset('frontend/images/breadcrumb/contact-us.jpg')); ?>');">
            <div class="container">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="max-w-[700px]  mx-auto text-center text-primary relative z-[1]">
                            <h1 class="font-lora text-[32px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl font-medium">
                                <?php echo e(trans('file.contact')); ?>

                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero section end -->


        <div class="pt-[80px] lg:pt-[120px]">
            <div class="container">
                <form id="contact_form">
                    <div class="grid grid-cols-12 gap-x-[30px] mb-[-30px] items-end">
                        <div class="col-span-12 lg:col-span-7 mb-[30px]">
                            <div>
                                <h2 class="font-lora text-primary text-[24px] sm:text-[28px] leading-[1.277] capitalize mb-[10px] font-medium"><?php echo e(trans('file.contact_us')); ?></h2>
                                <p class="max-w-[465px] mb-[40px]">
                                    <?php echo e(trans('file.contact_desc')); ?>

                                </p>
                            </div>
                            <div class="grid grid-cols-12 gap-x-[20px] gap-y-[30px]">

                                <div class="col-span-12">
                                    <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)]"  placeholder="<?php echo e(trans('file.name')); ?>" type="text" id="InputName" name="name" value="<?php echo e(old('name')); ?>">
                                </div>

                                <div class="col-span-12 md:col-span-6">
                                    <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)]" placeholder="<?php echo e(trans('file.phone')); ?>" name="phone" id="InputPhone" type="tel" name="phone" value="<?php echo e(old('phone')); ?>">
                                </div>

                                <div class="col-span-12 md:col-span-6">
                                    <input class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)]" placeholder="<?php echo e(trans('file.email')); ?>" type="email" id="InputEmail" name="email" value="<?php echo e(old('email')); ?>">
                                </div>

                                <div class="col-span-12">
                                    <textarea class="h-[196px] font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-secondary focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] resize-none" name="message" cols="30" rows="10" placeholder="<?php echo e(trans('file.message')); ?>" id="message"></textarea>
                                </div>


                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-5 mb-[30px] order-last lg:order-none">
                            <div class="h-[385px] rounded-[6px] overflow-hidden xl:ml-[40px]">
                                <iframe class="w-full h-full" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12046.97150524681!2d28.8317215!3d40.9871108!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x36ff2e1f09447248!2sGolden%20Group%20Investment%20LTD!5e0!3m2!1sen!2str!4v1671089954460!5m2!1sen!2str" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                        <div class="col-span-12 mb-[30px] lg:mb-0  order-2 lg:order-none">
                            <button type="submit" class="before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:-z-[1] before:bg-secondary before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto before:transition-all leading-none px-[30px] py-[15px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:-z-[2] after:bg-primary after:rounded-md after:transition-all mb-[30px] lg:mb-0"><?php echo e(trans('file.contact')); ?></button>
                            <p class="form-messege mt-3"></p>
                        </div>
                    </div>
                </form>

            </div>
        </div>


        <!-- contact form start -->
        <section class="py-[80px] lg:py-[120px]">
            <div class="container">
                <div class="grid col-span-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-[30px] mb-[-30px]">

                    <div class="flex hover:drop-shadow-[0px_16px_10px_rgba(0,0,0,0.1)] hover:bg-[#F5F9F8] transition-all p-[20px] xl:p-[35px] rounded-[8px] mb-[30px] group">
                        <img class="self-center mr-[20px] sm:mr-[40px] lg:mr-[20px] xl:mr-[40px] sm:mb-[15px] lg:mb-0" src="<?php echo e(asset('frontend/images/icon/map.png')); ?>" width="40" height="55" loading="lazy" alt="image icon">
                        <div class="flex-1">
                            <h4 class="font-lora group-hover:text-secondary group-hover:transition-all leading-none text-[28px] text-primary mb-[10px]"><?php echo e(trans('file.our_address')); ?> <span class="text-secondary">.</span></h4>
                            <p class="font-light text-[18px] lg:max-w-[230px]"><?php echo e($siteInfo->address); ?></p>
                        </div>
                    </div>

                    <div class="flex hover:drop-shadow-[0px_16px_10px_rgba(0,0,0,0.1)] hover:bg-[#F5F9F8] transition-all p-[20px] xl:p-[35px] rounded-[8px] mb-[30px] group">
                        <img class="self-center mr-[20px] sm:mr-[40px] lg:mr-[20px] xl:mr-[40px] sm:mb-[15px] lg:mb-0" src="<?php echo e(asset('frontend/images/icon/phone.png')); ?>" width="46" height="46" loading="lazy" alt="image icon">
                        <div class="flex-1">
                            <h4 class="font-lora group-hover:text-secondary group-hover:transition-all leading-none text-[28px] text-primary mb-[10px]"><?php echo e(trans('file.contact_us')); ?> <span class="text-secondary">.</span></h4>
                            <p class="font-light text-[18px] lg:max-w-[230px]"><a href="tel:<?php echo e($siteInfo->phone); ?>" dir="ltr"><?php echo e($siteInfo->phone); ?></a></p>
                        </div>
                    </div>

                    <div class="flex hover:drop-shadow-[0px_16px_10px_rgba(0,0,0,0.1)] hover:bg-[#F5F9F8] transition-all p-[20px] xl:p-[35px] rounded-[8px] mb-[30px] xl:pl-[65px] group">
                        <img class="self-center mr-[20px] sm:mr-[40px] lg:mr-[20px] xl:mr-[40px] sm:mb-[15px] lg:mb-0" src="<?php echo e(asset('frontend/images/icon/mail.png')); ?>" width="46" height="52" loading="lazy" alt="image icon">
                        <div class="flex-1">
                            <h4 class="font-lora group-hover:text-secondary group-hover:transition-all leading-none text-[28px] text-primary mb-[10px]"><?php echo e(trans('file.email_us')); ?> <span class="text-secondary">.</span></h4>
                            <p class="font-light text-[18px] lg:max-w-[230px]">
                                <a href="mailto:<?php echo e($siteInfo->email); ?>" class="hover:text-secondary"><?php echo e($siteInfo->email); ?></a>
                                <a href="mailto:contact@ggiturkey.com" class="hover:text-secondary">contact@ggiturkey.com</a>
                            </p>
                        </div>
                    </div>

                </div>


            </div>
        </section>
        <!-- contact form end -->

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script type="text/javascript">
        $('#contact_form').on('submit', function(e) {
            e.preventDefault();
            $('.v7').text("Submitting...");
            $('.v7').prop('disabled', true);
            let name = $('#InputName').val();
            let email = $('#InputEmail').val();
            let phone = $('#InputPhone').val();
            let message = $('#message').val();
            $.ajax({
                url: "<?php echo e(route('contact')); ?>",
                type: "POST",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    name: name,
                    email: email,
                    phone: phone,
                    message: message,
                },
                success: function(response) {
                    // $('#successMsg').show();
                    // console.log(response);
                    $('#InputName').val("");
                    $('#InputEmail').val("");
                    $('#InputPhone').val("");
                    $('#message').val("");
                    $('.v7').text("Send Message");
                    $('.v7').prop('disabled', false);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Thanks for contacting us!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                },
                error: function(response) {
                    $('#nameErrorMsg').text(response.responseJSON.errors.name);
                    $('#emailErrorMsg').text(response.responseJSON.errors.email);
                    $('#phoneErrorMsg').text(response.responseJSON.errors.phone);
                    $('#messageErrorMsg').text(response.responseJSON.errors.message);

                    $('#nameErrorMsg').delay(3200).fadeOut(300);
                    $('#emailErrorMsg').delay(3200).fadeOut(300);
                    $('#phoneErrorMsg').delay(3200).fadeOut(300);
                    $('#messageErrorMsg').delay(3200).fadeOut(300);

                    $('.v7').text("Send Message");
                    $('.v7').prop('disabled', false);

                },
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

<?php echo $__env->make('frontend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/frontend/contact.blade.php ENDPATH**/ ?>