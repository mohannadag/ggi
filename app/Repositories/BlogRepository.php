<?php
namespace App\Repositories;

use App\Models\Blog;
use App\Models\BlogTranslation;
use Carbon\Carbon;

class BlogRepository implements IBlogRepository
{
    public function getAll($locale = null)
    {
        // if(isset($locale))
        //     $data = BlogTranslation::with(['blog'])
        //                 ->where('locale', $locale)
        //                 ->orderBy('id','DESC')
        //                 ->get();

        // else
        //     $data = BlogTranslation::with(['blog'])
        //                 ->orderBy('id','DESC')
        //                 ->get();

        //                 dd($data[1]->blog());
        // return $data;

        // return Blog::with(['blogTrans'=>  function($q) use($locale){
        //     $q->where('locale', $locale);
        // }])->get();


        return Blog::with(['blogTranslation'])
                    ->where('deleted', 0 || null)
                    ->orderBy('id','DESC')
                    ->get();
    }

    public function getById($id, $locale = null)
    {
        return  Blog::with(['blogTranslation'])->find($id);
    }

    public function add($data)
    {
       return Blog::create($data);
    }
    public function update($data,$id)
    {
        $blog = $this->getById($id);;
        $blog->update($data);
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => Carbon::now(),
            'deleted' => 1
        ]);
    }

    public function forceDelete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
    }

    public function getDeleted()
    {
        return Blog::with(['blogTranslation'])
            ->where('deleted', 1)
            ->orderBy('id','DESC')
            ->get();
    }
}
