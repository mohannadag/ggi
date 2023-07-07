<?php
namespace App\ViewModels;

use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Repositories\IBlogRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\CampaignService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;

class BlogModel implements IBlogModel
{
    // private $_campaignService;
    private $_repository;

    public function __construct(IBlogRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function getAll(Request $request)
    {
        return $this->_repository->getAll();
    }
    public function getAllTable(Request $request)
    {
        try {
            $user = auth()->user();
            App::setLocale(Session::get('currentLocal'));
            $locale = Session::get('currentLocal');

            $data = $this->_repository->getAll();

            // if($user->type == 'moderator')
            // {
            //     $data = Blog::with(['blogTranslation','blogTranslationEnglish'])
            //         ->orderBy('id','DESC')
            //         // ->where('user_id','=',$user->id)
            //         ->get();
            //         // dd($data);
            // }


            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('category', function ($row) use ($locale){
                    return $row->category->blogCategoryTranslation->name ?? null;

                })
                ->addColumn('user', function ($row) {
                    if($row->user)
                    {
                        return $row->user->f_name.' '.$row->user->l_name;
                    }else{
                        return '-';
                    }
                })
                ->addColumn('title', function ($row) use ($locale)
                {
                    return $row->blogTranslation->title ?? $row->title;
                })
                ->addColumn('action1',function($row){
                    if($row->status == 'approved')
                    {
                        $but =  '<span class="bg-primary p-1 text-white">Approved</span>';
                        return $but;
                    }elseif($row->status == 'pending'){
                        $but = '<span class="bg-warning p-1 text-white">Pending</span>';
                        return $but;
                    }else{
                        $but = '<span class="bg-danger p-1 text-white">Rejected</span>';
                        return $but;
                    }
                })
                ->addColumn('action', function($row){
                    //         $actionBtn = '<div class="d-flex justify-content-end">
                    //         <a href="'.route('admin.blogs.edit',$row).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>|
                    //         <a href="'.route('news.show', ['news' => $row->slug]).'" class="edit btn btn-success btn-sm" target="_blank"><i class="la la-eye"></i></a>
                    //      | <form action="'.route('admin.blogs.destroy',$row).'" method="POST">
                    //         '.csrf_field().'
                    //         '.method_field("DELETE").'
                    //    <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                    //     </form></div>';
                    //         return $actionBtn;

                    $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="'.route('admin.blogs.edit',$row).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>|
                    <a href="'.route('news.show', ['news' => $row->slug]).'" class="edit btn btn-success btn-sm" target="_blank"><i class="la la-eye"></i></a>
                    ';

                    if(auth()->user()->type == "admin")
                    {
                        $actionBtn = $actionBtn . '| <form action="'.route('admin.blogs.destroy',$row).'" method="POST">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                        <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                        </form>';
                    }
                    else{
                        $actionBtn = $actionBtn . '</div>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action','action1'])
                ->make(true);
        } catch (\Throwable $ex) {
            Log::error($ex->getMessage());
            return $ex->getMessage();
        }

    }

    public function getById($id)
    {
       return $this->_repository->getById($id);
    }

    public function add(Request $request)
    {

        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');

        request()->validate([
            'category_id'=>'nullable',
            'user_id' => 'required',
            'title' => 'required',
            'tag'=> 'nullable',
            'slug'=> 'required|unique:blogs',
            'image'=>'nullable',
            'body'=> 'required',
            'description' => 'required'
        ],[
            'category_id.required'=>'The category field is required',
            'body.required'=>'content field is required'
        ]);

        try {
            //thumbnail image save start
            $thumbnailImage = $request->file('image');
            $slug =  $request->input('slug');
            if (isset($thumbnailImage))
            {
                $currentDate = Carbon::now()->toDateString();
                $fileName = $slug.'-'.$currentDate.'-'.uniqid();
                // $image = \Intervention\Image\Facades\Image::make($thumbnailImage)->encode('webp', 90)->fit(750, 500)->save(public_path('images/thumbnail/'  .  $fileName . '.webp'));
                $image = \Intervention\Image\Facades\Image::make($thumbnailImage)->encode('jpg')->resize(770, 465)->save(public_path('images/thumbnail/'  .  $fileName . '.jpg'));
                \Intervention\Image\Facades\Image::make($thumbnailImage)->encode('jpg')->resize(770, 465)->save(public_path('images/gallery/'  .  $fileName . '.jpg'));
                // \Intervention\Image\Facades\Image::make($thumbnailImage)->encode('webp', 90)->fit(1024, 450)->save(public_path('images/gallery/'  .  $fileName . '.webp'));
                $thumbnailName = $image->basename;
            } else
            {
                $thumbnailName ='default.png';
            }
            //thumbnail image save end


            $blog = Blog::create([
                'category_id'=>request('category_id'),
                'user_id' => request('user_id'),
                'title' => request('title'),
                'slug' => request('slug'),
                'image'=> $thumbnailName,
                'body'=> request('body'),
                'description' => request('description'),
                'deleted' => 0,
            ]);
            $blog->tags()->sync($request->tags);

            BlogTranslation::create([
                'blog_id'=>$blog->id,
                'locale'=> $locale,
                'title' => request('title'),
                'slug' => request('slug'),
                'body'=> request('body'),
                'description' => request('description')
            ]);

            return true;

        } catch (\Throwable $ex) {
            Log::error($ex->getMessage());
            return false;
        }
    }

    public function update(Request $request, $blog)
    {
        request()->validate([
            'category_id'=>'required',
            'user_id' => 'required',
            'title' => 'required',
            'slug'=> 'required',
         //    'image'=>'required',
            'body'=> 'required',
            'description' => 'required|max:150'
        ]);

        try {
            //thumbnail image save start
            $thumbnailImage = $request->file('image');
            //        dd($thumbnailImage);
            $slug =  $request->input('slug');

            if (isset($thumbnailImage))
            {
                // Storage::disk('public')->delete("thumbnail/{$blog->image}");
                File::delete(public_path() . "/images/thumbnail/{$blog->image}");
                File::delete(public_path() . "/images/gallery/{$blog->image}");

                $currentDate = Carbon::now()->toDateString();
                $fileName = $slug.'-'.$currentDate.'-'.uniqid();
                $image = \Intervention\Image\Facades\Image::make($thumbnailImage)->encode('jpg')->resize(770, 465)->save(public_path('images/thumbnail/'  .  $fileName . '.jpg'));
                \Intervention\Image\Facades\Image::make($thumbnailImage)->encode('jpg')->resize(770, 465)->save(public_path('images/gallery/'  .  $fileName . '.jpg'));
                $thumbnailName = $image->basename;
            } else
            {
                $thumbnailName =$blog->image;
            }
            //thumbnail image save end
            $user = auth()->user();
            if($user->type == 'admin')
            {
                $blog->update([
                    'category_id'=>request('category_id'),
                    'user_id' => request('user_id'),
                    'title' => request('title'),
                    'slug' => request('slug'),
                    'image'=> $thumbnailName,
                    'body'=> request('body'),
                    'status'=>request('status'),
                    'description' => request('description')
                ]);
            }
            else{

                $blog->update([
                    'category_id'=>request('category_id'),
                    'user_id' => request('user_id'),
                    'title' => request('title'),
                    'slug' => request('slug'),
                    'image'=> $thumbnailName,
                    'body'=> request('body'),
                    'description' => request('description')
                ]);
            }



            $blog->tags()->sync($request->tags);
            BlogTranslation::updateOrCreate(
                [
                    'blog_id' => $blog->id,
                    'locale'    => request('locale'),
                ], //condition
                [
                    'title' => $blog->title,
                    'slug'=> $slug,
                    'body'=> request('body'),
                    'description' => request('description')
                ]
            );

            return true;

        } catch (\Throwable $ex) {
            Log::error($ex->getMessage());
            return false;
        }

    }

    public function delete($id)
    {
        $this->_repository->delete($id);
    }

    public function forceDelete($id)
    {
        $this->_repository->forceDelete($id);
    }


    public function getAllDeleted(Request $request)
    {
        try {
            $data = $this->_repository->getDeleted();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('category', function ($row){
                    return $row->category->blogCategoryTranslation->name ?? null;

                })
                ->addColumn('user', function ($row) {
                    if($row->user)
                    {
                        return $row->user->f_name.' '.$row->user->l_name;
                    }else{
                        return '-';
                    }
                })
                ->addColumn('title', function ($row)
                {
                    return $row->blogTranslation->title ?? $row->title;
                })
                ->addColumn('action1',function($row){
                    if($row->status == 'approved')
                    {
                        $but =  '<span class="bg-primary p-1 text-white">Approved</span>';
                        return $but;
                    }elseif($row->status == 'pending'){
                        $but = '<span class="bg-warning p-1 text-white">Pending</span>';
                        return $but;
                    }else{
                        $but = '<span class="bg-danger p-1 text-white">Rejected</span>';
                        return $but;
                    }
                })
                ->addColumn('action', function($row){

                    $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="'.route('admin.blogs.edit',$row).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>|
                    <a href="'.route('news.show', ['news' => $row->slug]).'" class="edit btn btn-success btn-sm" target="_blank"><i class="la la-eye"></i></a>
                    ';

                    if(auth()->user()->type == "admin")
                    {
                        $actionBtn = $actionBtn . '| <form action="'.route('admin.blogs.destroy',$row).'" method="POST">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                        <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                        </form>';
                    }
                    else{
                        $actionBtn = $actionBtn . '</div>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action','action1'])
                ->make(true);
        } catch (\Throwable $ex) {
            Log::error($ex->getMessage());
            return null;
        }

    }



}
