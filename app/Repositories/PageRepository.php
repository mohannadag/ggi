<?php
namespace App\Repositories;

use App\Models\Page;

class PageRepository implements IPageRepository
{
    public function getAll()
    {
        return Page::with(['pageTranslation','pageTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getById($id)
    {
        return  Page::find($id);
    }

    public function add($data)
    {
        return Page::create($data);
    }
    public function update($data,$id)
    {

        $page = $this->getById($id);
        $page->update($data);
    }

    public function delete($id)
    {
        $page = Page::find($id);
        $page->delete();
    }
}
