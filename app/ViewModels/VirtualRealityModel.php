<?php

namespace App\ViewModels;

use App\Services\CityService;
use App\Services\VirtualRealityService;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use Yajra\DataTables\DataTables;

class VirtualRealityModel implements IVirtualRealityModel
{
    use ImageUpload;
    private $_virtualrealityService;
    public function __construct(VirtualRealityService $service)
    {
        $this->_virtualrealityService = $service;
    }

    public function getAll(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = $this->_virtualrealityService->getAll();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($row) use ($locale) {
                return $row->virtualrealityTranslation->name ?? $row->virtualrealityTranslationEnglish->name ?? null;
            })
            ->addColumn('address', function ($row) use ($locale) {
                return $row->virtualrealityTranslation->address ?? $row->virtualrealityTranslationEnglish->address ?? null;
            })
            ->addColumn('description', function ($row) use ($locale) {
                return $row->virtualrealityTranslation->description ?? $row->virtualrealityTranslationEnglish->description ?? null;
            })
            ->addColumn('order', function ($row) use ($locale) {
                return $row->virtualrealityTranslation->order ?? $row->virtualrealityTranslationEnglish->order ?? null;
            })
            ->addColumn('action1', function ($row) {
                if ($row->status == 'approved') {
                    $but =  '<span class="bg-primary p-1 text-white">Approved</span>';
                    return $but;
                } elseif ($row->status == 'pending') {
                    $but = '<span class="bg-warning p-1 text-white">Pending</span>';
                    return $but;
                } else {
                    $but = '<span class="bg-danger p-1 text-white">Rejected</span>';
                    return $but;
                }
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="' . route('admin.virtualrealitys.edit', $row) . '" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

                 | <form action="' . route('admin.virtualrealitys.destroy', $row) . '" method="POST">
                    ' . csrf_field() . '
                    ' . method_field("DELETE") . '
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                return $actionBtn;
            })
            ->rawColumns(['action', 'action1'])
            ->make(true);
    }

    public function getById($id)
    {
        return $this->_virtualrealityService->getById($id);
    }

    public function add(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        request()->validate([
            'name' => 'required|min:5',
            'address' => 'nullable',
            'file' => 'nullable',
            'order' => 'nullable',
            'description' => 'nullable',
            'link'=> 'nullable',
            'frame_link'=> 'nullable',
            'first_name' => 'nullable',
            'first_link' => 'nullable',
            'second_name' => 'nullable',
            'second_link' => 'nullable',
            'third_name' => 'nullable',
            'third_link' => 'nullable',
        ]);

        $data = $request->all();
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['order'] = $request->input('order');
        $data['link'] = $request->input('link');
        $data['frame_link'] = $request->input('frame_link');
        //thumbnail image save start
        $thumbnailImage = $request->file('file');
        $slug = $request->input('name');
        $thumbnailName = $this->imageUpload($thumbnailImage, $slug, 'images', 800, 450);
        $data['file'] = $thumbnailName;
        //thumbnail image save end
        $this->_virtualrealityService->add($data);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required|min:5',
            'address' => 'nullable',
            'file' => 'nullable',
            'order' => 'nullable',
            'description' => 'nullable',
            'link'=> 'nullable',
            'frame_link'=> 'nullable',
            'first_name' => 'nullable',
            'first_link' => 'nullable',
            'second_name' => 'nullable',
            'second_link' => 'nullable',
            'third_name' => 'nullable',
            'third_link' => 'nullable',
        ]);
        $data = $request->all();

        //thumbnail image save start
        $thumbnailImage = $request->file('file');
        $data['order'] = $request->input('order');
        $data['link'] = $request->input('link');
        $data['frame_link'] = $request->input('frame_link');
        $slug = $request->input('name');
        $virtualreality  = $this->getById($id);

        if ($request->hasFile('file')) {
            $thumbnailName = $this->imageUpdate($thumbnailImage, $slug, $virtualreality, 'images', 800, 450);
            $data['file'] = $thumbnailName;
        }

        $this->_virtualrealityService->update($data, $id);
    }

    public function delete($id)
    {
        $virtualreality  = $this->getById($id);
        Storage::disk('public')->delete("images/{$virtualreality->file}");
        $this->_virtualrealityService->delete($id);
    }
}
