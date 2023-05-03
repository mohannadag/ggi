<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageTranslation;
use App\ViewModels\IPageModel;
use App\ViewModels\IPageTranslationModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class PageController extends Controller
{
    private $_pageModel;
    private $_pageTranslationModel;
    public function __construct(IPageModel $model,IPageTranslationModel $translationModel)
    {
        $this->_pageModel = $model;
        $this->_pageTranslationModel = $translationModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
           return $this->_pageModel->getAll($request);
        }
        return view('admin.page.index');
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $this->_pageModel->add($request);
        return redirect()->route('admin.page.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $page = $this->_pageModel->getById($id);
        $pageTranslation = $this->_pageTranslationModel->getById($id);
        return view('admin.page.edit',compact('page','pageTranslation','locale'));
    }

    public function update(Request $request, $id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.page.index');
        }else{
            $this->_pageModel->update($request,$id);
            $this->_pageTranslationModel->update($request,$id);
            notify()->success('Page updated successfully!');
            return redirect()->route('admin.page.index');
        }
    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.page.index');
        }else{
            $this->_pageModel->delete($id);
            $this->_pageTranslationModel->delete($id);
            notify()->success('Page deleted successfully!');
            return redirect()->route('admin.page.index');
        }

    }
}
