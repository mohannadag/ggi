<?php
namespace App\Repositories;

use App\Models\Service;

class ServiceRepository implements IServiceRepository
{
    public function getAll()
    {
        return Service::with(['serviceTranslation','serviceTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getById($id)
    {
        return  Service::find($id);
    }

    public function add($data)
    {
        return Service::create($data);
    }
    public function update($data,$id)
    {

        $service = $this->getById($id);
        $service->update($data);
    }

    public function delete($id)
    {
        $service = Service::find($id);
        $service->delete();
    }
}
