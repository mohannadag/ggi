<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stories;
use App\Models\Blog;
use App\Models\Property;
use Illuminate\Support\Facades\Session;
use Spatie\Analytics\Period;
use Analytics;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        Session::put('currentLocal', 'en');
    }

    public function index()
    {
        $user = auth()->user();

        if ($user->type == 'admin') {
            $allProperties = Property::where('moderation_status', 1)->get();
            $properties = Property::with(['facilities.facilityTranslation', 'user', 'category.categoryTranslation', 'country.countryTranslation', 'state.stateTranslation', 'city.cityTranslation', 'propertyTranslation', 'propertyTranslationEnglish', 'image', 'propertyDetails'])->where('moderation_status', 1)->get();
            $newsCount = Blog::where('status', 'approved')->count();
            $propertyCount  = $allProperties->count();
            $result = Analytics::fetchVisitorsAndPageViews(Period::days(7));
            $browsers = Analytics::fetchTopBrowsers(Period::days(7));
            $topVisitedPages = Analytics::fetchMostVisitedPages(Period::days(7))->take(10);
            $topReferrers = Analytics::fetchTopReferrers(Period::days(7))->take(10);
            $newUsers = Analytics::fetchUserTypes(Period::days(7));
            return view('admin.dashboard', compact('properties', 'allProperties', 'newsCount', 'propertyCount', 'result', 'browsers', 'topVisitedPages', 'topReferrers', 'newUsers'));
        }
        if ($user->type == 'user') {
            $allProperties = Property::where('moderation_status', 1)->where('user_id', $user->id)->get();
            $properties = Property::with(['facilities.facilityTranslation', 'user', 'category.categoryTranslation', 'country.countryTranslation', 'state.stateTranslation', 'city.cityTranslation', 'propertyTranslation', 'propertyTranslationEnglish', 'image', 'propertyDetails'])->where('moderation_status', 1)->where('user_id', $user->id)->get();
            $newsCount = Blog::where('status', 'approved')->where('user_id', $user->id)->count();
            $propertyCount  = $allProperties->count();
            $result = Analytics::fetchVisitorsAndPageViews(Period::days(7));
            $browsers = Analytics::fetchTopBrowsers(Period::days(7));
            $topVisitedPages = Analytics::fetchMostVisitedPages(Period::days(7))->take(10);
            $topReferrers = Analytics::fetchTopReferrers(Period::days(7))->take(10);
            $newUsers = Analytics::fetchUserTypes(Period::days(7));
            return view('admin.dashboard', compact('properties', 'allProperties', 'newsCount', 'propertyCount', 'result', 'browsers', 'topVisitedPages', 'topReferrers', 'newUsers'));
        }
        if ($user->type == 'moderator') {
            $allProperties = Property::where('moderation_status', 1)->where('user_id', $user->id)->get();
            $properties = Property::with(['facilities.facilityTranslation', 'user', 'category.categoryTranslation', 'country.countryTranslation', 'state.stateTranslation', 'city.cityTranslation', 'propertyTranslation', 'propertyTranslationEnglish', 'image', 'propertyDetails'])->where('moderation_status', 1)->where('user_id', $user->id)->get();
            $newsCount = Blog::where('status', 'approved')->where('user_id', $user->id)->count();
            $propertyCount  = $allProperties->count();
            $result = Analytics::fetchVisitorsAndPageViews(Period::days(7));
            $browsers = Analytics::fetchTopBrowsers(Period::days(7));
            $topVisitedPages = Analytics::fetchMostVisitedPages(Period::days(7))->take(10);
            $topReferrers = Analytics::fetchTopReferrers(Period::days(7))->take(10);
            $newUsers = Analytics::fetchUserTypes(Period::days(7));
            return view('admin.dashboard', compact('properties', 'allProperties', 'newsCount', 'propertyCount', 'result', 'browsers', 'topVisitedPages', 'topReferrers', 'newUsers'));
        }
        if ($user->type == 'stories') {

            $locale   = Session::get('currentLocal');
            return view('admin.storys.index');
        }
        if ($user->type == 'video') {

            $locale   = Session::get('currentLocal');
            return view('admin.videos.index');
        }
        if ($user->type == 'sliders') {

            $locale   = Session::get('currentLocal');
            return view('admin.sliders.index');
        }
        if ($user->type == 'panorama') {

            $locale   = Session::get('currentLocal');
            return view('admin.virtualrealitys.index');
        }
        if ($user->type == 'content') {
            $allProperties = Property::where('moderation_status', 1)->get();
            $properties = Property::with(['facilities.facilityTranslation', 'user', 'category.categoryTranslation', 'country.countryTranslation', 'state.stateTranslation', 'city.cityTranslation', 'propertyTranslation', 'propertyTranslationEnglish', 'image', 'propertyDetails'])->where('moderation_status', 1)->where('user_id', $user->id)->get();
            $newsCount = Blog::where('status', 'approved')->count();
            $propertyCount  = $allProperties->count();
            $result = Analytics::fetchVisitorsAndPageViews(Period::days(7));
            return view('admin.dashboard', compact('properties', 'allProperties', 'newsCount', 'propertyCount'));
        }
        $allProperties = Property::where('moderation_status', 1)->get();
        $properties = Property::with(['facilities.facilityTranslation', 'user', 'category.categoryTranslation', 'country.countryTranslation', 'state.stateTranslation', 'city.cityTranslation', 'propertyTranslation', 'propertyTranslationEnglish', 'image', 'propertyDetails'])->where('moderation_status', 1)->where('user_id', $user->id)->get();
        $newsCount = Blog::where('status', 'approved')->count();
        $allProperties = Property::where('moderation_status', 1)->get();
        $propertyCount  = $allProperties->count();
        $result = Analytics::fetchVisitorsAndPageViews(Period::days(7));
        $browsers = Analytics::fetchTopBrowsers(Period::days(7));
        $topVisitedPages = Analytics::fetchMostVisitedPages(Period::days(7))->take(10);
        $topReferrers = Analytics::fetchTopReferrers(Period::days(7))->take(10);
        $newUsers = Analytics::fetchUserTypes(Period::days(7));
        // dd($topVisitedPages);
        $locale   = Session::get('currentLocal');
        return view('admin.dashboard', compact('user', 'propertyCount', 'result', 'allProperties', 'locale', 'properties', 'newsCount', 'browsers', 'topVisitedPages', 'topReferrers', 'newUsers'));
    }

    public function chart()
    {
        $result = Analytics::fetchTotalVisitorsAndPageViews(Period::days(10));

        return response()->json($result);
    }
}
