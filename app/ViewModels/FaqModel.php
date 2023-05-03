<?php
namespace App\ViewModels;

use App\Services\FaqService;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use Yajra\DataTables\DataTables;

class FaqModel implements IFaqModel
{
    use ImageUpload;
    private $_faqService;
    public function __construct(FaqService $service)
    {
        $this->_faqService = $service;
    }

    public function getAll(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = $this->_faqService->getAll();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($row) use ($locale)
            {
                return $row->faqTranslation->name ?? $row->faqTranslationEnglish->name ?? null;
            })
            ->addColumn('question', function ($row) use ($locale)
            {
                return $row->faqTranslation->question ?? $row->faqTranslationEnglish->question ?? null;
            })
            ->addColumn('description', function ($row) use ($locale)
            {
                return $row->faqTranslation->description ?? $row->faqTranslationEnglish->description ?? null;
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
                    <a href="'.route('admin.faqs.edit',$row).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

                 | <form action="'.route('admin.faqs.destroy',$row).'" method="POST">
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
        return $this->_faqService->getById($id);
    }

    public function add(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        request()->validate([
            'question'=> 'nullable',
            'category'=> 'nullable',
            'description'=> 'nullable',
            'gorder'=>'nullable',
        ]);

        $data = $request->all();
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        //thumbnail image save start
        //thumbnail image save end
        $this->_faqService->add($data);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'question'=> 'nullable',
            'category'=> 'nullable',
            'description'=> 'nullable',
            'gorder'=>'nullable',
        ]);
        $data = $request->all();

        $this->_faqService->update($data,$id);
    }

    public function delete($id)
    {
        $faq  = $this->getById($id);
        Storage::disk('public')->delete("images/{$faq->file}");
        $this->_faqService->delete($id);
    }
}
