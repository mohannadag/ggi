<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Front\HomePageController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\File;
use Spatie\Analytics\Period;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('clear', function () {
    Artisan::call('optimize:clear');
    dd('success');
});
Route::get('get-image', function () {
    Artisan::call('storage:link');
    dd('success');
});



Route::get('/', [Front\HomePageController::class, 'index'])->name('front.home');
Route::post('/send', [Front\PopupController::class, 'send'])->name('popup')->middleware('XSS');
// Route::get('/help',function(){
//     return File::get(public_path() . '/../help/index.html');
// });
Route::get('/properties', [Front\PropertyController::class, 'index'])->name('properties');;
Route::get('/drive', [Front\ProjectController::class, 'index']);
Route::get('/properties-map', [Front\PropertyController::class, 'maps']);
// Route::get('/properties/rent',[Front\PropertyController::class,'rent'])->name('property.rent');
// Route::get('/properties/sale',[Front\PropertyController::class,'sale'])->name('property.sale');
Route::get('/properties/city/{city}', [Front\PropertyController::class, 'city'])->name('property.city');
Route::get('/properties/getCity/{city}', [Front\PropertyController::class, 'getCity'])->name('get.city');
Route::get('/properties/state/{state}', [Front\PropertyController::class, 'State'])->name('property.state');
Route::get('/properties/sale', [Front\PropertyController::class, 'Sale'])->name('property.sale');
Route::get('/properties/rent', [Front\PropertyController::class, 'Rent'])->name('property.rent');
Route::get('/properties/property/{category}', [Front\PropertyController::class, 'category'])->name('get.category');
Route::get('/properties/{property}', [Front\PropertyController::class, 'singleProperty'])->name('front.property');
Route::get('/drive/{property}', [Front\ProjectController::class, 'singleProject'])->name('front.project');
Route::get('/ivr', [Front\HomePageController::class, 'ivrhome'])->name('front.ivr-index');
Route::get('/ivr/{property}', [Front\PropertyController::class, 'ivrProperty'])->name('front.property-ivr');
Route::get('/ivr-2/{property}', [Front\PropertyController::class, 'ivrProp'])->name('front.property-ivr-2');
Route::get('/ivr-3/{property}', [Front\PropertyController::class, 'ivrProp3'])->name('front.property-ivr-3');
Route::get('/ivr-4/{property}', [Front\PropertyController::class, 'ivrProp4'])->name('front.property-ivr-4');
Route::get('/services/{service}', [Front\HomePageController::class, 'service'])->name('single-service');
Route::get('/about', [Front\HomePageController::class, 'about']);
Route::get('/faq', [Front\HomePageController::class, 'faq']);
Route::get('/page/{page}', [Front\HomePageController::class, 'page']);
Route::get('/landing/{landing}', [Front\HomePageController::class, 'landing']);
Route::get('/virtual', [Front\HomePageController::class, 'virtualreality']);
Route::get('/videos', [Front\HomePageController::class, 'video']);
Route::get('/privacy', [Front\HomePageController::class, 'privacy']);
Route::get('/terms', [Front\HomePageController::class, 'terms']);
Route::get('/contact', [Front\ContactController::class, 'index']);
Route::post('/contact/send', [Front\ContactController::class, 'send'])->name('contact')->middleware('XSS');
Route::get('/turkish-citizenship', [Front\CitizenshipController::class, 'index']);
Route::get('/career', [Front\CareerController::class, 'index']);
Route::post('/career/send', [Front\CareerController::class, 'store'])->name('career');
Route::get('/404', [Front\HomePageController::class, 'errorPage']);
Route::get('/agents', [Front\AgentController::class, 'index']);
Route::get('/agents/{agent}', [Front\AgentController::class, 'show'])->name('agents.show');
Route::get('/packages', [Front\HomePageController::class, 'membershipPackage']);
Route::get('/news', [Front\NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [Front\NewsController::class, 'show'])->name('news.show');
Route::get('/news/popular-topic/{category}', [Front\NewsController::class, 'popularTopic'])->name('news.popular-topic');
Route::get('/add-listing', [Front\HomePageController::class, 'addListing'])->middleware('auth');
Route::post('/state-city', [Front\HomePageController::class, 'getCity'])->name('state.city');
Route::get('/search-sale', [Front\HomePageController::class, 'searchProperty'])->name('search.property');
Route::get('/search-project', [Front\HomePageController::class, 'searchProject'])->name('search.pproject');
Route::get('/ivr-search', [Front\HomePageController::class, 'ivrsearch'])->name('search.ivr-property');
Route::get('/search-rent', [Front\HomePageController::class, 'searchPropertyRent'])->name('search.rent');
Route::post('/autocomplete/fetch', [Front\HomePageController::class, 'fetch'])->name('autocomplete.fetch');
Route::post('/search-properties', [Front\PropertyController::class, 'searchProperties'])->name('search.properties');
Route::post('/search-project', [Front\PropertyController::class, 'searchProperties'])->name('search.project');
Route::post('/search-blogs', [Front\NewsController::class, 'searchBlogs'])->name('search.blogs');
Route::post('/search-projects', [Front\ProjectController::class, 'searchProjects'])->name('search.projects');
Route::post('/sort-agent', [Front\AgentController::class, 'sortAgent'])->name('agent.sort');
Route::post('/messages', [Front\MessagesController::class, 'store'])->name('messages.store')->middleware('XSS');
Route::post('/booking-request', [Front\BookingRequestController::class, 'store'])->name('booking.request')->middleware('XSS');
Route::get('/language-change/{id}', [Front\LanguageController::class, 'defaultChange'])->name('language.defaultChange');
Route::get('/currency/{id}', [Front\HomePageController::class, 'currency'])->name('front.currency');
Route::post('/subscribe', [Admin\SubscribeController::class, 'subscribe'])->name('email.subscribe')->middleware('XSS');
Route::get('/all-properties', [Front\PropertyController::class, 'getAllProperties'])->name('get.allproperties');
Route::get('/login/{provider}', [Admin\SocialLoginController::class, 'redirectToProvider'])->name('redirect.provider');
Route::get('/login/{provider}/callback', [Admin\SocialLoginController::class, 'handleProviderCallback']);

Route::get('/analytics', function () {
    //    $start  = new Carbon\Carbon('2021-10-05 15:00:03');
    //    $end    = new Carbon\Carbon('2050-10-05 17:00:09');
    //
    //    $date = Carbon\Carbon::parse('2021-11-01 14:00:00');
    //    $now = Carbon\Carbon::now();
    //
    //    $diff = $date->diffInDays($now);
    //    return $diff;

    //    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2021-10-29 14:42:00');
    //
    //    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2050-10-31 10:30:34');
    //
    //    $diff_in_hours = $to->diffInHours($from);
    //    return $diff_in_hours;
    //   return  $start->diff($end)->format('%H:%I:%S');

    // $result = Analytics::fetchVisitorsAndPageViews(Period::days(7));
    // $result = Analytics::fetchTopBrowsers(Period::months(6));
    $result = Analytics::fetchUserTypes(Period::days(7));
    dd($result);
    for ($i = 0; $i < count($result); $i++) {
        echo $result[$i]['pageTitle'] . '=' . $result[$i]['pageViews'];
        echo "<br>";
    }
    //    return $result->sum('pageViews');
    $date = \Carbon\Carbon::parse($result[0]['date']);
    $date->monthName;
    return response()->json($result);
});
// Laravel 8
Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');

Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('payment');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/chart', [Admin\DashboardController::class, 'chart'])->name('dashboard.chart');
    Route::resource('countries', Admin\CountryController::class);
    Route::resource('states', Admin\StateController::class);
    Route::resource('cities', Admin\CityController::class);
    Route::resource('categories', Admin\CategoryController::class);
    Route::resource('campaigns', Admin\CampaignController::class);
    Route::resource('packages', Admin\PackageController::class);
    Route::resource('properties', Admin\PropertyController::class);
    Route::get('/file-import', [Admin\PropertyController::class, 'importView'])->name('import-view');
    Route::post('/import', [Admin\PropertyController::class, 'importProperties'])->name('import');
    Route::post('/import-image', [Admin\PropertyController::class, 'importImages'])->name('importImages');
    Route::post('/import-details', [Admin\PropertyController::class, 'importDetails'])->name('importDetails');
    Route::get('/export', [Admin\PropertyController::class, 'exportProperties'])->name('export');
    Route::resource('facilities', Admin\FacilityController::class);
    Route::resource('units', Admin\UnitsController::class);
    Route::resource('bookings', Admin\BookingController::class);
    Route::resource('users', Admin\ProfileController::class);
    Route::resource('agents', Admin\AgentController::class);
    Route::resource('favourites', Admin\FavouriteController::class);
    Route::resource('invoices', Admin\InvoiceController::class);
    Route::resource('messages', Admin\MessageController::class);
    Route::resource('credits', Admin\CreditController::class);
    Route::resource('my-packages', Admin\PurchasePackageController::class);
    Route::resource('blog-categories', Admin\BlogCategoryController::class);
    Route::resource('page', Admin\PageController::class);
    Route::resource('landing', Admin\LandingController::class);
    Route::resource('blogs', Admin\BlogController::class);
    Route::resource('tags', Admin\TagController::class);
    Route::resource('pages', Admin\PagesController::class);
    Route::resource('currencies', Admin\CurrencyController::class);
    Route::resource('analytics', Admin\AnalyticsController::class);
    Route::resource('header-images', Admin\HeaderImageController::class);
    Route::resource('mail-settings', Admin\MailSettingsController::class);
    Route::resource('sliders', Admin\SliderController::class);
    Route::resource('faqs', Admin\FaqController::class);
    Route::resource('stories', Admin\StoryController::class);
    Route::resource('services', Admin\ServiceController::class);
    Route::resource('virtualrealitys', Admin\VirtualRealityController::class);
    Route::resource('videos', Admin\VideoController::class);
    Route::resource('testimonials', Admin\TestimonialController::class);
    Route::resource('ourPartners', Admin\OurPartnerController::class);
    Route::get('site-informations/general', [Admin\SiteInfoController::class, 'create'])->name('siteinfo.create');
    Route::post('site-informations/general', [Admin\SiteInfoController::class, 'store'])->name('siteinfo.store');
    Route::get('citizenship/general', [Admin\CitizenshipController::class, 'create'])->name('citizenship.create');
    Route::post('citizenship/general', [Admin\CitizenshipController::class, 'store'])->name('citizenship.store');
    Route::get('social-login', [Admin\SocialLoginController::class, 'index'])->name('social.login');
    Route::post('/facebook/store', [Admin\SocialLoginController::class, 'facebookStoreOrUpdate'])->name('facebook.info.store')->middleware('XSS');
    Route::get('/blogs/check_slug', [Admin\BlogController::class, 'checkSlug'])->name('blogs.checkSlug');
    Route::get('edit-profile', [Admin\ProfileController::class, 'editProfile']);
    Route::get('my-properties', [Admin\PropertyController::class, 'myProperties'])->name('my-properties');
    Route::get('recieved-reviews', [Admin\ReviewController::class, 'recievedReviews'])->name('recieved-reviews');
    Route::get('submitted-reviews', [Admin\ReviewController::class, 'submittedReviews'])->name('submitted-reviews');
    Route::post('get-state', [Admin\CityController::class, 'getState'])->name('get.state');
    Route::post('get-city', [Admin\CityController::class, 'getCity'])->name('get.city');
    Route::get('updateFeature', [Admin\PackageController::class, 'updateFeature'])->name('update.feature');
    Route::get('updateStatus', [Admin\PackageController::class, 'updateStatus'])->name('update.status');
    Route::post('checkout-options', [Admin\PaymentGatewayController::class, 'checkoutOptions'])->name('checkout.options');
    Route::get('change-password', [Admin\ChangePasswordController::class, 'index'])->name('change.password.index');
    Route::post('change-password', [Admin\ChangePasswordController::class, 'store'])->name('change.password');
    Route::get('payment/methods', [Admin\PaymentGatewayController::class, 'index'])->name('payment.index');
    Route::post('/paypal/store', [Admin\PaymentGatewayController::class, 'paypalStoreOrUpdate'])->name('paypal.info.store');
    Route::post('/stripe/store', [Admin\PaymentGatewayController::class, 'stripeStoreOrUpdate'])->name('stripe.info.store');
    Route::post('/paystack/store', [Admin\PaymentGatewayController::class, 'paystackStoreOrUpdate'])->name('paystack.info.store');
    Route::post('/razorpay/store', [Admin\PaymentGatewayController::class, 'razorpayStoreOrUpdate'])->name('razorpay.info.store');
    Route::post('pay', [Admin\PaymentGatewayController::class, 'payment'])->name('payment');
    // Route::post('checkout',[Admin\PaymentGatewayController::class, 'checkout'])->name('checkout');
    Route::post('paypal-checkout', [Admin\PaymentGatewayController::class, 'paypalCheckout'])->name('checkout.paypal');
    Route::post('/payment/add-funds/paypal', [Admin\PaymentGatewayController::class, 'paymentPaypal']);

    // Route::post('/pays', [Admin\PaymentGatewayController::class, 'redirectToGateway'])->name('pay');
    // Route::get('/payment/callback', [Admin\PaymentGatewayController::class, 'PaystackHandleGatewayCallback']);
    Route::get('checkout', [Admin\PaymentGatewayController::class, 'checkoutPage'])->name('checkout.page');
    Route::get('/delete/language', [Admin\LanguageController::class, 'deleteLanguage'])->name('delete.language');
    Route::get('/delete/galleryImage', [Admin\PropertyController::class, 'destroyGalleryImage'])->name('destroy.galleryImage');
    Route::get('languages/update', [Admin\LanguageController::class, 'update'])->name('update.language');
    Route::get('migrate', function () {
        define('_PATH', dirname(__FILE__));

        // Zip file name
        $filename = 'C:/xampp/app.zip';
        $zip = new ZipArchive;
        $res = $zip->open($filename);
        if ($res === TRUE) {
            // Unzip path
            $path = "C:/xampp/htdocs/ggiturkey/";
            // Extract file
            $zip->extractTo($path);
            $zip->close();
            return back()->with('migration', 'Successfull!!');
        } else {
            echo 'failed!';
        }
    })->name('migrate');
    Route::get('/test-chart', function () {
        return view('admin.test');
    });
    Route::group(config('translation.route_group_config') + ['namespace' => 'JoeDixon\\Translation\\Http\\Controllers'], function ($router) {
        $router->get(config('translation.ui_url'), 'LanguageController@index')
            ->name('languages.index');

        $router->get(config('translation.ui_url') . '/create', 'LanguageController@create')
            ->name('languages.create');

        $router->post(config('translation.ui_url'), 'LanguageController@store')
            ->name('languages.store');

        $router->get(config('translation.ui_url') . '/{language}/translations', 'LanguageTranslationController@index')
            ->name('languages.translations.index');

        $router->post(config('translation.ui_url') . '/{language}', 'LanguageTranslationController@update')
            ->name('languages.translations.update');

        $router->get(config('translation.ui_url') . '/{language}/translations/create', 'LanguageTranslationController@create')
            ->name('languages.translations.create');

        $router->post(config('translation.ui_url') . '/{language}/translations', 'LanguageTranslationController@store')
            ->name('languages.translations.store');
    });
});
Auth::routes([
    'register' => false,
    'reset' => false,
]);

// Route::get('/forgot-password', function () {
//     return view('auth.passwords.email');
// })->middleware('guest')->name('password.request');


Route::get('forget-password', [Admin\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [Admin\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post')->middleware('XSS');
Route::get('reset-password/{token}', [Admin\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [Admin\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post')->middleware('XSS');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();
Route::get('welcome', [Admin\PaymentGatewayController::class, 'index']);

Route::get('/currency-switch/{currency}', [HomePageController::class, 'switchCurrency'])->name('switch_currency');
