<?php
namespace App\Repositories;

use App\Models\UnitsTranslation;

class UnitsTranslationRepository implements IUnitsTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return UnitsTranslation::where('units_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {
         return UnitsTranslation::where('locale',$locale)->get();
    }

    public function add($data)
    {
        UnitsTranslation::create([
            'units_id'=> $data['UnitsId'],
            'locale'=> $data['locale'],
            'name'=>$data['name']
        ]);
    }

    public function update($data)
    {
        UnitsTranslation::updateOrCreate(
                [
                    'Units_id' => $data['UnitsId'],
                    'locale'    =>  $data['locale'],
                ], //condition
                [
                    'name' => $data['name']
                ]
            );
    }

    public function delete($id)
    {
        UnitsTranslation::where('Units_id',$id)->delete();
    }
}
