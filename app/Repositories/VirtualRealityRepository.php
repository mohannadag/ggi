<?php
namespace App\Repositories;

use App\Models\VirtualReality;

class VirtualRealityRepository implements IVirtualRealityRepository
{
    public function getAll()
    {
        return VirtualReality::with(['virtualrealityTranslation','virtualrealityTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getById($id)
    {
        return  VirtualReality::find($id);
    }

    public function add($data)
    {
        return VirtualReality::create($data);
    }
    public function update($data,$id)
    {

        $virtualreality = $this->getById($id);
        $virtualreality->update($data);
    }

    public function delete($id)
    {
        $virtualreality = VirtualReality::find($id);
        $virtualreality->delete();
    }
}