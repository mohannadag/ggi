<?php
namespace App\ViewModels;

use App\Services\StateService;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class StateModel implements IStateModel
{
    use ImageUpload;
    private $_stateService;
    public function __construct(StateService $service)
    {
        $this->_stateService = $service;
    }

    public function getAll(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = $this->_stateService->getAll();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('country', function ($row) use ($locale){
                return $row->country->countryTranslation->name ?? $row->country->countryTranslationEnglish->name ?? null;
            })
            ->addColumn('name', function ($row) use ($locale)
            {
                return $row->stateTranslation->name ?? $row->stateTranslationEnglish->name ?? null;
            })

            ->addColumn('status',function($row){
                if($row->status == 1)
                {
                    $but =  '<span class="bg-primary p-1 text-white">Active</span>';
                    return $but;
                }else{
                    $but = '<span class="bg-warning p-1 text-white">Inactive</span>';
                    return $but;
                }
            })
            ->addColumn('action', function($row){
                $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="'.route('admin.states.edit',$row->id).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

                 | <form action="'.route('admin.states.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                return $actionBtn;
            })
            ->rawColumns(['action','status'])
            ->make(true);

    }

    public function getById($id)
    {
        return $this->_stateService->getById($id);
    }

    public function add(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'country_id' => 'required',
            'status' => 'required'
        ]);

        $data = $request->all();
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['description'] = $request->input('description');
        $data['Population'] = $request->input('Population');
        $data['Area'] = $request->input('Area');
        $data['Districts'] = $request->input('Districts');
        $data['Municipalities'] = $request->input('Municipalities');
        $data['Towns'] = $request->input('Towns');
        $data['Villages'] = $request->input('Villages');
        $thumbnailImage = $request->file('image');
        $slug = $request->input('name');
        $thumbnailName = $this->imageUpload($thumbnailImage,$slug,'states',384,426);
        $data['image'] = $thumbnailName;
        $this->_stateService->add($data);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'country_id' => 'required',
            'status' => 'required'
        ]);
        $data = $request->all();
        $data['description'] = $request->input('description');
        $data['Population'] = $request->input('Population');
        $data['Area'] = $request->input('Area');
        $data['Districts'] = $request->input('Districts');
        $data['Municipalities'] = $request->input('Municipalities');
        $data['Towns'] = $request->input('Towns');
        $data['Villages'] = $request->input('Villages');
        // $thumbnailImage = $request->file('image');
        $slug = $request->name;
        $state  = $this->getById($id);

        if ($request->hasFile('image')) {
            $thumbnailImage = $request->file('image');
            $thumbnailName = $this->imageUpdate($thumbnailImage,$slug,$state,'states',384,426);
            $data['image'] = $thumbnailName;
        }
        else {
            $data['image'] = $state->image;
        }

        // $thumbnailName = $this->imageUpdate($thumbnailImage,$slug,$state,'states',384,426);
        // $data['image'] = $thumbnailName;

        $this->_stateService->update($data,$id);
    }

    public function delete($id)
    {
        $state  = $this->getById($id);
        Storage::disk('public')->delete("states/{$state->image}");
        $this->_stateService->delete($id);
    }

}
