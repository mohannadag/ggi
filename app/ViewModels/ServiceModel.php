<?php
namespace App\ViewModels;

use App\Services\CityService;
use App\Services\ServiceService;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use Yajra\DataTables\DataTables;

class ServiceModel implements IServiceModel
{
    use ImageUpload;
    private $_serviceService;
    public function __construct(ServiceService $service)
    {
        $this->_serviceService = $service;
    }

    public function getAll(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = $this->_serviceService->getAll();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($row) use ($locale)
            {
                return $row->serviceTranslation->name ?? $row->serviceTranslationEnglish->name ?? null;
            })
            ->addColumn('address', function ($row) use ($locale)
            {
                return $row->serviceTranslation->address ?? $row->serviceTranslationEnglish->address ?? null;
            })
            ->addColumn('description', function ($row) use ($locale)
            {
                return $row->serviceTranslation->description ?? $row->serviceTranslationEnglish->description ?? null;
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
                    <a href="'.route('admin.services.edit',$row).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

                 | <form action="'.route('admin.services.destroy',$row).'" method="POST">
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
        return $this->_serviceService->getById($id);
    }

    public function add(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        request()->validate([
            'name' => 'required|min:5',
            'address'=> 'nullable',
            'file'=>'required',
            'description'=> 'nullable',
            'body' => 'required'
        ]);

        $data = $request->all();
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        //thumbnail image save start
        $thumbnailImage = $request->file('file');
        $slug = $request->input('name');
        $data['address'] = $request->input('address');
        $thumbnailName = $this->imageUpload($thumbnailImage,$slug,'images', 1133, 843);
        $data['file'] = $thumbnailName;
        //thumbnail image save end
        $this->_serviceService->add($data);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required|min:5',
            'address'=> 'nullable',
            'file'=>'nullable',
            'description'=> 'nullable',
            'body' => 'required',
        ]);
        $data = $request->all();

        //thumbnail image save start
        $thumbnailImage = $request->file('file');
        $slug = $request->input('name');
        $service  = $this->getById($id);
        $thumbnailName = $this->imageUpdate($thumbnailImage,$slug,$service,'images', 1200, 530);
        //thumbnail image save end
        if($request->hasFile('file'))
        {
            $data['file'] = $thumbnailName;
        }

        $this->_serviceService->update($data,$id);
    }

    public function delete($id)
    {
        $service  = $this->getById($id);
        Storage::disk('public')->delete("images/{$service->file}");
        $this->_serviceService->delete($id);
    }
}
