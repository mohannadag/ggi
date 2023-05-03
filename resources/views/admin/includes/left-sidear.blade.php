<aside class="menu-sidebar js-right-sidebar d-block">
    <div class="logo">
        <a href="{{url('/')}}">
            @if(isset($siteInfo->logo))
            @if(file_exists( public_path() . '/images/images/'.$siteInfo->logo))
                <img loading="lazy" src="{{ URL::asset('/images/images/'.$siteInfo->logo) }}" id="preview-image-before-upload" alt="Image">
            @else
                <img loading="lazy" src="{{asset('images/logo-blue.png')}}" alt="logo2" class="img-fluid">
            @endif
        @else
                <img loading="lazy" src="{{asset('images/logo-blue.png')}}" alt="logo">
        @endif
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar2">
        @can('isAdmin')
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">

                <li>
                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                        <i class="las la-home"></i>{{trans('file.dashboard')}}
                    </a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow {{Str::startsWith(Route::currentRouteName(),'admin.properties') ? 'active' : '' }}" href="#">
                        <i class="las la-layer-group"></i>{{trans('file.real_estate')}}
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.properties.index') ? 'active' : '' }}" href="{{route('admin.properties.index')}}">{{trans('file.Properties')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.facilities.index') ? 'active' : '' }}" href="{{route('admin.facilities.index')}}">{{trans('file.facilities')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.units.index') ? 'active' : '' }}" href="{{route('admin.units.index')}}">Units</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.categories.index') ? 'active' : '' }}" href="{{route('admin.categories.index')}}">{{trans('file.categories')}}</a>
                        </li>
                    </ul>
                </li>

                <li class="has-sub"><a class="js-arrow" href="#"><i class="las la-blog"></i>Stories</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.campaigns.index') ? 'active' : '' }}" href="{{route('admin.campaigns.index')}}">Campaigns</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.stories.index') ? 'active' : '' }}" href="{{route('admin.stories.index')}}">Stories</a>
                        </li>

                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="las la-globe"></i>{{trans('file.locations')}}
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.countries.index') ? 'active' : '' }}" href="{{route('admin.countries.index')}}">{{trans('file.countries')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.states.index') ? 'active' : '' }}" href="{{route('admin.states.index')}}">{{trans('file.states')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.cities.index') ? 'active' : '' }}" href="{{route('admin.cities.index')}}">{{trans('file.cities')}}</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.agents.index') ? 'active' : '' }}" href="{{route('admin.agents.index')}}">
                        <i class="las la-users"></i>{{trans('file.agents')}}</a>
                </li>
                <li>
                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.bookings.index') ? 'active' : '' }}" href="{{route('admin.bookings.index')}}">
                        <i class="las la-copy"></i>{{trans('file.booking_request')}}</a>
                </li>


                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="las la-blog"></i>{{trans('file.blogs')}}
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.blog-categories.index') ? 'active' : '' }}" href="{{route('admin.blog-categories.index')}}">{{trans('file.category')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.tags.index') ? 'active' : '' }}" href="{{route('admin.tags.index')}}">{{trans('file.tags')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.blogs.index') ? 'active' : '' }}" href="{{route('admin.blogs.index')}}">{{trans('file.blogs')}}</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.messages.index') ? 'active' : '' }}" href="{{route('admin.messages.index')}}">
                        <i class="las la-envelope"></i>{{trans('file.messages')}}</a>
                </li>
                <li>
                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.users.index') ? 'active' : '' }}" href="{{route('admin.users.index')}}">
                        <i class="las la-user-circle"></i>{{trans('file.my_profile')}}</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="las la-language"></i>{{trans('file.languages')}}
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.languages.index') ? 'active' : '' }}" href="{{route('admin.languages.index')}}">Languages</a>
                        {{-- </li>
                        <li>
                            <a href="{{ route('admin.languages.translations.index', config('app.locale')) }}" class="{{ set_active('*/translations') }}">
                                {{ __('translation::translation.translations') }}
                            </a>
                        </li> --}}

                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="las la-cog"></i>{{trans('file.settings')}}
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.page.index') ? 'active' : '' }}" href="{{route('admin.page.index')}}">Pages</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.currencies.index') ? 'active' : '' }}" href="{{route('admin.currencies.index')}}">Currency</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.header-images.index') ? 'active' : '' }}" href="{{route('admin.header-images.index')}}">Header Image</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.mail-settings.create') ? 'active' : '' }}" href="{{route('admin.mail-settings.create')}}">Mail Settings</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.analytics.create') ? 'active' : '' }}" href="{{route('admin.analytics.create')}}">Google Analytics</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.sliders.index') ? 'active' : '' }}" href="{{route('admin.sliders.index')}}">Sliders</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.services.index') ? 'active' : '' }}" href="{{route('admin.services.index')}}">Services</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.videos.index') ? 'active' : '' }}" href="{{route('admin.videos.index')}}">Videos</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.virtualrealitys.index') ? 'active' : '' }}" href="{{route('admin.virtualrealitys.index')}}">Virtual Reality</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.testimonials.index') ? 'active' : '' }}" href="{{route('admin.testimonials.index')}}">Testimonials</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.ourPartners.index') ? 'active' : '' }}" href="{{route('admin.ourPartners.index')}}">Our Partners</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.siteinfo.create') ? 'active' : '' }}" href="{{route('admin.siteinfo.create')}}">Site Informations</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.social.login') ? 'active' : '' }}" href="{{route('admin.social.login')}}">Social Login</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="las la-file-upload"></i>{{trans('file.logout')}}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                        @csrf

                    </form>
                </li>

            </ul>
        </nav>
        @endcan

        @can('isUser')
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">

                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                                <i class="las la-home"></i>{{trans('file.dashboard')}}
                            </a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.messages.index') ? 'active' : '' }}" href="{{route('admin.messages.index')}}"><i class="las la-envelope"></i>{{trans('file.messages')}}</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="las la-globe"></i>{{trans('file.locations')}}
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.countries.index') ? 'active' : '' }}" href="{{route('admin.countries.index')}}">{{trans('file.countries')}}</a>
                                </li>
                                <li>
                                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.states.index') ? 'active' : '' }}" href="{{route('admin.states.index')}}">{{trans('file.states')}}</a>
                                </li>
                                <li>
                                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.cities.index') ? 'active' : '' }}" href="{{route('admin.cities.index')}}">{{trans('file.cities')}}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                    <a class="js-arrow {{Str::startsWith(Route::currentRouteName(),'admin.properties') ? 'active' : '' }}" href="#">
                        <i class="las la-layer-group"></i>{{trans('file.real_estate')}}
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.properties.index') ? 'active' : '' }}" href="{{route('admin.properties.index')}}">{{trans('file.Properties')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.facilities.index') ? 'active' : '' }}" href="{{route('admin.facilities.index')}}">{{trans('file.facilities')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.categories.index') ? 'active' : '' }}" href="{{route('admin.categories.index')}}">{{trans('file.categories')}}</a>
                        </li>
                    </ul>
                </li>
                    <li class="has-sub"><a class="js-arrow" href="#"><i class="las la-blog"></i>{{trans('file.blogs')}}</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a class="{{Str::startsWith(Route::currentRouteName(),'admin.blog-categories.index') ? 'active' : '' }}" href="{{route('admin.blog-categories.index')}}">{{trans('file.category')}}</a>
                            </li>
                            <li>
                                <a class="{{Str::startsWith(Route::currentRouteName(),'admin.tags.index') ? 'active' : '' }}" href="{{route('admin.tags.index')}}">{{trans('file.tags')}}</a>
                            </li>
                            <li>
                                <a class="{{Str::startsWith(Route::currentRouteName(),'admin.blogs.index') ? 'active' : '' }}" href="{{route('admin.blogs.index')}}">{{trans('file.blogs')}}</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a class="{{Str::startsWith(Route::currentRouteName(),'admin.page.index') ? 'active' : '' }}" href="{{route('admin.page.index')}}">Pages</a>
                    </li>
                        <li>
                           <a class="{{Str::startsWith(Route::currentRouteName(),'admin.virtualrealitys.index') ? 'active' : '' }}" href="{{route('admin.virtualrealitys.index')}}"><img src="{{URL::asset('/frontend/images/360-degrees.png')}}" style="margin-right: 20px; width: 20px; font-size: 18px; display: inline-block; text-align: center;">  Virtual Reality</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.virtualrealitys.index') ? 'active' : '' }}" href="{{route('admin.sliders.index')}}"><i class="las la-sliders-h"></i>Sliders</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.virtualrealitys.index') ? 'active' : '' }}" href="{{route('admin.videos.index')}}"><i class="lab la-youtube"></i>Videos</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.bookings.index') ? 'active' : '' }}" href="{{route('admin.bookings.index')}}"><i class="las la-copy"></i>{{trans('file.booking_request')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.testimonials.index') ? 'active' : '' }}" href="{{route('admin.testimonials.index')}}"><i class="las la-user-check"></i>Testimonials</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.ourPartners.index') ? 'active' : '' }}" href="{{route('admin.ourPartners.index')}}"><i class="las la-hands-helping"></i>Our Partners</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.users.index') ? 'active' : '' }}" href="{{route('admin.users.index')}}"><i class="las la-user-circle"></i>{{trans('file.my_profile')}}</a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                {{trans('file.logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                @csrf

                            </form>
                        </li>

            </ul>
        </nav>
        @endcan

        @can('isAgent')
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                                <i class="las la-home"></i>{{trans('file.dashboard')}}
                            </a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.messages.index') ? 'active' : '' }}" href="{{route('admin.messages.index')}}"><i class="las la-envelope"></i>{{trans('file.messages')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.bookings.index') ? 'active' : '' }}" href="{{route('admin.bookings.index')}}"><i class="las la-copy"></i>{{trans('file.booking_request')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.users.index') ? 'active' : '' }}" href="{{route('admin.users.index')}}"><i class="las la-user-circle"></i>{{trans('file.my_profile')}}</a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                {{trans('file.logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                @csrf

                            </form>
                        </li>

            </ul>
        </nav>
        @endcan

        @can('isMod')
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="las la-globe"></i>{{trans('file.locations')}}
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.countries.index') ? 'active' : '' }}" href="{{route('admin.countries.index')}}">{{trans('file.countries')}}</a>
                                </li>
                                <li>
                                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.states.index') ? 'active' : '' }}" href="{{route('admin.states.index')}}">{{trans('file.states')}}</a>
                                </li>
                                <li>
                                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.cities.index') ? 'active' : '' }}" href="{{route('admin.cities.index')}}">{{trans('file.cities')}}</a>
                                </li>
                            </ul>
                        </li>
                <li class="has-sub">
                    <a class="js-arrow {{Str::startsWith(Route::currentRouteName(),'admin.properties') ? 'active' : '' }}" href="#">
                        <i class="las la-layer-group"></i>{{trans('file.real_estate')}}
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.properties.index') ? 'active' : '' }}" href="{{route('admin.properties.index')}}">{{trans('file.Properties')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.facilities.index') ? 'active' : '' }}" href="{{route('admin.facilities.index')}}">{{trans('file.facilities')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.categories.index') ? 'active' : '' }}" href="{{route('admin.categories.index')}}">{{trans('file.categories')}}</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.page.index') ? 'active' : '' }}" href="{{route('admin.page.index')}}">Pages</a>
                </li>
                    <li class="has-sub"><a class="js-arrow" href="#"><i class="las la-blog"></i>{{trans('file.blogs')}}</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a class="{{Str::startsWith(Route::currentRouteName(),'admin.blog-categories.index') ? 'active' : '' }}" href="{{route('admin.blog-categories.index')}}">{{trans('file.category')}}</a>
                            </li>
                            <li>
                                <a class="{{Str::startsWith(Route::currentRouteName(),'admin.tags.index') ? 'active' : '' }}" href="{{route('admin.tags.index')}}">{{trans('file.tags')}}</a>
                            </li>
                            <li>
                                <a class="{{Str::startsWith(Route::currentRouteName(),'admin.blogs.index') ? 'active' : '' }}" href="{{route('admin.blogs.index')}}">{{trans('file.blogs')}}</a>
                            </li>

                        </ul>
                    </li>
                        <li>
                           <a class="{{Str::startsWith(Route::currentRouteName(),'admin.virtualrealitys.index') ? 'active' : '' }}" href="{{route('admin.virtualrealitys.index')}}"><img src="{{URL::asset('/frontend/images/360-degrees.png')}}" style="margin-right: 20px; width: 20px; font-size: 18px; display: inline-block; text-align: center;">  Virtual Reality</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.virtualrealitys.index') ? 'active' : '' }}" href="{{route('admin.sliders.index')}}"><i class="las la-sliders-h"></i>Sliders</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.virtualrealitys.index') ? 'active' : '' }}" href="{{route('admin.videos.index')}}"><i class="lab la-youtube"></i>Videos</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.bookings.index') ? 'active' : '' }}" href="{{route('admin.bookings.index')}}"><i class="las la-copy"></i>{{trans('file.booking_request')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.testimonials.index') ? 'active' : '' }}" href="{{route('admin.testimonials.index')}}"><i class="las la-user-check"></i>Testimonials</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.ourPartners.index') ? 'active' : '' }}" href="{{route('admin.ourPartners.index')}}"><i class="las la-hands-helping"></i>Our Partners</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.users.index') ? 'active' : '' }}" href="{{route('admin.users.index')}}"><i class="las la-user-circle"></i>{{trans('file.my_profile')}}</a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                {{trans('file.logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                @csrf

                            </form>
                        </li>

            </ul>
        </nav>
        @endcan

        @can('forStories')
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">

                            <li>
                                <a class="{{Str::startsWith(Route::currentRouteName(),'admin.stories.index') ? 'active' : '' }}" href="{{route('admin.stories.index')}}">Stories</a>
                            </li>


                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                {{trans('file.logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                @csrf

                            </form>
                        </li>

            </ul>
        </nav>
        @endcan

        @can('forVideos')
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">

                            <li>
                                <a class="{{Str::startsWith(Route::currentRouteName(),'admin.videos.index') ? 'active' : '' }}" href="{{route('admin.videos.index')}}">Videos</a>
                            </li>


                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                {{trans('file.logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                @csrf

                            </form>
                        </li>

            </ul>
        </nav>
        @endcan

        @can('forSliders')
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">

                            <li>
                                <a class="{{Str::startsWith(Route::currentRouteName(),'admin.sliders.index') ? 'active' : '' }}" href="{{route('admin.sliders.index')}}">Sliders</a>
                            </li>


                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                {{trans('file.logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                @csrf

                            </form>
                        </li>

            </ul>
        </nav>
        @endcan

        @can('forPanorama')
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">

                            <li>
                                <a class="{{Str::startsWith(Route::currentRouteName(),'admin.virtualrealitys.index') ? 'active' : '' }}" href="{{route('admin.virtualrealitys.index')}}">IVR</a>
                            </li>


                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                {{trans('file.logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                @csrf

                            </form>
                        </li>

            </ul>
        </nav>
        @endcan

        @can('forContent')
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                    <li class="has-sub"><a class="js-arrow" href="#"><i class="las la-blog"></i>{{trans('file.blogs')}}</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a class="{{Str::startsWith(Route::currentRouteName(),'admin.blog-categories.index') ? 'active' : '' }}" href="{{route('admin.blog-categories.index')}}">{{trans('file.category')}}</a>
                            </li>
                            <li>
                                <a class="{{Str::startsWith(Route::currentRouteName(),'admin.tags.index') ? 'active' : '' }}" href="{{route('admin.tags.index')}}">{{trans('file.tags')}}</a>
                            </li>
                            <li>
                                <a class="{{Str::startsWith(Route::currentRouteName(),'admin.blogs.index') ? 'active' : '' }}" href="{{route('admin.blogs.index')}}">{{trans('file.blogs')}}</a>
                            </li>

                        </ul>
                    </li>


                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                {{trans('file.logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                @csrf

                            </form>
                        </li>

            </ul>
        </nav>
        @endcan
    </div>
</aside>
