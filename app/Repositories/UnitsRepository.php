<?php
namespace App\Repositories;

use App\Models\Units;

class UnitsRepository implements IUnitsRepository
{
    public function getAll()
    {
        return Units::with(['UnitsTranslation','UnitsTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getById($id)
    {
        return  Units::find($id);
    }

    public function add($data)
    {
        return Units::create($data);
    }
    public function update($data,$id)
    {

        $units = $this->getById($id);
        $units->update($data);
    }

    public function delete($id)
    {
        $country = Units::find($id);
        $country->delete();
    }
}
