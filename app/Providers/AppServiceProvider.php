<?php

namespace App\Providers;

use App\Models\Credit;
use App\Models\SiteInfo;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Schema;
use App\Repositories;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        // if(env('APP_ENV') != 'local') {
        // URL::forceScheme('https');
        // }
        //Check for Admin
        //Return true if auth user type is admin
        $gate->define('isAdmin',function($user){
            return $user->type == 'admin';
        });
        //Check for User
        //Return true if auth user type is user
        $gate->define('isUser',function($user){
            return $user->type == 'user';
        });
        $gate->define('isAgent',function($user){
            return $user->type == 'agent';
        });
        $gate->define('isMod',function($user){
            return $user->type == 'moderator';
        });
        $gate->define('forStories',function($user){
            return $user->type == 'stories';
        });
        $gate->define('forVideos',function($user){
            return $user->type == 'video';
        });
        $gate->define('forSliders',function($user){
            return $user->type == 'sliders';
        });
        $gate->define('forPanorama',function($user){
            return $user->type == 'panorama';
        });
        $gate->define('forContent',function($user){
            return $user->type == 'content';
        });

        $gate->define('hasCredit',function($user){
            return $user->packageUser->sum('price') > 0;
        });
        $gate->define('zeroCredit',function($user){
            return $user->packageUser->sum('price') == 0;
        });
        if (!session()->has('currency')) {
            Session::put('currency', 'USD');
        }

//        $pdo = DB::connection()->getDatabaseName();
//
//        if($pdo)
//        {
        View::share('siteInfo',SiteInfo::first());
