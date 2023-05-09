<header class="db-top-header">

    <div class="container-fluid">

        <div class="row align-items-center">

            <?php

                $notifications = auth()->user()->unreadNotifications;

                $notifications->markAsRead();
            $languages = DB::table('languages')

                                ->select('id','name','locale')

                                // ->where('default','=',0)

                                ->where('locale','!=',\Illuminate\Support\Facades\Session::get('currentLocal'))

                                ->orderBy('name','ASC')

                                ->get();

             \Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

            ?>

            <div class="col-md-12 col-sm-12 col-12">

                <div class="header-button">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAgent')): ?>
                <li class="nav-item">
                        <a  class="nav-link" href="<?php echo e(url('/drive')); ?>" target="_blank">
                            <i class="la la-archive"></i>
                            <span>Drive Archive</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                <li class="nav-item">
                        <a  class="nav-link" href="<?php echo e(url('/drive')); ?>" target="_blank">
                            <i class="la la-archive"></i>
                            <span>Drive Archive</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a  class="nav-link" href="<?php echo e(url('/')); ?>" target="_blank">
                            <i class="la la-globe"></i>
                            <span>View Website</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                            <i class="la la-language"></i>
                            <span>
                            <?php if(\Illuminate\Support\Facades\Session::has('currentLocal')): ?>

                                <?php echo e(__(strtoupper(\Illuminate\Support\Facades\Session::get('currentLocal')))); ?>


                            <?php endif; ?>
                            </span>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <a class="dropdown-item" href="<?php echo e(route('language.defaultChange',$item->id)); ?>">

                                    <?php echo e(strtoupper($item->name)); ?> (<?php echo e(__(strtoupper($item->locale))); ?>)

                                </a>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    </li>
                    <div class="header-button-item has-noti js-item-menu">

                        <i class="las la-bell"></i>

                        <div class="notifi-dropdown js-dropdown">

                            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="notifi__item">
                                <div class="content">
                                    <?php if($notification->type == 'App\Notifications\MessageReceived'): ?>
                                    <a href="<?php echo e(route('admin.messages.index')); ?>">
                                    <p><?php echo e($notification->data['message']); ?></p>

                                    <span class="date"><?php echo e($notification->created_at->diffForHumans()); ?></span>
                                    </a>
                                    <?php endif; ?>
                                    <?php if($notification->type == 'App\Notifications\BookingNotfication'): ?>

                                   <a href="<?php echo e(route('admin.bookings.index')); ?>"> <p><?php echo e(substr($notification->data['message'],0,25)); ?></p>

                                    <span class="date"><?php echo e($notification->created_at->diffForHumans()); ?></span>
                                   </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <div class="notify-bottom text-center py-20">

                                <a href="<?php echo e(url('admin/messages')); ?>">View All Notification</a>

                            </div>

                        </div>

                    </div>

                    <div class="header-button-item js-sidebar-btn">

                    <?php

                    $user = auth()->user();

                    ?>

                    <?php if(file_exists( public_path() . '/images/users/'.$user->image)): ?>
                        <img loading="lazy" src="<?php echo e(URL::asset('/images/users/'.$user->image)); ?>" alt="...">
                    <?php else: ?>

                        <img loading="lazy" src="<?php echo e(Auth()->user()->image); ?>" alt="...">
                    <?php endif; ?>

                        <span><?php echo e(auth()->user()->username); ?> <i class="las la-caret-down"></i></span>

                    </div>

                    <div class="setting-menu js-right-sidebar d-none d-lg-block">

                        <div class="account-dropdown__body">

                            <div class="account-dropdown__item">

                                <a href="<?php echo e(route('admin.users.index')); ?>">

                                    Profile</a>

                            </div>
                            
                                
                            

                            <div class="account-dropdown__item">

                                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">

                                    Logout</a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">

                                    <?php echo csrf_field(); ?>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</header>
<?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/admin/includes/header.blade.php ENDPATH**/ ?>