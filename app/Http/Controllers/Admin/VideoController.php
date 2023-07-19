<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\VideoTranslation;
use App\ViewModels\IVideoTranslationModel;
use App\ViewModels\IVideoModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class VideoController extends Controller
{
    private $_videoModel;
    private $_videoTranslationModel;
    public function __construct(IVideoModel $model,IVideoTranslationModel $translationModel)
    {
        $this->middleware('accessDashboard');
        $this->_videoModel = $model;
        $this->_videoTranslationModel = $translationModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
           return $this->_videoModel->getAll($request);
        }
        return view('admin.videos.index');
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $this->_videoModel->add($request);
        return redirect()->route('admin.videos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $video = $this->_videoModel->getById($id);
        $videoTranslation = $this->_videoTranslationModel->getById($id);
        return view('admin.videos.edit',compact('video','videoTranslation','locale'));
    }

    public function update(Request $request, $id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.videos.index');
        }else{
            $this->_videoModel->update($request,$id);
            $this->_videoTranslationModel->update($request,$id);
            notify()->success('Video updated successfully!');
            return redirect()->route('admin.videos.index');
        }
    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.videos.index');
        }else{
            $this->_videoModel->delete($id);
            $this->_videoTranslationModel->delete($id);
            notify()->success('Video deleted successfully!');
            return redirect()->route('admin.videos.index');
        }

    }
}
