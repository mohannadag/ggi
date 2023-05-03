<?php
namespace App\Repositories;

use App\Models\VirtualRealityTranslation;

class VirtualRealityTranslationRepository implements IVirtualRealityTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return VirtualRealityTranslation::where('virtualreality_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {

    }

    public function add($data)
    {
        VirtualRealityTranslation::create([
            'virtualreality_id'=> $data['virtualrealityId'],
            'locale'=> $data['locale'],
            'name'=>$data['name'],
            'address'=>$data['address'],
            'description'=>$data['description'],
        ]);
    }

    public function update($data)
    {
        VirtualRealityTranslation::updateOrCreate(
            [
                'virtualreality_id' => $data['virtualrealityId'],
                'locale'    =>  $data['locale'],
            ], //condition
            [
                'name' => $data['name'],
                'address' => $data['address'],
                'description' => $data['description'],
            ]
        );
    }

    public function delete($id)
    {
        VirtualRealityTranslation::where('virtualreality_id',$id)->delete();
    }
}