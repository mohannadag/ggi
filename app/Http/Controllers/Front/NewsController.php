<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\HeaderImage;
use App\Models\Tag;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyDetail;
use App\Models\Category;
use App\Models\PropertyTranslation;
use App\Models\Service;
use App\Models\State;
use App\ViewModels\IPropertySearchModel;
use App\Repositories\IPropertySearchRepository;

class NewsController extends Controller
{
    private $_propertySearchModel;
    private $_propertySearchRepository;

    public function __construct(IPropertySearchModel $propertySearchModel, IPropertySearchRepository $properties)
    {
        Session::put('currentLocal', 'en');
        App::setLocale('en');

        $this->_propertySearchModel = $propertySearchModel;
        $this->_propertySearchRepository = $properties;
    }

    public function index(Request $request)
    {

        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $props = Property::with(['propertyDetails','user','category.categoryTranslation', 'country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        ->where('moderation_status',1)
        ->where('status',1)
        ->orderBy('id','desc')
        ->paginate(4);
        $properties = Property::where('moderation_status',1)
                        ->orderBy('id','DESC')
                        ->where('status',1)
                        ->get();
        $maxPrice = $properties->max('price');
        $minPrice = $properties->min('price');
        foreach ($properties as $row)
        {
            $currentTime = Carbon::now();
            $end_time = new Carbon($row->expire_at);
            if($currentTime > $end_time)
            {
                $row->status = 0;
                $row->save();
            }
        }
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $country = Country::with('countryTranslation')->get()->keyBy('id');
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $states = State::with('stateTranslation')->where('status',1)->orderBy('order')->get()->keyBy('id');
        $propertyTranslation = PropertyTranslation::where('locale',$locale)->get()->keyBy('property_id');
        $propertyTranslationEnglish = PropertyTranslation::where('locale','en')->get()->keyBy('property_id');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
        $newses = Blog::with('blogTranslation', 'user')->where('status', 'approved')->orderBy('id', 'desc')->paginate(6);
        $popularTopics = BlogCategory::with('blogCategoryTranslation', 'blogs')->where('status', 1)->get()->keyBy('id');
        $tags = Tag::with('tagTranslation', 'tagTranslationEnglish')->where('status', 1)->get();
        $headerImage = HeaderImage::where('page', 'news')->first();

        $recentNews = Blog::with('blogTranslation')->where('status', 'approved')->orderBy('id', 'desc')->take(4)->get();
        // dd($recentNews);
        return view('frontend.news', compact('newses', 'recentNews', 'popularTopics', 'tags', 'headerImage', 'properties', 'states', 'city', 'minPrice', 'maxPrice', 'minArea', 'maxArea', 'categories'));
    }



    public function show($news, Request $request)
    {

        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $props = Property::with(['propertyDetails','user','category.categoryTranslation', 'country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        ->where('moderation_status',1)
        ->where('status',1)
        ->orderBy('id','desc')
        ->paginate(4);
        $properties = Property::where('moderation_status',1)
                        ->orderBy('id','DESC')
                        ->where('status',1)
                        ->get();
        $maxPrice = $properties->max('price');
        $minPrice = $properties->min('price');
        foreach ($properties as $row)
        {
            $currentTime = Carbon::now();
            $end_time = new Carbon($row->expire_at);
            if($currentTime > $end_time)
            {
                $row->status = 0;
                $row->save();
            }
        }
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $country = Country::with('countryTranslation')->get()->keyBy('id');
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $states = State::with('stateTranslation')->where('status',1)->orderBy('order')->get()->keyBy('id');
        $propertyTranslation = PropertyTranslation::where('locale',$locale)->get()->keyBy('property_id');
        $propertyTranslationEnglish = PropertyTranslation::where('locale','en')->get()->keyBy('property_id');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
        App::setLocale(Session::get('currentLocal'));

        $news = Blog::where('slug', $news)->first();

        $popularTopics = BlogCategory::where('status', 1)->get();
        $recentlyAddedPosts = Blog::latest()->where('status', 'approved')->take(3)->get();
        $tags = Tag::where('status', 1)->get();
        // dd($news);
        // $previous = Blog::where('id', '<', $news->id)->max('id');
        // dd($previous);
        // $next = Blog::where('id', '>', $news->id)->min('id');

        // $previousPost = Blog::where('id', $previous)->first();
        // $nextPost = Blog::where('id', $next)->first();
        // dd($previousPost);
        $headerImage = HeaderImage::where('page', 'single-news')->first();

        // return view('frontend.single-news', compact('news', 'popularTopics', 'recentlyAddedPosts', 'tags', 'previousPost', 'nextPost', 'previous', 'next', 'headerImage', 'properties', 'states', 'city', 'minPrice', 'maxPrice', 'minArea', 'maxArea', 'categories'));
        return view('frontend.single-news', compact('news', 'popularTopics', 'recentlyAddedPosts', 'tags', 'headerImage', 'properties', 'states', 'city', 'minPrice', 'maxPrice', 'minArea', 'maxArea', 'categories'));
    }


    public function searchBlogs(Request $request)
    {
        $blogs = Blog::with('blogTranslation', 'blogTranslationEnglish')->where('title', 'LIKE', '%' . $request->search . '%')->where('status', 'approved')->get();
        if (count($blogs) > 0) {
            $html = '<div class="col-span-12 md:col-span-6 lg:col-span-8 mb-[30px] get-blog">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 gap-x-[30px] gap-y-[40px]">';
            foreach ($blogs as $blog) {
                $createdAt = Carbon::parse($blog->created_at);

                $html = $html. '
                    <div class="post-item">
                    <a href="' . route('news.show', $blog) . '" class="block overflow-hidden rounded-[6px] mb-[35px]">
                        <img class="w-full h-full" src="images/thumbnail/' . $blog->image . '" width="370" height="270" loading="lazy" alt="' . $blog->blogTranslation->title . '">
                    </a>

                        <div>
                            <span class="block leading-none font-normal text-[14px] text-secondary mb-[10px]">' . $blog->created_at . '</span>
                            <h3><a href="' . route('news.show', $blog) . '" class="font-lora text-[22px] xl:text-[24px] leading-[1.285] text-primary block mb-[10px] hover:text-secondary transition-all font-medium">' . $blog->blogTranslation->title  . '</a></h3>
                            <p class="font-light text-[#494949] text-[16px] leading-[1.75]"></p>
                        </div>
                    </div>
                    ';

            }
            $html = $html .'</div>
            </div>';
        echo $html;
        } else {
            $html = '<div class="post-item">
                        <h1>No Results Found!</h1>
                     </div>';
            echo $html;
        }
    }

    public function popularTopic($category, Request $request)
    {
        $props = Property::with(['propertyDetails', 'user', 'category.categoryTranslation', 'country.countryTranslation', 'state.stateTranslation', 'city.cityTranslation', 'propertyTranslation', 'image'])
            ->where('moderation_status', 1)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(4);
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $maxPrice = $props->max('price');
        $minPrice = $props->min('price');
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $states = State::with('stateTranslation')->where('status',1)->orderBy('order')->get()->keyBy('id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $categories = Category::with('categoryTranslation')->where('status', 1)->get()->keyBy('id');
        //Poperty Search
        $properties = $this->_propertySearchModel->getData($request);
        $data = $request->all();
        App::setLocale(Session::get('currentLocal'));
        $category = BlogCategory::where('name', $category)->first();
        $popularTopics = BlogCategory::with('blogCategoryTranslation', 'blogs')->where('status', 1)->get()->keyBy('id');
        $newses = Blog::with('blogTranslation', 'user')
            ->where('category_id', $category->id)
            ->where('status', 'approved')
            ->orderBy('id', 'desc')
            ->paginate(4);
        $tags = Tag::with('tagTranslation', 'tagTranslationEnglish')->where('status', 1)->get();

        return view('frontend.news-category', compact('newses', 'popularTopics', 'tags', 'properties', 'data', 'states', 'city', 'minPrice', 'maxPrice', 'minArea', 'maxArea', 'categories'));
    }

    public function previousNextPost($id)
    {
        // $post = Blog::find($id);

        // $previous = Blog::where('id', '<', $post->id)->max('id');
        // $next = Blog::where('id', '>', $post->id)->min('id');
    }
}