//            View::share('verifiedUser',User::where('type','admin')->where('is_approved',1)->get());
//        }

        $this->app->bind(\App\Repositories\IRepository::class,\App\Repositories\Repository::class);

        $this->app->bind(\App\Repositories\ICategoryRepository::class,\App\Repositories\CategoryRepository::class);
        $this->app->bind(\App\Repositories\ICategoryTranslationRepository::class,\App\Repositories\CategoryTranslationRepository::class);
        $this->app->bind(\App\ViewModels\ICategoryModel::class,\App\ViewModels\CategoryModel::class);
        $this->app->bind(\App\ViewModels\ICategoryTranslationModel::class,\App\ViewModels\CategoryTranslationModel::class);

        $this->app->bind(\App\Repositories\ICountryRepository::class,\App\Repositories\CountryRepository::class);
        $this->app->bind(\App\Repositories\ICountryTranslationRepository::class,\App\Repositories\CountryTranslationRepository::class);
        $this->app->bind(\App\ViewModels\ICountryModel::class,\App\ViewModels\CountryModel::class);
        $this->app->bind(\App\ViewModels\ICountryTranslationModel::class,\App\ViewModels\CountryTranslationModel::class);

        $this->app->bind(\App\Repositories\IStateRepository::class,\App\Repositories\StateRepository::class);
        $this->app->bind(\App\Repositories\IStateTranslationRepository::class,\App\Repositories\StateTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IStateModel::class,\App\ViewModels\StateModel::class);
        $this->app->bind(\App\ViewModels\IStateTranslationModel::class,\App\ViewModels\StateTranslationModel::class);

        $this->app->bind(\App\Repositories\ICityRepository::class,\App\Repositories\CityRepository::class);
        $this->app->bind(\App\Repositories\ICityTranslationRepository::class,\App\Repositories\CityTranslationRepository::class);
        $this->app->bind(\App\ViewModels\ICityModel::class,\App\ViewModels\CityModel::class);
        $this->app->bind(\App\ViewModels\ICityTranslationModel::class,\App\ViewModels\CityTranslationModel::class);

        $this->app->bind(\App\Repositories\IFacilityRepository::class,\App\Repositories\FacilityRepository::class);
        $this->app->bind(\App\Repositories\IFacilityTranslationRepository::class,\App\Repositories\FacilityTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IFacilityModel::class,\App\ViewModels\FacilityModel::class);
        $this->app->bind(\App\ViewModels\IFacilityTranslationModel::class,\App\ViewModels\FacilityTranslationModel::class);

        $this->app->bind(\App\Repositories\IUnitsRepository::class,\App\Repositories\UnitsRepository::class);
        $this->app->bind(\App\Repositories\IUnitsTranslationRepository::class,\App\Repositories\UnitsTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IUnitsModel::class,\App\ViewModels\UnitsModel::class);
        $this->app->bind(\App\ViewModels\IUnitsTranslationModel::class,\App\ViewModels\UnitsTranslationModel::class);

        $this->app->bind(\App\Repositories\IPropertyRepository::class,\App\Repositories\PropertyRepository::class);
        $this->app->bind(\App\Repositories\IPropertyTranslationRepository::class,\App\Repositories\PropertyTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IPropertyModel::class,\App\ViewModels\PropertyModel::class);
        $this->app->bind(\App\ViewModels\IPropertyTranslationModel::class,\App\ViewModels\PropertyTranslationModel::class);
        $this->app->bind(\App\Repositories\IPropertyDetailRepository::class,\App\Repositories\PropertyDetailRepository::class);
        $this->app->bind(\App\Repositories\IPropertyDetailTranslationRepository::class,\App\Repositories\PropertyDetailTranslationRepository::class);

        $this->app->bind(\App\Repositories\IPackageRepository::class,\App\Repositories\PackageRepository::class);
        $this->app->bind(\App\Repositories\IPackageTranslationRepository::class,\App\Repositories\PackageTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IPackageModel::class,\App\ViewModels\PackageModel::class);
        $this->app->bind(\App\ViewModels\IPackageTranslationModel::class,\App\ViewModels\PackageTranslationModel::class);

        $this->app->bind(\App\Repositories\ISliderRepository::class,\App\Repositories\SliderRepository::class);
        $this->app->bind(\App\Repositories\ISliderTranslationRepository::class,\App\Repositories\SliderTranslationRepository::class);
        $this->app->bind(\App\ViewModels\ISliderModel::class,\App\ViewModels\SliderModel::class);
        $this->app->bind(\App\ViewModels\ISliderTranslationModel::class,\App\ViewModels\SliderTranslationModel::class);

        $this->app->bind(\App\Repositories\IStoryRepository::class,\App\Repositories\StoryRepository::class);
        $this->app->bind(\App\Repositories\IStoryTranslationRepository::class,\App\Repositories\StoryTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IStoryModel::class,\App\ViewModels\StoryModel::class);
        $this->app->bind(\App\ViewModels\IStoryTranslationModel::class,\App\ViewModels\StoryTranslationModel::class);

        $this->app->bind(\App\Repositories\ICampaignRepository::class,\App\Repositories\CampaignRepository::class);
        $this->app->bind(\App\Repositories\ICampaignTranslationRepository::class,\App\Repositories\CampaignTranslationRepository::class);
        $this->app->bind(\App\ViewModels\ICampaignModel::class,\App\ViewModels\CampaignModel::class);
        $this->app->bind(\App\ViewModels\ICampaignTranslationModel::class,\App\ViewModels\CampaignTranslationModel::class);

        $this->app->bind(\App\Repositories\IServiceRepository::class,\App\Repositories\ServiceRepository::class);
        $this->app->bind(\App\Repositories\IServiceTranslationRepository::class,\App\Repositories\ServiceTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IServiceModel::class,\App\ViewModels\ServiceModel::class);
        $this->app->bind(\App\ViewModels\IServiceTranslationModel::class,\App\ViewModels\ServiceTranslationModel::class);

        $this->app->bind(\App\Repositories\IVirtualRealityRepository::class,\App\Repositories\VirtualRealityRepository::class);
        $this->app->bind(\App\Repositories\IVirtualRealityTranslationRepository::class,\App\Repositories\VirtualRealityTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IVirtualRealityModel::class,\App\ViewModels\VirtualRealityModel::class);
        $this->app->bind(\App\ViewModels\IVirtualRealityTranslationModel::class,\App\ViewModels\VirtualRealityTranslationModel::class);

        $this->app->bind(\App\Repositories\IVideoRepository::class,\App\Repositories\VideoRepository::class);
        $this->app->bind(\App\Repositories\IVideoTranslationRepository::class,\App\Repositories\VideoTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IVideoModel::class,\App\ViewModels\VideoModel::class);
        $this->app->bind(\App\ViewModels\IVideoTranslationModel::class,\App\ViewModels\VideoTranslationModel::class);

        $this->app->bind(\App\Repositories\ITestimonialRepository::class,\App\Repositories\TestimonialRepository::class);
        $this->app->bind(\App\Repositories\ITestimonialTranslationRepository::class,\App\Repositories\TestimonialTranslationRepository::class);
        $this->app->bind(\App\ViewModels\ITestimonialModel::class,\App\ViewModels\TestimonialModel::class);
        $this->app->bind(\App\ViewModels\ITestimonialTranslationModel::class,\App\ViewModels\TestimonialTranslationModel::class);

        $this->app->bind(\App\Repositories\IPartnerRepository::class,\App\Repositories\PartnerRepository::class);
        $this->app->bind(\App\ViewModels\IPartnerModel::class,\App\ViewModels\PartnerModel::class);

        $this->app->bind(\App\Repositories\ISiteInfoRepository::class,\App\Repositories\SiteInfoRepository::class);
        $this->app->bind(\App\ViewModels\ISiteInfoModel::class,\App\ViewModels\SiteInfoModel::class);

        $this->app->bind(\App\Payment\IPayPalPayment::class,\App\Payment\PaypalPayment::class);
        $this->app->bind(\App\Payment\IStripePayment::class,\App\Payment\StripePayment::class);
        $this->app->bind(\App\Payment\IRazorpayPayment::class,\App\Payment\RazorpayPayment::class);
        $this->app->bind(\App\Payment\Paystack\IPaystackPayment::class,\App\Payment\Paystack\PaystackPayment::class);
        $this->app->bind(\App\ViewModels\IPaymentModel::class,\App\ViewModels\PaymentModel::class);

        $this->app->bind(\App\Repositories\IPackageUserRepository::class,\App\Repositories\PackageUserRepository::class);
        $this->app->bind(\App\ViewModels\IPackageUserModel::class,\App\ViewModels\PackageUserModel::class);

        $this->app->bind(\App\Repositories\IImageRepository::class,\App\Repositories\ImageRepository::class);

        $this->app->bind(\App\Repositories\IUserRepository::class,\App\Repositories\UserRepository::class);
        $this->app->bind(\App\Repositories\IUserTranslationRepository::class,\App\Repositories\UserTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IUserModel::class,\App\ViewModels\UserModel::class);
        $this->app->bind(\App\ViewModels\IUserTranslationModel::class,\App\ViewModels\UserTranslationModel::class);

        $this->app->bind(\App\ViewModels\ISocialLoginModel::class,\App\ViewModels\SocialLoginModel::class);
        $this->app->bind(\App\SocialLogin\IFacebookLogin::class,\App\SocialLogin\FacebookLogin::class);
        $this->app->bind(\App\SocialLogin\IGoogleLogin::class,\App\SocialLogin\GoogleLogin::class);
        $this->app->bind(\App\SocialLogin\IGithubLogin::class,\App\SocialLogin\GithubLogin::class);

        $this->app->bind(\App\Repositories\ICurrencyRepository::class,\App\Repositories\CurrencyRepository::class);
        $this->app->bind(\App\ViewModels\ICurrencyModel::class,\App\ViewModels\CurrencyModel::class);

        $this->app->bind(\App\Repositories\IPageRepository::class,\App\Repositories\PageRepository::class);
        $this->app->bind(\App\Repositories\IPageTranslationRepository::class,\App\Repositories\PageTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IPageModel::class,\App\ViewModels\PageModel::class);
        $this->app->bind(\App\ViewModels\IPageTranslationModel::class,\App\ViewModels\PageTranslationModel::class);

        $this->app->bind(\App\Repositories\ILandingRepository::class,\App\Repositories\LandingRepository::class);
        $this->app->bind(\App\Repositories\ILandingTranslationRepository::class,\App\Repositories\LandingTranslationRepository::class);
        $this->app->bind(\App\ViewModels\ILandingModel::class,\App\ViewModels\LandingModel::class);
        $this->app->bind(\App\ViewModels\ILandingTranslationModel::class,\App\ViewModels\LandingTranslationModel::class);

        $this->app->bind(\App\Repositories\ICitizenshipRepository::class,\App\Repositories\CitizenshipRepository::class);
        $this->app->bind(\App\Repositories\ICitizenshipTranslationRepository::class,\App\Repositories\CitizenshipTranslationRepository::class);
        $this->app->bind(\App\ViewModels\ICitizenshipModel::class,\App\ViewModels\CitizenshipModel::class);
        $this->app->bind(\App\ViewModels\ICitizenshipTranslationModel::class,\App\ViewModels\CitizenshipTranslationModel::class);

        $this->app->bind(\App\Repositories\IFaqRepository::class,\App\Repositories\FaqRepository::class);
        $this->app->bind(\App\Repositories\IFaqTranslationRepository::class,\App\Repositories\FaqTranslationRepository::class);
        $this->app->bind(\App\ViewModels\IFaqModel::class,\App\ViewModels\FaqModel::class);
        $this->app->bind(\App\ViewModels\IFaqTranslationModel::class,\App\ViewModels\FaqTranslationModel::class);

        $this->app->bind(\App\Repositories\IPropertySearchRepository::class,\App\Repositories\PropertySearchRepository::class);
        $this->app->bind(\App\ViewModels\IPropertySearchModel::class,\App\ViewModels\PropertySearchModel::class);

        // blog
        $this->app->bind(\App\ViewModels\IBlogModel::class,\App\ViewModels\BlogModel::class);
        $this->app->bind(\App\Repositories\IBlogRepository::class,\App\Repositories\BlogRepository::class);

        // property floors
        $this->app->bind(\App\Repositories\IPropertyFloorRepository::class,\App\Repositories\PropertyFloorRepository::class);

    }
}
