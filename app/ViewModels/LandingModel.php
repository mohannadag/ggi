<?php
namespace App\ViewModels;

use App\Services\LandingService;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Yajra\DataTables\DataTables;

class LandingModel implements ILandingModel
{
    use ImageUpload;
    private $_landingService;
    public function __construct(LandingService $service)
    {
        $this->_landingService = $service;
    }

    public function getAll(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = $this->_landingService->getAll();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('title', function ($row) use ($locale)
            {
                return $row->landingTranslation->title ?? $row->landingTranslationEnglish->title ?? null;
            })
            ->addColumn('description', function ($row) use ($locale)
            {
                return $row->landingTranslation->description ?? $row->landingTranslationEnglish->description ?? null;
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
                    <a href="'.route('admin.landing.edit',$row).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

                 | <form action="'.route('admin.landing.destroy',$row).'" method="POST">
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
        return $this->_landingService->getById($id);
    }

    public function add(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        request()->validate([
            'title' => 'required|min:5',
            'slug' => 'nullable',
            'file' => 'nullable',
            'content' => 'nullable',
            'description' => 'nullable',
        ]);

        $data = $request->all();
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['title'] = $request->input('title');
        $data['slug'] = $request->input('slug');
        $data['projects_id'] = $request->input('projects_id');
        $data['faqs_id'] = $request->input('faqs_id');
        $data['sliders_id'] = $request->input('sliders_id');
        $data['content'] = $request->input('content');
        $data['description'] = $request->input('description');
        //thumbnail image save start
        $thumbnailImage = $request->file('file');
        $slug = $request->input('title');
        $thumbnailName = $this->imageUpload($thumbnailImage,$slug,'images', 1920, 513);
        $data['file'] = $thumbnailName;
        //thumbnail image save end

        $this->_landingService->add($data);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'title' => 'required|min:5',
            'slug' => 'nullable',
            'file' => 'nullable',
            'content' => 'nullable',
            'description' => 'nullable',
        ]);
        $data = $request->all();

        //thumbnail image save start
        $thumbnailImage = $request->file('file');
        $data['title'] = $request->input('title');
        $data['slug'] = $request->input('slug');
        $data['content'] = $request->input('content');
        $data['description'] = $request->input('description');
        $slug = $request->input('title');
        $landing  = $this->getById($id);

        if ($request->hasFile('file')) {
            $thumbnailName = $this->imageUpload($thumbnailImage, $slug,'images', 1920, 513);
            $data['file'] = $thumbnailName;
        }


        $this->_landingService->update($data,$id);
    }

    public function delete($id)
    {
        $landing  = $this->getById($id);
        Storage::disk('public')->delete("images/{$landing->file}");
        $this->_landingService->delete($id);
    }
}
