<?php
namespace App\Repositories;

use App\Models\Citizenship;

class CitizenshipRepository implements ICitizenshipRepository
{
    public function getAll()
    {
        return Citizenship::with(['citizenshipTranslation','citizenshipTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getById($id)
    {
        return  Citizenship::find($id);
    }

    public function add($data)
    {
        return Citizenship::create($data);
    }
    public function update($data,$id)
    {

        $citizenship = $this->getById($id);
        $citizenship->update($data);
    }

    public function delete($id)
    {
        $citizenship = Citizenship::find($id);
        $citizenship->delete();
    }
}
