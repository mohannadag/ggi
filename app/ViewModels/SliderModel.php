<?php

namespace App\ViewModels;

use App\Services\CityService;
use App\Services\SliderService;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use Yajra\DataTables\DataTables;

class SliderModel implements ISliderModel
{
    use ImageUpload;
    private $_sliderService;
    public function __construct(SliderService $service)
    {
        $this->_sliderService = $service;
    }

    public function getAll(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = $this->_sliderService->getAll();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($row) use ($locale) {
                return $row->sliderTranslation->name ?? $row->sliderTranslationEnglish->name ?? null;
            })
            ->addColumn('address', function ($row) use ($locale) {
                return $row->sliderTranslation->address ?? $row->sliderTranslationEnglish->address ?? null;
            })
            ->addColumn('description', function ($row) use ($locale) {
                return $row->sliderTranslation->description ?? $row->sliderTranslationEnglish->description ?? null;
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
                    <a href="' . route('admin.sliders.edit', $row) . '" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

                 | <form action="' . route('admin.sliders.destroy', $row) . '" method="POST">
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
        return $this->_sliderService->getById($id);
    }

    public function add(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        request()->validate([
            'name' => 'nullable',
            'address' => 'nullable',
            'file' => 'nullable',
            'mobile_file' => 'nullable',
            'description' => 'nullable'
        ]);

        $data = $request->all();
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        //thumbnail image save start
        $thumbnailImage = $request->file('file');
        $mobileImage = $request->file('mobile_file');
        $slug = $request->input('name');
        $data['button_text'] = $request->input('button_text');
        $data['link'] = $request->input('link');
        $thumbnailName = $this->imageUpload($thumbnailImage, $slug, 'images', 1133, 843);
        $mobileName = $this->imageUpload($mobileImage, $slug, 'images', 414, 485);
        $data['file'] = $thumbnailName;
        $data['mobile_file'] = $mobileName;
        //thumbnail image save end
        $this->_sliderService->add($data);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'nullable',
            'address' => 'nullable',
            'file' => 'nullable',
            'mobile_file' => 'nullable',
            'description' => 'nullable'
        ]);
        $data = $request->all();

        //thumbnail image save start
        $thumbnailImage = $request->file('file');
        $mobileImage = $request->file('mobile_file');
        $slug = $request->input('name');
        $slider  = $this->getById($id);
        $data['button_text'] = $request->input('button_text');
        $data['link'] = $request->input('link');
        $thumbnailName = $this->imageUpdate($thumbnailImage, $slug, $slider, 'images', 1133, 843);
        $mobileName = $this->imageUpdate($mobileImage, $slug, $slider, 'images', 414, 485);
        //thumbnail image save end
        if ($request->hasFile('file')) {
            $data['file'] = $thumbnailName;
        }
        if ($request->hasFile('mobile_file')) {
            $data['mobile_file'] = $mobileName;
        }

        $this->_sliderService->update($data, $id);
    }

    public function delete($id)
    {
        $slider  = $this->getById($id);
        Storage::disk('public')->delete("images/{$slider->file}");
        Storage::disk('public')->delete("images/{$slider->mobile_file}");
        $this->_sliderService->delete($id);
    }
}
