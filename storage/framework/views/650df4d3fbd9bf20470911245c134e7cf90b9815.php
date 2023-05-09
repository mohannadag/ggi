<aside class="menu-sidebar js-right-sidebar d-block">
    <div class="logo">
        <a href="<?php echo e(url('/')); ?>">
            <?php if(isset($siteInfo->logo)): ?>
            <?php if(file_exists( public_path() . '/images/images/'.$siteInfo->logo)): ?>
                <img loading="lazy" src="<?php echo e(URL::asset('/images/images/'.$siteInfo->logo)); ?>" id="preview-image-before-upload" alt="Image">
            <?php else: ?>
                <img loading="lazy" src="<?php echo e(asset('images/logo-blue.png')); ?>" alt="logo2" class="img-fluid">
            <?php endif; ?>
        <?php else: ?>
                <img loading="lazy" src="<?php echo e(asset('images/logo-blue.png')); ?>" alt="logo">
        <?php endif; ?>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar2">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">

                <li>
                    <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('admin.dashboard')); ?>">
                        <i class="las la-home"></i><?php echo e(trans('file.dashboard')); ?>

                    </a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow <?php echo e(Str::startsWith(Route::currentRouteName(),'admin.properties') ? 'active' : ''); ?>" href="#">
                        <i class="las la-layer-group"></i><?php echo e(trans('file.real_estate')); ?>

                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.properties.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.properties.index')); ?>"><?php echo e(trans('file.Properties')); ?></a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.facilities.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.facilities.index')); ?>"><?php echo e(trans('file.facilities')); ?></a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.units.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.units.index')); ?>">Units</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.categories.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.categories.index')); ?>"><?php echo e(trans('file.categories')); ?></a>
                        </li>
                    </ul>
                </li>

                <li class="has-sub"><a class="js-arrow" href="#"><i class="las la-blog"></i>Stories</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.campaigns.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.campaigns.index')); ?>">Campaigns</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.stories.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.stories.index')); ?>">Stories</a>
                        </li>

                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="las la-globe"></i><?php echo e(trans('file.locations')); ?>

                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.countries.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.countries.index')); ?>"><?php echo e(trans('file.countries')); ?></a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.states.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.states.index')); ?>"><?php echo e(trans('file.states')); ?></a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.cities.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.cities.index')); ?>"><?php echo e(trans('file.cities')); ?></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.agents.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.agents.index')); ?>">
                        <i class="las la-users"></i><?php echo e(trans('file.agents')); ?></a>
                </li>
                <li>
                    <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.bookings.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.bookings.index')); ?>">
                        <i class="las la-copy"></i><?php echo e(trans('file.booking_request')); ?></a>
                </li>


                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="las la-blog"></i><?php echo e(trans('file.blogs')); ?>

                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.blog-categories.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.blog-categories.index')); ?>"><?php echo e(trans('file.category')); ?></a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.tags.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.tags.index')); ?>"><?php echo e(trans('file.tags')); ?></a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.blogs.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.blogs.index')); ?>"><?php echo e(trans('file.blogs')); ?></a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.messages.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.messages.index')); ?>">
                        <i class="las la-envelope"></i><?php echo e(trans('file.messages')); ?></a>
                </li>
                <li>
                    <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.users.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.users.index')); ?>">
                        <i class="las la-user-circle"></i><?php echo e(trans('file.my_profile')); ?></a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="las la-language"></i><?php echo e(trans('file.languages')); ?>

                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.languages.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.languages.index')); ?>">Languages</a>
                        

                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="las la-cog"></i><?php echo e(trans('file.settings')); ?>

                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.page.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.page.index')); ?>">Pages</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.currencies.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.currencies.index')); ?>">Currency</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.header-images.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.header-images.index')); ?>">Header Image</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.mail-settings.create') ? 'active' : ''); ?>" href="<?php echo e(route('admin.mail-settings.create')); ?>">Mail Settings</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.analytics.create') ? 'active' : ''); ?>" href="<?php echo e(route('admin.analytics.create')); ?>">Google Analytics</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.sliders.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.sliders.index')); ?>">Sliders</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.services.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.services.index')); ?>">Services</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.videos.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.videos.index')); ?>">Videos</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.virtualrealitys.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.virtualrealitys.index')); ?>">Virtual Reality</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.testimonials.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.testimonials.index')); ?>">Testimonials</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.ourPartners.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.ourPartners.index')); ?>">Our Partners</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.siteinfo.create') ? 'active' : ''); ?>" href="<?php echo e(route('admin.siteinfo.create')); ?>">Site Informations</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.social.login') ? 'active' : ''); ?>" href="<?php echo e(route('admin.social.login')); ?>">Social Login</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="las la-file-upload"></i><?php echo e(trans('file.logout')); ?></a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">

                        <?php echo csrf_field(); ?>

                    </form>
                </li>

            </ul>
        </nav>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isUser')): ?>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">

                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('admin.dashboard')); ?>">
                                <i class="las la-home"></i><?php echo e(trans('file.dashboard')); ?>

                            </a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.messages.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.messages.index')); ?>"><i class="las la-envelope"></i><?php echo e(trans('file.messages')); ?></a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="las la-globe"></i><?php echo e(trans('file.locations')); ?>

                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.countries.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.countries.index')); ?>"><?php echo e(trans('file.countries')); ?></a>
                                </li>
                                <li>
                                    <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.states.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.states.index')); ?>"><?php echo e(trans('file.states')); ?></a>
                                </li>
                                <li>
                                    <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.cities.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.cities.index')); ?>"><?php echo e(trans('file.cities')); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                    <a class="js-arrow <?php echo e(Str::startsWith(Route::currentRouteName(),'admin.properties') ? 'active' : ''); ?>" href="#">
                        <i class="las la-layer-group"></i><?php echo e(trans('file.real_estate')); ?>

                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.properties.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.properties.index')); ?>"><?php echo e(trans('file.Properties')); ?></a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.facilities.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.facilities.index')); ?>"><?php echo e(trans('file.facilities')); ?></a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.categories.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.categories.index')); ?>"><?php echo e(trans('file.categories')); ?></a>
                        </li>
                    </ul>
                </li>
                    <li class="has-sub"><a class="js-arrow" href="#"><i class="las la-blog"></i><?php echo e(trans('file.blogs')); ?></a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.blog-categories.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.blog-categories.index')); ?>"><?php echo e(trans('file.category')); ?></a>
                            </li>
                            <li>
                                <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.tags.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.tags.index')); ?>"><?php echo e(trans('file.tags')); ?></a>
                            </li>
                            <li>
                                <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.blogs.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.blogs.index')); ?>"><?php echo e(trans('file.blogs')); ?></a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.page.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.page.index')); ?>">Pages</a>
                    </li>
                        <li>
                           <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.virtualrealitys.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.virtualrealitys.index')); ?>"><img src="<?php echo e(URL::asset('/frontend/images/360-degrees.png')); ?>" style="margin-right: 20px; width: 20px; font-size: 18px; display: inline-block; text-align: center;">  Virtual Reality</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.virtualrealitys.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.sliders.index')); ?>"><i class="las la-sliders-h"></i>Sliders</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.virtualrealitys.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.videos.index')); ?>"><i class="lab la-youtube"></i>Videos</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.bookings.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.bookings.index')); ?>"><i class="las la-copy"></i><?php echo e(trans('file.booking_request')); ?></a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.testimonials.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.testimonials.index')); ?>"><i class="las la-user-check"></i>Testimonials</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.ourPartners.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.ourPartners.index')); ?>"><i class="las la-hands-helping"></i>Our Partners</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.users.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.users.index')); ?>"><i class="las la-user-circle"></i><?php echo e(trans('file.my_profile')); ?></a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                <?php echo e(trans('file.logout')); ?></a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">

                                <?php echo csrf_field(); ?>

                            </form>
                        </li>

            </ul>
        </nav>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAgent')): ?>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('admin.dashboard')); ?>">
                                <i class="las la-home"></i><?php echo e(trans('file.dashboard')); ?>

                            </a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.messages.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.messages.index')); ?>"><i class="las la-envelope"></i><?php echo e(trans('file.messages')); ?></a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.bookings.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.bookings.index')); ?>"><i class="las la-copy"></i><?php echo e(trans('file.booking_request')); ?></a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.users.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.users.index')); ?>"><i class="las la-user-circle"></i><?php echo e(trans('file.my_profile')); ?></a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                <?php echo e(trans('file.logout')); ?></a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">

                                <?php echo csrf_field(); ?>

                            </form>
                        </li>

            </ul>
        </nav>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isMod')): ?>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="las la-globe"></i><?php echo e(trans('file.locations')); ?>

                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.countries.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.countries.index')); ?>"><?php echo e(trans('file.countries')); ?></a>
                                </li>
                                <li>
                                    <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.states.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.states.index')); ?>"><?php echo e(trans('file.states')); ?></a>
                                </li>
                                <li>
                                    <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.cities.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.cities.index')); ?>"><?php echo e(trans('file.cities')); ?></a>
                                </li>
                            </ul>
                        </li>
                <li class="has-sub">
                    <a class="js-arrow <?php echo e(Str::startsWith(Route::currentRouteName(),'admin.properties') ? 'active' : ''); ?>" href="#">
                        <i class="las la-layer-group"></i><?php echo e(trans('file.real_estate')); ?>

                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.properties.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.properties.index')); ?>"><?php echo e(trans('file.Properties')); ?></a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.facilities.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.facilities.index')); ?>"><?php echo e(trans('file.facilities')); ?></a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.categories.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.categories.index')); ?>"><?php echo e(trans('file.categories')); ?></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.page.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.page.index')); ?>">Pages</a>
                </li>
                    <li class="has-sub"><a class="js-arrow" href="#"><i class="las la-blog"></i><?php echo e(trans('file.blogs')); ?></a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.blog-categories.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.blog-categories.index')); ?>"><?php echo e(trans('file.category')); ?></a>
                            </li>
                            <li>
                                <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.tags.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.tags.index')); ?>"><?php echo e(trans('file.tags')); ?></a>
                            </li>
                            <li>
                                <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.blogs.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.blogs.index')); ?>"><?php echo e(trans('file.blogs')); ?></a>
                            </li>

                        </ul>
                    </li>
                        <li>
                           <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.virtualrealitys.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.virtualrealitys.index')); ?>"><img src="<?php echo e(URL::asset('/frontend/images/360-degrees.png')); ?>" style="margin-right: 20px; width: 20px; font-size: 18px; display: inline-block; text-align: center;">  Virtual Reality</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.virtualrealitys.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.sliders.index')); ?>"><i class="las la-sliders-h"></i>Sliders</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.virtualrealitys.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.videos.index')); ?>"><i class="lab la-youtube"></i>Videos</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.bookings.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.bookings.index')); ?>"><i class="las la-copy"></i><?php echo e(trans('file.booking_request')); ?></a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.testimonials.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.testimonials.index')); ?>"><i class="las la-user-check"></i>Testimonials</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.ourPartners.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.ourPartners.index')); ?>"><i class="las la-hands-helping"></i>Our Partners</a>
                        </li>
                        <li>
                            <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.users.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.users.index')); ?>"><i class="las la-user-circle"></i><?php echo e(trans('file.my_profile')); ?></a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                <?php echo e(trans('file.logout')); ?></a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">

                                <?php echo csrf_field(); ?>

                            </form>
                        </li>

            </ul>
        </nav>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('forStories')): ?>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">

                            <li>
                                <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.stories.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.stories.index')); ?>">Stories</a>
                            </li>


                        <li>
                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                <?php echo e(trans('file.logout')); ?></a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">

                                <?php echo csrf_field(); ?>

                            </form>
                        </li>

            </ul>
        </nav>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('forVideos')): ?>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">

                            <li>
                                <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.videos.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.videos.index')); ?>">Videos</a>
                            </li>


                        <li>
                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                <?php echo e(trans('file.logout')); ?></a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">

                                <?php echo csrf_field(); ?>

                            </form>
                        </li>

            </ul>
        </nav>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('forSliders')): ?>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">

                            <li>
                                <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.sliders.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.sliders.index')); ?>">Sliders</a>
                            </li>


                        <li>
                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                <?php echo e(trans('file.logout')); ?></a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">

                                <?php echo csrf_field(); ?>

                            </form>
                        </li>

            </ul>
        </nav>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('forPanorama')): ?>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">

                            <li>
                                <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.virtualrealitys.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.virtualrealitys.index')); ?>">IVR</a>
                            </li>


                        <li>
                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                <?php echo e(trans('file.logout')); ?></a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">

                                <?php echo csrf_field(); ?>

                            </form>
                        </li>

            </ul>
        </nav>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('forContent')): ?>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                    <li class="has-sub"><a class="js-arrow" href="#"><i class="las la-blog"></i><?php echo e(trans('file.blogs')); ?></a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.blog-categories.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.blog-categories.index')); ?>"><?php echo e(trans('file.category')); ?></a>
                            </li>
                            <li>
                                <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.tags.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.tags.index')); ?>"><?php echo e(trans('file.tags')); ?></a>
                            </li>
                            <li>
                                <a class="<?php echo e(Str::startsWith(Route::currentRouteName(),'admin.blogs.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.blogs.index')); ?>"><?php echo e(trans('file.blogs')); ?></a>
                            </li>

                        </ul>
                    </li>


                        <li>
                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                <?php echo e(trans('file.logout')); ?></a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">

                                <?php echo csrf_field(); ?>

                            </form>
                        </li>

            </ul>
        </nav>
        <?php endif; ?>
    </div>
</aside>
<?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/admin/includes/left-sidear.blade.php ENDPATH**/ ?>