<?php
namespace App\Repositories;

use App\Models\Landing;

class LandingRepository implements ILandingRepository
{
    public function getAll()
    {
        return Landing::with(['landingTranslation','landingTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getById($id)
    {
        return  Landing::find($id);
    }

    public function add($data)
    {
        return Landing::create($data);
    }
    public function update($data,$id)
    {

        $landing = $this->getById($id);
        $landing->update($data);
    }

    public function delete($id)
    {
        $landing = Landing::find($id);
        $landing->delete();
    }
}
