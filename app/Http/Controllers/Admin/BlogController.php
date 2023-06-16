<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTranslation;
use App\Models\Language;
use App\Models\Tag;
use App\Repositories\IBlogRepository;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;
use Yajra\DataTables\DataTables;
use App\ViewModels\IBlogModel;

class BlogController extends Controller
{
    private $_model;
    private $_repo;
    public function __construct(IBlogModel $model, IBlogRepository $repo)
    {
        $this->_model = $model;
        $this->_repo = $repo;
        // $this->middleware('isApprove', ['only' =>['edit','update','destroy']]);
    }

    public function index(Request $request)
    {
        // $data = $this->_repo->getAll();
        // dd($data);
        try {
            if ($request->ajax()) {
                return $this->_model->getAllTable($request);
            }
            return view('admin.blogs.index');
        }
        catch (Throwable $exception) {
            Log::error($exception->getMessage());
            return view('errors.500');
        }

    }

    public function create()
    {
        App::setLocale(Session::get('currentLocal'));
        $categories =  BlogCategory::where('status',1)->get();
        $tags = Tag::all();
        $languages = Language::all();
        return view('admin.blogs.create',compact('categories','tags', 'languages'));
    }

    public function store(Request $request)
    {
        if($this->_model->add($request))
            return redirect()->route('admin.blogs.index');
        else
            return response()->view('errors.500', ['$message' => 'something went wrong'], 500);

    }

    public function show($id)
    {
        //
    }


    public function edit(Blog $blog, Request $request)
    {
        // dd($request);
        $categories =  BlogCategory::with(['blogCategoryTranslation', 'blogCategoryTranslationEnglish'])->where('status',1)->get();
        $tags = Tag::with(['tagTranslation', 'tagTranslationEnglish'])->get();
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        // $languages = Language::all();
        // $locale = $request->language ?? 'ar';

        $blogTranslation = BlogTranslation::where('blog_id',$blog->id)->where('locale',$locale)->first();
        // if (!isset($blogTranslation)) {
        //     $blogTranslation = BlogTranslation::where('blog_id',$blog->id)->where('locale','en')->first();
        // }
        return view('admin.blogs.edit',compact('blog','categories','tags','locale','blogTranslation'));
    }

    public function update(Request $request, Blog $blog)
    {
        if($this->_model->update($request, $blog))
            return redirect()->route('admin.blogs.index');
        else
            return response()->view('errors.500', ['$message' => 'something went wrong'], 500);

        // return redirect()->route('admin.blogs.index');
    }


    public function destroy(Blog $blog)
    {
        File::delete(public_path() . "/images/thumbnail/{$blog->image}");
        File::delete(public_path() . "/images/gallery/{$blog->image}");
        // $blog->delete();
        $this->_model->delete($blog->id);
        return redirect()->route('admin.blogs.index');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->slug);
        return response()->json(['slug'=>$slug]);
    }

    public function forceDelete($id)
    {
        $this->_model->forceDelete($id);
    }

    public function deletedBlogs(Request $request)
    {
        dd('test');
        try {
            if ($request->ajax()) {
                return $this->_model->getAllDeleted($request);
            }
            return view('admin.blogs.index');
        }
        catch (Throwable $exception) {
            Log::error($exception->getMessage());
            return view('errors.500');
        }
    }

}
