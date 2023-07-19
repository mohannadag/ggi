<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqTranslation;
use App\ViewModels\IFaqModel;
use App\ViewModels\IFaqTranslationModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class FaqController extends Controller
{
    private $_faqModel;
    private $_faqTranslationModel;
    public function __construct(IFaqModel $model,IFaqTranslationModel $translationModel)
    {
        $this->middleware('can:isAdmin,can:isMod');
        $this->_faqModel = $model;
        $this->_faqTranslationModel = $translationModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
           return $this->_faqModel->getAll($request);
        }
        return view('admin.faqs.index');
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->_faqModel->add($request);
        return redirect()->route('admin.faqs.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $faq = $this->_faqModel->getById($id);
        $faqTranslation = $this->_faqTranslationModel->getById($id);
        return view('admin.faqs.edit',compact('faq','faqTranslation','locale'));
    }

    public function update(Request $request, $id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.faqs.index');
        }else{
            $this->_faqModel->update($request,$id);
            $this->_faqTranslationModel->update($request,$id);
            notify()->success('Faq updated successfully!');
            return redirect()->route('admin.faqs.index');
        }
    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.faqs.index');
        }else{
            $this->_faqModel->delete($id);
            $this->_faqTranslationModel->delete($id);
            notify()->success('Faq deleted successfully!');
            return redirect()->route('admin.faqs.index');
        }

    }
}
