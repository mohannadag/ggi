<?php

$languages = \Illuminate\Support\Facades\DB::table('languages')

           ->select('id','name','locale')

           // ->where('default','=',0)

           ->where('locale','!=',\Illuminate\Support\Facades\Session::get('currentLocal'))

           ->orderBy('name','ASC')

           ->get();

\Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

?>

        <!-- Header start -->
<header id="sticky-header" class="absolute left-0 top-[15px] lg:top-[30px] xl:top-[45px] w-full z-10">
            <div class="container">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="flex flex-wrap items-center justify-between">
                           <a href="<?php echo e(url('/')); ?>" class="block">
                        <img width="150px" src="<?php echo e(asset('frontend/images/logo/logo.png')); ?>" loading="lazy" alt="Golden Group Investment logo"> </a>
                    <nav class="flex flex-wrap items-center">
                        <ul class="hidden lg:flex flex-wrap items-center font-lora text-[16px] xl:text-[16px] leading-none text-black <?php echo e(App::isLocale('ar') ? 'lg:ml-[100px] xl:ml-[50px]' : ''); ?>">
                            
                            <li class="mr-7 xl:mr-[20px] relative group py-[20px]">

                                <a class="transition-all hover:text-secondary"><img style="max-width: 31px; height: auto;" src="<?php echo e(URL::asset('/frontend/images/lang.svg')); ?>"></a>
                               <ul class="list-none bg-white drop-shadow-[0px_6px_10px_rgba(0,0,0,0.2)] rounded-[12px] flex flex-wrap flex-col w-[220px] absolute top-[120%] left-1/2 -translate-x-1/2 transition-all group-hover:top-[100%] invisible group-hover:visible opacity-0 group-hover:opacity-100">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="border-b border-dashed border-primary border-opacity-40 last:border-b-0 hover:border-solid transition-all">
                                        <a href="<?php echo e(route('language.defaultChange',$item->id)); ?>" class="font-lora leading-[1.571] text-[14px] text-primary p-[10px] capitalize block transition-all hover:bg-primary hover:text-white text-center my-[-1px] rounded-t-[12px]"><?php echo e(strtoupper($item->name)); ?></a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <li class="mr-7 xl:mr-[20px] relative group py-[20px]">

                                <a href="#" class="transition-all hover:text-secondary">
                                    <img style="max-width: 31px; height: auto;" src="<?php echo e(URL::asset('/frontend/images/currency.svg')); ?>">
                                </a>
                               <ul class="list-none bg-white drop-shadow-[0px_6px_10px_rgba(0,0,0,0.2)] rounded-[12px] flex flex-wrap flex-col w-[220px] absolute top-[120%] left-1/2 -translate-x-1/2 transition-all group-hover:top-[100%] invisible group-hover:visible opacity-0 group-hover:opacity-100">
                                <?php $__currentLoopData = DB::table('currencies')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="border-b border-dashed border-primary border-opacity-40 last:border-b-0 hover:border-solid transition-all">
                                        <a href="<?php echo e(route('switch_currency', $currency->name)); ?>" class="font-lora leading-[1.571] text-[14px] text-primary p-[10px] capitalize block transition-all hover:bg-primary hover:text-white text-center my-[-1px] rounded-t-[12px]"<?php echo e(Session::has('currency') ? ( Session::get('currency') == $currency->id ? 'selected' : '' ) : ( $currency->is_default == 1 ? 'selected' : '')); ?>><?php echo e($currency->name); ?></a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>


                        </ul>

                        <ul class="flex flex-wrap items-center">
<li class="ml-2 sm:ml-5 lg:hidden">
<a href="#offcanvas-mobile-menu" class="offcanvas-toggle flex text-white hover:text-secondary">
<svg width="24" height="24" class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
<path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"></path>
</svg>
</a>
</li>
</ul>
                    </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- offcanvas-overlay start -->
        <div class="offcanvas-overlay hidden fixed inset-0 bg-black opacity-50 z-50"></div>
        <!-- offcanvas-overlay end -->
        <!-- offcanvas-mobile-menu start -->
        <div id="offcanvas-mobile-menu" class="offcanvas left-0 transform -translate-x-full fixed font-normal text-sm top-0 z-50 h-screen xs:w-[300px] lg:w-[380px] transition-all ease-in-out duration-300 bg-white">

            <div class="py-12 pr-5 h-[100vh] overflow-y-auto">
                <!-- close button start -->
                <button class="offcanvas-close text-primary text-[25px] w-10 h-10 absolute right-0 top-0 z-[1]" style=" filter: invert(1);" aria-label="offcanvas">x</button>
                <!-- close button end -->

                <!-- offcanvas-menu start -->

                <nav class="offcanvas-menu mr-[20px]">
                    <ul>
                        
                        <?php if(\Illuminate\Support\Facades\Session::has('currentLocal')): ?>
                        <li class="relative block border-b-primary border-b"><a href="#" class="relative block capitalize text-black hover:text-secondary text-base my-2 py-1 px-5"><?php echo e(__(strtoupper(\Illuminate\Support\Facades\Session::get('currentLocal')))); ?></a>

                            <ul class="offcanvas-submenu static top-auto hidden w-full visible opacity-100 capitalize">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <li>
                                   <a href="<?php echo e(route('language.defaultChange',$item->id)); ?>" class="text-sm py-2 px-[30px] text-black font-light block transition-all hover:text-secondary"><?php echo e(strtoupper($item->name)); ?></a>
                               </li>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ul>
                       </li>
                       <?php endif; ?>
                       
                         
                        
                        <li class="relative block border-b-primary border-b"><a href="#" class="relative block capitalize text-black hover:text-secondary text-base my-2 py-1 px-5"><?php echo e(trans('file.currency')); ?></a>

                            <ul class="offcanvas-submenu static top-auto hidden w-full visible opacity-100 capitalize">
                                <?php $__currentLoopData = DB::table('currencies')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <li>
                                   <a href="<?php echo e(route('switch_currency', $currency->name)); ?>" class="text-sm py-2 px-[30px] text-black font-light block transition-all hover:text-secondary" <?php echo e(Session::has('currency') ? ( Session::get('currency') == $currency->id ? 'selected' : '' ) : ( $currency->is_default == 1 ? 'selected' : '')); ?>><?php echo e($currency->name); ?></a>
                               </li>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ul>
                       </li>
                    </ul>
                </nav>
                <!-- offcanvas-menu end -->

                <div class="px-5 flex flex-wrap mt-3 sm:hidden">
                    <a href="#" class="sticky-btn before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:-z-[1] before:bg-white before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto hover:text-primary before:transition-all leading-none px-[20px] py-[15px] capitalize font-medium text-white hidden sm:block text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:-z-[2] after:bg-secondary after:rounded-md after:transition-all">Add Property</a>
                </div>
            </div>
        </div>
        <!-- offcanvas-mobile-menu end -->
        <!-- Header end -->
<?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/frontend/includes/header-ivr.blade.php ENDPATH**/ ?>