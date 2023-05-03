<?php
namespace App\Repositories;

use App\Models\Video;

class VideoRepository implements IVideoRepository
{
    public function getAll()
    {
        return Video::with(['videoTranslation','videoTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getById($id)
    {
        return  Video::find($id);
    }

    public function add($data)
    {
        return Video::create($data);
    }
    public function update($data,$id)
    {

        $video = $this->getById($id);
        $video->update($data);
    }

    public function delete($id)
    {
        $video = Video::find($id);
        $video->delete();
    }
}
