<?php
namespace App\Repositories;

use App\Models\ServiceTranslation;

class ServiceTranslationRepository implements IServiceTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return ServiceTranslation::where('service_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {

    }

    public function add($data)
    {
        ServiceTranslation::create([
            'service_id'=> $data['serviceId'],
            'locale'=> $data['locale'],
            'name'=>$data['name'],
            'address'=>$data['address'],
            'description'=>$data['description'],
        ]);
    }

    public function update($data)
    {
        ServiceTranslation::updateOrCreate(
            [
                'service_id' => $data['serviceId'],
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
        ServiceTranslation::where('service_id',$id)->delete();
    }
}
