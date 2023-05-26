<?php
namespace App\ViewModels;

use App\Services\StoryService;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use Yajra\DataTables\DataTables;

class StoryModel implements IStoryModel
{
    use ImageUpload;
    private $_storyService;
    public function __construct(StoryService $service)
    {
        $this->_storyService = $service;
    }

    public function getAll(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = $this->_storyService->getAll();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('title', function ($row) use ($locale)
            {
                return $row->storyTranslation->title ?? $row->storyTranslationEnglish->title ?? null;
            })
            ->addColumn('type', function ($row) use ($locale)
            {
                return $row->storyTranslation->type ?? $row->storyTranslationEnglish->type ?? null;
            })
            ->addColumn('category', function ($row) use ($locale)
            {
                return $row->campaign->campaignTranslation->name ?? $row->campaign->campaignTranslationEnglish->name ?? null;
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
                    <a href="'.route('admin.stories.edit',$row).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

                 | <form action="'.route('admin.stories.destroy',$row).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                return $actionBtn;
            })
            ->rawColumns(['action','action1'])
            ->make(true);
    }

    public function getById($id)
    {
        return $this->_storyService->getById($id);
    }

    public function add(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        request()->validate([
            'title' => 'required',
            'campaign_id'=> 'required',
            'file'=>'required',
            'file_thumb'=>'required',
            'type'=> 'required'
        ]);

        $data = $request->all();
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        //thumbnail image save start

        $data['title'] =$request->input('title');
        $data['duration'] =$request->input('duration');
        $photoImage = $request->file('file');
        $thumbImage = $request->file('file_thumb');
        $slug = $request->input('title');
        $photoName = $this->imageUpload($photoImage,$slug,'stories/', 1080, 1920);
        $thumbName = $this->imageUpload($thumbImage,$slug,'stories/', 1080, 1920);
        $data['file'] = $photoName;
        $data['campaign'] =$request->input('campaign_id');
        $data['file_thumb'] = $thumbName;
        //thumbnail image save end
        $this->_storyService->add($data);
    }

    public function update(Request $request, $id)
    {

        request()->validate([
            'title' => 'required',
            'campaign_id'=> 'required',
            // 'file'=>'required',
            // 'file_thumb'=>'required',
            'type'=> 'required'
        ]);
        $data = $request->all();

        //thumbnail image save start
        $data['title'] =$request->input('title');
        $data['campaign'] =$request->input('campaign_id');
        $data['duration'] =$request->input('duration');
        $photoImage = $request->file('file');
        $thumbImage = $request->file('file_thumb');
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $slug = $request->input('title');
        $story  = $this->getById($id);
        $photoName = $this->imageUpdate($photoImage,$slug,$story,'stories/', 1080, 1920);
        $thumbName = $this->imageUpload($thumbImage,$slug,'stories/', 1080, 1920);
        //thumbnail image save end

        if($request->hasFile('file'))
        {
        $data['file'] = $photoName;
        }
        if($request->hasFile('file_thumb'))
        {
            $data['file_thumb'] = $thumbName;
        }
        // dd($data);
        $this->_storyService->update($data,$id);
    }

    public function delete($id)
    {
        $story  = $this->getById($id);
        Storage::disk('public')->delete("stories/{$story->file}", "stories/{$story->file_thumb}");
        $this->_storyService->delete($id);
    }
}
