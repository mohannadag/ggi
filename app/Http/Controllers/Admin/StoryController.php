<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\StoryTranslation;
use App\ViewModels\ICampaignTranslationModel;
use App\ViewModels\IStoryModel;
use App\ViewModels\IStoryTranslationModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class StoryController extends Controller
{

    private $_storyModel;
    private $_storyTranslationModel;
    private $_campaignTranslationModel;
    public function __construct(IStoryModel $model,
    IStoryTranslationModel $translationModel,
    ICampaignTranslationModel $campaignTranslationModel)
    {
        $this->_storyModel = $model;
        $this->_storyTranslationModel = $translationModel;
        $this->_campaignTranslationModel = $campaignTranslationModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
           return $this->_storyModel->getAll($request);
        }
        return view('admin.storys.index');
    }

    public function create()
    {
        App::setLocale(Session::get('currentLocal'));
        $campaigns = $this->_campaignTranslationModel->getByLocale();
        return view('admin.storys.create', compact('campaigns',));
    }

    public function store(Request $request)
    {
        $this->_storyModel->add($request);
        return redirect()->route('admin.stories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $story = $this->_storyModel->getById($id);
        $campaigns = $this->_campaignTranslationModel->getByLocale();
        $storyTranslation = $this->_storyTranslationModel->getById($id);
        return view('admin.storys.edit',compact('story','storyTranslation','locale', 'campaigns'));
    }

    public function update(Request $request, $id)
    {
        $this->_storyModel->update($request,$id);
        $this->_storyTranslationModel->update($request,$id);
        notify()->success('Story updated successfully!');
        return redirect()->route('admin.stories.index');

    }

    public function destroy($id)
    {
            $this->_storyModel->delete($id);
            $this->_storyTranslationModel->delete($id);
            notify()->success('Story deleted successfully!');
            return redirect()->route('admin.storys.index');

    }
}
